<?php

class Sklik_Model_Table_DbtAd extends Sklik_Model_Table_TableAbstract implements Sklik_Model_Table_iColumn {

    public function getTableName() {
        return "em2ad";
    }

    public function getColumnPrimaryId() {
        return "ea_id";
    }

    public function getColumnSklikId() {
        return "ea_sklik_id";
    }

    public function getColumnMainUniqueName() {
        throw new Exception("NOT IMPLEMETED");
    }

    public function getColumnTimeIntCreate() {
         throw new Exception("NOT IMPLEMETED");
    }    
    
    public function insertNewAd(Zend_Controller_Request_Http $request) {
        return $this->db->insert("em2ad", array(
                    "ea_id_campaign" => $request->getParam("new-ad-campaign"),
                    "ea_id_target" => $request->getParam("new-ad-target"),
                    "ea_id_quality" => $request->getParam("new-ad-quality"),
                    "ea_creative1" => $request->getParam("new-ea_creative1"),
                    "ea_creative2" => $request->getParam("new-ea_creative2"),
                    "ea_creative3" => $request->getParam("new-ea_creative3"))
        );
    }

    public function getCountCTQ($campaign, $target, $quality) {
        return $this->db->fetchOne($this->db->select()
                                ->from("em2ad")
                                ->where("ea_id_campaign = ?", $campaign)
                                ->where("ea_id_target = ?", $target)
                                ->where("ea_id_quality = ?", $quality)
        );
    }

    public function updateMultipleAdC123($reqParams) {
        $i = 0;
        if (!empty($reqParams["ea_id"])) {
            foreach ($reqParams["ea_id"] as $val) {
                $i += $this->updateColumnsTable(array(
                    "ea_creative1" => $reqParams["ea_creative1"][$val],
                    "ea_creative2" => $reqParams["ea_creative2"][$val],
                    "ea_creative3" => $reqParams["ea_creative3"][$val]), $val);
            }
        }
        return $i;
    }

    public function insertNewTarget(Zend_Controller_Request_Http $request) {
        $i = 0;
        $bind = array(
            "eat_id_dev" => ($request->getParam("new-ad-target-dev") ? $request->getParam("new-ad-target-dev") : 0),
            "eat_id_tree" => ($request->getParam("new-ad-target-tree") ? $request->getParam("new-ad-target-tree") : 0)
        );
        $one = $this->db->fetchOne($this->db->select()
                        ->from("em2ad2target")
                        ->where("eat_id_dev = ?", $bind["eat_id_dev"])
                        ->where("eat_id_tree = ?", $bind["eat_id_tree"])
        );
        if ($one == 0) {
            $i = $this->db->insert("em2ad2target", array_merge($bind, array("eat_index" => $this->getTargetIndex($bind))));
        }
        return $i;
    }

    protected function getTargetIndex($bind) {
        if ($bind["eat_id_tree"] > 0 && $bind["eat_id_dev"] > 0) {
            return 3000;
        } elseif ($bind["eat_id_tree"] > 0) {
            return 2000;
        } elseif ($bind["eat_id_dev"] > 0) {
            return 1000;
        } else {
            return 0;
        }
    }



}

?>