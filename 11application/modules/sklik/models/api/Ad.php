<?php

class Sklik_Model_Api_Ad extends Sklik_Model_Api_Abstract {

    public function __construct(Zend_XmlRpc_Client $client) {
        parent::__construct($client);
    }

    function listAds($groupId) {
        return $this->client->call('listAds', array($this->session->getSession(), intval($groupId)));
    }

    function adCreate($groupId, $creative1, $creative2, $creative3, $clickthruText, $clickthruUrl, $premiseMode = NULL, $premiseId = NULL) {
        $arr = new ArrayObject();
        $arr->offsetSet("creative1", (string) $creative1);
        $arr->offsetSet("creative2", (string) $creative2);
        $arr->offsetSet("creative3", (string) $creative3);
        $arr->offsetSet("clickthruText", (string) $clickthruText);
        $arr->offsetSet("clickthruUrl", (string) $clickthruUrl);
        if (!empty($premiseMode)) {
            $arr->offsetSet("premiseMode", (string) $premiseMode);
        }
        if (!empty($premiseId)) {
            $arr->offsetSet("premiseId", (int) $premiseId);
        }
        return $this->client->call('ad.create', array($this->session->getSession(), intval($groupId), $arr->getArrayCopy()));
    }

    function adGetAttributes($adId) {
        return $this->client->call('ad.getAttributes', array($this->session->getSession(), $adId));
    }

    function adCheckAttributes(array $structAd) {
        return $this->client->call('ad.checkAttributes', array($this->session->getSession(), $structAd));
    }

    function adRemove($adId) {
        return $this->client->call('ad.remove', array($this->session->getSession(), intval($adId)));
    }

    function adRestore($adId) {
        return $this->client->call('ad.restore', array($this->session->getSession(), intval($adId)));
    }

}

?>