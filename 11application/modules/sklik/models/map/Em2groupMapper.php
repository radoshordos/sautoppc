<?php

class Sklik_Model_Map_Em2groupMapper {

    protected $_eg_id;
    protected $_eg_ts_update;
    protected $_eg_id_db;
    protected $_eg_id_ad;
    protected $_eg_id_mode;
    protected $_eg_tg_keyword_count;
    protected $_eg_sklik_id;
    protected $_eg_group_cpc;
    protected $_eg_group_name;
    protected $_eg_group_utm_term;

    public function fetchAll($res) {
        foreach ($res as $row) {
            $entries[] = $this->fetchRow($row);
        }
        return $entries;
    }

    public function fetchRow($row) {
        $entry = new Sklik_Model_Map_Em2group();
        $entry->setEgId($row->eg_id)
                ->setEgTsUpdate($row->eg_ts_update)
                ->setEgIdDb($row->eg_id_db)
                ->setEgIdAd($row->eg_id_ad)
                ->setEgIdMode($row->eg_id_mode)
                ->setEgTgKeywordCount($row->eg_tg_keyword_count)
                ->setEgSklikId($row->eg_sklik_id)
                ->setEgGroupCpc($row->eg_group_cpc)
                ->setEgGroupName($row->eg_group_name)
                ->setEgGroupUtmTerm($row->eg_group_utm_term);
        return $entry;
    }

}

?>