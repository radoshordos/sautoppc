<?php

class Sklik_Model_Map_Api2keyword {

    protected $_status;
    protected $_name;
    protected $_url;
    protected $_createDate;
    protected $_cpc;
    protected $_groupId;
    protected $_disabled;
    protected $_matchType;
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

    public function geUurl() {
        return $this->_url;
    }

    public function setUrl($url) {
        $this->_url = $url;
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
        $this->_cpc = $cpc;
        return $this;
    }

    public function getGroupId() {
        return $this->_groupId;
    }

    public function setGroupId($groupId) {
        $this->_groupId = $groupId;
        return $this;
    }

    public function getDisabled() {
        return $this->_disabled;
    }

    public function setDisabled($disabled) {
        $this->_disabled = $disabled;
        return $this;
    }

    public function getMatchType() {
        return $this->_matchType;
    }

    public function setMatchType($matchType) {
        $this->_matchType = $matchType;
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