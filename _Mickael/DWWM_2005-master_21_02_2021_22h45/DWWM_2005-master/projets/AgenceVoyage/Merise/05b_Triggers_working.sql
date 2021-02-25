use tp_agence_voyages;

SELECT * FROM TRIPS;

SELECT * FROM orders;

DELETE FROM orders WHERE trip_code=3;

UPDATE trips 
SET trip_price = 899.99 
WHERE trip_code=1;

UPDATE trips 
SET trip_price = 99.99 
WHERE trip_code=3;

SELECT COUNT(*) FROM orders WHERE trip_code > 0;
 
 
