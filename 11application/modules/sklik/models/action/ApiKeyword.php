<?php

class Sklik_Model_Action_ApiKeyword extends Sklik_Model_Action_ApiAbstract {

    public function __construct() {
        parent::__construct();
        $this->keyword = new Sklik_Model_Api_Keyword(new Zend_XmlRpc_Client(Sklik_Model_Primary_Config::SKLIK_CONNECT));
    }

    public function createNewKeywords($namespace, $request) {
        $i = 0;
        foreach ($request->getParam("keyword") as $val) {
            if (!empty($val["name"])) {      
                $ns = $namespace . $i++;
                $this->addConsoleSource($ns, $this->keyword->keywordCreate($request->getParam("group_id"), $val["name"], $val["match_type"]));
                $this->showConoleStatus($ns);
            }
        }
    }

    public function deleteKeyword($namespace, $keyword_id) {
        $this->addConsoleSource($namespace, $this->keyword->keywordRemove(intval($keyword_id)));
        $this->showConoleStatus($namespace);
    }

    public function restoreKeyword($namespace, $keyword_id) {
        $this->addConsoleSource($namespace, $this->keyword->keywordRestore(intval($keyword_id)));
        $this->showConoleStatus($namespace);
    }

}

?>
