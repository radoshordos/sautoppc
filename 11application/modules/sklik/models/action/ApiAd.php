<?php

class Sklik_Model_Action_ApiAd extends Sklik_Model_Action_ApiAbstract {

    public function __construct() {
        parent::__construct();
        $this->ad = new Sklik_Model_Api_Ad(new Zend_XmlRpc_Client(Sklik_Model_Primary_Config::SKLIK_CONNECT));
    }

    public function createNewAd($namespace, Zend_Controller_Request_Http $request) {

        $this->addConsoleSource($namespace,
                $this->ad->adCreate($request->getParam("group_id"),
                        $request->getParam("new-creative1"),
                        $request->getParam("new-creative2"),
                        $request->getParam("new-creative3"),
                        $request->getParam("new-clickthru-text"),
                        $request->getParam("new-clickthru-url")
                )
        );

        $this->showConoleStatus($namespace);
    }

}

?>