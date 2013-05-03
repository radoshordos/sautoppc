<?php

class Sklik_Api2group2listController extends Zend_Controller_Action {

    public function indexAction() {

        $request = $this->getRequest();
        $group = new Sklik_Model_Api_Group(new Zend_XmlRpc_Client(Sklik_Model_Primary_Config::SKLIK_CONNECT));

        if ($request->getParam('create-new-group')) {
            $group->groupCreate(intval($request->getParam('campaign_id')), $request->getParam('name'), $request->getParam('cpc'));
            $request->clearParams();
        }

        if (intval($request->getParam('group_delete_id')) > 0) {
            $group->groupRemove($request->getParam('group_delete_id'));
            $request->clearParams();
        }

        if (intval($request->getParam('group_restore_id')) > 0) {
            $group->groupRestore($request->getParam('group_restore_id'));
            $request->clearParams();
        }
        $this->view->group = $group;
    }

}

?>