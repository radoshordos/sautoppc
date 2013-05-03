<?php

class Sklik_Model_Map_Api2group {

    protected $_status;
    protected $_name;
    protected $_campaignId;
    protected $_createDate;
    protected $_cpc;
    protected $_cpcContext;
    protected $_removed;
    protected $_id;

    public function getStatus() {
        return $this->_status;
    }

    public function setStatus($status) {
        $this->_status = $status;
        return $this;
    }

    public function getName() {
        return $this->_name;
    }

    public function setName($name) {
        $this->_name = $name;
        return $this;
    }

    public function getCampaignId() {
        return $this->_campaignId;
    }

    public function setCampaignId($campaignId) {
        $this->_campaignId = $campaignId;
        return $this;
    }

    public function getCreateDate() {
        return $this->_createDate;
    }

    public function setCreateDate($createDate) {
        $this->_createDate = $createDate;
        return $this;
    }

    public function getCpc() {
        return $this->_cpc;
    }

    public function setCpc($cpc) {
        $this->_cpc = (int) $cpc;
        return $this;
    }

    public function getCpcContext() {
        return $this->_cpcContext;
    }

    public function setCpcContext($cpcContext) {
        $this->_cpcContext = $cpcContext;
        return $this;
    }

    public function getRemoved() {
        return $this->_removed;
    }

    public function setRemoved($removed) {
        $this->_removed = $removed;
        return $this;
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
        return $this;
    }

}

?>