<?php

class Sklik_Model_Map_Em2campaignMapper implements Sklik_Model_Map_iMapper {

    public function fetchAll($res) {
        foreach ($res as $row) {
            $entries[] = $this->fetchRow($row);
        }
        return $entries;
    }

    public function fetchRow($row) {

        $entry = new Sklik_Model_Map_Em2campaign();
        $entry->setEcId($row->ec_id)
                ->setEcSklikId($row->ec_sklik_id)
                ->setEcActive($row->ec_active)
                ->setEcTitle($row->ec_title)
                ->setEcName($row->ec_name)
                ->setEcUtmCampaign($row->ec_utm_campaign);
        return $entry;
    }

}

?>