<?php

class Sklik_Model_Action_ApiClient extends Sklik_Model_Action_ApiAbstract {

    public function __construct() {
        parent::__construct();
        $this->client = new Sklik_Model_Api_Client(new Zend_XmlRpc_Client(Sklik_Model_Primary_Config::SKLIK_CONNECT));
    }

    public function clientLogin($namespace) {
        $this->addConsoleSource($namespace, $this->client->clientLogin());
        $this->showConoleStatus($namespace);
        return $this->getConsoleNamespace($namespace);
    }

    public function clientLogout($namespace) {
        $this->addConsoleSource($namespace, $this->client->clientLogout());
        $this->showConoleStatus($namespace);
        return $this->getConsoleNamespace($namespace);
    }

}

?>
