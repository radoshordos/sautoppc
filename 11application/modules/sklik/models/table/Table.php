<?php

class Sklik_Model_Table_Table implements Sklik_Model_Table_iTable {

    public function makeDbtGroup() {
        return new Sklik_Model_Auto_DbtGroup();
    }

    public function makeDbtKeyword() {
        return new Sklik_Model_Auto_DbtKeyword();
    }

    public function makeDbtAd() {
        return new Sklik_Model_Auto_DbtAd();
    }

    public function makeDbtDb() {
        return new Sklik_Model_Auto_DbtDb();
    }

    public function makeDbtRule() {
        return new Sklik_Model_Auto_DbtRule();
    }

    public function makeDbtGroupAd() {
        return new Sklik_Model_Auto_DbtGroupAd();
    }

    public function makeDbtCampaign() {
        return new Sklik_Model_Auto_DbtCampaign();
    }

}

?>
