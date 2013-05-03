<?php

class Sklik_Model_Map_Api2groupMapper implements Sklik_Model_Map_iMapper {

    public function fetchAll($res) {
        foreach ($res as $row) {
            $entries[] = $this->fetchRow($row);
        }
        return $entries;
    }

    public function fetchRow($row) {
        $entry = new Sklik_Model_Map_Api2group();
        $entry->setStatus($row["status"])
                ->setCpc($row["cpc"])
                ->setCpcContext($row["cpcContext"])
                ->setRemoved($row["removed"])
                ->setId($row["id"])
                ->setName($row["name"])
                ->setCampaignId($row["campaignId"])
                ->setCreateDate($row["createDate"]);

        return $entry;
    }

}

?>