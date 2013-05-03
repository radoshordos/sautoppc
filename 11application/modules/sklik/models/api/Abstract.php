<?php

abstract class Sklik_Model_Api_Abstract {

    public function __construct(Zend_XmlRpc_Client $client, $session = NULL) {
        $this->client = $client;

        if (!empty($session)) {
            $this->session = $session;
        } else {
            $this->session = new Sklik_Model_Primary_Session();
        }
    }

}

?>
