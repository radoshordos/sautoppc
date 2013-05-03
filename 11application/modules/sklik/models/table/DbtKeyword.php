<?php

class Sklik_Model_Table_DbtKeyword extends Sklik_Model_Table_TableAbstract implements Sklik_Model_Table_iColumn {

    public function getTableName() {
        return "em2keyword";
    }

    public function getColumnPrimaryId() {
        return "ek_id";
    }

    public function getColumnSklikId() {
        return "ek_sklik_id";
    }

    public function getColumnMainUniqueName() {
        return "ek_keyword";
    }
    
    public function getColumnTimeIntCreate() {
        return "ek_ti_create";
    }    

    public function addNewManualKeywords(Zend_Controller_Request_Http $request) {
        $i = 0;
        if (intval($request->getParam("group_id")) > 0) {
            foreach ($request->getParam("new-keyword") as $key => $val) {
                $match = $request->getParam("new-match");
                $cpc = $request->getParam("new-keyword-cpc");
                $kw = trim($val);
                if (!empty($kw)) {
                    $i += $this->insertNewUniqueColumn($val, array(
                        "ek_id_group" => $request->getParam("group_id"),
                        "ek_id_type" => 2,
                        "ek_id_match" => intval($match[$key]),
                        "ek_keyword_cpc" => (intval($cpc[$key]) > 19) ? $cpc[$key] : 0)
                    );
                }
            }
            return $i;
        }
    }

    public function addKeywordsToGroup(array $check_box, $keyword_group_id) {
        $i = 0;
        $arr = array();
        if (intval($keyword_group_id) > 0) {
            foreach ($check_box as $key => $val) {
                if ($val == 1) {
                    $arr[] = $key;
                }
            }
            if (count($arr) > 0) {
                $i += $this->db->update($this->getTableName(), array("ek_id_group" => intval($keyword_group_id)), array($this->db->quoteInto("ek_id IN (?)", $arr)));
            }
        }
        return $i;
    }

}

?>