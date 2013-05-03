<?php

class Sklik_Model_Api_Group extends Sklik_Model_Api_Abstract {

    public function __construct(Zend_XmlRpc_Client $client) {
        parent::__construct($client);
    }

    function listGroups($intCampaignId) {
        return $this->client->call('listGroups', array($this->session->getSession(), intval($intCampaignId)));
    }

    function groupCreate($intCampaignId, $stringName, $intCpc) {
        return $this->client->call('group.create', array($this->session->getSession(), intval($intCampaignId), array("name" => (string) $stringName, "cpc" => (int) $intCpc)));
    }

    function groupRemove($intGroupId) {
        return $this->client->call('group.remove', array($this->session->getSession(), intval($intGroupId)));
    }

    function groupRestore($intGroupId) {
        return $this->client->call('group.restore', array($this->session->getSession(), intval($intGroupId)));
    }

}

?>