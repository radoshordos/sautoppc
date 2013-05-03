<?php

class Sklik_Model_Run_CleanHiddenProdFromGroup extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->runCleanHiddenProdFromGroup();
    }

    public function runCleanHiddenProdFromGroup() {

        $i = 0;
        $db = Model_Zendb::myfactory();
        $ed_id = $db->fetchCol($db->select()
                        ->from("view2sklik2db", array("ed_id"))
                        ->where("edm_alias LIKE (?)", array("group"))
                        ->where("ed_param_sell LIKE (?)", array("NO"))
        );

        if (!empty($ed_id)) {
            $i += $db->delete("em2db", array($db->quoteInto("ed_id IN (?)", $ed_id)));
        }
        $this->addMessage("Odstraněno neprodávané zboží ze skupin : <b>" . $i . "<b>");
    }

}

?>