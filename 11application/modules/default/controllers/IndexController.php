<?php

class IndexController extends Zend_Controller_Action {

    public function preDispatch() {
        Zend_Session::start();
    }

    public function indexAction() {
        $this->view->headTitle('index page', 'PREPEND');
    }

}

