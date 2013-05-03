<?php

class Sklik_Model_Map_View2sklik2keyword {

    protected $_ek_id;
    protected $_ek_ti_create;
    protected $_ek_ts_update;
    protected $_ek_id_group;
    protected $_ek_id_match;
    protected $_ek_sklik_id;
    protected $_ek_keyword;
    protected $_ek_keyword_cpc;
    protected $_ekm_code;
    protected $_ekm_string_before;
    protected $_ekm_string_after;
    protected $_ekt_name;
    protected $_eg_id;
    protected $_eg_ts_update;
    protected $_eg_id_mode;
    protected $_eg_tg_keyword_count;
    protected $_eg_tg_keyword_count_sklik;
    protected $_eg_sklik_id;
    protected $_eg_group_name;
    protected $_view_ek_ts_update;

    public function getEkId() {
        return $this->_ek_id;
    }

    public function setEkId($ek_id) {
        $this->_ek_id = (int) $ek_id;
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
        $this->_ek_ts_update = $ek_ts_update;
        return $this;
    }

    public function getEkIdGroup() {
        return $this->_ek_id_group;
    }

    public function setEkIdGroup($ek_id_group) {
        $this->_ek_id_group = (int) $ek_id_group;
        return $this;
    }

    public function getEkIdMatch() {
        return $this->_ek_id_match;
    }

    public function setEkIdMatch($ek_id_match) {
        $this->_ek_id_match = (int) $ek_id_match;
        return $this;
    }

    public function getEkSklikId() {
        return $this->_ek_sklik_id;
    }

    public function setEkSklikId($ek_sklik_id) {
        $this->_ek_sklik_id = (int) $ek_sklik_id;
        return $this;
    }

    public function getEkKeyword() {
        return $this->_ek_keyword;
    }

    public function setEkKeyword($ek_keyword) {
        $this->_ek_keyword = $ek_keyword;
        return $this;
    }

    public function getEkKeywordCpc() {
        return $this->_ek_keyword_cpc;
    }

    public function setEkKeywordCpc($ek_keyword_cpc) {
        $this->_ek_keyword_cpc = (int) $ek_keyword_cpc;
        return $this;
    }

    public function getEkmCode() {
        return $this->_ekm_code;
    }

    public function setEkmCode($ekm_code) {
        $this->_ekm_code = $ekm_code;
        return $this;
    }

    public function getEkmStringBefore() {
        return $this->_ekm_string_before;
    }

    public function setEkmStringBefore($ekm_string_before) {
        ($ekm_string_before ? $this->_ekm_string_before = (string) $ekm_string_before : NULL);
        return $this;
    }

    public function getEkmStringAfter() {
        return $this->_ekm_string_after;
    }

    public function setEkmStringAfter($ekm_string_after) {
        ($ekm_string_after ? $this->_ekm_string_after = (string) $ekm_string_after : NULL);
        return $this;
    }

    public function getEktName() {
        return $this->_ekt_name;
    }

    public function setEktName($ekt_name) {
        $this->_ekt_name = $ekt_name;
        return $this;
    }

    public function getEgId() {
        return $this->_eg_id;
    }

    public function setEgId($eg_id) {
        $this->_eg_id = (int) $eg_id;
        return $this;
    }

    public function getEgTsUpdate() {
        return $this->_eg_ts_update;
    }

    public function setEgTsUpdate($eg_ts_update) {
        $this->_eg_ts_update = $eg_ts_update;
        return $this;
    }

    public function getEgGroupName() {
        return $this->_eg_group_name;
    }

    public function setEgGroupName($eg_group_name) {
        $this->_eg_group_name = $eg_group_name;
        return $this;
    }

    public function getEgIdMode() {
        return $this->_eg_id_mode;
    }

    public function setEgIdMode($eg_id_mode) {
        $this->_eg_id_mode = (int) $eg_id_mode;
        return $this;
    }

    public function getEgTgKeywordCount() {
        return $this->_eg_tg_keyword_count;
    }

    public function setEgTgKeywordCount($eg_tg_keyword_count) {
        $this->_eg_tg_keyword_count = (int) $eg_tg_keyword_count;
        return $this;
    }

    public function getEgTgKeywordCountSklik() {
        return $this->_eg_tg_keyword_count_sklik;
    }

    public function setEgTgKeywordCountSklik($_eg_tg_keyword_count_sklik) {
        $this->_eg_tg_keyword_count_sklik = (int) $_eg_tg_keyword_count_sklik;
        return $this;
    }

    public function getEgSklikId() {
        return $this->_eg_sklik_id;
    }

    public function setEgSklikId($eg_sklik_id) {
        $this->_eg_sklik_id = (int) $eg_sklik_id;
        return $this;
    }

    public function getViewEkTsUpdate() {
        return $this->_view_ek_ts_update;
    }

    public function setViewEkTsUpdate($view_ek_ts_update) {
        $this->_view_ek_ts_update = $view_ek_ts_update;
        return $this;
    }

}

?>