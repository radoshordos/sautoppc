CREATE TRIGGER `insert_group2ad`
AFTER INSERT ON `em2group2ad`
FOR EACH ROW
BEGIN
 DECLARE kw_count INT;
 DECLARE kw_count_sklik_id INT;
 SELECT COUNT(*) INTO kw_count FROM em2group2ad WHERE NEW.ega_id_group=em2group2ad.ega_id_group;
 SELECT COUNT(*) INTO kw_count_sklik_id FROM em2group2ad WHERE NEW.ega_id_group=em2group2ad.ega_id_group AND ega_sklik_id > 0;
 UPDATE em2group SET eg_tg_ad_count = kw_count,
                     eg_tg_ad_count_sklik = kw_count_sklik_id WHERE em2group.eg_id=NEW.ega_id_group;
END;

CREATE TRIGGER `update_group2ad`
AFTER UPDATE ON `em2group2ad`
FOR EACH ROW
BEGIN
 DECLARE kw_count INT;
 DECLARE kw_count_sklik_id INT;
 SELECT COUNT(*) INTO kw_count FROM em2group2ad WHERE NEW.ega_id_group=em2group2ad.ega_id_group;
 SELECT COUNT(*) INTO kw_count_sklik_id FROM em2group2ad WHERE NEW.ega_id_group=em2group2ad.ega_id_group AND ega_sklik_id > 0;
 UPDATE em2group SET eg_tg_ad_count = kw_count,
                     eg_tg_ad_count_sklik = kw_count_sklik_id WHERE em2group.eg_id=NEW.ega_id_group;
END;

CREATE TRIGGER `delete_group2ad`
AFTER DELETE ON `em2group2ad`
FOR EACH ROW
BEGIN
 DECLARE kw_count INT;
 DECLARE kw_count_sklik_id INT;
 SELECT COUNT(*) INTO kw_count FROM em2group2ad WHERE OLD.ega_id_group=em2group2ad.ega_id_group;
 SELECT COUNT(*) INTO kw_count_sklik_id FROM em2group2ad WHERE OLD.ega_id_group=em2group2ad.ega_id_group AND ega_sklik_id > 0;
 UPDATE em2group SET eg_tg_ad_count = kw_count,
                     eg_tg_ad_count_sklik = kw_count_sklik_id WHERE em2group.eg_id=OLD.ega_id_group;
END;

UPDATE em2group2ad SET ega_ts_update = NOW()