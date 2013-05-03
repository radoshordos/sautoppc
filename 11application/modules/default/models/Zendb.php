<?php

class Model_Zendb extends Zend_Db {

    static function myfactory() {

        try {
            $dbset = Zend_Registry::get('dbAdapter')->toArray();
            $db = parent::factory('PDO_MYSQL', array(
                        'host' => $dbset["params"]["host"],
                        'username' => $dbset["params"]["username"],
                        'password' => $dbset["params"]["password"],
                        'dbname' => $dbset["params"]["dbname"],
                        'driver_options' => array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true)
                    ));

            $db->query('SET NAMES utf8');
            $db->query("SET CHARACTER SET utf8");
            $db->getConnection();
            $db->setFetchMode(parent::FETCH_OBJ);
            return $db;
        } catch (Zend_Db_Adapter_Exception $e) {
            $fp = fopen("tmp/zend_db_adapter_exception.txt", "a");
            if ($fp) {
                FWrite($fp, date("Y-m-d H:i:s (T)") . " " . $e->getMessage() . "\n\r");
                FClose($fp);
            }
        } catch (Zend_Exception $e) {
            $fp = fopen("tmp/zend_exception.txt", "a");
            if ($fp) {
                FWrite($fp, date("Y-m-d H:i:s (T)") . " " . $e->getMessage() . "\n\r");
                FClose($fp);
            }
        }
    }

    static function zFormOption(Zend_Db_Select $select, $bind_array, $extend = NULL) {

        $id = array();
        $key = array();

        if (is_array($extend)) {
            $id[] = $extend[0];
            $key[] = $extend[1];
        }

        foreach ($bind_array as $bind) {
            $col[] = str_replace(array('->'), '$row->', trim($bind));
        }

        $db = Model_Zendb::myfactory();
        $db->setFetchMode(Zend_Db::FETCH_OBJ);
        $res = $db->query($select)->fetchAll();

        foreach ($res as $row) {
            eval("\$id[]  = \"$col[0]\";");
            eval("\$key[] = \"$col[1]\";");
        }
        return array_combine($id, $key);
    }

}

?>