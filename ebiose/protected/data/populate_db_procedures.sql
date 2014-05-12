delimiter |
CREATE PROCEDURE massInsertEchaProcedure(IN nbEchas INTEGER ) 
   BEGIN 
     DECLARE iter INTEGER DEFAULT 0; 
iterwhile: WHILE iter < nbEchas DO 
   SET iter = iter + 1; 
   insert into echantillon(identifier,description,parent_id,quality,quantity,quantity_unity)values(concat("emass",iter),concat(iter,"eme echantillon"),1,2,3,1);
END WHILE iterwhile;
END 
|
DELIMITER ;

/*drop procedure massInsertEchaProcedure;*/

CALL massInsertEchaProcedure('1000');

delimiter |
CREATE PROCEDURE massiveInsertPatientProcedure(IN nbEchas INTEGER ) 
   BEGIN 
     DECLARE iter INTEGER DEFAULT 0; 
iterwhile: WHILE iter < nbEchas DO 
   SET iter = iter + 1; 
   insert into patient(nom_usuel,prenom,date_naissance,sexe)values(concat("massive",iter),"pat","1912-12-28",1);
END WHILE iterwhile;
END 
|
DELIMITER ;

/*drop procedure massiveInsertPatientProcedure;*/

CALL massiveInsertPatientProcedure('1000');