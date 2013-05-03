<?php

class Sklik_Model_Table_DbtRule extends Sklik_Model_Table_TableAbstract implements Sklik_Model_Table_iColumn {

    public function getTableName() {
        return "em2rules";
    }

    public function getColumnPrimaryId() {
        return "er_id";
    }

    public function getColumnSklikId() {
        throw new Exception("NOT IMPLEMETED");
    }

    public function getColumnMainUniqueName() {
        throw new Exception("NOT IMPLEMETED");
    }

    public function getColumnTimeIntCreate() {
        throw new Exception("NOT IMPLEMETED");
    }

    public function findIdFromRule(Zend_Controller_Request_Http $request) {
        return $this->db->fetchOne($this->db->select()
                                ->from($this->getTableName(), array('er_id'))
                                ->where(($request->getParam('er_id_campagn') ? $this->db->quoteInto('er_id_campagn = ?', $request->getParam('er_id_campagn')) : "1=1"))
                                ->where(($request->getParam('er_id_dev') ? $this->db->quoteInto('er_id_dev = ?', $request->getParam('er_id_dev')) : "1=1"))
                                ->where(($request->getParam('er_id_tree') ? $this->db->quoteInto('er_id_tree = ?', $request->getParam('er_id_tree')) : "1=1"))
                                ->where(($request->getParam('er_param_name_lenghtmin') ? $this->db->quoteInto('er_param_name_lenghtmin = ?', $request->getParam('er_param_name_lenghtmin')) : "1=1"))
                                ->where(($request->getParam('er_param_name_lenghtmax') ? $this->db->quoteInto('er_param_name_lenghtmax = ?', $request->getParam('er_param_name_lenghtmax')) : "1=1"))
                                ->where(($request->getParam('er_param_name_wordmin') ? $this->db->quoteInto('er_param_name_wordmin = ?', $request->getParam('er_param_name_wordmin')) : "1=1"))
                                ->where(($request->getParam('er_param_name_wordmax') ? $this->db->quoteInto('er_param_name_wordmax = ?', $request->getParam('er_param_name_wordmax')) : "1=1"))
                                ->where(($request->getParam('er_param_pricemin') ? $this->db->quoteInto('er_param_pricemin = ?', $request->getParam('er_param_pricemin')) : "1=1"))
                                ->where(($request->getParam('er_param_pricemax') ? $this->db->quoteInto('er_param_pricemax = ?', $request->getParam('er_param_pricemax')) : "1=1"))
                                ->where(($request->getParam('er_param_sell') ? $this->db->quoteInto('er_param_sell = ?', $request->getParam('er_param_sell')) : "1=1"))
                                ->where(($request->getParam('er_param_action') ? $this->db->quoteInto('er_param_action = ?', $request->getParam('er_param_action')) : "1=1"))
                                ->where(($request->getParam('er_param_sendnow') ? $this->db->quoteInto('er_param_sendnow = ?', $request->getParam('er_param_sendnow')) : "1=1"))
        );
    }

    public function insertNewRule(Zend_Controller_Request_Http $request) {
        return $this->db->insert($this->getTableName(), array(
                    'er_id_set_dbmode' => ($request->getParam('er_id_set_dbmode') ? $request->getParam('er_id_set_dbmode') : NULL),
                    'er_id_campagn' => ($request->getParam('er_id_campagn') ? $request->getParam('er_id_campagn') : NULL),
                    'er_id_dev' => ($request->getParam('er_id_dev') ? $request->getParam('er_id_dev') : NULL),
                    'er_id_tree' => ($request->getParam('er_id_tree') ? $request->getParam('er_id_tree') : NULL),
                    'er_param_name_lenghtmin' => ($request->getParam('er_param_name_lenghtmin') ? $request->getParam('er_param_name_lenghtmin') : NULL),
                    'er_param_name_lenghtmax' => ($request->getParam('er_param_name_lenghtmax') ? $request->getParam('er_param_name_lenghtmax') : NULL),
                    'er_param_name_wordmin' => ($request->getParam('er_param_name_wordmin') ? $request->getParam('er_param_name_wordmin') : NULL),
                    'er_param_name_wordmax' => ($request->getParam('er_param_name_wordmax') ? $request->getParam('er_param_name_wordmax') : NULL),
                    'er_param_pricemin' => ($request->getParam('er_param_pricemin') ? $request->getParam('er_param_pricemin') : NULL),
                    'er_param_pricemax' => ($request->getParam('er_param_pricemax') ? $request->getParam('er_param_pricemax') : NULL),
                    'er_param_sell' => ($request->getParam('er_param_sell') ? $request->getParam('er_param_sell') : NULL),
                    'er_param_action' => ($request->getParam('er_param_action') ? $request->getParam('er_param_action') : NULL),
                    'er_param_sendnow' => ($request->getParam('er_param_sendnow') ? $request->getParam('er_param_sendnow') : NULL))
        );
    }

}

?>