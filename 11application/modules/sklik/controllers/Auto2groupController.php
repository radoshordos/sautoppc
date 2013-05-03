<?php

class Sklik_Auto2groupController extends Zend_Controller_Action {

    public function indexAction() {

        if (!empty($_POST["groups-by-rules"])) {
            $this->groups2by2rulesAction();
        }
    }

    public function groups2by2rulesAction() {

        $res = array();
        $db = Model_Zendb::myfactory();
        $autoGroup = new Sklik2automatic_Model_AutoGroup();
        $compare = new Sklik2automatic_Model_AutoCompare();

        $cycleCampaign = $db->fetchAll($db->select()->distinct()->from("em2campaign", array("ec_sklik_id")));

        foreach ($cycleCampaign as $cycle) {

            $rules = $db->fetchAll($db->select()
                            ->from("em2rules")
                            ->joinInner("em2campaign", Sklik_Model_Primary_Db::TABLE_EM2CAMPAIGN_2_EM2RULES)
                            ->where("ec_sklik_id = ?", $cycle->ec_sklik_id)
                            ->where("er_id_mode = 1")
            );

            foreach ($rules as $rule) {

                $res[] = $db->fetchAll($db->select()
                                ->from("view2prod1", array("prod_name"))
                                ->where("prod_id_dev = ?", $rule->er_id_dev)
                                ->where("prod_items_price_visible_with_sale >= ?", $rule->er_price_minimum)
                                ->where("prod_items_price_visible_with_sale <= ?", $rule->er_price_maximum)
                                ->where("prod_id_mode = 3")
                                ->order(array("prod_name"))
                );
            }
            $restulCompare = $compare->compareGroups($cycle->ec_sklik_id, $res);
            $autoGroup->groupCreate($cycle->ec_sklik_id, $restulCompare["create"], 20);
            $autoGroup->groupRemove($restulCompare["remove"]);
            $autoGroup->groupRestore($restulCompare["restore"]);
        }
    }

}

?>