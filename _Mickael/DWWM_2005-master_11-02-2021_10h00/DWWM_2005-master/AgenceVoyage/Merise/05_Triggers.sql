use tp_agence_voyages;

-- déclencheur automatique mise à jour d'un voyage
-- Si le prix a été modifié, 
-- vérifier qu'aucune commande n'existe pour ce voyage 
-- (le prix ne peut pas être modifié dans ce cas)

-- 1) comparer le prix envoyé dans l'update avec le prix existant en base
-- 2) S'IL est différent, vérifier que le voyage est lié à au moins une commande
-- 3) mettre à jour le prix uniquement si pas de commande associée

DROP TRIGGER IF EXISTS before_update_trip;
DROP TRIGGER IF EXISTS before_insert_note;
DROP TRIGGER IF EXISTS after_insert_note;

DELIMITER $$

CREATE TRIGGER before_update_trip 
BEFORE UPDATE 
ON trips 
FOR EACH ROW 
BEGIN 
	
    DECLARE nb_orders INT;
    
    SELECT COUNT(*) INTO nb_orders FROM orders WHERE trip_code = OLD.trip_code;
    
    IF OLD.trip_price <> NEW.trip_price AND nb_orders > 0 
    THEN 
    
		SIGNAL SQLSTATE '45000' 
		SET MESSAGE_TEXT = "Mise à jour impossible";
		
    END IF;
    
END$$ 


CREATE TRIGGER before_insert_note 
BEFORE INSERT 
ON notes  
FOR EACH ROW 
BEGIN 
	
    IF NEW.service_score < 0 OR NEW.service_score > 10
    THEN 
		IF NEW.service_score > 10
		THEN
			SET NEW.service_score = 10;
		ELSE 
			SET NEW.service_score = 0;
		END IF;
	END IF; 
          
END$$ 

CREATE TRIGGER after_insert_note 
AFTER INSERT 
ON notes  
FOR EACH ROW 
BEGIN 
	-- ne peut pas mettre à jour la table car verrou
    -- UPDATE notes SET service_score=service_score*2 WHERE trip_code=NEW.trip_code AND client_id=NEW.client_id AND service_code=NEW.service_code;
          
END$$ 

DELIMITER ;