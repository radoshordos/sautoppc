<?php

class Sklik_Model_Table_DbtGroup extends Sklik_Model_Table_TableAbstract implements Sklik_Model_Table_iColumn {

    public function __construct() {
        parent::__construct();
        $this->smmegm = new Sklik_Model_Map_Em2groupMapper();
        $this->smmvsgm = new Sklik_Model_Map_View2sklik2groupMapper();
    }

    public function getTableName() {
        return "em2group";
    }

    public function getColumnPrimaryId() {
        return "eg_id";
    }

    public function getColumnSklikId() {
        return "eg_sklik_id";
    }

    public function getColumnMainUniqueName() {
        return "eg_group_name";
    }

    public function getColumnTimeIntCreate() {
        return "eg_ti_create";
    }

}

?>