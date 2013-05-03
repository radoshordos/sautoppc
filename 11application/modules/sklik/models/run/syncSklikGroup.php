<?php

class Sklik_Model_Run_SyncSklikGroup extends Sklik_Model_Run_AbstractSync implements Sklik_Model_Run_iSyncSklik {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->db = Model_Zendb::myfactory();
        $this->smag = new Sklik_Model_Api_Group($this->getRpcClient());
        $this->smags = new Sklik_Model_Auto_GroupSelect();
        $this->smacs = new Sklik_Model_Auto_CampaignSelect();
        $this->smtdg = new Sklik_Model_Table_DbtGroup();
        $this->allGroups = $this->smacs->getMappedAllActiveCampanRow();
        $this->repairNoSklik();
        $this->repairWithSklik();
    }

    public function repairNoSklik() {

        foreach ($this->allGroups as $grpupRow) {
            $this->addMessage("Zvolena kampaň k propojení : <b>" . $grpupRow->getEcName() . "</b>");
            if ($grpupRow->getEcId() > 0) {
                $listGroup = $this->smag->listGroups($grpupRow->getEcSklikId());
                if ($listGroup["status"] == 200) {
                    $compare = new Sklik_Model_Auto_GroupCompare();
                    $compare->initSklikResponce($listGroup["groups"]);
                    $compare->initDbNoSklikId2Name($this->smags->getNameGroupNoSklikId($grpupRow->getEcId()));
                    $compare->compareDataValueOnly();

                    if ($compare->isReadyCorrect()) {
                        $this->addMessage("Propojeno s DB  : <b>" . $this->createSimpleLinkDb2Sklik($compare->getCompareCorrect()) . "</b>");
                    }
                    if ($compare->isReadyCreate()) {
                        $this->addMessage("Přidáno záznamů : <b>" . $this->createFullConnectDb2Sklik($compare->getCompareCreate()) . "</b>");
                    }
                    /*
                      if (!$compare->isReadyCreate() && !$compare->isReadyCorrect()) {
                      $this->addMessage("<b>Žádná změna</b>");
                      }
                     */
                }
            }
        }
    }

    public function repairWithSklik() {

        foreach ($this->allGroups as $grpupRow) {
            $this->addMessage("Zkontrolována kampaň : <b>" . $grpupRow->getEcName() . "</b>");
            if ($grpupRow->getEcId() > 0) {
                $listGroup = $this->smag->listGroups($grpupRow->getEcSklikId());
                if ($listGroup["status"] == 200) {

                    $compare = new Sklik_Model_Auto_GroupCompare();
                    $compare->initSklikResponce($listGroup["groups"]);
                    $compare->initDbWithSklikId2Name($this->smags->getGroupNameWithSklikId($grpupRow->getEcId()));
                    $compare->compareData();

                    if ($compare->isReadyRemove()) {
                        $this->executeRemove($compare->getCompareRemove());
                        $this->addMessage("Nastaven příznak smazání : <b>" . $this->console->getCountNamespace("remove") . "</b>");
                    }

                    if ($compare->isReadyRestore()) {
                        $this->executeRestore($compare->getCompareRestore());
                        $this->addMessage("Odstraněn příznak smazání : <b>" . $this->console->getCountNamespace("restore") . "</b>");
                    }
                    /*
                      if (!$compare->isReadyRemove() && !$compare->isReadyRestore()) {
                      $this->addMessage("<b>Žádná změna</b>");
                      }
                     */
                }
            }
        }
    }

    public function executeRemove(array $listRemove) {
        foreach (array_keys($listRemove) as $key) {
            $this->console->addSource("remove", $this->smag->groupRemove($key));
        }
    }

    public function executeRestore(array $listRestore) {
        foreach (array_keys($listRestore) as $key) {
            $this->console->addSource("restore", $this->smag->groupRestore($key));
        }
    }

    public function createSimpleLinkDb2Sklik(array $compare_correct) {
        $i = 0;
        if (!empty($compare_correct)) {
            foreach ($compare_correct as $key => $val) {
                $primaryId = $this->smtdg->getColumnIdFromMainUniqueName($val);
                if (intval($primaryId) > 0) {
                    $i += $this->smtdg->updateColumnsTable(array($this->smtdg->getColumnSklikId() => $key), $primaryId);
                }
            }
        }
        return $i;
    }

    public function createFullConnectDb2Sklik(array $compare_create) {
        $i = 0;
        if (!empty($compare_create)) {
            $smtdg = new Sklik_Model_Table_DbtGroup();
            foreach (array_keys($compare_create) as $key) {
                $row = $this->smags->getRowFromEmViewGroup($key);
                $this->console->addSource($row->getEcSklikId(), $this->smag->groupCreate($row->getEcSklikId(), $row->getEgGroupName(), $row->_eg_group_cpc));
                if ($this->console->isMessage200WithLog($row->getEcSklikId())) {
                    $i += $smtdg->updateColumnsTable(array("eg_sklik_id" => $this->console->getNamespaceArray($row->getEcSklikId(), "groupId")), $row->getEgId());
                }
            }
        }
        return $i;
    }

}

?>