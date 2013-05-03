<?php

interface Sklik_Model_Table_iColumn {

    public function getTableName();

    public function getColumnPrimaryId();

    public function getColumnSklikId();

    public function getColumnMainUniqueName();
    
    public function getColumnTimeIntCreate();
}

?>