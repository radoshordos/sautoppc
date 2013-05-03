<?php

class Zend_view_helper_BaseUrl {

    function baseUrl() {
        $fc = Zend_Controller_Front::getInstance();
        return $fc->getBaseUrl();
    }
}

?>
