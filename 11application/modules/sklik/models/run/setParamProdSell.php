<?php

class Sklik_Model_Run_SetParamProdSell extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->runParamProdSell();
    }

    public function runParamProdSell() {

        $i = 0;
        $db = Model_Zendb::myfactory();

        $res = $db->fetchAll($db->select()
                        ->from('em2db', array(
                            'ed_id',
                            'ed_param_sell'
                        ))
                        ->joinInner('prod', 'em2db.ed_prod_id = prod.prod_id', array(
                            'prod_sell' => "IF (prod_sell = 2,'YES','NO')"
                        ))
                        ->where('ed_prod_id IS NOT NULL')
        );

        if (!empty($res)) {
            foreach ($res as $row) {
                if ($row->prod_sell != $row->ed_param_sell) {
                    $i += $db->update('em2db', array('ed_param_sell' => $row->prod_sell), array($db->quoteInto('ed_id = ?', $row->ed_id)));
                }
            }
        }
        $this->addMessage("Změněná prodejnosti produktů : <b>" . $i . "</b>");
    }

}

?>