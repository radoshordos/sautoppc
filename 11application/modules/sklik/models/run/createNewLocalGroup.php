<?php

class Sklik_Model_Run_CreateNewLocalGroup extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->runCreateNewLocalGroup();
    }

    public function runCreateNewLocalGroup() {

        $i = 0;
        $db = Model_Zendb::myfactory();
        $smtdg = new Sklik_Model_Table_DbtGroup();

        $res = $db->fetchAll($db->select()
                        ->from("view2sklik2db", array("ed_id", "view_name"))
                        ->joinLeft("em2group", Sklik_Model_Primary_Db::TABLE_VIEW2SKLIK2DB_2_EM2GROUP, array("eg_id"))
                        ->where("eg_id IS NULL")
                        ->where("edm_alias = ?", "group")
        );

        if (!empty($res)) {
            foreach ($res as $row) {
                $i += $smtdg->insertNewUniqueColumn($row->view_name, array(
                    "eg_ti_create" => strtotime("now"),
                    "eg_id_db" => $row->ed_id,
                    "eg_id_mode" => 1,
                    "eg_group_utm_term" => new Zend_Db_Expr("LOWER('" . Sklik_Model_Primary_Helper::getGroupUmtName($row->view_name) . "')")));
            }
        }

        $this->addMessage("Přidáno nových kampaní : <b>" . $i . "</b>");
    }

}

?>