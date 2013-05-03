<?php

class Sklik_Model_Api_Api {

    function getSklikApiInfo(Zend_XmlRpc_Client $client) {
        return $client->call("api.version");
    }

}

?>