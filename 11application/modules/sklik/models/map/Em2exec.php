<?php

class Sklik_Model_Map_Em2exec {

    protected $_ex_id;
    protected $_ex_run_ti_last;
    protected $_ex_run_next;
    protected $_ex_run_day_first;
    protected $_ex_autorun;
    protected $_ex_name_alias;
    protected $_ex_name_class;

    public function exchangeObject($data) {
        $this->_ex_id = (isset($data->ex_id)) ? $data->ex_id : null;
        $this->_ex_run_ti_last = (isset($data->ex_run_ti_last)) ? $data->ex_run_ti_last : null;
        $this->_ex_run_next = (isset($data->ex_run_next)) ? $data->ex_run_next : null;
        $this->_ex_run_day_first = (isset($data->ex_run_day_first)) ? $data->ex_run_day_first : null;
        $this->_ex_autorun = (isset($data->ex_autorun)) ? $data->ex_autorun : null;
        $this->_ex_name_alias = (isset($data->ex_name_alias)) ? $data->ex_name_alias : null;
        $this->_ex_name_class = (isset($data->ex_name_class)) ? $data->ex_name_class : null;
    }

    public function getExId() {
        return $this->_ex_id;
    }

    public function setExId($ex_id) {
        $this->_ex_id = (int) $ex_id;
        return $this;
    }

    public function getExRunTiLast() {
        return $this->_ex_run_ti_last;
    }

    public function setExRunTiLast($ex_run_ti_last) {
        $this->_ex_run_ti_last = (int) $ex_run_ti_last;
        return $this;
    }

    public function getExRunNext() {
        return $this->_ex_run_next;
    }

    public function setExRunNext($ex_run_next) {
        $this->_ex_run_next = (int) $ex_run_next;
        return $this;
    }

    public function getExRunDayFirst() {
        return $this->_ex_run_day_first;
    }

    public function setExRunDayFirst($ex_run_day_first) {
        $this->_ex_run_day_first = (int) $ex_run_day_first;
        return $this;
    }

    public function getExAutorun() {
        return $this->_ex_autorun;
    }

    public function setExAutorun($ex_autorun) {
        $this->_ex_autorun = (int) $ex_autorun;
        return $this;
    }

    public function getExNameAlias() {
        return $this->_ex_name_alias;
    }

    public function setExNameAlias($ex_name_alias) {
        $this->_ex_name_alias = (string) $ex_name_alias;
        return $this;
    }

    public function getExNameClass() {
        return $this->_ex_name_class;
    }

    public function setExNameClass($ex_name_class) {
        $this->_ex_name_class = (string) $ex_name_class;
        return $this;
    }

}

?>