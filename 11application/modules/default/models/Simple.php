<?php

class Model_Simple {

    static function imgProdFoto($tree_abs_path, $prod_img) {
        return '<img src="' . Model_Const::URL_FOTO_ROOT . $tree_abs_path . $prod_img . '" alt="' . $prod_img . '" />';
    }

    static function imgProdFotoCerabox($tree_abs_path, $prod_img_small, $prod_img_big, $title) {
        return '<a href="' . Model_Const::URL_FOTO_ROOT . $tree_abs_path . $prod_img_big . '" title="' . $title . '" class="ceraBox"><img src="' . Model_Const::URL_FOTO_ROOT . $tree_abs_path . $prod_img_small . '" alt="' . $title . '"></a>';
    }

    static function createLabelText($text, $label) {
        return '<label for="' . $label . '">' . $text . '</label>';
    }

    static function createAnchorLink($title, $href, array $parramsGet = NULL) {
        if (!empty($parramsGet)) {
            return "<a href=\"" . $href . "?" . htmlspecialchars(http_build_query($parramsGet)) . "\">$title</a>";
        } else {
            return "<a href=\"" . $href . "\">$title</a>";
        }
    }

    static function createNewAnchorLink($controller, $action, $title, array $parramsGet = NULL) {
        return "<a href=\"" . $this->url(array('controller' => $controller, 'action' => $action), 'default', true) . "?" . htmlspecialchars(http_build_query($parramsGet)) . "\">$title</a>";
    }

    static function getLink($page, $itemsPerPage, $label) {

        $arr = array();
        foreach ($_GET as $key => $val) {

            if (!empty($val) && $key != "hledat")
                $arr[$key] = $val;
        }

        $arr["page"] = $page;
        $arr["itemsPerPage"] = $itemsPerPage;

        return "<a class=\"ui-button-text\" href=\"?" . htmlspecialchars(http_build_query($arr)) . "\">$label</a>";
    }
    




    

    function implodeWithKeys($array, $glue) {
        return urldecode(str_replace("&", $glue, http_build_query($array)));
    }

    static function objectArray2Array($object, $column_name) {

        $result = array();
        $i = 0;
        if (!empty($object)) {
            foreach ($object as $value) {
                $result[$i++] = $value->$column_name;
            }
        }
        return $result;
    }

}

?>
