<?php

class Sklik_Model_Primary_Db {

    const TABLE_EM2KEYWORD_2_EM2GROUP = "em2keyword.ek_id_group = em2group.eg_id";
    const TABLE_EM2KEYWORD_2_EM2KEYWORD2MATCH = "em2keyword.ek_id_match = em2keyword2match.ekm_id";
    const TABLE_EM2KEYWORD_2_EM2KEYWORD2TYPE = "em2keyword.ek_id_type = em2keyword2type.ekt_id";
    const TABLE_EM2CAMPAIGN_2_EM2RULES = "em2campaign.ec_id = em2rules.er_id_campaign";
    const TABLE_EM2AD_2_EM2AD2TARGET = "em2ad.ea_id_target = em2ad2target.eat_id";
    const TABLE_EM2AD_2_EM2AD2QUALITY = "em2ad.ea_id_quality = em2ad2quality.eaq_id";
    const TABLE_EM2AD_2_CAMPAIGN = "em2ad.ea_id_campaign = em2campaign.ec_id";
    const TABLE_EM2AD2TARGET_2_DEV = "em2ad2target.eat_id_dev = dev.dev_id";
    const TABLE_EM2AD2TARGET_2_TREE = "em2ad2target.eat_id_tree = tree.tree_id";
    const TABLE_EM2DB_2_EM2DB2MODE = "em2db.ed_id_mode=em2db2mode.edm_id";
    const TABLE_EM2GROUP_2_EM2DB = "em2group.eg_id_cache = em2db.ed_id";
    const TABLE_EM2GROUP2AD_2_EM2GROUP = "em2group2ad.ega_id_group = em2group.eg_id";
    const TABLE_VIEW2SKLIK2DB_2_EM2GROUP = "view2sklik2db.ed_id = em2group.eg_id_db";
    const TABLE_VIEW2SKLIK2DB_2_EM2KEYWORD = "view2sklik2db.ed_id = em2keyword.ek_id_db";
    const TABLE_VIEW2SKLIK2GROUP_2_EM2KEYWORD = "view2sklik2group.eg_id = em2keyword.ek_id_db";

}

?>