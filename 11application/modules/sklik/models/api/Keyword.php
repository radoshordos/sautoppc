<?php

class Sklik_Model_Api_Keyword extends Sklik_Model_Api_Abstract {

    public function __construct(Zend_XmlRpc_Client $client) {
        parent::__construct($client);
    }

    function listKeywords($groupId) {
        return $this->client->call('listKeywords', array($this->session->getSession(), intval($groupId)));
    }

    function keywordRemove($keywordId) {
        return $this->client->call('keyword.remove', array($this->session->getSession(), intval($keywordId)));
    }

    function keywordRestore($keywordId) {
        return $this->client->call('keyword.restore', array($this->session->getSession(), intval($keywordId)));
    }

    function keywordCreate($intGroupId, $name, $matchType = NULL, $cpc = NULL) {

        $arr = new ArrayObject();
        $arr->offsetSet("name", (string) $name);
        if (!empty($matchType)) {
            $arr->offsetSet("matchType", (string) $matchType);
        }
        if (intval($cpc) > 19) {
            $arr->offsetSet("cpc", (int) $cpc);
        }
        return $this->client->call('keyword.create', array($this->session->getSession(), intval($intGroupId), $arr->getArrayCopy())
        );
    }

}

?>