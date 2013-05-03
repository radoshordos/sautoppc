<?php

interface Sklik_Model_Run_iSyncSklik {

    public function repairNoSklik();

    public function repairWithSklik();

    public function executeRestore(array $listRestore);

    public function executeRemove(array $listRemove);

    public function createSimpleLinkDb2Sklik(array $compare_correct);
}

?>
