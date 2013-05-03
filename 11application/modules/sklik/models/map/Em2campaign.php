<?php

class Sklik_Model_Map_Em2campaign {

    protected $_ec_id;
    protected $_ec_sklik_id;
    protected $_ec_active;
    protected $_ec_title;
    protected $_ec_name;
    protected $_ec_utm_campaign;

    public function exchangeObject($data) {
        $this->_ec_id = (isset($data->ec_id)) ? $data->ec_id : null;
        $this->_ec_sklik_id = (isset($data->ec_sklik_id)) ? $data->ec_sklik_id : null;
        $this->_ec_active = (isset($data->ec_active)) ? $data->ec_active : null;
        $this->_ec_title = (isset($data->ec_title)) ? $data->ec_title : null;
        $this->_ec_name = (isset($data->ec_name)) ? $data->ec_name : null;
        $this->_ec_utm_campaign = (isset($data->ec_utm_campaign)) ? $data->ec_utm_campaign : null;
    }

    public function getEcId() {
        return $this->_ec_id;
    }

    public function setEcId($ec_id) {
        ($ec_id ? $this->_ec_id = (int) $ec_id : NULL);
        return $this;
    }

    public function getEcSklikId() {
        return $this->_ec_sklik_id;
    }

    public function setEcSklikId($ec_sklik_id) {
        ($ec_sklik_id ? $this->_ec_sklik_id = (int) $ec_sklik_id : NULL);
        return $this;
    }

    public function getEcActive() {
        return $this->_ec_active;
    }

    public function setEcActive($ec_active) {
        ($ec_active ? $this->_ec_active = (int) $ec_active : NULL);
        return $this;
    }

    public function getEcTitle() {
        return $this->_ec_title;
    }

    public function setEcTitle($ec_title) {
        ($ec_title ? $this->_ec_title = (string) $ec_title : NULL);
        return $this;
    }

    public function getEcName() {
        return $this->_ec_name;
    }

    public function setEcName($ec_name) {
        ($ec_name ? $this->_ec_name = (string) $ec_name : NULL);
        return $this;
    }

    public function getEcUtmCampaign() {
        return $this->_ec_name;
    }

    public function setEcUtmCampaign($ec_utm_campaign) {
        ($ec_utm_campaign ? $this->_ec_utm_campaign = (string) $ec_utm_campaign : NULL);
        return $this;
    }

}

?>