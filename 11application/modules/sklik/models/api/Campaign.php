<?php

class Sklik_Model_Api_Campaign extends Sklik_Model_Api_Abstract {

    public function __construct(Zend_XmlRpc_Client $client) {
        parent::__construct($client);
    }

    function listCampaigns() {
        return $this->client->call('listCampaigns', array($this->session->getSession()));
    }

    function listSearchServices() {
        return $this->client->call('listSearchServices', array($this->session->getSession()));
    }

    function listPredefinedRegions() {
        return $this->client->call('listPredefinedRegions', array($this->session->getSession()));
    }

    function campaignRemove($campaignId) {
        return $this->client->call('campaign.remove', array($this->session->getSession(), intval($campaignId)));
    }

    function campaignRestore($campaignId) {
        return $this->client->call('campaign.restore', array($this->session->getSession(), intval($campaignId)));
    }

    function campaignCreate($string_name, $int_day_budget) {
        return $this->client->call('campaign.create', array($this->session->getSession(), array(
                        "name" => $string_name,
                        "dayBudget" => (int) $int_day_budget))
        );
    }

}

?>