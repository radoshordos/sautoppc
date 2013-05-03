<?php

class Sklik_Model_Run_SetParamProdAction extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->runParamProdAction();
    }

    public function runParamProdAction() {

        $i = 0;
        $db = Model_Zendb::myfactory();
        $res = $db->fetchAll($db->select()
                        ->from('em2db', array(
                            'ed_id',
                            'ed_param_action'
                        ))
                        ->joinInner('prod', 'em2db.ed_prod_id = prod.prod_id', array(
                            'prod_action' => "IF (prod_action = 2,'YES','NO')"
                        ))
                        ->where('ed_prod_id IS NOT NULL')
        );

        if (!empty($res)) {
            foreach ($res as $row) {
                if ($row->prod_action != $row->ed_param_action) {
                    $i += $db->update('em2db', array('ed_param_action' => $row->prod_action), array($db->quoteInto('ed_id = ?', $row->ed_id)));
                }
            }
        }
        $this->addMessage("Změněná dostupnost produktů : <b>" . $i . "</b>");
    }

}

?>