use ma_base;


INSERT INTO ma_table
(mon_nom, ma_date, mon_byte, mon_bool)
VALUES
('Mike', '2020-08-27 14:23:57', 120, 1);


INSERT INTO ma_table
(mon_nom, ma_date, mon_byte, mon_bool)
VALUES
('Mike', '2020-08-27 14:23:57', 120, 1),
('a', '2020-08-27 14:23:57', 120, 1),
('b', '2020-08-27 14:23:57', 120, 1),
('c', '2020-08-27 14:23:57', 120, 1),
('d', '2020-08-27 14:23:57', 120, 1);


SELECT * FROM ma_table;