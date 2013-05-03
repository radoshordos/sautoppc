<?php

class Sklik_Model_Run_AddAdToGroup extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->db = Model_Zendb::myfactory();
        $this->runAddAdToGroup();
    }

    public function runAddAdToGroup() {

        $i = 0;
        $y = 0;
        $db = Model_Zendb::myfactory();
        $campaigns = $this->getCampaignIds();
        
        foreach ($campaigns as $campaign) {
            foreach ($this->getGroupDbList($campaign->ec_id) as $group) {
                $arr_ea = array();
                $int = $this->switchType($group);
                for ($int; $int >= 0;
                ) {
                    $target = $this->getGroupTargetAd($campaign->ec_id, $group, $int);
                    if (count($target) > 0) {
                        $arr_ea[] = $target;
                    }
                    $int--;
                }
                $paa = $this->preparedArrayAd($arr_ea);
                if (count($paa) > 0) {
                    foreach ($paa as $ad) {
                        $row = $db->fetchRow($db->select()->from("view2sklik2ad")->where("ea_id = ?", $ad->ea_id));
                        $bind = $this->replaceBindBannerData($row, $group);
                        $bool = $this->checkLenghtBindData($bind);
                        if ($bool == TRUE) {
                            $ega_id = $db->fetchOne($db->select()->from("view2sklik2final", array("ega_id"))->where("ega_id_group = ?", $group->eg_id));
                            if (intval($ega_id) == 0) {
                                $i += $db->insert("em2group2ad", array_merge(array("ega_ti_create" => strtotime("now")), $bind));
                            } else {
                                $modifi = $db->fetchOne($db->select()
                                                ->from("em2group2ad", array("ega_id"))
                                                ->where("ega_id_ad = ?", $row->ea_id)
                                                ->where("ega_id_group = ?", $bind["ega_id_group"])
                                                ->where("ega_creative1 = ?", $bind["ega_creative1"])
                                                ->where("ega_creative2 = ?", $bind["ega_creative2"])
                                                ->where("ega_creative3 = ?", $bind["ega_creative3"])
                                                ->where("ega_clickthru_text = ?", $bind["ega_clickthru_text"])
                                                ->where("ega_clickthru_url = ?", $bind["ega_clickthru_url"]));

                                if (intval($modifi) == 0) {
                                    $y += $db->update("em2group2ad", $bind, array($db->quoteInto("ega_id = ?", $ega_id)));
                                }
                            }
                            break;
                        }
                    }
                }
            }
            $this->addMessage("Nových banerů : " . $campaign->ec_name . " : <b>" . $i . "</b>");
            $this->addMessage("Změněných banerů : " . $campaign->ec_name . " : <b>" . $y . "</b>");
        }
    }

    private function preparedArrayAd(array $arr_ea) {
        $arr = array();
        $i = 0;
        if (!empty($arr_ea)) {
            foreach ($arr_ea as $value) {
                foreach ($value as $val) {
                    $arr[$i++] = $val;
                }
            }
        }
        return $arr;
    }

    private function getCampaignIds() {
        return $this->db->fetchAll($this->db->select()
                                ->from('em2campaign', array("ec_id", "ec_name"))
                                ->where('ec_active = 1')
        );
    }

    private function getGroupDbList($campaign_id) {
        return $this->db->fetchAll($this->db->select()
                                ->from('view2sklik2group', array("eg_id", "ed_param_index", "ed_param_price", "view_url_group", "view_id_dev", "view_id_tree", "view_name"))
                                ->where("ed_id_campaign = ?", $campaign_id)
                                ->where("view_url_group IS NOT NULL")
                                ->order(array('eg_id'))
        );
    }

    private function isCompatibleIndex($ad_index, $group_index) {
        if ((($ad_index & $group_index) == $ad_index)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    private function getCompatibleRow($group_index, $res = NULL) {
        $arr = array();
        $i = 0;
        if (!empty($res)) {
            foreach ($res as $val) {
                $bool = $this->isCompatibleIndex($val->eaq_index, $group_index);
                if ($bool == TRUE) {
                    $arr[$i++] = $val;
                }
            }
        }
        return $arr;
    }

    public function checkLenghtBindData(array $bind) {
        if ((strlen($bind["ega_creative1"])) > Sklik_Model_Primary_Config::SKLIK_STRING_TITLE_LENGHT_LIMIT) {
            return FALSE;
        }
        if ((strlen($bind["ega_creative2"])) > Sklik_Model_Primary_Config::SKLIK_STRING_DESC_LENGHT_LIMIT) {
            return FALSE;
        }
        if ((strlen($bind["ega_creative3"])) > Sklik_Model_Primary_Config::SKLIK_STRING_DESC_LENGHT_LIMIT) {
            return FALSE;
        }
        return TRUE;
    }

    private function replaceBindBannerData($row, $group) {
        return array(
            "ega_id_ad" => $row->ea_id,
            "ega_id_group" => $group->eg_id,
            "ega_creative1" => $this->replaceDynamicData($row->ea_creative1, $group),
            "ega_creative2" => $this->replaceDynamicData($row->ea_creative2, $group),
            "ega_creative3" => $this->replaceDynamicData($row->ea_creative3, $group),
            "ega_clickthru_url" => $group->view_url_group,
            "ega_clickthru_text" => Sklik_Model_Primary_Config::SKLIK_CLICKTHRU_DEFAULT_TEXT
        );
    }

    private function replaceDynamicData($str, $group) {
        return strtr($str, array(
                    "[PRICE]" => $group->ed_param_price,
                    "[NAME]" => ucwords(strtolower($group->view_name))
                ));
    }

    private function switchType($group) {
        if ((intval($group->view_id_dev) > 0) && intval($group->view_id_tree) > 0) {
            return 3;
        } elseif ((intval($group->view_id_dev) == 0) && intval($group->view_id_tree) > 0) {
            return 2;
        } elseif ((intval($group->view_id_dev) > 0) && intval($group->view_id_tree) == 0) {
            return 1;
        } else {
            return 0;
        }
    }

    private function getGroupTargetAd($campaign_id, $group, $index) {
        switch ($index) {
            case 3:
                return $this->getCompatibleRow($group->ed_param_index, $this->db->fetchAll($this->db->select()
                                                ->from('view2sklik2ad', array("ea_id", "eaq_index", "eat_id_tree", "eat_id_dev"))
                                                ->where("ea_id_campaign = ?", $campaign_id)
                                                ->where("eat_id_dev = ?", $group->view_id_dev)
                                                ->where("eat_id_tree = ?", $group->view_id_tree)
                                                ->where("eat_id_dev > 0")
                                                ->where("eat_id_tree > 0")
                                                ->where("eaq_index <= ?", $group->ed_param_index)
                                                ->order(array("eaq_index DESC"))));
            case 2:
                return $this->getCompatibleRow($group->ed_param_index, $this->db->fetchAll($this->db->select()
                                                ->from('view2sklik2ad', array("ea_id", "eaq_index", "eat_id_tree", "eat_id_dev"))
                                                ->where("ea_id_campaign = ?", $campaign_id)
                                                ->where("eat_id_tree = ?", $group->view_id_tree)
                                                ->where("eat_id_tree > 0")
                                                ->where("eat_id_dev = 0")
                                                ->where("eaq_index <= ?", $group->ed_param_index)
                                                ->order(array("eaq_index DESC"))));
            case 1:
                return $this->getCompatibleRow($group->ed_param_index, $this->db->fetchAll($this->db->select()
                                                ->from('view2sklik2ad', array("ea_id", "eaq_index", "eat_id_tree", "eat_id_dev"))
                                                ->where("ea_id_campaign = ?", $campaign_id)
                                                ->where("eat_id_dev = ?", $group->view_id_dev)
                                                ->where("eat_id_dev > 0")
                                                ->where("eat_id_tree = 0")
                                                ->where("eaq_index <= ?", $group->ed_param_index)
                                                ->order(array("eaq_index DESC"))));
            default:
                return $this->getCompatibleRow($group->ed_param_index, $this->db->fetchAll($this->db->select()
                                                ->from('view2sklik2ad', array("ea_id", "eaq_index", "eat_id_tree", "eat_id_dev"))
                                                ->where("ea_id_campaign = ?", $campaign_id)
                                                ->where("eat_id_tree = 0")
                                                ->where("eat_id_dev = 0")
                                                ->where("eaq_index <= ?", $group->ed_param_index)
                                                ->order(array("eaq_index DESC"))));
        }
    }

}

?>