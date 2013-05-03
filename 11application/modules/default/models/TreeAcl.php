<?php

class Model_TreeAcl extends Zend_Acl {

    public function __construct() {

        $this->addRole(new Zend_Acl_Role('guests'));
        $this->addRole(new Zend_Acl_Role('users'), 'guests');
        $this->addRole(new Zend_Acl_Role('admins'), 'users');

        $this->add(new Zend_Acl_Resource('default'))
                ->add(new Zend_Acl_Resource('default:authentication'), 'default')
                ->add(new Zend_Acl_Resource('default:index'), 'default')
                ->add(new Zend_Acl_Resource('default:error'), 'default');

        $this->add(new Zend_Acl_Resource('system'))
                ->add(new Zend_Acl_Resource('cron:runner'), 'system')
                ->add(new Zend_Acl_Resource('sklik:auto2runner'), 'system');

        $this->add(new Zend_Acl_Resource('sklik'))
                ->add(new Zend_Acl_Resource('sklik:local2db'), 'sklik')
                ->add(new Zend_Acl_Resource('sklik:local2db2group'), 'sklik')
                ->add(new Zend_Acl_Resource('sklik:local2db2keyword'), 'sklik')
                ->add(new Zend_Acl_Resource('sklik:local2ad'), 'sklik')
                ->add(new Zend_Acl_Resource('sklik:local2keyword'), 'sklik')
                ->add(new Zend_Acl_Resource('sklik:local2final'), 'sklik')
                ->add(new Zend_Acl_Resource('sklik:api2login2sklik'), 'sklik')
                ->add(new Zend_Acl_Resource('sklik:api2campaign2list'), 'sklik')
                ->add(new Zend_Acl_Resource('sklik:api2group2list'), 'sklik')
                ->add(new Zend_Acl_Resource('sklik:api2group2manage'), 'sklik')
                ->add(new Zend_Acl_Resource('sklik:api2api'), 'sklik')
                ->add(new Zend_Acl_Resource('sklik:auto2list'), 'sklik');

        $this->add(new Zend_Acl_Resource('logout'))
                ->add(new Zend_Acl_Resource('logout:actual2user'), 'logout')
                ->add(new Zend_Acl_Resource('logout:change2passwd'), 'logout')
                ->add(new Zend_Acl_Resource('logout:connect2last'), 'logout');

        $this->add(new Zend_Acl_Resource('administator'))
                ->add(new Zend_Acl_Resource('admin:user2acount'), 'administator')
                ->add(new Zend_Acl_Resource('admin:phpinfo'), 'administator');

        $this->allow('users', 'default:authentication', 'logout');
        $this->deny('users', 'default:authentication', 'login');
        $this->allow('guests', 'default:authentication', 'login');

        $this->allow('users', 'default:index', 'index');
        $this->allow('guests', 'default:error', 'error');

        $this->allow('guests', array('system'));
        $this->allow('users', array('sklik', 'logout'));
        $this->allow('admins', array('administator'));
    }

}

?>