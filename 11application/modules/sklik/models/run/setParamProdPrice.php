<?php

class Sklik_Model_Run_SetParamProdPrice extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->runParamProdPrice();
    }

    public function runParamProdPrice() {

        $i = 0;
        $db = Model_Zendb::myfactory();
        $res = $db->fetchAll($db->select()
                        ->from('em2db', array(
                            'ed_id',
                            'ed_param_price'
                        ))
                        ->joinInner('prod', 'em2db.ed_prod_id = prod.prod_id', array(
                            'prod_price'
                        ))
                        ->where('ed_prod_id IS NOT NULL')
        );

        if (!empty($res)) {
            foreach ($res as $row) {
                if (intval($row->prod_price) != intval($row->ed_param_price)) {
                    $i += $db->update('em2db', array('ed_param_price' => intval($row->prod_price)), array($db->quoteInto('ed_id = ?', $row->ed_id)));
                }
            }
        }
        $this->addMessage("Změněná cen produktů : <b>" . $i . "</b>");
    }

}

?>