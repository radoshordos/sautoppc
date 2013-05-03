<?php

class Sklik_Model_Map_Api2campaign {

    protected $_status;
    protected $_dayBudget;
    protected $_totalBudget;
    protected $_premiseId;
    protected $_exhaustedDayBudget;
    protected $_name;
    protected $_createDate;
    protected $_exhaustedTotalClicks;
    protected $_totalClicks;
    protected $_removed;
    protected $_adSelection;
    protected $_id;
    protected $_exhaustedTotalBudget;

    public function getStatus() {
        return $this->_status;
    }

    public function setStatus($status) {
        $this->_status = $status;
        return $this;
    }

    public function getDayBudget() {
        return $this->_dayBudget;
    }

    public function setDayBudget($dayBudget) {
        $this->_dayBudget = $dayBudget;
        return $this;
    }

    public function getTotalBudget() {
        return $this->_totalBudget;
    }

    public function setTotalBudget($totalBudget) {
        $this->_totalBudget = $totalBudget;
        return $this;
    }

    public function getPremiseId() {
        return $this->_premiseId;
    }

    public function setPremiseId($premiseId) {
        $this->_premiseId = $premiseId;
        return $this;
    }

    public function getExhaustedDayBudget() {
        return $this->_exhaustedDayBudget;
    }

    public function setExhaustedDayBudget($exhaustedDayBudget) {
        $this->_exhaustedDayBudget = $exhaustedDayBudget;
        return $this;
    }

    public function getName() {
        return $this->_name;
    }

    public function setName($name) {
        $this->_name = $name;
        return $this;
    }

    public function getCreateDate() {
        return $this->_createDate;
    }

    public function setCreateDate($createDate) {
        $this->_createDate = $createDate;
    }

    public function getExhaustedTotalClicks() {
        return $this->_exhaustedTotalClicks;
    }

    public function setExhaustedTotalClicks($exhaustedTotalClicks) {
        ($exhaustedTotalClicks ? $this->_exhaustedTotalClicks = (string) $exhaustedTotalClicks : NULL);
        return $this;
    }

    public function getTotalClicks() {
        return $this->_totalClicks;
    }

    public function setTotalClicks($totalClicks) {
        $this->_totalClicks = $totalClicks;
        return $this;
    }

    public function getRemoved() {
        return $this->_removed;
    }

    public function setRemoved($removed) {
        $this->_removed = $removed;
        return $this;
    }

    public function getAdSelection() {
        return $this->_adSelection;
    }

    public function setAdSelection($adSelection) {
        $this->_adSelection = $adSelection;
        return $this;
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
        return $this;
    }

    public function getExhaustedTotalBudget() {
        return $this->_exhaustedTotalBudget;
    }

    public function setExhaustedTotalBudget($exhaustedTotalBudget) {
        $this->_exhaustedTotalBudget = $exhaustedTotalBudget;
        return $this;
    }

}

?>