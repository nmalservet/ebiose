/* users */
insert into user (id,prenom,nom,login,password,email,telephone) values(1,"nicolas", "malservet", "nmalservet", "nico", "n.malservet@biosoftwarefactory.com","0647920110");
insert into user (id,prenom,nom,login,password,email,telephone) values(2,"edouard", "martin", "emartin", "edouard", "","");
insert into user (id,prenom,nom,login,password,email,telephone) values(3,"georges", "clean", "gclean", "georges", "","");
insert into user (id,prenom,nom,login,password,email,telephone) values(4,"manager", "biobank admin", "manager", "manager", "","");
insert into user (id,prenom,nom,login,password,email,telephone) values(5,"technician", "techos", "technician", "technician", "","");
insert into user (id,prenom,nom,login,password,email,telephone) values(6,"user", "user", "user", "technician", "","");
insert into user (prenom,nom,login,password,email,telephone) values("user", "user", "user7", "technician", "","");
insert into user (prenom,nom,login,password,email,telephone) values("user", "user", "user8", "technician", "","");
insert into user (prenom,nom,login,password,email,telephone) values("user", "user", "user9", "technician", "","");
insert into user (prenom,nom,login,password,email,telephone) values("user", "user", "user10", "technician", "","");
insert into user (prenom,nom,login,password,email,telephone) values("user", "user", "user11", "technician", "","");
insert into user (prenom,nom,login,password,email,telephone) values("user", "user", "user12", "technician", "","");
insert into user (prenom,nom,login,password,email,telephone) values("user", "user", "user13", "technician", "","");
/* machines-robots */
insert into machine(id,nom,description,couleur)values(1,"robot1","machine de test","#6189ce");
insert into machine(id,nom,description,couleur)values(2,"e-cycler","machine a PCR","#9fce61");
insert into machine(id,nom,description,couleur)values(3,"centri2","centrifugeuse","green");
/* conteneur */

insert into conteneur(id, nom, description, type_conteneur)values(1,"frigo1","frigo de test",1);
insert into conteneur(id, nom, description, type_conteneur)values(5,"congelo2","congelo",1);
insert into conteneur(id, nom, description, parent_id, type_conteneur)values(2,"enceinte1","enceinte test",1,2);
insert into conteneur(id, nom, description, parent_id, type_conteneur)values(3,"enceinte2","enceinte test",1,2);
insert into conteneur(id, nom, description, parent_id, type_conteneur)values(4,"enceinte3","enceinte test",2,3);
insert into conteneur(id, nom, description, parent_id, type_conteneur, longueur, largeur, nb_max_emplacements)values(6,"boite1","boite test",4,5,4,6,24);
insert into conteneur(id, nom, description, parent_id, type_conteneur, longueur, largeur, nb_max_emplacements)values(7,"boite2","boite test",3,5,4,6,24);

/* patients*/
insert into patient(nom_usuel,prenom,date_naissance,sexe)values("racine","jean","1912-12-28",1);
insert into patient(nom_usuel,prenom,date_naissance,sexe)values("kaice-elout","emma","1912-10-28",0);
insert into patient(nom_usuel,prenom,date_naissance,sexe)values("biville","michel","1942-01-20",1);
insert into patient(nom_usuel,prenom,date_naissance,sexe)values("steropode","olga","1935-01-20",0);

/* prelevements */
insert into prelevement(identifier,patient_id,date_creation)values("p_1",1,"2012-12-28 17:00:00");

/* echantillons */
insert into echantillon(id,identifier,description,quality,quantity,quantity_unity,prelevement_id)values(1,"e345","premier echantillon",2,3,1,1);
insert into echantillon(id,identifier,description,parent_id,quality,quantity,quantity_unity,position,conteneur_id,prelevement_id)values(2,"e2","second echantillon",1,2,3,1,1,6,1);
insert into echantillon(id,identifier,description,parent_id,quality,quantity,quantity_unity,prelevement_id)values(3,"e4","3eme echantillon",2,2,3,1,1);


/* sites */
insert into site(id,nom,description,pays,code_postal,adresse,finess)values(1,"hp saint louis","hopital saint louis","fr","75010","1 av claude vellefaux","750018988");
/* analyses */
insert into analyse(nom,description,type_analyse)values("dosage od 230nm","analyse dosage od",2);
insert into analyse(nom,description,type_analyse)values("dosage od 260nm","analyse dosage od",1);
insert into analyse(nom,description,type_analyse)values("dosage od 280nm","analyse dosage od",3);
insert into analyse(nom,description,type_analyse)values("chromatographie","analyse de composants chimiques",4);
insert into analyse(nom,description,type_analyse)values("electrophorese en agarose simple","electrophorese en agarose",5);
insert into analyse(nom,description,type_analyse)values("electrophorese en agarose pulsé","electrophorese en agarose pulsé",3);
insert into analyse(nom,description,type_analyse)values("dosage od 230bisnm","analyse dosage od",1);
/* value_option_analyse */
insert into value_option_analyse(id, id_analyse, valeur)values(1,2,"5min<x");
insert into value_option_analyse(id, id_analyse, valeur)values(2,2,"5min<x<15min");
insert into value_option_analyse(id, id_analyse, valeur)values(3,2,"x<15min");
/* pour checkboxes */
insert into value_option_analyse(id, id_analyse, valeur)values(4,4,"présence zn");
insert into value_option_analyse(id, id_analyse, valeur)values(5,4,"présence nacl");
insert into value_option_analyse(id, id_analyse, valeur)values(6,4,"présence h2o2");

/* creation des select list custom (fait en init )*/
/* insert into log_activity */
insert into log_activity(action,user_id)values(1,1);
insert into log_activity(action,user_id)values(2,1);
/* insert de catalogues */
insert into catalogue(nom, description)values("catalogue_adn","mon catalogue d adn");
insert into catalogue(nom, description)values("catalogue_general","mon catalogue general");
/* insert des associations catalogue-echantillon */
insert into catalogue_echantillon(id_catalogue,id_echantillon) values(1,1);
insert into catalogue_echantillon(id_catalogue,id_echantillon) values(1,2);
insert into catalogue_echantillon(id_catalogue,id_echantillon) values(1,3);
/* insert de news */
insert into news(user_id,sujet,contenu) values(1,"info urgente ibisa","le site ibisa a publié une info utile à étudier..");
insert into news(user_id,sujet,contenu) values(1,"news european biobanking","les biobanks vont recevoir 50k euros..");
/* */
insert into resultat_analyse_texte(analyse_id,echantillon_id,etat_demande)values(1,1,1);
insert into resultat_analyse_texte(analyse_id,echantillon_id,etat_demande)values(1,1,2);
insert into resultat_analyse_texte(analyse_id,echantillon_id,etat_demande)values(1,1,3);
/* dossiers */
insert into dossier(nom,description,parent_id)values("documentation_technique","dossier pour stocker la documentation technique",1);
insert into dossier(nom,description,parent_id)values("compte_rendus","stockage des cr de labo",1);
insert into dossier(nom,description,parent_id)values("divers","stockage des fichiers divers",1);
/* mail */
insert into message(auteur,destinataire,sujet,message,date)values(1,2,"pcr to do","hello, do you have done the special pcr today?","2012-09-23");
insert into message(auteur,destinataire,sujet,message,date)values(2,1,"pcr to do","hello nico, do you have done the special pcr today?","2012-09-23");
/* reservation machines */
insert into reservation_machine(machine_id,user_id,message,start_date,end_date)values(1,1,"pcr urgente metz","2012-12-26 10:00:00","2012-12-26 12:00:00");
insert into reservation_machine(machine_id,user_id,message,start_date,end_date)values(2,1,"to clean","2012-12-26 13:00:00","2012-12-26 14:00:00");
insert into reservation_machine(machine_id,user_id,message,start_date,end_date)values(2,1,"congés","2013-01-01 08:00:00","2013-01-01 20:00:00");
insert into reservation_machine(machine_id,user_id,message,start_date,end_date)values(2,1,"to conf call","2013-01-03 10:00:00","2012-01-03 16:00:00");
insert into reservation_machine(machine_id,user_id,message,start_date,end_date)values(2,1,"to clean",concat(curdate()," 13:00:00"),concat(curdate()," 14:00:00"));
insert into reservation_machine(machine_id,user_id,message,start_date,end_date)values(2,1,"reparation","2013-01-04 12:00:00","2013-01-05 12:00:00");


/* taches */
insert tache(nom, description,date_creation,date_limite)values("bisulfitation lot 42", "il faut bisulfiter","2012-12-27 10:00:00","2013-02-25 10:00:00");
insert tache(nom, description,date_creation)values("appeler n.malservet", "il faut voir de nouvelles fonctionnalites","2012-12-27 10:00:00");

/*transporteur*/
insert into transporteur(nom, description, adresse, ville, pays)values("fedex","contacter:jean charles","rue du bois", "nemours","fr");

/* collections */
insert into collection(nom, description)values("serums","collection de serums");
insert into collection(nom, description)values("tumeurs","collection de tumeurs");
insert into collection(nom, description)values("tumeurs cérébrales","collection de tumeurs cérabrales");
insert into collection(nom, description)values("maladies rares","collection de cellules de maladies rares");

/* insert into non conformite */
insert into non_conformite(nom,date_creation,niveau_importance_id)values("probleme de contamination bacterio","2013-01-07 17:00:00",1);
insert into non_conformite(nom,date_creation,niveau_importance_id)values("absence reaction","2013-01-03 17:00:00",3);
insert into non_conformite(nom,date_creation,niveau_importance_id)values("etiquette manquante","2013-01-07 10:00:00",4);
