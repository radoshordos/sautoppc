<?php

class Sklik_Model_Map_Api2campaignMapper {

    public function fetchAll($res) {

        foreach ($res as $row) {
            $entry = new Sklik_Model_Map_Api2campaign();
            $entry->setStatus($row["status"])
                    ->setDayBudget($row["dayBudget"])
                    ->setTotalBudget($row["totalBudget"])
                    ->setPremiseId($row["premiseId"])
                    ->setExhaustedDayBudget($row["exhaustedDayBudget"])
                    ->setName($row["name"])
                    ->setExhaustedTotalClicks($row["exhaustedTotalClicks"])
                    ->setTotalClicks($row["totalClicks"])
                    ->setRemoved($row["removed"])
                    ->setAdSelection($row["adSelection"])
                    ->setId($row["id"])
                    ->setExhaustedTotalBudget($row["exhaustedTotalBudget"])
                    ->setCreateDate($row["createDate"]);

            $entries[] = $entry;
        }
        return $entries;
    }



}

?>