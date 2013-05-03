<?php

class Sklik_Model_Map_Api2keywordMapper {

    public function fetchAll($res) {
        foreach ($res as $row) {
            $entries[] = $this->fetchRow($row);
        }
        return $entries;
    }

    public function fetchRow($row) {
        $entry = new Sklik_Model_Map_Api2keyword();
        $entry->setStatus($row["status"])
                ->setName($row["name"])
                ->setUrl($row["url"])
                ->setCreateDate($row["createDate"])
                ->setCpc($row["cpc"])
                ->setGroupId($row["groupId"])
                ->setDisabled($row["disabled"])
                ->setMatchType($row["matchType"])
                ->setRemoved($row["removed"])
                ->setId($row["id"]);

        return $entry;
    }

}

?>