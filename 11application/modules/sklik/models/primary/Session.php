<?php

class Sklik_Model_Primary_Session {

    protected $_session;

    public function __construct() {
        $this->_session = new Zend_Session_Namespace('sklik');
    }

    public function setSession($session) {
        if (!empty($session)) {
            $this->_session->sklik = $session;
        }
    }

    public function getSession() {
        return $this->_session->sklik;
    }

    public function isSession() {
        if (!empty($this->_session->sklik)) {
            return 1;
        }
        return 0;
    }

}

?>