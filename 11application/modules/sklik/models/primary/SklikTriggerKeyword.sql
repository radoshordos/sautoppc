CREATE TRIGGER `insert_keyword`
AFTER INSERT ON `em2keyword`
FOR EACH ROW
BEGIN
 DECLARE kw_count INT;
 DECLARE kw_count_sklik_id INT;
 SELECT COUNT(*) INTO kw_count FROM em2keyword WHERE NEW.ek_id_group=em2keyword.ek_id_group;
 SELECT COUNT(*) INTO kw_count_sklik_id FROM em2keyword WHERE NEW.ek_id_group=em2keyword.ek_id_group AND ek_sklik_id > 0;
 UPDATE em2group SET eg_tg_keyword_count = kw_count,
                     eg_tg_keyword_count_sklik = kw_count_sklik_id WHERE em2group.eg_id=NEW.ek_id_group;
END;

CREATE TRIGGER `update_keyword`
AFTER UPDATE ON `em2keyword`
FOR EACH ROW
BEGIN
 DECLARE kw_count INT;
 DECLARE kw_count_sklik_id INT;
 SELECT COUNT(*) INTO kw_count FROM em2keyword WHERE NEW.ek_id_group=em2keyword.ek_id_group;
 SELECT COUNT(*) INTO kw_count_sklik_id FROM em2keyword WHERE NEW.ek_id_group=em2keyword.ek_id_group AND ek_sklik_id > 0;
 UPDATE em2group SET eg_tg_keyword_count = kw_count,
                     eg_tg_keyword_count_sklik = kw_count_sklik_id WHERE em2group.eg_id=NEW.ek_id_group;
END;

CREATE TRIGGER `delete_keyword`
AFTER DELETE ON `em2keyword`
FOR EACH ROW
BEGIN
 DECLARE kw_count INT;
 DECLARE kw_count_sklik_id INT;
 SELECT COUNT(*) INTO kw_count FROM em2keyword WHERE OLD.ek_id_group=em2keyword.ek_id_group;
 SELECT COUNT(*) INTO kw_count_sklik_id FROM em2keyword WHERE OLD.ek_id_group=em2keyword.ek_id_group AND ek_sklik_id > 0;
 UPDATE em2group SET eg_tg_keyword_count = kw_count,
                     eg_tg_keyword_count_sklik = kw_count_sklik_id WHERE em2group.eg_id=OLD.ek_id_group;
END;