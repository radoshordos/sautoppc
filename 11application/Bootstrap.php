<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initDb() {
        $this->config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', "production");
        $this->db = Zend_Db::factory($this->config->resources->db);
        Zend_Db_Table_Abstract::setDefaultAdapter($this->db);
        Zend_Registry::set('dbAdapter', $this->config->resources->db);
        $stmt = new Zend_Db_Statement_Pdo($this->db, "SET NAMES 'utf8'");
        $stmt->execute();
    }

    protected function _initAutoload() {

        $modelLoader = new Zend_Application_Module_Autoloader(array(
                    'namespace' => '',
                    'basePath' => APPLICATION_PATH . '/modules/default'));

        if (Zend_Auth::getInstance()->hasIdentity()) {
            Zend_Registry::set('role', Zend_Auth::getInstance()->getStorage()->read()->au_role);
        } else {
            Zend_Registry::set('role', 'guests');
        }

        $this->_acl = new Model_TreeAcl();
        $this->_auth = Zend_Auth::getInstance();

        $fc = Zend_Controller_Front::getInstance();
        $fc->registerPlugin(new Plugin_AccessCheck($this->_acl));

        return $modelLoader;
    }

    protected function _initViewHelpers() {

        $this->bootstrap('layout');
        $layout = $this->getResource("layout");

        $view = $layout->getView();
        $view->setHelperPath(APPLICATION_PATH . '/helpers', '');
        $view->doctype('HTML5');
        $view->setEscape('trim')->setEscape('stripcslashes');
        $view->headMeta()->appendHttpEquiv('Content-type', 'text/html;charset=utf-8');

        $navContainer = new Zend_Navigation(new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml', 'nav'));
        $view->navigation($navContainer)->setAcl($this->_acl)->setRole(Zend_Registry::get('role'));
    }

}

