<?php

class Sklik_Model_Run_OptimalizeTable extends Sklik_Model_Run_Abstract {

    public function __construct($table_cron) {
        parent::__construct($table_cron);
        $this->db = Model_Zendb::myfactory();
        $this->runOptimalizeTable();
    }

    public function runOptimalizeTable() {
        $i = 0;
        foreach ($this->db->listTables() as $table) {
            $i++;
            $this->db->query("OPTIMIZE TABLE $table");
        }
        $this->addMessage("Optimalizováno tabulek databáze : <b>" . $i . "</b>");
    }

}

?>