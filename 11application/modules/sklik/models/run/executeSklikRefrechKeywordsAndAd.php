<?php

class Sklik_Model_Run_ExecuteSklikRefrechKeywordsAndAd extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->db = Model_Zendb::myfactory();
        $this->runExecuteSklikRefrechKeywordsAndAd();
    }

    public function runExecuteSklikRefrechKeywordsAndAd() {
        $this->db->update("em2group", array("eg_ts_update" => new Zend_Db_Expr('NOW()')));
        $this->addMessage("<b>Refresch proveden</b>");
    }

}

?>