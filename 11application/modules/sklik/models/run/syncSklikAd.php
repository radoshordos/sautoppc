<?php

class Sklik_Model_Run_SyncSklikAd extends Sklik_Model_Run_AbstractSync implements Sklik_Model_Run_iSyncSklik {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->db = Model_Zendb::myfactory();
        $this->smaa = new Sklik_Model_Api_Ad($this->getRpcClient());
        $this->smaas = new Sklik_Model_Auto_AdSelect();
        $this->smtdga = new Sklik_Model_Table_DbtGroupAd();

        for ($i = 0; $i < 15; $i++) {
            $code = $this->repairNoSklik();
            if ($code == NULL) {
                $this->addMessage("<b>Plně propojeno s DB</b>");
                break;
            }
        }

        for ($i = 0; $i < 15; $i++) {
            $code = $this->repairWithSklik();
            if ($code == NULL) {
                $this->addMessage("<b>Plně zkontrolováno s DB</b>");
                break;
            }
        }
    }

    public function repairNoSklik() {

        $smags = new Sklik_Model_Auto_GroupSelect();
        $mappedAdRow = $smags->getRandomMappedRowUncompleteNoSkilAd();

        if ($mappedAdRow->getEgId() > 0) {
            $this->addMessage("Vybrána skupina  : <b>" . $mappedAdRow->getEgGroupName() . "</b>");
            $sklikAdResponceList = $this->smaa->listAds($mappedAdRow->getEgSklikId());

            $compare = new Sklik_Model_Auto_AdCompare();
            $compare->initSklikResponce($sklikAdResponceList["ads"]);
            $compare->initDbNoSklikId2Name($this->smaas->getAllAdFromGroupNoSklikId($mappedAdRow->getEgId()));
            $compare->compareDataValueOnly();

            if ($compare->isReadyCorrect()) {
                $this->addMessage("Propojen nový banner : <b>" . $this->createSimpleLinkDb2Sklik($compare->getCompareCorrect(), "GroupAd") . "</b>");
            }

            if ($compare->isReadyCreate()) {
                $this->addMessage("Vložen nový banner : <b>" . $this->createFullLinkDb2Sklik($compare->getCompareCreate(), $mappedAdRow) . "</b>");
            }

            return $mappedAdRow->getEgId();
        }
    }

    public function repairWithSklik() {

        $mraAdRow = $this->smaas->getRandomMappedRowUncompleteWithSklikAd();
        if ($mraAdRow->getEgaId() > 0) {

            $this->addMessage("Zvolena ad kampaň : <b>" . $mraAdRow->getEgGroupName() . "</b>");
            $listAd = $this->smaa->listAds($mraAdRow->getEgSklikId());
            if ($listAd["status"] == 200) {

                $compare = new Sklik_Model_Auto_AdCompare();
                $compare->initSklikResponce($listAd["ads"]);
                $compare->initDbWithSklikId2Name($this->smaas->getAdsWithSklikIdTimestampReady($mraAdRow->getEgId()));
                $compare->compareData();
                /*
                  $compare->debugCompare();
                  echo "<br />";
                  var_dump($compare->getDbWords());
                  echo "<br />";
                  var_dump($compare->getSklikAll());
                 */
                if ($compare->isReadyCorrect() && !$compare->isReadyRestore() && !$compare->isReadyRemove()) {
                    $this->addMessage("Zkontrolováno slov : <b>" . $this->executeCorrectAds($compare->getCompareCorrect()) . "</b>");
                }

                if ($compare->isReadyRemove()) {
                    $this->addMessage("Provedeno smazání : <b>" . $this->executeRemove($compare->getCompareRemove()) . "</b>");
                }

                if ($compare->isReadyRestore()) {
                    $this->addMessage("Odstraněn příznak smazání : <b>" . $this->executeRestore($compare->getCompareRestore()) . "</b>");
                }

                return $mraAdRow->getEgId();
            }
        }
    }

    public function executeRemove(array $listRemove) {
        $i = 0;
        foreach (array_keys($listRemove) as $key) {
            $this->console->addSource($key, $this->smaa->adRemove($key));
            if ($this->console->isMessage200WithLog($key)) {
                $i++;
                $this->db->delete("em2group2ad", $this->db->quoteInto("ega_sklik_id = ?", $key));
            }
        }
        return $i;
    }

    public function executeRestore(array $listRemove) {
        $i = 0;
        foreach (array_keys($listRemove) as $key) {
            $this->console->addSource($key, $this->smaa->adRestore($key));
            if ($this->console->isMessage200WithLog($key)) {
                $i++;
            }
        }
        return $i;
    }

    public function executeCorrectAds(array $array_correct) {
        $i = 0;
        foreach (array_keys($array_correct) as $key) {
            $i += $this->db->update("em2group2ad", array("ega_ts_update" => new Zend_Db_Expr('NOW()')), $this->db->quoteInto("ega_sklik_id = ?", $key));
        }
        return $i;
    }

    public function createSimpleLinkDb2Sklik(array $compare_correct) {
        $i = 0;
        if (!empty($compare_correct)) {
            foreach ($compare_correct as $key => $val) {
                $unserval = unserialize($val);
                $primaryId = $this->db->fetchOne($this->db->select()->from("view2sklik2final")->where("ega_clickthru_url = ?", $unserval["ega_clickthru_url"]));
                $i += $this->smtdga->updateColumnsTable(array("ega_sklik_id" => $key, "ega_ts_update" => '0000-00-00 00:00:00'), $primaryId);
            }
        }
        return $i;
    }

    public function createFullLinkDb2Sklik(array $compare_create, $mappedAdRow) {
        $i = 0;
        if (!empty($compare_create)) {
            foreach (array_keys($compare_create) as $key) {
                $row = $this->smaas->getRowMappedFromViewAd($key);
                $this->console->addSource($mappedAdRow->getEgSklikId(), $this->smaa->adCreate($mappedAdRow->getEgSklikId(), $row->getEgaCreative1(), $row->getEgaCreative2(), $row->getEgaCreative3(), $row->getEgaClickthruText(), $row->getEgaClickthruUrl()));
                if ($this->console->isMessage200WithLog($mappedAdRow->getEgSklikId())) {
                    $i += $this->smtdga->updateColumnsTable(array("ega_sklik_id" => $this->console->getNamespaceArray($mappedAdRow->getEgSklikId(), "adId")), $row->getEgaId());
                }
            }
            return $i;
        }
    }

}

?>