<?php

class Sklik_Model_Map_Api2adMapper {

    public function fetchAll($res) {

        foreach ($res as $row) {
            $entry = new Sklik_Model_Map_Api2ad();
            $entry->setStatus($row["status"])
                    ->setGroupId($row["groupId"])
                    ->setPremiseId($row["premiseId"])
                    ->setClickthruText($row["clickthruText"])
                    ->setCreateDate($row["createDate"])
                    ->setCreative1($row["creative1"])
                    ->setCreative2($row["creative2"])
                    ->setCreative3($row["creative3"])
                    ->setClickthruUrl($row["clickthruUrl"])
                    ->setRemoved($row["removed"])
                    ->setId($row["id"])
                    ->setPremiseMode($row["premiseMode"]);

            $entries[] = $entry;
        }
        return $entries;
    }

}

?>