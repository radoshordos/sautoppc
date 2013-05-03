<?php

class Sklik_Local2adController extends Zend_Controller_Action {

    public function indexAction() {

        $db = Model_Zendb::myfactory();
        $request = $this->getRequest();
        $smtda = new Sklik_Model_Table_DbtAd();


        if ($request->getParam("update-ad-list")) {
            $smtda->updateMultipleAdC123($request->getParams());
        }

        if ($request->getParam("new-ad")) {
            $count = $smtda->getCountCTQ($request->getParam("new-ad-campaign"), $request->getParam("new-ad-target"), $request->getParam("new-ad-quality"));
            if ($count == 0) {
                $smtda->insertNewAd($request);
                Model_Jmessage::messSucc("Nová reklamní šablona přidána");
            } else {
                Model_Jmessage::messWarn("Duplicitní reklamní šablona");
            }
        }

        if (intval($request->getParam("ea_delete_id")) > 0) {
            $aff = $db->delete("em2ad", array($db->quoteInto("ea_id = ?", intval($request->getParam("ea_delete_id")))));
            (($aff > 0) ? Model_Jmessage::messSucc("Položka odstraněna") : NULL);
        }

        if ($request->getParam("new-target-submit")) {
            $count = $smtda->insertNewTarget($request);
            (($count > 0) ? Model_Jmessage::messSucc("Nový cíl přidán") : Model_Jmessage::messWarn("Duplicitní cíl"));
        }
    }

}

?>