use tp_agence_voyages;

-- Procédure d'ajout d'une note (trip_code, service_code, client_id, service_score)
-- TODO:  le client peut noter uniquement les voyages qu'il a fait
-- le client doit avoir consommé le service OK

DROP PROCEDURE IF EXISTS add_note;

DELIMITER $$

CREATE PROCEDURE add_note
(
	IN trip_code_in INT, 
	IN service_code_in INT,
	IN client_id_in INT,
	IN service_score_in TINYINT
)
BEGIN 

	DECLARE service_count INT;
    DECLARE note_exists INT;

	SELECT COUNT(*) INTO service_count 
    FROM consumes WHERE client_id=client_id_in AND service_code=service_code_in;
	
    SELECT COUNT(*) INTO note_exists 
    FROM notes WHERE client_id=client_id_in AND service_code=service_code_in;
    
    IF service_count <> 0 AND note_exists = 0 
    THEN 
    
		INSERT INTO notes 
		(trip_code, service_code, client_id, service_score) 
		VALUES 
		(trip_code_in, service_code_in, client_id_in, service_score_in);
        
        SELECT * FROM notes WHERE client_id=client_id_in AND trip_code=trip_code_in AND service_code=service_code_in;
	
    ELSE 
    
		SELECT "Impossible" as Erreur, "T'as fait nimp" as raison;
        
    END IF;
    
    
    
    
END$$

DELIMITER ;


