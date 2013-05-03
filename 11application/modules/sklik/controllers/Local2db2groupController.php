<?php

class Sklik_local2db2groupController extends Zend_Controller_Action {

    public function indexAction() {

        $request = $this->getRequest();
        $smtdg = new Sklik_Model_Table_DbtGroup();       
        
        if ($request->getParam('submit-action')) {
            if ($request->getParam('eg_action') == 'delete') {
                Model_Jmessage::messSucc("Odstraněno řádků : " . $smtdg->deleteRowWithCheckIds($request->getParam('eg_id')));
            }
            if ($request->getParam('eg_action') == 'update-cpc') {
                Model_Jmessage::messSucc("Změněno CPC hodnot : " . $smtdg->updateMultipleColumn($request->getParam("eg_group_cpc"), "eg_group_cpc"));
            }
        }
    }

}

?>