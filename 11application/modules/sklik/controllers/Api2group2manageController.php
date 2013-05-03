<?php

class Sklik_Api2group2manageController extends Zend_Controller_Action {

    public function indexAction() {

        $request = $this->getRequest();

        $keyword = new Sklik_Model_Api_Keyword(new Zend_XmlRpc_Client(Sklik_Model_Primary_Config::SKLIK_CONNECT));
        $ad = new Sklik_Model_Api_Ad(new Zend_XmlRpc_Client(Sklik_Model_Primary_Config::SKLIK_CONNECT));

        $smaaa = new Sklik_Model_Action_ApiAd();
        $smaak = new Sklik_Model_Action_ApiKeyword();

        $this->view->keyword = $keyword;
        $this->view->ad = $ad;


        if ($request->getParam("create-new-ad") && $request->getParam("group_id")) {
            $smaaa->createNewAd("create-new-ad", $request);
        }

        if ($request->getParam("create-new-keywords") && $request->getParam("group_id")) {
            $smaak->createNewKeywords("create-new-keywords", $request);
        }

        if (intval($request->getParam("keyword_delete_id")) > 0) {
            $smaak->deleteKeyword("keyword_delete_id", $request->getParam("keyword_delete_id"));
        }

        if (intval($request->getParam("keyword_restore_id")) > 0) {
            $smaak->restoreKeyword("keyword_restore_id", $request->getParam("keyword_restore_id"));
        }

        if ($request->getParam("check-attributes") && $request->getParam("line")) {
            $attrib = array();
            foreach ($request->getParam("line") as $k => $v) {
                if ($v == 1) {

                    $atributes = $ad->adGetAttributes($k);
                    if ($atributes["status"] == 200) {

                        $attrib[$k] = $ad->adCheckAttributes(array(
                            "creative1" => $atributes["ad"]["creative1"],
                            "creative2" => $atributes["ad"]["creative2"],
                            "creative3" => $atributes["ad"]["creative3"],
                            "clickthruText" => $atributes["ad"]["clickthruText"],
                            "clickthruUrl" => $atributes["ad"]["clickthruUrl"])
                        );
                    }
                    $this->view->adCheckAttributes = $attrib;
                }
            }
        }
    }

}

?>