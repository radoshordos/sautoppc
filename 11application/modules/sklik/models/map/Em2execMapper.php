<?php

class Sklik_Model_Map_Em2execMapper implements Sklik_Model_Map_iMapper {

    public function fetchAll($res) {
        foreach ($res as $row) {
            $entries[] = $this->fetchRow($row);
        }
        return $entries;
    }

    public function fetchRow($row) {
        $entry = new Sklik_Model_Map_Em2exec();
        $entry->setExId($row->ex_id)
                ->setExRunTiLast($row->ex_run_ti_last)
                ->setExRunNext($row->ex_run_next)
                ->setExRunDayFirst($row->ex_run_day_first)
                ->setExAutorun($row->ex_autorun)
                ->setExNameAlias($row->ex_name_alias)
                ->setExNameClass($row->ex_name_class);
        return $entry;
    }

}

?>