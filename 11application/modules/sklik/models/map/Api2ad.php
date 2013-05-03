<?php

class Sklik_Model_Map_Api2Ad {

    protected $_status;
    protected $_groupId;
    protected $_premiseId;
    protected $_clickthruText;
    protected $_createDate;
    protected $_creative1;
    protected $_creative2;
    protected $_creative3;
    protected $_clickthruUrl;
    protected $_removed;
    protected $_id;
    protected $_premiseMode;

    public function getStatus() {
        return $this->_status;
    }

    public function setStatus($status) {
        $this->_status = $status;
        return $this;
    }

    public function getGroupId() {
        return $this->_groupId;
    }

    public function setGroupId($groupId) {
        $this->_groupId = $groupId;
        return $this;
    }

    public function getPremiseId() {
        return $this->_premiseId;
    }

    public function setPremiseId($premiseId) {
        $this->_premiseId = $premiseId;
        return $this;
    }

    public function getClickthruText() {
        return $this->_clickthruText;
    }

    public function setClickthruText($clickthruText) {
        $this->_clickthruText = $clickthruText;
        return $this;
    }

    public function getCreateDate() {
        return $this->_createDate;
    }

    public function setCreateDate($createDate) {
        $this->_createDate = $createDate;
        return $this;
    }

    public function getCreative1() {
        return $this->_creative1;
    }

    public function setCreative1($creative1) {
        $this->_creative1 = $creative1;
        return $this;
    }

    public function getCreative2() {
        return $this->_creative2;
    }

    public function setCreative2($creative2) {
        $this->_creative2 = $creative2;
        return $this;
    }

    public function getCreative3() {
        return $this->_creative3;
    }

    public function setCreative3($creative3) {
        $this->_creative3 = $creative3;
        return $this;
    }

    public function getClickthruUrl() {
        return $this->_clickthruUrl;
    }

    public function setClickthruUrl($clickthruUrl) {
        $this->_clickthruUrl = $clickthruUrl;
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

    public function getPremiseMode() {
        return $this->_premiseMode;
    }

    public function setPremiseMode($premiseMode) {
        $this->_premiseMode = $premiseMode;
        return $this;
    }

}

?>
