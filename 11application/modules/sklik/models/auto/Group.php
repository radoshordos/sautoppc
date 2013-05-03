<?php

class Sklik_Model_Auto_Group {

    public function __construct(Zend_XmlRpc_Client $rpc) {
        $this->group = new Sklik_Model_Api_Group($rpc);
    }

    function groupsCreate($intCampaignId, array $createName, $intCpc) {
        if (count($createName) > 0) {
            foreach ($createName as $val) {
                $result = $this->groupCreate($intCampaignId, $val, $intCpc);
                Sklik_Model_Primary_Console::saveError($val, $result);
            }
        }
    }

    function groupCreate($intCampaignId, $createName, $intCpc) {
        if ((intval($intCampaignId) > 0) && intval($intCpc) > 19) {
            return $this->group->groupCreate(intval($intCampaignId), (string) $createName, intval($intCpc));
        }
    }

    function groupRemove($intGroupId) {
        if (intval($intGroupId) > 0) {
            return $this->group->groupRemove($intGroupId);
        }
    }

    function groupsRestore(array $restoreList) {
        if (count($restoreList) > 0) {
            foreach ($restoreList as $key => $val) {
                $result = $this->groupRestore($key);
                Sklik_Model_Primary_Console::saveError($val, $result);
            }
            return $result;
        }
    }

    function groupRestore($intGroupId) {
        if (intval($intGroupId) > 0) {
            return $this->group->groupRestore($intGroupId);
        }
    }

}

?>