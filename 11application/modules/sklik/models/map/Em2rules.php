<?php

class Sklik_Model_Map_Em2rules {

    protected $_er_id;
    protected $_er_id_priority;
    protected $_er_id_campagn;
    protected $_er_id_dev;
    protected $_er_id_tree;
    protected $_er_id_set_dbmode;
    protected $_er_param_name_lenghtmin;
    protected $_er_param_name_lenghtmax;
    protected $_er_param_name_wordmin;
    protected $_er_param_name_wordmax;
    protected $_er_param_pricemin;
    protected $_er_param_pricemax;
    protected $_er_param_sell;
    protected $_er_param_action;
    protected $_er_param_sendnow;

    public function setErId($er_id) {
        $this->_er_id = (int) $er_id;
        return $this;
    }

    public function getErId() {
        return $this->_er_id;
    }

    public function getErIdPriority() {
        return $this->_er_id_priority;
    }

    public function setErIdPriority($er_id_priority) {
        $this->_er_id_priority = $er_id_priority;
        return $this;
    }

    public function setErIdCampagn($er_id_campagn) {
        $this->_er_id_campagn = (int) $er_id_campagn;
        return $this;
    }

    public function getErIdCampagn() {
        return $this->_er_id_campagn;
    }

    public function setErIdDev($er_id_dev) {
        ($er_id_dev ? $this->_er_id_dev = (int) $er_id_dev : NULL);
        return $this;
    }

    public function getErIdDev() {
        return $this->_er_id_dev;
    }

    public function setErIdTree($er_id_tree) {
        ($er_id_tree ? $this->_er_id_tree = (int) $er_id_tree : NULL);
        return $this;
    }

    public function getErIdTree() {
        return $this->_er_id_tree;
    }

    public function setErIdSetDbmode($er_id_set_dbmode) {
        ($er_id_set_dbmode ? $this->_er_id_set_dbmode = (int) $er_id_set_dbmode : NULL);
        return $this;
    }

    public function getErIdSetDbmode() {
        return $this->_er_id_set_dbmode;
    }

    public function setErParamNameLenghtMin($er_param_name_lenghtmin) {
        ($er_param_name_lenghtmin ? $this->_er_param_name_lenghtmin = (int) $er_param_name_lenghtmin : NULL);
        return $this;
    }

    public function getErParamNameLenghtMin() {
        return $this->_er_param_name_lenghtmin;
    }

    public function setErParamNameLenghtMax($er_param_name_lenghtmax) {
        ($er_param_name_lenghtmax ? $this->_er_param_name_lenghtmax = (int) $er_param_name_lenghtmax : NULL);
        return $this;
    }

    public function getErParamNameLenghtMax() {
        return $this->_er_param_name_lenghtmax;
    }

    public function setErParamNameWordMin($er_param_name_wordmin) {
        ($er_param_name_wordmin ? $this->_er_param_name_wordmin = (int) $er_param_name_wordmin : NULL);
        return $this;
    }

    public function getErParamNameWordMin() {
        return $this->_er_param_name_wordmin;
    }

    public function setErParamNameWordMax($er_param_name_wordmax) {
        ($er_param_name_wordmax ? $this->_er_param_name_wordmax = (int) $er_param_name_wordmax : NULL);
        return $this;
    }

    public function getErParamNameWordMax() {
        return $this->_er_param_name_wordmax;
    }

    public function setErParamPricemin($er_param_pricemin) {
        ($er_param_pricemin ? $this->_er_param_pricemin = (int) $er_param_pricemin : NULL);
        return $this;
    }

    public function getErParamPriceMin() {
        return $this->_er_param_pricemin;
    }

    public function setErParamPriceMax($er_param_pricemax) {
        ($er_param_pricemax ? $this->_er_param_pricemax = (int) $er_param_pricemax : NULL);
        return $this;
    }

    public function getErParamPriceMax() {
        return $this->_er_param_pricemax;
    }

    public function setErParamSell($er_param_sell) {
        ($er_param_sell ? $this->_er_param_sell = (string) $er_param_sell : NULL);
        return $this;
    }

    public function getErParamSell() {
        return $this->_er_param_sell;
    }

    public function setErParamAction($er_param_action) {
        ($er_param_action ? $this->_er_param_action = (string) $er_param_action : NULL);
        return $this;
    }

    public function getErParamAction() {
        return $this->_er_param_action;
    }

    public function setErParamSendNow($er_param_sendnow) {
        ($er_param_sendnow ? $this->_er_param_sendnow = (string) $er_param_sendnow : NULL);
        return $this;
    }

    public function getErParamSendNow() {
        return $this->_er_param_sendnow;
    }

}

?>