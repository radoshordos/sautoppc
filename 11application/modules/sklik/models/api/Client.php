<?php

class Sklik_Model_Api_Client extends Sklik_Model_Api_Abstract {

    public function __construct(Zend_XmlRpc_Client $client) {
        parent::__construct($client);
    }

    function clientLogin() {
        $result = $this->client->call('client.login', array(Sklik_Model_Primary_Config::SKLIK_API_LOGIN, Sklik_Model_Primary_Config::SKLIK_API_PASSW));
        $this->session->setSession($result["session"]);
        return $result;
    }

    function clientLogout() {
        if ($this->session->isSession() == 1) {
            $result = $this->client->call('client.logout', array($this->session->getSession()));
            return $result;
        }
    }

    function getClientAttributes() {
        if ($this->session->isSession() == 1) {
            return $this->client->call('client.getAttributes', array($this->session->getSession()));
        }
    }

}

?>