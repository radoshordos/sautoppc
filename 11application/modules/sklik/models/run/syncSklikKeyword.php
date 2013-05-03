<?php

class Sklik_Model_Run_SyncSklikKeyword extends Sklik_Model_Run_AbstractSync implements Sklik_Model_Run_iSyncSklik {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->db = Model_Zendb::myfactory();
        $this->smak = new Sklik_Model_Api_Keyword($this->getRpcClient());
        $this->smaks = new Sklik_Model_Auto_KeywordSelect();
        $this->smtdka = new Sklik_Model_Table_DbtKeyword();

        for ($i = 0; $i < 12; $i++) {
            $code = $this->repairNoSklik();
            if ($code == NULL) {
                $this->addMessage("<b>Plně propojeno s DB</b>");
                break;
            }
        }

        for ($i = 0; $i < 12; $i++) {
            $code = $this->repairWithSklik();
            if ($code == NULL) {
                $this->addMessage("<b>Plně zkontrolováno s DB</b>");
                break;
            }
        }
    }

    public function repairNoSklik() {

        $smags = new Sklik_Model_Auto_GroupSelect();
        $mappedGroupRow = $smags->getRandomMappedRowUncompleteNoSklikKeyword();

        if ($mappedGroupRow->getEgId() > 0) {
            $this->addMessage("Vybrána skupina : <b>" . $mappedGroupRow->getEgGroupName() . "</b>");

            $sklikKeywordsResponceList = $this->smak->listKeywords($mappedGroupRow->getEgSklikId());
            $compare = new Sklik_Model_Auto_KeywordCompare();
            $compare->initSklikResponce($sklikKeywordsResponceList["keywords"]);
            $compare->initDbNoSklikId2Name($this->smaks->getAllKeywordsFromGroupNoSklikId($mappedGroupRow->getEgId()));
            $compare->compareDataValueOnly();

            if ($compare->isReadyCorrect()) {
                $this->addMessage("Klíčové slovo propojeno : <b>" . $this->createSimpleLinkDb2Sklik($compare->getCompareCorrect(), "Keyword") . "</b>");
            }

            if ($compare->isReadyCreate()) {
                $this->addMessage("Přidáno nových klíčových slov  : <b>" . $this->createFullLinkDb2Sklik($compare->getCompareCreate(), $mappedGroupRow) . "</b>");
            }

            return $mappedGroupRow->getEgId();
        }
    }

    public function repairWithSklik() {

        $mappedGroupRow = $this->smaks->getRandomMappedRowUncompleteWithSklikKeyword();
        if ($mappedGroupRow->getEgId() > 0) {

            $this->addMessage("Zvolena skupina : <b>" . $mappedGroupRow->getEgGroupName() . "</b>");
            $sklikKeywords = $this->smak->listKeywords($mappedGroupRow->getEgSklikId());

            if ($sklikKeywords["status"] == 200) {

                $compare = new Sklik_Model_Auto_KeywordCompare();
                $compare->initSklikResponce($sklikKeywords["keywords"]);
                $compare->initDbWithSklikId2Name($this->smaks->getAllSklikKeywords($mappedGroupRow->getEgId()));
                $compare->compareData();

                if ($compare->isReadyCorrect() && !$compare->isReadyRestore() && !$compare->isReadyRemove()) {
                    $this->addMessage("Zkontrolováno slov : <b>" . $this->executeCorrectKeywords($compare->getCompareCorrect()) . "</b>");
                }

                if ($compare->isReadyRemove()) {
                    $this->executeRemove($compare->getCompareRemove());
                    $this->addMessage("Provedeno smazání u <b>" . $this->console->getCountNamespaceStatus200("remove") . "</b> pololožek");
                }

                if ($compare->isReadyRestore()) {
                    $this->executeRestore($compare->getCompareRestore());
                    $this->addMessage("Provedena obnova u <b>" . $this->console->getCountNamespace("restore") . "</b> pololožek");
                }

                return $mappedGroupRow->getEgId();
            }
        }
    }

    public function createSimpleLinkDb2Sklik(array $compare_correct) {
        $i = 0;
        if (!empty($compare_correct)) {
            foreach ($compare_correct as $key => $val) {
                $primaryId = $this->smtdka->getColumnIdFromMainUniqueName($val);
                if (intval($primaryId) > 0) {
                    $i += $this->smtdka->updateColumnsTable(array("ek_sklik_id" => $key, "ek_ts_update" => '0000-00-00 00:00:00'), $primaryId);
                }
            }
        }
        return $i;
    }

    public function createFullLinkDb2Sklik(array $compare_create, $mappedGroupRow) {
        $i = 0;
        if (!empty($compare_create)) {
            $smtdk = new Sklik_Model_Table_DbtKeyword();
            foreach (array_keys($compare_create) as $key) {
                $row = $this->smaks->getRowMappedFromViewKeyword($key);
                $this->console->addSource($mappedGroupRow->getEgSklikId(), $this->smak->keywordCreate($mappedGroupRow->getEgSklikId(), $row->getEkKeyword(), $row->getEkmCode(), $row->getEkKeywordCpc()));
                if ($this->console->isMessage200WithLog($mappedGroupRow->getEgSklikId())) {
                    $i += $smtdk->updateColumnsTable(array("ek_sklik_id" => $this->console->getNamespaceArray($mappedGroupRow->getEgSklikId(), "keywordId")), $row->getEkId());
                }
            }
        }
        return $i;
    }

    public function executeCorrectKeywords(array $array_correct) {
        $i = 0;
        foreach (array_keys($array_correct) as $key) {
            $i += $this->db->update("em2keyword", array("ek_ts_update" => new Zend_Db_Expr('NOW()')), $this->db->quoteInto("ek_sklik_id = ?", $key));
        }
        return $i;
    }

    public function executeRemove(array $listRemove) {
        foreach (array_keys($listRemove) as $key) {
            $this->console->addSource("remove", $this->smak->keywordRemove($key));
        }
    }

    public function executeRestore(array $listRestore) {
        foreach (array_keys($listRestore) as $key) {
            $this->console->addSource("restore", $this->smak->keywordRestore($key));
        }
    }

}

?>