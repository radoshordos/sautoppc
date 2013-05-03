<?php

class Sklik_Model_Run_SetCarryCampaign extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->runCarryCampaign();
    }

    public function runCarryCampaign() {
        $i = $l = $k = 0;
        $db = Model_Zendb::myfactory();
        $res = $db->fetchAll($db->select()->from('em2db', array('ed_id', 'ed_tree_id', 'ed_dev_id', 'ed_prod_id', 'ed_param_action', 'ed_id_campaign')));

        if (!empty($res)) {
            foreach ($res as $row) {
                if (!empty($row->ed_tree_id) && $row->ed_id_campaign != 2) {
                    $k += $db->update('em2db', array('ed_id_campaign' => 2), array($db->quoteInto('ed_id = ?', $row->ed_id)));
                } elseif (!empty($row->ed_dev_id) && $row->ed_id_campaign != 3) {
                    $l += $db->update('em2db', array('ed_id_campaign' => 3), array($db->quoteInto('ed_id = ?', $row->ed_id)));
                } elseif (!empty($row->ed_prod_id) && $row->ed_id_campaign != 4) {
                    $i += $db->update('em2db', array('ed_id_campaign' => 4), array($db->quoteInto('ed_id = ?', $row->ed_id)));
                }
            }
        }
        $this->addMessage("Kampaň Produkty : <b>" . $i . "</b>");
        $this->addMessage("Kampaň Skupiny : <b>" . $k . "</b>");
        $this->addMessage("Kampaň Výrobci : <b>" . $l . "</b>");
    }

}

?>