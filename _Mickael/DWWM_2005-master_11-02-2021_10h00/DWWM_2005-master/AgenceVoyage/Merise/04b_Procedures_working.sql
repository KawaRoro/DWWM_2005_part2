use tp_agence_voyages;

TRUNCATE TABLE notes;

SELECT * FROM consumes;

SELECT * FROM notes;

CALL add_note(1, 1, 1, 123);

CALL add_note(1, 3, 1, 8);


SELECT COUNT(*) as nombre
    FROM consumes WHERE client_id=1 AND service_code=3;
    


-- Error Code: 1442. 
-- Can't update table 'notes' in stored function/trigger because 
-- it is already used by statement which invoked this stored function/trigger.
