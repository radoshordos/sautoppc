<?php

class Sklik_Model_Auto_GroupSelect {

    public function __construct() {
        $this->db = Model_Zendb::myfactory();
        $this->smmegm = new Sklik_Model_Map_Em2groupMapper();
        $this->smmvsgm = new Sklik_Model_Map_View2sklik2groupMapper();
    }

    public function getNameGroupNoSklikId($campaignId) {
        return $this->db->fetchAll($this->db->select()
                                ->from("view2sklik2group")
                                ->where("eg_sklik_id IS NULL")
                                ->where("ed_id_campaign = ?", $campaignId)
        );
    }

    public function getGroupNameWithSklikId($campaignId) {
        return $this->db->fetchAll($this->db->select()
                                ->from("view2sklik2group")
                                ->where("eg_sklik_id IS NOT NULL")
                                ->where("ed_id_campaign = ?", $campaignId)
        );
    }

    public function getRowFromEmViewGroup($eg_id) {
        return $this->smmvsgm->fetchRow($this->db->fetchRow($this->db->select()
                                        ->from("view2sklik2group")
                                        ->where("eg_id = ?", $eg_id))
        );
    }

    
    
    
    public function getRandomMappedRowUncompleteNoSkilAd() {
        return $this->smmvsgm->fetchRow($this->db->fetchRow($this->db->select()
                                        ->from("view2sklik2group")
                                        ->where("eg_tg_ad_count_sklik < eg_tg_ad_count")
                                        ->order("RAND()")
                                        ->limit(1))
        );
    }

    public function getRandomMappedRowUncompleteNoSklikKeyword() {
        return $this->smmvsgm->fetchRow($this->db->fetchRow($this->db->select()
                                        ->from("view2sklik2group")
                                        ->where("eg_tg_keyword_count_sklik < eg_tg_keyword_count")
                                        ->order("RAND()")
                                        ->limit(1))
        );
    }

}

?>