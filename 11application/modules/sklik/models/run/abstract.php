<?php

abstract class Sklik_Model_Run_Abstract {

    public static $startime;
    private $_microtime_now;
    private $_message = array();
    private $_call_class;
    private $_time_run;
    private $_now;

    public function __construct(Sklik_Model_Map_Em2exec $ex) {

        if (empty(self::$startime)) {
            self::$startime = microtime(true);
        }

        $this->_init_now = microtime(true);
        $this->_now = strtotime('now');
        $this->_call_class = $ex->getExNameClass();
    }

    public function stopTimmer() {
        $this->_microtime_now = microtime(true);
    }

    public function getMicrotime() {
        return microtime(true);
    }

    public function addMessage($comment) {
        $this->_message[] = $comment;
    }

    public function getMessage() {
        return implode("<br />", $this->_message);
    }

    public function getCallClass() {
        return $this->_call_class;
    }

    public function getTimeRunAll() {
        $this->_time_run = round($this->_microtime_now - self::$startime, 4) . "s";
        return $this->_time_run;
    }

    public function getTimeRunClass() {
        $this->_time_run = round($this->_microtime_now - $this->_init_now, 4) . "s";
        return $this->_time_run;
    }

}

?>