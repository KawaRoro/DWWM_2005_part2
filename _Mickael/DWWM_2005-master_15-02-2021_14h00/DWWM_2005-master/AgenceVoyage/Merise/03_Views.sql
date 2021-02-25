use tp_agence_voyages;


DROP VIEW IF EXISTS clients_resume;


CREATE VIEW clients_resume 
AS 
SELECT 
client_lastname, 
client_firstname, 
C1.com_code, 
S1.com_name AS client_com, 
S2.com_name AS client_com_substitute 
FROM clients C1 
INNER JOIN sales S1 ON C1.com_code = S1.com_code
LEFT JOIN sales AS S2 ON S2.com_code = S1.com_substitute;



