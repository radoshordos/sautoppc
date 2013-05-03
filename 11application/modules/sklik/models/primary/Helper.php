<?php

class Sklik_Model_Primary_Helper {

    static function getParamsGet(array $arr) {
        if (count($arr) > 0) {
            return "?" . htmlspecialchars(http_build_query($arr));
        }
    }

    static function getStringName($int, array $arr) {
        return $arr[$int];
    }

    static function getGroupUmtName($group_name) {

        return strtr($group_name, array(
                    " " => "-",
                    "." => "-",
                    "/" => "-",
                    "(" => "",
                    ")" => "",
                    "," => "",
                    "á" => "a",
                    "č" => "c",
                    "é" => "e",
                    "ě" => "e",
                    "í" => "i",
                    "ř" => "r",
                    "š" => "s",
                    "ú" => "u",
                    "ů" => "u",
                    "ý" => "y",
                    "ž" => "z",
                    "Á" => "a",
                    "Č" => "c",
                    "É" => "e",
                    "Ě" => "e",
                    "Ň" => "n",
                    "Ř" => "r",
                    "Ú" => "u",
                    "Š" => "s",
                    "Ý" => "y",
                    "Ž" => "z"
                ));
    }

}

?>
