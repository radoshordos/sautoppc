<?php

class Sklik_Model_Map_Em2rulesMapper {

    public function fetchAll($res) {

        foreach ($res as $row) {
            $entry = new Sklik_Model_Map_Em2rules();
            $entry->setErId($row->er_id)
                    ->setErIdPriority($row->er_id_priority)
                    ->setErIdCampagn($row->er_id_campagn)
                    ->setErIdDev($row->er_id_dev)
                    ->setErIdTree($row->er_id_tree)
                    ->setErIdSetDbmode($row->er_id_set_dbmode)
                    ->setErParamNameLenghtMin($row->er_param_name_lenghtmin)
                    ->setErParamNameLenghtMax($row->er_param_name_lenghtmax)
                    ->setErParamNameWordmin($row->er_param_name_wordmin)
                    ->setErParamNameWordmax($row->er_param_name_wordmax)
                    ->setErParamPricemin($row->er_param_pricemin)
                    ->setErParamPricemax($row->er_param_pricemax)
                    ->setErParamSell($row->er_param_sell)
                    ->setErParamAction($row->er_param_action)
                    ->setErParamSendNow($row->er_param_sendnow);

            $entries[] = $entry;
        }
        return $entries;
    }

    public function getAllFromRulesOrderPriority($db) {
        return $this->fetchAll($db->fetchAll($db->select()
                                        ->from("em2rules")
                                        ->order(array("er_id_priority DESC", "er_id ASC")))
        );
    }

}

?>