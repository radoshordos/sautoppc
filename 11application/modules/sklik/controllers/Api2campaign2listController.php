<?php

class Sklik_Api2campaign2listController extends Zend_Controller_Action {

    public function indexAction() {

        $request = $this->getRequest();
        $campaign = new Sklik_Model_Api_Campaign(new Zend_XmlRpc_Client(Sklik_Model_Primary_Config::SKLIK_CONNECT));
        $this->view->campaign = $campaign;

        if ($request->getParam('create-new-campaign')) {
            $campaign->campaignCreate($request->getParam('name'), $request->getParam('dayBudget'));
            $request->clearParams();
        }

        if (intval($request->getParam('campaign_delete_id')) > 0) {
            $campaign->campaignRemove($request->getParam('campaign_delete_id'));
            $request->clearParams();
        }

        if (intval($request->getParam('campaign_restore_id')) > 0) {
            $campaign->campaignRestore($request->getParam('campaign_restore_id'));
            $request->clearParams();
        }
    }

}

?>