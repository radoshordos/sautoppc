<?php

class Sklik_Model_Map_Em2keywordMapper implements Sklik_Model_Map_iMapper {

    public function __construct() {
        $this->db = Model_Zendb::myfactory();
    }

    public function fetchAll($res) {
        foreach ($res as $row) {
            $entries[] = $this->fetchRow($row);
        }
        return $entries;
    }

    public function fetchRow($row) {
        $entry = new Sklik_Model_Map_Em2keyword();
        $entry->setEkId($row->ek_id)
                ->setEkTsUpdate($row->ek_ts_update)
                ->setEkIdDb($row->ek_id_db)
                ->setEkIdGroup($row->ek_id_group)
                ->setEkIdMatch($row->ek_id_match)
                ->setEkSklikId($row->ek_sklik_id)
                ->setEkKeyword($row->ek_keyword)
                ->setEkKeywordCpc($row->ek_keyword_cpc);
        
        return $entry;
    }

    public function getGroupKeywordList($group_id) {
        return $this->fetchAll($this->db->fetchAll($this->db->select()
                                        ->from('em2keyword')
                                        ->where('ek_id_group = ?', intval($group_id)))
        );
    }

}

?>