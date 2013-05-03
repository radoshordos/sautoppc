<?php

class Sklik_Model_Table_DbtDb extends Sklik_Model_Table_TableAbstract implements Sklik_Model_Table_iColumn {

    public function getTableName() {
        return "em2db";
    }

    public function getColumnPrimaryId() {
        return "ed_id";
    }

    public function getColumnSklikId() {
        throw new Exception("NOT IMPLEMETED");
    }

    public function getColumnMainUniqueName() {
        throw new Exception("NOT IMPLEMETED");
    }

    public function getColumnTimeIntCreate() {
        throw "ed_ti_create";
    }

}

?>