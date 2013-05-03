<?php

class Sklik_Model_Run_ImportDataProd extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->runImportDataProd();
    }

    public function runImportDataProd() {
        $i = 0;
        $db = Model_Zendb::myfactory();
        $res = $db->fetchAll($db->select()
                        ->from('prod', array(
                            'prod_id',
                        ))
                        ->where('prod_id > 0')
        );

        if (!empty($res)) {
            foreach ($res as $row) {
                $dbcache = $db->fetchRow($db->select()
                                ->from('em2db', array(
                                    'ed_prod_id',
                                    'count' => 'COUNT(*)'
                                ))
                                ->where('ed_prod_id IS NOT NULL')
                                ->where('ed_prod_id = ?', $row->prod_id)
                );
                if ($dbcache->count == 0) {
                    $i += $db->insert('em2db', array(
                        'ed_prod_id' => $row->prod_id,
                        'ed_ti_create' => strtotime('now'))
                    );
                }
            }
        }
        $this->addMessage("Přidáno záznamů : <b>" . $i . "</b>");
    }

}

?>