<?php

class Sklik_Model_Map_Em2group2ad {

    protected $_ega_id;
    protected $_ega_ti_create;
    protected $_ega_ts_update;
    protected $_ega_id_ad;
    protected $_ega_id_group;
    protected $_ega_sklik_id;
    protected $_ega_creative1;
    protected $_ega_creative2;
    protected $_ega_creative3;
    protected $_ega_clickthru_text;
    protected $_ega_clickthru_url;

    public function getEgaId() {
        return $this->_ega_id;
    }

    public function setEgaId($ega_id) {
        $this->_ega_id = (int) $ega_id;
        return $this;
    }

    public function getEgaTiCreate() {
        return $this->_ega_ti_create;
    }

    public function setEgaTiCreate($ega_ti_create) {
        $this->_ega_ti_create = (int) $ega_ti_create;
        return $this;
    }

    public function getEgaTsUpdate() {
        return $this->ega_ts_update;
    }

    public function setEgaTsUpdate($ega_ts_update) {
        $this->_ega_ts_update = $ega_ts_update;
        return $this;
    }

    public function getEgaIdAd() {
        return $this->_ega_id_ad;
    }

    public function setEgaIdAd($ega_id_ad) {
        $this->_ega_id_ad = (int) $ega_id_ad;
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

}

?>
