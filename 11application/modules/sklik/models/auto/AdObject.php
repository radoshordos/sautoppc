<?php

class Sklik_Model_Auto_AdObject {

    protected $_arr = array();

    public function getArr() {
        return $this->_arr;
    }

    public function setArr($arr) {
        $this->_arr = $arr;
        return $this;
    }

    public function getEgaCreative1() {
        return $this->_arr["ega_creative1"];
    }

    public function setEgaCreative1($ega_creative1) {
        $this->_arr["ega_creative1"] = $ega_creative1;
        return $this;
    }

    public function getEgaCreative2() {
        return $this->_arr["ega_creative2"];
    }

    public function setEgaCreative2($ega_creative2) {
        $this->_arr["ega_creative2"] = $ega_creative2;
        return $this;
    }

    public function getEgaCreative3() {
        return $this->_arr["ega_creative2"];
    }

    public function setEgaCreative3($ega_creative3) {
        $this->_arr["ega_creative3"] = $ega_creative3;
        return $this;
    }

    public function getEgaClickthruText() {
        return $this->_arr["ega_clickthru_text"];
    }

    public function setEgaClickthruText($ega_clickthru_text) {
        $this->_arr["ega_clickthru_text"] = $ega_clickthru_text;
        return $this;
    }

    public function getEgaClickthruUrl() {
        return $this->_arr["ega_clickthru_url"];
    }

    public function setEgaClickthruUrl($ega_clickthru_url) {
        $this->_arr["ega_clickthru_url"] = $ega_clickthru_url;
        return $this;
    }

}

?>