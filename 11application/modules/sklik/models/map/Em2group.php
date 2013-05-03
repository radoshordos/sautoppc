<?php

class Sklik_Model_Map_Em2group {

    protected $_eg_id;
    protected $_eg_ti_create;
    protected $_eg_ts_update;
    protected $_eg_id_db;
    protected $_eg_id_ad;
    protected $_eg_id_mode;
    protected $_eg_tg_ad_count;
    protected $_eg_tg_ad_count_sklik;
    protected $_eg_tg_keyword_count;
    protected $_eg_tg_keyword_count_sklik;
    protected $_eg_sklik_id;
    protected $_eg_group_cpc;
    protected $_eg_group_name;
    protected $_eg_group_utm_term;

    public function getEgId() {
        return $this->_eg_id;
    }

    public function setEgId($eg_id) {
        ($eg_id ? $this->_eg_id = (int) $eg_id : NULL);
        return $this;
    }

    public function getEgTiCreate() {
        return $this->_eg_ti_create;
    }

    public function setEgTiCreate($eg_ti_create) {
        ($eg_ti_create ? $this->_eg_ti_create = (int) $eg_ti_create : NULL);
        return $this;
    }

    public function getEgTsUpdate() {
        return $this->_eg_ts_update;
    }

    public function setEgTsUpdate($eg_ts_update) {
        ($eg_ts_update ? $this->_eg_ts_update = (string) $eg_ts_update : NULL);
        return $this;
    }

    public function getEgIdDb() {
        return $this->_eg_id_db;
    }

    public function setEgIdDb($eg_id_db) {
        ($eg_id_db ? $this->_eg_id_db = (int) $eg_id_db : NULL);
        return $this;
    }

    public function getEgIdAd() {
        return $this->_eg_id_ad;
    }

    public function setEgIdAd($eg_id_ad) {
        ($eg_id_ad ? $this->_eg_id_ad = (int) $eg_id_ad : NULL);
        return $this;
    }

    public function getEgIdMode() {
        return $this->_eg_id_mode;
    }

    public function setEgIdMode($eg_id_mode) {
        ($eg_id_mode ? $this->_eg_id_mode = (int) $eg_id_mode : NULL);
        return $this;
    }

    public function getEgTgAdCount() {
        return $this->_eg_tg_ad_count;
    }

    public function setEgTgAdCount($eg_tg_ad_count) {
        ($eg_tg_ad_count ? $this->_eg_tg_ad_count = (int) $eg_tg_ad_count : NULL);
        return $this;
    }

    public function getEgTgAdCountSklik() {
        return $this->_eg_tg_ad_count_sklik;
    }

    public function setEgTgAdCountSklik($eg_tg_ad_count_sklik) {
        ($eg_tg_ad_count_sklik ? $this->_eg_tg_ad_count_sklik = (int) $eg_tg_ad_count_sklik : NULL);
        return $this;
    }

    public function getEgTgKeywordCount() {
        return $this->_eg_tg_keyword_count;
    }

    public function setEgTgKeywordCount($eg_tg_keyword_count) {
        ($eg_tg_keyword_count ? $this->_eg_tg_keyword_count = (int) $eg_tg_keyword_count : NULL);
        return $this;
    }

    public function getEgTgKeywordCountSklik() {
        return $this->_eg_tg_keyword_count_sklik;
    }

    public function setEgTgKeywordCountSklik($eg_tg_keyword_count_sklik) {
        ($eg_tg_keyword_count_sklik ? $this->_eg_tg_keyword_count_sklik = (int) $eg_tg_keyword_count_sklik : NULL);
        return $this;
    }

    public function getEgSklikId() {
        return $this->_eg_sklik_id;
    }

    public function setEgSklikId($eg_sklik_id) {
        ($eg_sklik_id ? $this->_eg_sklik_id = (int) $eg_sklik_id : NULL);
        return $this;
    }

    public function getEgGroupCpc() {
        return $this->_eg_group_cpc;
    }

    public function setEgGroupCpc($eg_group_cpc) {
        ($eg_group_cpc ? $this->_eg_group_cpc = (int) $eg_group_cpc : NULL);
        return $this;
    }

    public function getEgGroupName() {
        return $this->_eg_group_name;
    }

    public function setEgGroupName($eg_group_name) {
        ($eg_group_name ? $this->_eg_group_name = (string) $eg_group_name : NULL);
        return $this;
    }

    public function getEgGroupUtmTerm() {
        return $this->_eg_group_utm_term;
    }

    public function setEgGroupUtmTerm($eg_group_utm_term) {
        ($eg_group_utm_term ? $this->_eg_group_utm_term = (string) $eg_group_utm_term : NULL);
        return $this;
    }

}

?>