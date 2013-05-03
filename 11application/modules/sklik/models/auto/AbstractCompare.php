<?php

abstract class Sklik_Model_Auto_AbstractCompare {

    protected $_sklik_all = array();
    protected $_sklik_active = array();
    protected $_sklik_remove = array();
    protected $_compare_create = array();
    protected $_compare_remove = array();
    protected $_compare_restore = array();
    protected $_compare_correct = array();
    protected $_db_words = array();

    abstract public function initSklikResponce(array $inputSklikResponce);

    abstract public function initDbWithSklikId2Name($inputDataDb);

    abstract public function initDbNoSklikId2Name($inputDataDb);

    public function compareData() {
        $this->setCompareCorrect(array_intersect_key($this->getSklikActive(), $this->getDbWords()));
        $this->setCompareRemove(array_diff_key($this->getSklikActive(), $this->getDbWords()));
        $this->setCompareRestore(array_diff_key($this->getDbWords(), $this->getSklikActive()));
        $this->setCompareCreate(array_diff_key($this->getDbWords(), $this->getSklikAll()));
    }

    public function compareDataValueOnly() {
        $this->setCompareCreate(array_diff($this->getDbWords(), $this->getSklikAll()));
        $this->setCompareCorrect(array_intersect($this->getSklikAll(), $this->getDbWords()));
    }

    public function debugCompare() {
        echo "\n<br />C NOW SKLIK ALL : " . count($this->getSklikAll()) . "<br />";
        echo "C NOW SKLIK REMOVE : " . count($this->getSklikRemove()) . "<br />";
        echo "C NOW SKLIK ACTIVE : " . count($this->getSklikActive()) . "<br />";
        echo "C NOW DB : " . count($this->getDbWords()) . "<br />";
        echo "C NEW SK CORRECT : " . count($this->getCompareCorrect()) . "<br />";
        echo "C NEW SK CREATE : " . count($this->getCompareCreate()) . "<br />";
        echo "C NEW SK REMOVE : " . count($this->getCompareRemove()) . "<br />";
        echo "C NEW SK RESTORE : " . count($this->getCompareRestore()) . "<br />";
    }

    public function isReadyCorrect() {
        return ((count($this->getCompareCorrect()) > 0) ? TRUE : FALSE);
    }

    public function isReadyCreate() {
        return ((count($this->getCompareCreate()) > 0) ? TRUE : FALSE);
    }

    public function isReadyRemove() {
        return ((count($this->getCompareRemove()) > 0) ? TRUE : FALSE);
    }

    public function isReadyRestore() {
        return ((count($this->getCompareRestore()) > 0) ? TRUE : FALSE);
    }

    public function setSklikAll($key, $val) {
        $this->_sklik_all[$key] = $val;
    }

    public function getSklikAll() {
        return $this->_sklik_all;
    }

    public function setSklikActive($key, $val) {
        $this->_sklik_active[$key] = $val;
    }

    public function getSklikActive() {
        return $this->_sklik_active;
    }

    public function setSklikRemove($key, $val) {
        $this->_sklik_remove[$key] = $val;
    }

    public function getSklikRemove() {
        return $this->_sklik_remove;
    }

    public function setDbWords($key, $val) {
        $this->_db_words[$key] = $val;
    }

    public function getDbWords() {
        return $this->_db_words;
    }

    public function getCompareCreate() {
        return $this->_compare_create;
    }

    public function setCompareCreate($compare_create) {
        $this->_compare_create = $compare_create;
    }

    public function getCompareRemove() {
        return $this->_compare_remove;
    }

    public function setCompareRemove($compare_remove) {
        $this->_compare_remove = $compare_remove;
    }

    public function getCompareRestore() {
        return $this->_compare_restore;
    }

    public function setCompareRestore($compare_restore) {
        $this->_compare_restore = $compare_restore;
    }

    public function getCompareCorrect() {
        return $this->_compare_correct;
    }

    public function setCompareCorrect($compare_correct) {
        $this->_compare_correct = $compare_correct;
    }

}

?>