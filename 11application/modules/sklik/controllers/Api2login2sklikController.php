<?php

class Sklik_Api2login2sklikController extends Zend_Controller_Action {

    public function indexAction() {

        $request = $this->getRequest();
        $client = new Sklik_Model_Api_Client(new Zend_XmlRpc_Client(Sklik_Model_Primary_Config::SKLIK_CONNECT));
        $call = new Sklik_Model_Api_Api();
        $api = $call->getSklikApiInfo(new Zend_XmlRpc_Client(Sklik_Model_Primary_Config::SKLIK_CONNECT));

        $smaac = new Sklik_Model_Action_ApiClient();

        if ($request->getParam("logout")) {
            $result = $smaac->clientLogout("logout");
        } else {
            $result = $smaac->clientLogin("login");
        }
        $request->clearParams();

        $this->view->api = $api;
        $this->view->client = $client;
        $this->view->result = $result;
    }

}

?>