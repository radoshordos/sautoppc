<?php

abstract class Sklik_Model_Run_AbstractSync extends Sklik_Model_Run_Abstract {

    private $_rpc_client;
    private $_api_client;

    public function __construct(\Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->_rpc_client = new Zend_XmlRpc_Client(Sklik_Model_Primary_Config::SKLIK_CONNECT);
        $this->_api_client = new Sklik_Model_Api_Client($this->getRpcClient());
        $this->console = new Sklik_Model_Primary_Console();
        $this->getApiClient()->clientLogin();
    }

    public function getRpcClient() {
        return $this->_rpc_client;
    }

    public function getApiClient() {
        return $this->_api_client;
    }

}

?>