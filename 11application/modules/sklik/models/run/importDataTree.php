<?php

class Sklik_Model_Run_ImportDataTree extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->runImportDataTree();
    }

    public function runImportDataTree() {
        $i = 0;
        $db = Model_Zendb::myfactory();
        $res = $db->fetchAll($db->select()
                        ->from("tree", array("tree_id"))
                        ->where('tree_id > 0')
        );

        if (!empty($res)) {
            foreach ($res as $row) {
                $dbcache = $db->fetchRow($db->select()
                                ->from('em2db', array(
                                    'ed_tree_id',
                                    'count' => 'COUNT(*)'
                                ))
                                ->where('ed_tree_id IS NOT NULL')
                                ->where('ed_tree_id = ?', $row->tree_id)
                );
                if ($dbcache->count == 0) {
                    $i += $db->insert('em2db', array(
                        'ed_tree_id' => $row->tree_id,
                        'ed_ti_create' => strtotime('now'))
                    );
                }
            }
        }
        $this->addMessage("Přidáno záznamů : <b>" . $i . "</b>");
    }

}

?>