<?php

abstract class Sklik_Model_Table_TableAbstract {

    public function __construct() {
        $this->db = Model_Zendb::myfactory();
    }

    public function getColumnIdFromMainUniqueName($uniqueName) {
        return $this->db->fetchOne($this->db->select()
                                ->from($this->getTableName(), array($this->getColumnPrimaryId()))
                                ->where($this->getColumnMainUniqueName() . " = ?", $uniqueName)
        );
    }

    public function insertNewUniqueColumn($uniqueName, array $bind) {
        $i = 0;
        $id = $this->getColumnIdFromMainUniqueName(trim($uniqueName));
        if (intval($id) == 0) {
            $i = $this->db->insert($this->getTableName(), array_merge(array($this->getColumnMainUniqueName() => trim($uniqueName)), $bind));
        }
        return $i;
    }

    public function updateColumnsTable(array $bind, $primaryId) {
        return $this->db->update($this->getTableName(), $bind, array($this->db->quoteInto($this->getColumnPrimaryId() . " = ?", $primaryId)));
    }

    public function updateMultipleColumn(array $assocArr, $columnName) {
        $i = 0;
        if (count($assocArr) > 0) {
            foreach ($assocArr as $key => $val) {
                $i += $this->updateColumnsTable(array($columnName => $val), $key);
            }
        }
        return $i;
    }

    public function deleteRowWithCheckIds(array $withChecked) {
        $i = 0;
        $arr = array();
        if (!empty($withChecked)) {
            foreach ($withChecked as $key => $val) {
                if ($val == 1) {
                    $arr[] = $key;
                }
            }
            if (count($arr) > 0) {
                $i += $this->db->delete($this->getTableName(), array($this->db->quoteInto($this->getColumnPrimaryId() . " IN (?)", $arr)));
            }
        }
        return $i;
    }

    public function deleteColumn($primary_id) {
        return $this->db->delete($this->getTableName(), array($this->db->quoteInto($this->getColumnPrimaryId() . ' = ?', intval($primary_id))));
    }

}

?>
