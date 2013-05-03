<?php

class Sklik_local2db2keywordController extends Zend_Controller_Action {

    public function indexAction() {

        $request = $this->getRequest();
        $smtdk = new Sklik_Model_Table_DbtKeyword();

        if ($request->getParam('key-to-group')) {
            Model_Jmessage::messSucc("Přiřazeno do skupin : " . $smtdk->addKeywordsToGroup($request->getParam("ed_key_id"), $request->getParam('key_group')));
        }
    }

}

?>