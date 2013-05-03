<?php

class AuthenticationController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {
        
    }

    public function loginAction() {

        $this->view->title = 'Login';
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $this->_redirect('index/index');
        }

        $request = $this->getRequest();
        $form = new Form_LoginForm();
        if ($request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $authAdapter = $this->getAuthAdapter();

                $username = $form->getValue('username');
                $password = $form->getValue('password');

                $authAdapter->setIdentity($username)->setCredential($password);

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);

                $apache_headers = apache_request_headers();
                $db = Model_Zendb::myfactory();

                if ($result->isValid()) {
                    $identity = $authAdapter->getResultRowObject();
                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);
                    $db->beginTransaction();
                    $db->update("adm2users", array("au_online" => 1), $db->quoteInto("au_id = ?", Zend_Auth::getInstance()->getStorage()->read()->au_id));
                    $db->insert("adm2conect", array(
                        "ac_id_adm2users" => Zend_Auth::getInstance()->getStorage()->read()->au_id,
                        "ac_ti_connect" => strtotime("now"),
                        "ac_pc_ip_addr" => $_SERVER["REMOTE_ADDR"],
                        "ac_pc_netbios" => gethostbyaddr($_SERVER["REMOTE_ADDR"]),
                        "ac_pc_browser" => substr($apache_headers["User-Agent"], 0, 254),
                        "ac_string_loginname" => $username
                    ));
                    $db->commit();
                    $this->_redirect('index/index');
                } else {
                    $db->insert("adm2conect", array(
                        "ac_id_adm2users" => NULL,
                        "ac_ti_connect" => strtotime("now"),
                        "ac_pc_ip_addr" => $_SERVER["REMOTE_ADDR"],
                        "ac_pc_netbios" => gethostbyaddr($_SERVER["REMOTE_ADDR"]),
                        "ac_pc_browser" => substr($apache_headers["User-Agent"], 0, 254),
                        "ac_string_loginname" => $username
                    ));
                    $this->view->errorMessage = "Chybné jméno nebo heslo!";
                }
            }
        }
        $this->view->form = $form;
    }

    public function logoutAction() {
        $db = Model_Zendb::myfactory();
        $db->update("adm2users", array("au_online" => 0), $db->quoteInto("au_id = ?", Zend_Auth::getInstance()->getStorage()->read()->au_id));
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('index/index');
    }

    private function getAuthAdapter() {

        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName("adm2users")
                ->setIdentityColumn("au_loginname")
                ->setCredentialColumn("au_password")
                ->setCredentialTreatment("SHA1(?)");

        return $authAdapter;
    }

}

?>