<?php

class Sklik_Model_Map_View2sklik2final {

    protected $_ega_id;
    protected $_ega_ts_update;
    protected $_ega_id_ad;
    protected $_ega_id_group;
    protected $_ega_sklik_id;
    protected $_ega_creative1;
    protected $_ega_creative2;
    protected $_ega_creative3;
    protected $_ega_clickthru_text;
    protected $_ega_clickthru_url;
    protected $_ea_ts_update;
    protected $_eg_id;
    protected $_eg_ts_update;
    protected $_eg_sklik_id;
    protected $_eg_group_name;
    protected $_ed_id_campaign;
    protected $_view_id_dev;
    protected $_view_id_tree;

    public function getEgaId() {
        return $this->_ega_id;
    }

    public function setEgaId($ega_id) {
        $this->_ega_id = (int) $ega_id;
        return $this;
    }

    public function getEgaTsUpdate() {
        return $this->_ega_ts_update;
    }

    public function setEgaTsUpdate($ega_ts_update) {
        $this->_ega_ts_update = $ega_ts_update;
        return $this;
    }

    public function getEgaIdGroup() {
        return $this->_ega_id_group;
    }

    public function setEgaIdGroup($ega_id_group) {
        $this->_ega_id_group = (int) $ega_id_group;
        return $this;
    }

    public function getEgaSklikId() {
        return $this->_ega_sklik_id;
    }

    public function setEgaSklikId($ega_sklik_id) {
        $this->_ega_sklik_id = (int) $ega_sklik_id;
        return $this;
    }

    public function getEgaIdAd() {
        return $this->_ega_id_ad;
    }

    public function setEgaIdAd($ega_id_ad) {
        $this->_ega_id_ad = (int) $ega_id_ad;
        return $this;
    }

    public function getEgaCreative1() {
        return $this->_ega_creative1;
    }

    public function setEgaCreative1($ega_creative1) {
        $this->_ega_creative1 = $ega_creative1;
        return $this;
    }

    public function getEgaCreative2() {
        return $this->_ega_creative2;
    }

    public function setEgaCreative2($ega_creative2) {
        $this->_ega_creative2 = $ega_creative2;
        return $this;
    }

    public function getEgaCreative3() {
        return $this->_ega_creative3;
    }

    public function setEgaCreative3($ega_creative3) {
        $this->_ega_creative3 = $ega_creative3;
        return $this;
    }

    public function getEgaClickthruText() {
        return $this->_ega_clickthru_text;
    }

    public function setEgaClickthruText($ega_clickthru_text) {
        $this->_ega_clickthru_text = $ega_clickthru_text;
        return $this;
    }

    public function getEgaClickthruUrl() {
        return $this->_ega_clickthru_url;
    }

    public function setEgaClickthruUrl($ega_clickthru_url) {
        $this->_ega_clickthru_url = $ega_clickthru_url;
        return $this;
    }

    public function getEaTsUpdate() {
        return $this->_ea_ts_update;
    }

    public function setEaTsUpdate($ea_ts_update) {
        $this->_ea_ts_update = $ea_ts_update;
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
        ($eg_group_name ? $this->_eg_group_name = (string) $eg_group_name : NULL);
        return $this;
    }

    public function getEdIdCampaign() {
        return $this->_ed_id_campaign;
    }

    public function setEdIdCampaign($ed_id_campaign) {
        $this->_ed_id_campaign = (int) $ed_id_campaign;
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

}

?>