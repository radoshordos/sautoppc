<?php

class Sklik_Auto2listController extends Zend_Controller_Action {

    public function indexAction() {

        $request = $this->getRequest();
        if ($request->getParam('ex_autorun')) {
            $db = Model_Zendb::myfactory();
            foreach ($request->getParam('ex_autorun') as $key => $val) {
                $db->update("em2exec", array('ex_autorun' => intval($val)), array($db->quoteInto("ex_id = ?", intval($key))));
            }
            $request->clearParams();
        }
    }

}

?>