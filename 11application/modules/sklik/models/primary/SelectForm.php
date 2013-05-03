<?php

class Sklik_Model_Primary_SelectForm {

    public function __construct() {
        $this->db = Model_Zendb::myfactory();
    }

    public function getSelectCampaignList() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("em2campaign", array("ec_id", "ec_name"))
                                ->order(array("ec_id")), array("->ec_id", "->ec_name")
        );
    }

    public function getSelectCampaignListActive() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("em2campaign", array("ec_id", "ec_name"))
                                ->where("ec_active = 1")
                                ->order(array("ec_id")), array("->ec_id", "->ec_name")
        );
    }

    public function getSelectGruopCpcListWithEmpty() {
        return Model_Zendb::zFormOption($this->db->select()->distinct()
                                ->from("em2group", array("eg_group_cpc"))
                                ->order(array("eg_group_cpc")), array("->eg_group_cpc", "->eg_group_cpc"), array("")
        );
    }

    public function getSelectCampaignListActiveWithEmpty() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("em2campaign", array("ec_id", "ec_name"))
                                ->where("ec_active = 1")
                                ->order(array("ec_id")), array("->ec_id", "->ec_name"), array("")
        );
    }

    public function getSelectCampaignListWithEmpty() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("em2campaign", array("ec_id", "ec_name"))
                                ->order(array("ec_id")), array("->ec_id", "->ec_name"), array("")
        );
    }

    public function getSelectDev() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("dev", array("dev_id", "dev_name"))
                                ->order(array("dev_name")), array("->dev_id", "->dev_name")
        );
    }

    public function getSelectDevNoZero() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("dev", array("dev_id", "dev_name"))
                                ->where("dev_id > 0")
                                ->order(array("dev_name")), array("->dev_id", "->dev_name")
        );
    }

    public function getSelectDevWithEmpty() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("dev", array("dev_id", "dev_name"))
                                ->order(array("dev_name")), array("->dev_id", "->dev_name"), array('')
        );
    }

    public function getSelectDevNoZeroWithEmpty() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("dev", array("dev_id", "dev_name"))
                                ->where("dev_id > 0")
                                ->order(array("dev_name")), array("->dev_id", "->dev_name"), array('')
        );
    }

    public function getSelectTree() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("prod")
                                ->joinInner("tree", "prod.prod_id_tree = tree.tree_id", array("tree_id", "tree_title"))
                                ->order(array("tree_id")), array("->tree_id", "[->tree_id] - ->tree_title")
        );
    }

    public function getSelectTreeWithEmpty() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("prod")
                                ->joinInner("tree", "prod.prod_id_tree = tree.tree_id", array("tree_id", "tree_title"))
                                ->order(array("tree_id")), array("->tree_id", "[->tree_id] - ->tree_title"), array('')
        );
    }

    public function getSelectTreeWithEmptyNoZero() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("prod")
                                ->joinInner("tree", "prod.prod_id_tree = tree.tree_id", array("tree_id", "tree_title"))
                                ->where("tree_id > 0")
                                ->order(array("tree_id")), array("->tree_id", "[->tree_id] - ->tree_title"), array('')
        );
    }

    public function getSelectRulesPriorytyVisible() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("em2rules2priority", array("erp_id", "erm_name"))
                                ->where("erp_visible = 1")
                                ->order(array("erp_id")), array("->erp_id", "->erm_name")
        );
    }

    public function getSelectDevInModeKeywordWithEmpty() {
        return Model_Zendb::zFormOption($this->db->select()->distinct()
                                ->from("dev", array("dev_id", "dev_name"))
                                ->where("dev_id IN (SELECT view_id_dev FROM view2sklik2db WHERE edm_alias = 'keyword')")
                                ->where("dev_id > 0")
                                ->order(array("dev_name")), array("->dev_id", "->dev_name"), array('')
        );
    }

    public function getSelectDevInModeGroupWithEmpty() {
        return Model_Zendb::zFormOption($this->db->select()->distinct()
                                ->from("dev", array("dev_id", "dev_name"))
                                ->where("dev_id IN (SELECT view_id_dev FROM view2sklik2db WHERE edm_alias = 'group')")
                                ->where("dev_id > 0")
                                ->order(array("dev_name")), array("->dev_id", "->dev_name"), array('')
        );
    }

    public function getSelectTreeInModeKeywordWithEmpty() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("tree", array("tree_id", "tree_title"))
                                ->where("tree_id IN (SELECT view_id_tree FROM view2sklik2db WHERE edm_alias = 'keyword')")
                                ->where("tree_id > 0")
                                ->order(array("tree_id")), array("->tree_id", "[->tree_id] - ->tree_title"), array('')
        );
    }

    public function getSelectTreeInModeGroupWithEmpty() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("tree", array("tree_id", "tree_title"))
                                ->where("tree_id IN (SELECT view_id_tree FROM view2sklik2db WHERE edm_alias = 'group')")
                                ->where("tree_id > 0")
                                ->order(array("tree_id")), array("->tree_id", "[->tree_id] - ->tree_title"), array('')
        );
    }

    public function getSelectGroup() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("view2sklik2group", array("eg_id", "eg_group_name"))
                                ->order(array("view_name")), array("->eg_id", "->eg_group_name"), array('')
        );
    }

    function getSelectKeywordMatchCodeName() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("em2keyword2match", array("ekm_code", "ekm_name"))
                                ->order(array("ekm_id")), array("->ekm_code", "[->ekm_code] - [->ekm_name]")
        );
    }

    function getSelectKeywordMatchCode() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("em2keyword2match", array("ekm_id", "ekm_code"))
                                ->order(array("ekm_id")), array("->ekm_id", "->ekm_code")
        );
    }

    function getSelectKeywordMatch() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("em2keyword2match", array("ekm_id", "ekm_code", "ekm_name"))
                                ->order(array("ekm_id")), array("->ekm_id", "[->ekm_code] - [->ekm_name]")
        );
    }

    function getSelectKeywordMatchLiteWithEmpty() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("em2keyword2match", array("ekm_id", "ekm_code"))
                                ->order(array("ekm_id")), array("->ekm_id", "->ekm_code"), array('')
        );
    }

    public function getSelectKeywordMatchPozitive() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("em2keyword2match", array("ekm_id", "ekm_code"))
                                ->where("ekm_pozitive = 1")
                                ->order(array("ekm_id")), array("->ekm_id", "->ekm_code")
        );
    }

    public function getSelectDbCacheMode() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("em2db2mode", array("edm_id", "edm_name"))
                                ->order(array("edm_id")), array("->edm_id", "->edm_name")
        );
    }

    public function getSelectDbCacheModeWithEmpty() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("em2db2mode", array("edm_id", "edm_name"))
                                ->order(array("edm_id")), array("->edm_id", "->edm_name"), array('')
        );
    }

    public function getSelectDbCacheModeActive() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("em2db2mode", array("edm_id", "edm_name"))
                                ->where("edm_active = 1")
                                ->order(array("edm_id")), array("->edm_id", "->edm_name")
        );
    }

    public function getSelectAdQualityVisible() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("em2ad2quality", array("eaq_id", "eaq_index", "eaq_name"))
                                ->where("eaq_visible = 1")
                                ->order(array("eaq_index")), array("->eaq_id", "[->eaq_index] - ->eaq_name")
        );
    }

    public function getSelectAdTarget() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("em2ad2target", array("eat_id"))
                                ->joinLeft("dev", Sklik_Model_Primary_Db::TABLE_EM2AD2TARGET_2_DEV, array("dev_name"))
                                ->joinLeft("tree", Sklik_Model_Primary_Db::TABLE_EM2AD2TARGET_2_TREE, array("tree_title"))
                                ->order(array("eat_id_dev", "eat_id_tree")), array("->eat_id", "[VÝROBCE: ->dev_name] [SKUPINA: ->tree_title]")
        );
    }

    public function getSelectAdWithEmpty() {
        return Model_Zendb::zFormOption($this->db->select()
                                ->from("view2sklik2ad", array("ea_id", "ea_creative1", "ea_creative2", "ea_creative3"))
                                ->order(array("eat_id_tree", "eat_id_dev", "eat_index")), array("->ea_id", "||TITLE|| ->ea_creative1 ||POPIS1|| ->ea_creative2 ||POPIS2|| ->ea_creative3"), array('')
        );
    }

}

?>