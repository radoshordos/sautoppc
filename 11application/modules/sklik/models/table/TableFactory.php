<?php

class Sklik_Model_Table_TableFactory {

    public static function build($type) {
        $class = 'Sklik_Model_Table_Dbt' . $type;
        if (!class_exists($class)) {
            throw new Exception('Bad class.');
        }
        return new $class;
    }

}

?>
