CREATE OR REPLACE VIEW
view2sklik2db AS
SELECT  ed_id,
        ed_ti_create,
        ed_ts_modifi,       
        ed_id_campaign,
        ed_id_mode,
        ed_prod_id,
        ed_param_name_count,
        ed_param_name_word,
        ed_param_price,
        ed_param_sell,
        ed_param_action,
        ed_param_sendnow,
        ed_param_index,
        ec_name,
        ec_utm_campaign,
        edm_alias,
        edm_name,
        DATE(ed_ts_modifi) AS view_db_date_modifi,
        CASE
            WHEN (ed_prod_id IS NOT NULL)
                THEN prod_id_dev
            WHEN (ed_dev_id IS NOT NULL)
                THEN dev_id
            ELSE 0
        END AS view_id_dev,
        CASE
            WHEN (ed_prod_id IS NOT NULL)
                THEN prod_id_tree
            WHEN (ed_tree_id IS NOT NULL)
                THEN tree_id
            ELSE 0
        END AS view_id_tree,
        CASE
            WHEN (ed_prod_id IS NOT NULL)
                THEN (SELECT prod_name FROM prod WHERE prod.prod_id=ed_prod_id)
            WHEN (ed_tree_id IS NOT NULL)
                THEN (SELECT tree_title FROM tree WHERE tree.tree_id=ed_tree_id)
            WHEN (ed_dev_id IS NOT NULL)
                THEN (SELECT dev_name FROM dev WHERE dev.dev_id=ed_dev_id)
            ELSE NULL
        END AS view_name
FROM em2db      
INNER JOIN em2db2mode ON em2db.ed_id_mode=em2db2mode.edm_id
INNER JOIN em2campaign ON em2db.ed_id_campaign = em2campaign.ec_id
LEFT JOIN prod ON prod.prod_id = em2db.ed_prod_id
LEFT JOIN tree ON tree.tree_id = em2db.ed_tree_id
LEFT JOIN dev  ON dev.dev_id   = em2db.ed_dev_id

--------------------------------------------------------------------------------

CREATE OR REPLACE VIEW
view2sklik2group AS
SELECT  eg_id,
        eg_ti_create,
        eg_ts_update,
        eg_id_mode,
        eg_id_ad,
        eg_sklik_id,
        eg_group_name,
        eg_tg_ad_count,
        eg_tg_ad_count_sklik,
        eg_tg_keyword_count,
        eg_tg_keyword_count_sklik,
        eg_group_cpc,
        ed_id,
        ed_id_campaign,
        ed_param_index,
        ed_prod_id,
        ed_param_price,
        ec_sklik_id,
        ea_creative1,
        ea_creative2,
        ea_creative3,
        DATE(eg_ts_update) AS view_eg_ts_update,
        CASE
            WHEN (ed_prod_id IS NOT NULL)
                THEN prod_id_dev
            WHEN (ed_dev_id IS NOT NULL)
                THEN dev_id
            ELSE 0
        END AS view_id_dev,
        CASE
            WHEN (ed_prod_id IS NOT NULL)
                THEN prod_id_tree
            WHEN (ed_tree_id IS NOT NULL)
                THEN tree_id
            ELSE 0
        END AS view_id_tree,
        CASE
            WHEN (ed_prod_id IS NOT NULL)
                THEN (SELECT prod_name FROM prod WHERE prod.prod_id=ed_prod_id)
            WHEN (ed_tree_id IS NOT NULL)
                THEN (SELECT tree_title FROM tree WHERE tree.tree_id=ed_tree_id)
            WHEN (ed_dev_id IS NOT NULL)
                THEN (SELECT dev_name FROM dev WHERE dev.dev_id=ed_dev_id)
            ELSE NULL
        END AS view_name,
        CASE
            WHEN (ed_prod_id IS NOT NULL)
                THEN (SELECT CONCAT('http://www.narex-makita.cz/',tree_abs_path,prod_alias_name,'/?utm_source=sklik&utm_medium=cpc&utm_campaign=',ec_utm_campaign,'&utm_term=',eg_group_utm_term) FROM prod INNER JOIN tree ON prod.prod_id_tree=tree.tree_id WHERE prod.prod_id=ed_prod_id)
            WHEN (ed_tree_id IS NOT NULL)
                THEN (SELECT CONCAT('http://www.narex-makita.cz/',tree_abs_path,'?utm_source=sklik&utm_medium=cpc&utm_campaign=',ec_utm_campaign,'&utm_term=',eg_group_utm_term) FROM tree WHERE tree.tree_id=ed_tree_id)
            WHEN (ed_dev_id IS NOT NULL)
                THEN (SELECT CONCAT('http://www.narex-makita.cz/?utm_source=sklik&utm_medium=cpc&utm_campaign=',ec_utm_campaign,'&utm_term=',eg_group_utm_term) FROM dev WHERE dev.dev_id=ed_dev_id)
            ELSE NULL
        END AS view_url_group
FROM em2group
INNER JOIN em2db ON em2group.eg_id_db = em2db.ed_id
INNER JOIN em2campaign ON em2db.ed_id_campaign = em2campaign.ec_id
LEFT JOIN prod ON prod.prod_id = em2db.ed_prod_id
LEFT JOIN tree ON tree.tree_id = em2db.ed_tree_id
LEFT JOIN dev  ON dev.dev_id = em2db.ed_dev_id
LEFT JOIN em2ad ON em2group.eg_id_ad = em2ad.ea_id

--------------------------------------------------------------------------------

CREATE OR REPLACE VIEW
view2sklik2keyword AS
SELECT  ek_id,
        ek_ti_create,
        ek_ts_update,
        ek_id_group,
        ek_id_match,
        ek_sklik_id,
        LOWER(ek_keyword) AS ek_keyword, 
        ek_keyword_cpc,
        ekm_code,
        ekm_string_before,
        ekm_string_after,
        ekt_name,
        eg_id,
        eg_ts_update,
        eg_id_mode,
        eg_tg_keyword_count,
        eg_tg_keyword_count_sklik,
        eg_sklik_id,
        eg_group_name,
        DATE(ek_ts_update) AS view_ek_ts_update
FROM em2keyword
INNER JOIN em2keyword2match ON em2keyword.ek_id_match = em2keyword2match.ekm_id
INNER JOIN em2keyword2type ON em2keyword.ek_id_type = em2keyword2type.ekt_id
INNER JOIN em2group ON em2keyword.ek_id_group = em2group.eg_id

--------------------------------------------------------------------------------

CREATE OR REPLACE VIEW
view2sklik2ad AS
SELECT  ea_id,
        ea_id_campaign,
        ea_id_target,
        ea_id_quality,
        ea_creative1,
        ea_creative2,
        ea_creative3,
        eat_id_dev,
        eat_id_tree,
        eat_index,
        eaq_name,
        eaq_index
FROM em2ad
INNER JOIN em2ad2target ON em2ad.ea_id_target = em2ad2target.eat_id
INNER JOIN em2ad2quality ON em2ad.ea_id_quality = em2ad2quality.eaq_id

--------------------------------------------------------------------------------

CREATE OR REPLACE VIEW
view2sklik2final AS
SELECT  ega_id,
        ega_ts_update,
        ega_id_ad,
        ega_id_group,
        ega_sklik_id,
        ega_creative1,
        ega_creative2,
        ega_creative3,
        ega_clickthru_text,
        ega_clickthru_url,
        ea_ts_update,
        eg_id,
        eg_ts_update,
        eg_sklik_id,
        eg_group_name,
        ed_id_campaign,
        CASE
            WHEN (ed_prod_id IS NOT NULL)
                THEN prod_id_dev
            WHEN (ed_dev_id IS NOT NULL)
                THEN dev_id
            ELSE NULL
        END AS view_id_dev,
        CASE
            WHEN (ed_prod_id IS NOT NULL)
                THEN prod_id_tree
            WHEN (ed_tree_id IS NOT NULL)
                THEN tree_id
            ELSE NULL
        END AS view_id_tree
FROM em2group2ad
INNER JOIN em2ad ON em2group2ad.ega_id_ad = em2ad.ea_id
INNER JOIN em2group ON em2group2ad.ega_id_group = em2group.eg_id
INNER JOIN em2db ON em2group.eg_id_db = em2db.ed_id
LEFT JOIN prod ON prod.prod_id = em2db.ed_prod_id
LEFT JOIN tree ON tree.tree_id = em2db.ed_tree_id
LEFT JOIN dev  ON dev.dev_id   = em2db.ed_dev_id
