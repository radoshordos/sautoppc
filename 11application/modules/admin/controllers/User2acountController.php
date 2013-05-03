<?php

class Admin_User2acountController extends Zend_Controller_Action {

    public function indexAction() {

        $db = Model_Zendb::myfactory();
        $request = $this->getRequest();

        if ($request->getParam('new-account')) {
            $db->insert('adm2users', array(
                "au_active" => 1,
                "au_role" => trim($request->getParam('new_role')),
                "au_loginname" => trim($request->getParam('new_loginname')),
                "au_name" => trim($request->getParam('new_name')),
                "au_surname" => trim($request->getParam('new_surname')),
                "au_password" => sha1(trim($request->getParam('new_password')))
            ));
        }

        if ($request->getParam('save-account')) {
            $db->update("adm2users", array(
                "au_active" => intval($request->getParam('au_active')),
                "au_role" => trim($request->getParam('au_role')),
                "au_loginname" => trim($request->getParam('au_loginname')),
                "au_name" => trim($request->getParam('au_name')),
                "au_surname" => trim($request->getParam('au_surname'))
                    ), array($db->quoteInto("au_id = ?", intval($request->getParam('user_id')))));
        }

        if ($request->getParam('change') && strlen($request->getParam('p_change')) > 6) {
            $db->update("adm2users", array("au_password" => sha1($request->getParam('p_change'))), $db->quoteInto("au_id = ?", intval($request->getParam('user_id'))));
            echo '<h4>Změněno</h4>';
        }
    }

}

?>