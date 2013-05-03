<?php

class Sklik_Model_Run_SetParamCalculateIndex extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->runParamCalculateIndex();
    }

    public function runParamCalculateIndex() {

        $i = 0;
        $db = Model_Zendb::myfactory();
        $res = $db->fetchAll($db->select()->from('em2db')->order('ed_id'));

        if (!empty($res)) {
            foreach ($res as $row) {
                $index = 0;
                if (($row->ed_param_price != NULL) && ($row->ed_param_price > 0)) {
                    $index += 4;
                }
                if (($row->ed_param_sendnow == 'YES')) {
                    $index += 2;
                }
                if (($row->ed_param_action == 'YES')) {
                    $index += 1;
                }

                $i += $db->update('em2db', array('ed_param_index' => $index), array($db->quoteInto('ed_id = ?', $row->ed_id)));
            }
        }
        $this->addMessage("Aktualizováno indexů : <b>" . $i . "</b>");
    }

}

?>