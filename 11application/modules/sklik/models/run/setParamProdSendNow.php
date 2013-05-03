<?php

class Sklik_Model_Run_SetParamProdSendNow extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->runParamProdSendNow();
    }

    public function runParamProdSendNow() {

        $i = 0;
        $db = Model_Zendb::myfactory();
        $res = $db->fetchAll($db->select()
                        ->from('em2db', array(
                            'ed_id',
                            'ed_param_sendnow'
                        ))
                        ->joinInner('prod', 'em2db.ed_prod_id = prod.prod_id', array(
                            'prod_sendnow' => "IF (prod_sendnow = 2,'YES','NO')"
                        ))
                        ->where('ed_prod_id IS NOT NULL')
        );

        if (!empty($res)) {
            foreach ($res as $row) {
                if ($row->prod_sendnow != $row->ed_param_sendnow) {
                    $i += $db->update('em2db', array('ed_param_sendnow' => $row->prod_sendnow), array($db->quoteInto('ed_id = ?', $row->ed_id)));
                }
            }
        }
        $this->addMessage("Změněná dostupnost produktů : <b>" . $i . "</b>");
    }

}

?>