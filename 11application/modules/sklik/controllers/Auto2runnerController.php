<?php

class Sklik_Auto2runnerController extends Zend_Controller_Action {

    public function __construct(\Zend_Controller_Request_Abstract $request, \Zend_Controller_Response_Abstract $response, array $invokeArgs = array()) {
        parent::__construct($request, $response, $invokeArgs);
        $this->db = Model_Zendb::myfactory();
    }

    function __autoload($classname) {
        include $classname . '.php';
    }

    protected function getSwitchNumber(Zend_Controller_Request_Http $request) {
        if (strlen($request->getParam('run')) > 0) {
            return 1;
        } else {
            return 2;
        }
    }

    protected function getDbCronResult(Zend_Controller_Request_Http $request, $switchNumber) {
        switch ($switchNumber) {
            case 1:
                return $this->db->fetchAll($this->db->select()
                                        ->from("em2exec")
                                        ->where("ex_name_alias = ?", $request->getParam('run'))
                );
            case 2:
                return $this->db->fetchAll($this->db->select()
                                        ->from("em2exec")
                                        ->where("ex_autorun = 1")
                                        ->where("ex_run_ti_last + ex_run_next < ?", strtotime("now"))
                                        ->where("ex_run_day_first < ?", Sklik_Model_Primary_Date::getTimeintToday())
                                        ->order(array("ex_id"))
                );
        }
    }

    public function indexAction() {

        $i = 0;
        $arr = array();
        $eac = new Sklik_Model_Map_Em2exec();

        $request = $this->getRequest();
        $switchNumber = $this->getSwitchNumber($request);
        $res = $this->getDbCronResult($request, $switchNumber);

        if (!empty($res)) {
            foreach ($res as $val) {
                $eac->exchangeObject($val);
                $classResult = new $val->ex_name_class($eac);
                $classResult->stopTimmer();
                $arr[$i++] = $classResult;
                if ($switchNumber == 2) {
                    $this->db->update("em2exec", array('ex_run_ti_last' => strtotime("now")), $this->db->quoteInto("ex_id = ?", $eac->getExId()));
                }
            }
        }

        $this->view->list_message = $arr;
    }

}

?>