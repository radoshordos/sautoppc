<?php

class Logout_Model_UserInfo {

    function getUserInfo() {

        $db = Model_Zendb::myfactory();
        $adm2conect = $db->fetchRow($db->select()->from("adm2conect")
                        ->where("ac_id_adm2users = ?", Zend_Auth::getInstance()->getStorage()->read()->au_id)
                        ->order("ac_id DESC")
        );

        $adm2users = $db->fetchRow($db->select()->from("adm2users")
                        ->where("au_id = ?", Zend_Auth::getInstance()->getStorage()->read()->au_id)
        );

        return array_merge((array) $adm2conect, (array) $adm2users);
    }

}

?>