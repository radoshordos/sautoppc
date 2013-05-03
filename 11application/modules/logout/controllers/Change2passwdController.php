<?php

class Logout_Change2passwdController extends Zend_Controller_Action {

    public function indexAction() {

        $request = $this->getRequest();
        $db = Model_Zendb::myfactory();

        if ($request->getParam('h0') && $request->getParam('change')) {

            $old_au_password = $db->fetchOne($db->select()
                            ->from("adm2users", array("au_password"))
                            ->where("au_id = ?", intval(Zend_Auth::getInstance()->getStorage()->read()->au_id))
                            ->limit(1));

            if ($old_au_password == sha1($request->getParam('h0'))) {
                if (sha1($request->getParam('h1')) == sha1($request->getParam('h2'))) {

                    if (strlen($request->getParam('h1')) > 7) {
                        $db->update("adm2users", array('au_password' => sha1($request->getParam('h1'))), $db->quoteInto("au_id = ? ", intval(Zend_Auth::getInstance()->getStorage()->read()->au_id)));
                        $_POST = NULL;
                        echo "<h4>Vaše heslo bylo změněno!</h4>";
                    } else {
                        echo "<h4>Heslo je příliš krátké. Je třeba minimálně 8 znaků!</h4>";
                    }
                } else {
                    echo "<h4>Nové hesla nejsou shodné!</h4>";
                }
            } else {
                echo "<h4>Původní heslo není správné!</h4>";
            }
        }
    }

}

?>