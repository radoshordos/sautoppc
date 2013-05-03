<?php

class Sklik_Model_Auto_KeywordSelect {

    public function __construct() {
        $this->db = Model_Zendb::myfactory();
        $this->smmvskm = new Sklik_Model_Map_View2sklik2keywordMapper();
    }

    public function getAllKeywordsFromGroupNoSklikId($eg_id) {
        return $this->db->fetchAll($this->db->select()
                                ->from("view2sklik2keyword")
                                ->where("eg_sklik_id IS NOT NULL")
                                ->where("ek_sklik_id IS NULL")
                                ->where("eg_id = ?", $eg_id)
        );
    }

    public function getRowMappedFromViewKeyword($ek_id) {
        return $this->smmvskm->fetchRow($this->db->fetchRow($this->db->select()
                                        ->from("view2sklik2keyword")
                                        ->where("ek_id = ?", $ek_id))
        );
    }

    public function getRandomMappedRowUncompleteWithSklikKeyword() {
        return $this->smmvskm->fetchRow($this->db->fetchRow($this->db->select()
                                        ->from("view2sklik2keyword")
                                        ->where("eg_sklik_id IS NOT NULL")
                                        ->where("ek_sklik_id IS NOT NULL")
                                        ->where("eg_tg_keyword_count_sklik = eg_tg_keyword_count")
                                        ->where("eg_ts_update > ek_ts_update")
                                        ->order("RAND()")
                                        ->limit(1))
        );
    }

    public function getAllSklikKeywords($eg_id) {
        return $this->db->fetchAll($this->db->select()
                                ->from("view2sklik2keyword")
                                ->where("ek_sklik_id IS NOT NULL")
                                ->where("ek_id_group = ?", $eg_id));
    }

}

?>