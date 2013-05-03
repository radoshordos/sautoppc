<?php

class Sklik_Local2keywordController extends Zend_Controller_Action {

    public function indexAction() {

        $request = $this->getRequest();
        $smtdk = new Sklik_Model_Table_DbtKeyword();

        if ($request->getParam("submit-action")) {
            if ($request->getParam("ek_action") == "delete") {
                Model_Jmessage::messSucc("Odstraněno řádků : " . $smtdk->deleteRowWithCheckIds($request->getParam("ek_id")));
            }
            if ($request->getParam("ek_action") == "update-match") {
                Model_Jmessage::messSucc("Shoda změnana u " . $smtdk->updateMultipleColumn($request->getParam("key_match"), "ek_id_match") . " řádků");
            }
        }

        if ($request->getParam("add-new-keyword")) {
            $result = $smtdk->addNewManualKeywords($request);
            ((intval($result) > 0) ? Model_Jmessage::messSucc("Přidáno klíčových slov : " . $result) : Model_Jmessage::messWarn("Nebylo přidáno žádné slovo"));
        }
    }

}

?>