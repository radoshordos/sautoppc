<?php

class Sklik_Model_Table_DbtCampaign extends Sklik_Model_Table_TableAbstract implements Sklik_Model_Table_iColumn {

    public function __construct() {
        parent::__construct();
    }

    public function getTableName() {
        return "em2campaign";
    }

    public function getColumnPrimaryId() {
        return "ec_id";
    }

    public function getColumnSklikId() {
        return "ec_sklik_id";
    }

    public function getColumnMainUniqueName() {
        return "ec_title";
    }

    public function getColumnTimeIntCreate() {
        throw new Exception("NOT IMPLEMETED");
    }

}

?>