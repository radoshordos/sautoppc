<?php

class Sklik_Model_Primary_Console {

    protected $_arr_source = array();

    public function addSource($namespace, $source) {
        $this->_arr_source[$namespace] = $source;
    }

    public function getStausInfo($namespace) {
        return $this->_arr_source[$namespace]["status"] . " | " . $this->_arr_source[$namespace]["statusMessage"];
    }

    public function getStausInfoWithCount($namespace, $key) {
        return $this->_arr_source[$namespace]["status"] . " | " . $this->_arr_source[$namespace]["statusMessage"] . " | Celkem : <b>" . count($this->_arr_source[$namespace][$key]) . "</b>";
    }

    public function isExistsNamespace($namespace) {
        if (isset($this->_arr_source[$namespace])) {
            return TRUE;
        }
        return FALSE;
    }

    public function isMessage($namespace, $number) {
        if (($this->_arr_source[$namespace]["status"]) == $number) {
            return TRUE;
        }
        return FALSE;
    }

    public function isMessage200($namespace) {
        return $this->isMessage($namespace, 200);
    }

    public function isMessage200WithLog($namespace) {
        if (($this->_arr_source[$namespace]["status"]) == 200) {
            return TRUE;
        } else {
            if (!empty($this->_arr_source[$namespace]["status"])) {
                $db = Model_Zendb::myfactory();
                $db->insert("log2auto2sklik", array("las_prod_name" => $namespace, "las_message" => serialize($this->_arr_source[$namespace])));
            }
            return FALSE;
        }
    }

    public function isMessage406($namespace) {
        return $this->isMessage($namespace, 406);
    }

    public function getNamespace($namespace) {
        return $this->_arr_source[$namespace];
    }

    public function getCountNamespace($namespace) {
        return count($this->getNamespace($namespace));
    }

    public function getCountNamespaceStatus200($namespace) {
        $i = 0;
        $arr = $this->getNamespace($namespace);
        foreach ($arr as $val) {
            if ($val == "200") {
                $i++;
            }
        }
        return $i;
    }

    public function getCountNamespaceArray($namespace, $key) {
        return count($this->getNamespaceArray($namespace, $key));
    }

    public function isEmptyNamespaceArray($namespace, $key) {
        if (empty($this->_arr_source[$namespace][$key])) {
            return TRUE;
        }
        return FALSE;
    }

    public function getNamespaceArray($namespace, $key) {
        return $this->_arr_source[$namespace][$key];
    }

    public function getAll() {
        return $this->_arr_source;
    }

    public function getNamespaceNoSession($namespace) {
        $rns = $this->getNamespace($namespace);
        $rns["session"] = NULL;
        return $rns;
    }

    public function saveResultError($db, $val, $result) {
        $db->insert("log2auto2sklik", array("las_prod_name" => $val, "las_message" => serialize($result)));
    }

    static function saveError($val, $result) {
        if ($result["status"] != 200) {
            $db = Model_Zendb::myfactory();
            $db->insert("log2auto2sklik", array("las_prod_name" => $val, "las_message" => serialize($result)));
        }
    }

}
?>



