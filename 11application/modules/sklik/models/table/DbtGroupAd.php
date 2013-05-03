<?php

class Sklik_Model_Table_DbtGroupAd extends Sklik_Model_Table_TableAbstract implements Sklik_Model_Table_iColumn {

    public function getTableName() {
        return "em2group2ad";
    }

    public function getColumnPrimaryId() {
        return "ega_id";
    }

    public function getColumnSklikId() {
        return "ega_sklik_id";
    }

    public function getColumnMainUniqueName() {
        return "ega_clickthru_url";
    }

    public function getColumnTimeIntCreate() {
        return "ega_ti_create";
    }

}

?>