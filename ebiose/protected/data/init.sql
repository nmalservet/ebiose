/* fonctions possibles de l utilisateur*/
insert into fonction_utilisateur(id,nom,nom_en)values(0,'indéfinie','indéfinie');
insert into fonction_utilisateur(nom,nom_en)values('medecin','doctor');
insert into fonction_utilisateur(nom,nom_en)values('infirmière','nurse');
insert into fonction_utilisateur(nom,nom_en)values('administrateur','administrator');
insert into fonction_utilisateur(nom,nom_en)values('cadre medico-administratif','medico-administrative person');
insert into fonction_utilisateur(nom,nom_en)values('ingénieur','engineer');

/* profiles */
insert into profil(id,nom, description)values(1,"admin","all privileges");
/* modules */
insert into module(id,nom,description)values(1,"administration","module d administration systeme");
insert into module(id,nom,description)values(2,"utilisateur","module de gestion des utilisateurs");
insert into module(id,nom,description)values(3,"profil","module de gestion des profils");
insert into module(id,nom,description)values(4,"module","module de gestion des modules");
insert into module(id,nom,description)values(5,"echantillon","module de gestion des echantillons");
/* type echantillon */
insert into type_echantillon(id,nom,nom_en,description)values(1,"adn","dna","acide desox. nucle.");
insert into type_echantillon(id,nom,nom_en,description)values(2,"arn","rna","acide rib. nucle.");
insert into type_echantillon(id,nom,nom_en,description)values(3,"tissus","tissues","tissus");
insert into type_echantillon(id,nom,nom_en,description)values(4,"cellules","cells","cellules");
insert into type_echantillon(id,nom,nom_en,description)values(5,"serum","serum","serum");
insert into type_echantillon(id,nom,nom_en,description)values(6,"proteines","proteines","proteines");
insert into type_echantillon(id,nom,nom_en,description)values(7,"plasma","plasma","plasma");
insert into type_echantillon(id,nom,nom_en,description)values(8,"tumeur","tumor","tumeur");
insert into type_echantillon(id,nom,nom_en,description)values(9,"liquide","liquid","liquide");
insert into type_echantillon(id,nom,nom_en,description)values(10,"autre","other","autre");

insert into select_list(id,nom)values(1,"standard oui-non");
insert into select_list(id,nom)values(2,"standard oui-non-ne sait pas");
insert into select_list(id,nom)values(3,"standard oui-non-en cours");

insert into value_select_list(id,valeur,id_select_list)values(1,"oui",1);
insert into value_select_list(id,valeur,id_select_list)values(2,"non",1);
insert into value_select_list(id,valeur,id_select_list)values(3,"oui",2);
insert into value_select_list(id,valeur,id_select_list)values(4,"non",2);
insert into value_select_list(id,valeur,id_select_list)values(5,"ne sait pas",2);
insert into value_select_list(id,valeur,id_select_list)values(6,"oui",3);
insert into value_select_list(id,valeur,id_select_list)values(7,"non",3);
insert into value_select_list(id,valeur,id_select_list)values(8,"en cours",3);

/* insertion du dossier racine */
insert into dossier(id,nom,description)values(1,"root","root folder");

/* types de contenant*/
insert into contenant_type(id,nom, description)values(1,"tube","tube standard");
insert into contenant_type(id,nom, description)values(2,"paillette","paillette");
insert into contenant_type(id,nom, description)values(3,"culot","culot");
insert into contenant_type(id,nom, description)values(4,"lame","lame");
insert into contenant_type(id,nom, description)values(5,"bloc","bloc de paraphine");

/* types de conteneur*/
insert into type_conteneur(nom)values("frigo");
insert into type_conteneur(nom)values("rack");
insert into type_conteneur(nom)values("casier");
insert into type_conteneur(nom)values("tiroir");
insert into type_conteneur(nom)values("boite");

/* type consentement */
insert into type_consentement(id,nom,description)values(1,"non opposition","non opposition");
insert into type_consentement(id,nom,description)values(2,"éclairé","éclairé");

/* unités des cquantités */
insert into quantite_unite(id,nom,description)values(1,"10^6 cellules","millions de cellules");
insert into quantite_unite(id,nom,description)values(2,"traces","traces");
insert into quantite_unite(id,nom,description)values(3,"morceau","morceau");

/* niveau d importance des non conformites */
insert into niveau_importance_non_conformite(nom, description, priorite) values("bloquant","niveau bloquant, doit etre resolu ",1);
insert into niveau_importance_non_conformite(nom, description, priorite) values("majeur","niveau majeur, resolution souhaitee",2);
insert into niveau_importance_non_conformite(nom, description, priorite) values("warning","niveau warning, a resoudre mais gravite faible",3);
insert into niveau_importance_non_conformite(nom, description, priorite) values("mineur","niveau mineur, non prioritaire mais génant",4);
insert into niveau_importance_non_conformite(nom, description, priorite) values("anecdotique","non prioritaire, non génant mais intéressant pour parfaire le système",5);
