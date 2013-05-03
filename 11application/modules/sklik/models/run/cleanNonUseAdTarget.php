<?php

class Sklik_Model_Run_CleanNonUseAdTarget extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->runCleanNonUseAdTarget();
    }

    public function runCleanNonUseAdTarget() {
        $i = 0;
        $db = Model_Zendb::myfactory();

        $used_id = $db->fetchCol($db->select()->distinct()->from("em2ad", array("ea_id_target")));
        if (!empty($used_id)) {
            $i += $db->delete("em2ad2target", array($db->quoteInto("eat_id NOT IN (?)", $used_id)));
        }
        $this->addMessage("Odstraněno záznamů z tabulky em2ad2target : <b>" . $i . "<b>");
    }

}

?>