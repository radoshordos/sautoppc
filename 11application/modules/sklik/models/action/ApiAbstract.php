<?php

abstract class Sklik_Model_Action_ApiAbstract {

    public function __construct() {
        $this->console = new Sklik_Model_Primary_Console();
    }

    protected function addConsoleSource($namespace, $result) {
        $this->console->addSource($namespace, $result);
    }

    protected function getConsoleNamespace($namespace) {
        return $this->console->getNamespace($namespace);
    }

    protected function showConoleStatus($namespace) {
        if ($this->console->isMessage200($namespace)) {
            Model_Jmessage::messSucc($this->console->getStausInfo($namespace));
        } else {
            Model_Jmessage::messWarn($this->console->getStausInfo($namespace));
        }
    }

}

?>
