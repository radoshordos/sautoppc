<?php

class Sklik_Model_Map_Em2keyword {

    protected $_ek_id;
    protected $_ek_ti_create;
    protected $_ek_ts_update;
    protected $_ek_id_db;
    protected $_ek_id_group;
    protected $_ek_id_match;
    protected $_ek_sklik_id;
    protected $_ek_keyword;
    protected $_ek_keyword_cpc;

    public function exchangeObject($data) {
        $this->_ek_id = (isset($data->ek_id)) ? $data->ek_id : null;
        $this->_ek_ti_create = (isset($data->ek_ti_create)) ? $data->ek_ti_create : null;
        $this->_ek_ts_update = (isset($data->ek_ts_update)) ? $data->ek_ts_update : null;
        $this->_ek_id_db = (isset($data->ek_id_db)) ? $data->ek_id_db : null;
        $this->_ek_id_group = (isset($data->ek_id_group)) ? $data->ek_id_group : null;
        $this->_ek_id_match = (isset($data->ek_id_match)) ? $data->ek_id_match : null;
        $this->_ek_sklik_id = (isset($data->ek_sklik_id)) ? $data->ek_sklik_id : null;
        $this->_ek_keyword = (isset($data->ek_keyword)) ? $data->ek_keyword : null;
        $this->_ek_keyword_cpc = (isset($data->ek_keyword_cpc)) ? $data->ek_keyword_cpc : null;
    }

    public function getEkId() {
        return $this->_ek_id;
    }

    public function setEkId($ek_id) {
        ($ek_id ? $this->_ek_id = (int) $ek_id : NULL);
        return $this;
    }

    public function getEkTiCreate() {
        return $this->_ek_ti_create;
    }

    public function setEkTiCreate($ek_ti_create) {
        ($ek_ti_create ? $this->_ek_ti_create = (int) $ek_ti_create : NULL);
        return $this;
    }

    public function getEkTsUpdate() {
        return $this->_ek_ts_update;
    }

    public function setEkTsUpdate($ek_ts_update) {
        ($ek_ts_update ? $this->_ek_ts_update = (string) $ek_ts_update : NULL);
        return $this;
    }

    public function getEkIdDb() {
        return $this->_ek_id_db;
    }

    public function setEkIdDb($ek_id_db) {
        ($ek_id_db ? $this->_ek_id_db = (int) $ek_id_db : NULL);
        return $this;
    }

    public function getEkIdGroup() {
        return $this->_ek_id_group;
    }

    public function setEkIdGroup($ek_id_group) {
        ($ek_id_group ? $this->_ek_id_group = (int) $ek_id_group : NULL);
        return $this;
    }

    public function getEkIdMatch() {
        return $this->_ek_id_match;
    }

    public function setEkIdMatch($ek_id_match) {
        ($ek_id_match ? $this->_ek_id_match = (int) $ek_id_match : NULL);
        return $this;
    }

    public function getEkSklikId() {
        return $this->_ek_sklik_id;
    }

    public function setEkSklikId($ek_sklik_id) {
        ($ek_sklik_id ? $this->_ek_sklik_id = (int) $ek_sklik_id : NULL);
        return $this;
    }

    public function getEkKeyword() {
        return $this->_ek_keyword;
    }

    public function setEkKeyword($ek_keyword) {
        ($ek_keyword ? $this->_ek_keyword = (string) strtolower($ek_keyword) : NULL);
        return $this;
    }

    public function getEkKeywordCpc() {
        return $this->_ek_keyword_cpc;
    }

    public function setEkKeywordCpc($ek_keyword_cpc) {
        ($ek_keyword_cpc ? $this->_ek_keyword_cpc = (string) $ek_keyword_cpc : NULL);
        return $this;
    }

}

?>