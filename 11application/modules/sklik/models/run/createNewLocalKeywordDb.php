<?php

class Sklik_Model_Run_CreateNewLocalKeywordDb extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->runCreateNewLocalKeywordDb();
    }

    public function runCreateNewLocalKeywordDb() {

        $i = 0;
        $db = Model_Zendb::myfactory();
        $smtdk = new Sklik_Model_Table_DbtKeyword();

        $res = $db->fetchAll($db->select()
                        ->from('view2sklik2db', array('ed_id', 'view_name'))
                        ->joinLeft('em2keyword', Sklik_Model_Primary_Db::TABLE_VIEW2SKLIK2DB_2_EM2KEYWORD, array('ek_id'))
                        ->where('edm_alias = ?', 'keyword')
                        ->where('ek_id IS NULL')
        );

        if (!empty($res)) {
            foreach ($res as $row) {
                $i += $smtdk->insertNewUniqueColumn($row->view_name, array("ek_id_db" => $row->ed_id, "ek_ti_create" => strtotime("now")));
            }
        }

        $this->addMessage("Přidáno nových klíčových slov z DB: <b>" . $i . "</b>");
    }

}

?>