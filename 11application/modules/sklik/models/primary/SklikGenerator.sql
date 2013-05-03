UPDATE prod SET prod_price = FLOOR(99999 * RAND()) + 50

UPDATE prod SET prod_action = FLOOR(2 * RAND()) + 1;
UPDATE prod SET prod_sell = FLOOR(2 * RAND()) + 1;
UPDATE prod SET prod_sendnow = FLOOR(2 * RAND()) + 1;



DELETE FROM em2db 