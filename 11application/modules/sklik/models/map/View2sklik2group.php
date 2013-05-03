<?php

class Sklik_Model_Map_View2sklik2group {

    protected $_eg_id;
    protected $_eg_ti_create;
    protected $_eg_ts_update;
    protected $_eg_id_mode;
    protected $_eg_id_ad;
    protected $_eg_sklik_id;
    protected $_eg_group_name;
    protected $_eg_tg_ad_count;
    protected $_eg_tg_ad_count_sklik;
    protected $_eg_tg_keyword_count;
    protected $_eg_tg_keyword_count_sklik;
    public $_eg_group_cpc;
    protected $_ed_id;
    protected $_ed_id_campaign;
    protected $_ed_param_index;
    protected $_ed_prod_id;
    protected $_ed_param_price;
    protected $_ec_sklik_id;
    protected $_ea_creative1;
    protected $_ea_creative2;
    protected $_ea_creative3;
    protected $_view_eg_ts_update;
    protected $_view_id_dev;
    protected $_view_id_tree;
    protected $_view_name;
    protected $_view_url_group;

    public function getEgId() {
        return $this->_eg_id;
    }

    public function setEgId($eg_id) {
        $this->_eg_id = (int) $eg_id;
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
        $this->_eg_ts_update = $eg_ts_update;
        return $this;
    }

    public function getEgIdMode() {
        return $this->_eg_id_mode;
    }

    public function setEgIdMode($eg_id_mode) {
        $this->_eg_id_mode = (int) $eg_id_mode;
        return $this;
    }

    public function getEgIdAd() {
        return $this->_eg_id_ad;
    }

    public function setEgIdAd($eg_id_ad) {
        $this->_eg_id_ad = (int) $eg_id_ad;
        return $this;
    }

    public function getEgSklikId() {
        return $this->_eg_sklik_id;
    }

    public function setEgSklikId($eg_sklik_id) {
        $this->_eg_sklik_id = (int) $eg_sklik_id;
        return $this;
    }

    public function getEgGroupName() {
        return $this->_eg_group_name;
    }

    public function setEgGroupName($eg_group_name) {
        $this->_eg_group_name = $eg_group_name;
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

    public function getEgGgroupCpc() {
        return $this->_eg_group_cpc;
    }

    public function setEgGroupCpc($eg_group_cpc) {
        $this->_eg_group_cpc = (int) $eg_group_cpc;
        return $this;
    }

    public function getEdId() {
        return $this->_ed_id;
    }

    public function setEdId($ed_id) {
        $this->_ed_id = (int) $ed_id;
        return $this;
    }

    public function getEdIdCampaign() {
        return $this->_ed_id_campaign;
    }

    public function setEdIdCampaign($ed_id_campaign) {
        $this->_ed_id_campaign = (int) $ed_id_campaign;
        return $this;
    }

    public function getEdParamIndex() {
        return $this->_ed_param_index;
    }

    public function setEdParamIndex($ed_param_index) {
        $this->_ed_param_index = (int) $ed_param_index;
        return $this;
    }

    public function getEdProdId() {
        return $this->_ed_prod_id;
    }

    public function setEdProdId($ed_prod_id) {
        $this->_ed_prod_id = (int) $ed_prod_id;
        return $this;
    }

    public function getEdParamPrice() {
        return $this->_ed_param_price;
    }

    public function setEdParamPrice($ed_param_price) {
        $this->_ed_param_price = (int) $ed_param_price;
        return $this;
    }

    public function getEcSklikId() {
        return $this->_ec_sklik_id;
    }

    public function setEcSklikId($ec_sklik_id) {
        $this->_ec_sklik_id = (int) $ec_sklik_id;
        return $this;
    }

    public function getEaCreative1() {
        return $this->_ea_creative1;
    }

    public function setEaCreative1($ea_creative1) {
        $this->_ea_creative1 = $ea_creative1;
        return $this;
    }

    public function getEaCreative2() {
        return $this->_ea_creative2;
    }

    public function setEaCreative2($ea_creative2) {
        $this->_ea_creative2 = $ea_creative2;
        return $this;
    }

    public function getEaCreative3() {
        return $this->_ea_creative3;
    }

    public function setEaCreative3($ea_creative3) {
        $this->_ea_creative3 = $ea_creative3;
        return $this;
    }

    public function getViewEgTsUpdate() {
        return $this->_view_eg_ts_update;
    }

    public function setViewEgTsUpdate($_view_eg_ts_update) {
        $this->_view_eg_ts_update = $_view_eg_ts_update;
        return $this;
    }

    public function getViewIdDev() {
        return $this->_view_id_dev;
    }

    public function setViewIdDev($view_id_dev) {
        $this->_view_id_dev = (int) $view_id_dev;
        return $this;
    }

    public function getViewIdTree() {
        return $this->_view_id_tree;
    }

    public function setViewIdTree($view_id_tree) {
        $this->_view_id_tree = (int) $view_id_tree;
        return $this;
    }

    public function getViewName() {
        return $this->_view_name;
    }

    public function setViewName($view_name) {
        $this->_view_name = $view_name;
        return $this;
    }

    public function getViewUrlGroup() {
        return $this->_view_url_group;
    }

    public function setViewUrlGroup($view_url_group) {
        $this->_view_url_group = $view_url_group;
        return $this;
    }

}

?>