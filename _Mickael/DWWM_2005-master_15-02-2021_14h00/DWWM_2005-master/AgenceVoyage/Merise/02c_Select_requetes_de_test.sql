USE tp_agence_voyages;


SELECT * FROM clients;
SELECT * FROM sales;


SELECT client_lastname, client_firstname, com_name, clients.com_code FROM clients
JOIN sales ON clients.com_code = sales.com_code;


SELECT client_lastname, client_firstname, C1.com_code, S1.com_name, S2.com_name 
FROM clients C1 
INNER JOIN sales S1 ON C1.com_code = S1.com_code
LEFT JOIN sales AS S2 ON S2.com_code = S1.com_substitute;


SELECT client_lastname, client_firstname, C1.com_code, S1.com_name, S2.com_name 
FROM clients C1
INNER JOIN sales S1 ON C1.com_code = S1.com_code
RIGHT JOIN sales AS S2 ON S2.com_code = S1.com_substitute;


SELECT * FROM clients_resume;

SELECT client_lastname, com_code FROM clients_resume 
WHERE client_com = 'Holems Cathy' 
ORDER BY client_firstname;


