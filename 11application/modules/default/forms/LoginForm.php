<?php

class Form_LoginForm extends Zend_Form {

    public function __construct($options = null) {
        parent::__construct($options);

        $username = $this->addElement('text', 'username', array(
            'filters' => array('StringTrim', 'StringToLower'),
            'validators' => array(
                'Alpha',
                array('StringLength', false, array(3, 32)),
            ),
            'required' => true,
            'label' => 'Login: ',
                ));

        $password = $this->addElement('password', 'password', array(
            'filters' => array('StringTrim'),
            'validators' => array(
                'Alnum',
                array('StringLength', false, array(7, 32)),
            ),
            'required' => true,
            'label' => 'Heslo :',
                ));

        $login = $this->addElement('submit', 'login', array(
            'required' => false,
            'ignore' => true,
            'label' => 'Přihlásit',
                ));

        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'p')),
            array('Description', array('placement' => 'prepend')), 'Form'));

        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl() . '/authentication/login');
        $this->setName('login')->setMethod('post')->setAction(Zend_Controller_Front::getInstance()->getBaseUrl() . "/authentication/login");
        $this->addElements(array($username, $password, $login));
    }

}

?>