<?php

class Admin_Model_AdminForm {

    public function __construct() {
        $this->db = Model_Zendb::myfactory();
    }

    public function getSelectAdmUser() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("adm2users", array("au_id", "au_role", "au_name", "au_surname"))
                                ->order("au_role", "au_id"), array('->au_id', '[->au_role] - ->au_name ->au_surname'), array('')
        );
    }

}

?>