<?php

class Sklik_Model_Auto_AdSelect {

    public function __construct() {
        $this->db = Model_Zendb::myfactory();
        $this->smmegam = new Sklik_Model_Map_Em2group2adMapper();
        $this->smmvsfm = new Sklik_Model_Map_View2sklik2finalMapper();
    }

    public function getRowMappedFromViewAd($ega_id) {
        return $this->smmvsfm->fetchRow($this->db->fetchRow($this->db->select()
                                        ->from("view2sklik2final")
                                        ->where("ega_id = ?", $ega_id))
        );
    }

    public function getAllAdFromGroupNoSklikId($eg_id) {
        return $this->db->fetchAll($this->db->select()
                                ->from("view2sklik2final")
                                ->where("eg_sklik_id IS NOT NULL")
                                ->where("ega_sklik_id IS NULL")
                                ->where("eg_id = ?", $eg_id)
        );
    }

    public function getAdsWithSklikIdTimestampReady($groupId) {
        return $this->db->fetchAll($this->db->select()
                                ->from("view2sklik2final")
                                ->where("eg_sklik_id IS NOT NULL")
                                ->where("ega_sklik_id IS NOT NULL")
                                ->where("ega_id_group = ?", $groupId)
        );
    }

    public function getRandomMappedRowUncompleteWithSklikAd() {
        return $this->smmvsfm->fetchRow($this->db->fetchRow($this->db->select()
                                        ->from("view2sklik2final")
                                        ->where("eg_sklik_id IS NOT NULL")
                                        ->where("ega_sklik_id IS NOT NULL")
                                        ->where("eg_ts_update >= ega_ts_update")
                                        ->orWhere("ea_ts_update >= ega_ts_update")
                                        ->order("RAND()")
                                        ->limit(1))
        );
    }

}

?>