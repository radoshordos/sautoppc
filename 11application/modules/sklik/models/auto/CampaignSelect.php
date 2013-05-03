<?php

class Sklik_Model_Auto_CampaignSelect {

    public function __construct() {
        $this->db = Model_Zendb::myfactory();
        $this->smmecm = new Sklik_Model_Map_Em2campaignMapper();
    }

    public function getMappedRandomActiveCampanRow() {
        return $this->smmecm->fetchRow($this->db->fetchRow($this->db->select()
                                        ->from("em2campaign")
                                        ->where("ec_active = 1")
                                        ->order("RAND()")
                                        ->limit(1))
        );
    }

    public function getMappedAllActiveCampanRow() {
        return $this->smmecm->fetchAll($this->db->fetchAll($this->db->select()
                                        ->from("em2campaign")
                                        ->where("ec_active = 1")
                                        ->order(array("ec_id")))
        );
    }

}

?>