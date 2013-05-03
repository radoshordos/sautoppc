<?php

class Sklik_Local2dbController extends Zend_Controller_Action {

    public function indexAction() {

        $request = $this->getRequest();
        $smtdd = new Sklik_Model_Table_DbtDb();
        $smtdr = new Sklik_Model_Table_DbtRule();

        if ($request->getParam('submit-action')) {
            if ($request->getParam('ed_action') == 'delete-line') {
                Model_Jmessage::messSucc("Odstraněno záznamů : " . $smtdd->deleteRowWithCheckIds($request->getParam('ed_id')));
            }
            if ($request->getParam('ed_action') == 'update-db-mode') {
                Model_Jmessage::messSucc("Modifikováno záznamů : " . $smtdd->updateMultipleColumn($request->getParam("db_mode"), "ed_id_mode"));
            }
        }

        if ($request->getParam('update-priority-list')) {
            $modifi = $smtdr->updateMultipleColumn($request->getParam("priority"), "er_id_priority");
            (($modifi > 0) ? Model_Jmessage::messSucc('Priorita pravidel změněna') : Model_Jmessage::messWarn('Priorita pravidel nezměněna'));
        }

        if ($request->getParam('rule_delete_id')) {
            $aff = $smtdr->deleteColumn($request->getParam('rule_delete_id'));
            (($aff > 0) ? Model_Jmessage::messSucc('Pravidlo odstraněno') : NULL);
            $request->clearParams();
        }

        if ($request->getParam('add-new-rule')) {
            $idRule = $smtdr->findIdFromRule($request);
            if (intval($idRule) == 0) {
                $smtdr->insertNewRule($request);
                Model_Jmessage::messSucc('Nové pravidlo přidáno');
            } else {
                Model_Jmessage::messWarn('Duplicitní pravidlo');
            }
        }
    }

}

?>