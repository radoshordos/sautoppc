<?php

class Sklik_Model_Run_CreateNewLocalKeywordGroup extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->runCreateNewLocalKeywordGroup();
    }

    public function runCreateNewLocalKeywordGroup() {

        $i = 0;
        $db = Model_Zendb::myfactory();
        $smmvsgm = new Sklik_Model_Map_View2sklik2groupMapper();
        $smtdk = new Sklik_Model_Table_DbtKeyword();
        $res = $db->fetchAll($db->select()
                        ->from("view2sklik2group", array("ed_id", "eg_id", "eg_group_name"))
                        ->joinLeft("em2keyword", Sklik_Model_Primary_Db::TABLE_VIEW2SKLIK2GROUP_2_EM2KEYWORD, array(""))
                        ->where("ek_id IS NULL")
        );

        if (!empty($res)) {
            foreach ($smmvsgm->fetchAll($res) as $row) {
                $i += $smtdk->insertNewUniqueColumn($row->getEgGroupName(), array(
                    "ek_id_db" => $row->getEdId(),
                    "ek_id_group" => $row->getEgId(),
                    "ek_ti_create" => strtotime("now"))
                );
            }
        }
        $this->addMessage("Přidáno nových klíčových slov ze skupin : <b>" . $i . "</b>");
    }

}

?>