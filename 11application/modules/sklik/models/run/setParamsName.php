<?php

class Sklik_Model_Run_SetParamsName extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->db = Model_Zendb::myfactory();
        $this->runParamsName();
    }

    public function runParamsName() {

        $i = 0;
        $res = $this->db->fetchAll($this->db->select()
                        ->from('view2sklik2db', array(
                            'ed_id',
                            'ed_param_name_count',
                            'ed_param_name_word',
                            'view_name',
                            "strcount" => "LENGTH(view_name)"
                        ))
        );

        if (!empty($res)) {
            foreach ($res as $row) {
                $ed_param_name_word = count(explode(' ', $row->view_name));
                if (($row->strcount != $row->ed_param_name_count) || ($ed_param_name_word != $row->ed_param_name_word)) {
                    $i += $this->db->update('em2db', array('ed_param_name_count' => $row->strcount, 'ed_param_name_word' => $ed_param_name_word), array($this->db->quoteInto('ed_id = ?', $row->ed_id)));
                }
            }
        }
        $this->addMessage("Modifikováno znaků a písmen : <b>" . $i . "</b>");
    }

}

?>