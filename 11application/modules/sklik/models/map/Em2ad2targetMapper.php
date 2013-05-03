<?php

class Sklik_Model_Map_Em2ad2targetMapper {

    public function fetchAll($res) {

        foreach ($res as $row) {
            $entry = new Sklik_Model_Map_Em2ad2target();
            $entry->setEatId($row->eat_id)
                    ->setEatIdDev($row->eat_id_dev)
                    ->setEatIdTree($row->eat_id_tree)
                    ->setEatIndex($row->eat_index);

            $entries[] = $entry;
        }
        return $entries;
    }

}

?>