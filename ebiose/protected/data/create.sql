create table fonction_utilisateur(
	id int not null primary key auto_increment,
	nom varchar(40) not null,
	nom_en varchar(40) not null,
	description varchar(150)
)engine = innodb;

create table user(
	id int not null primary key auto_increment,
	prenom varchar(250),
	nom varchar(250),
	login varchar(250),
	password varchar(250),
	email varchar(250),
	telephone varchar(250),
	gsm varchar(250),
	fonction_utilisateur_id int,
	inactif tinyint(1) not null default 0,
	foreign key (fonction_utilisateur_id) references fonction_utilisateur(id)
)engine = innodb;

create table profil(
	id int not null primary key auto_increment,
	nom varchar(250),
	description varchar(250)
)engine = innodb;

create table module(
	id int not null primary key auto_increment,
	nom varchar(250),
	description varchar(250),
	inactif tinyint(1) not null default 0
)engine = innodb;

create table collection(
	id int not null primary key auto_increment,
	nom varchar(250) not null,
	description varchar(250),
	CONSTRAINT unic_nom UNIQUE (nom)
)engine = innodb;

create table type_conteneur(
	id tinyint not null primary key auto_increment,
	nom varchar(250) not null
)engine = innodb;

create table conteneur(
	id int not null primary key auto_increment,
	nom varchar(250),
	description varchar(250),
	nb_max_emplacements int default 0,
	longueur int,
	largeur int,
	parent_id int,
	type_conteneur tinyint,
	foreign key (parent_id) references conteneur(id),
	foreign key (type_conteneur) references type_conteneur(id)
)engine = innodb;

create  table transporteur (
  id int not null primary key auto_increment,
  nom varchar(45) null ,
  description varchar(45) null ,
  adresse varchar(45) null ,
  ville varchar(45) null ,
  pays varchar(2) null)
engine = innodb;

create table transport_step(
	 id int not null primary key auto_increment,
	 date_depart datetime,
	 date_arrivee datetime,
	 transporteur_id int,
	 temperature decimal(5,2),
	 notes varchar(200),
	 foreign key (transporteur_id) references transporteur(id)
)engine = innodb;

create table type_echantillon(
	id int not null primary key auto_increment,
	nom varchar(20) not null,
	nom_en varchar(20) not null,
	description varchar(150)
)engine = innodb;

create table site(
	id int not null primary key auto_increment,
	nom varchar(250) not null,
	description varchar(250),
	adresse varchar(200),
	ville varchar(50),
	pays varchar(2),
	code_postal varchar(10),
	finess varchar(50),
	CONSTRAINT unic_nom UNIQUE (nom)
)engine = innodb;

create table destockage(
	id int not null primary key auto_increment,
	motif varchar(100) not null,
	date_demande datetime not null,
	user_id int not null,
	foreign key (user_id) references user(id)
)engine=innodb;

create  table consentement (
  id int not null primary key auto_increment,
  statut tinyint null ,
  date_consentement datetime,
  type_consentement tinyint null)
engine = innodb;

create  table patient (
  id int not null primary key auto_increment,
  ipp varchar(45) null ,
  nom_usuel varchar(45) not null ,
  nom_naissance varchar(45) null ,
  date_naissance date not null ,
  sexe tinyint not null ,
  prenom varchar(45) null ,
  date_deces date null,
  est_decede tinyint default 0,
  adresse_naissance varchar(100),
  ville_naissance varchar(100),
  cp_naissance varchar(10),
  pays_naissance varchar(2),
  consentement_id int,
  foreign key (consentement_id) references consentement(id))
engine = innodb;

create table type_prelevement(
id int not null primary key auto_increment,
nom varchar(20) not null,
description varchar(50) not null)engine = innodb;

create table type_consentement(
id int not null primary key auto_increment,
nom varchar(20) not null,
description varchar(50) not null)engine = innodb;


CREATE  TABLE prelevement (
  id int not null primary key auto_increment,
  identifier varchar(250) not null,
  patient_id int not null ,
 type_prelevement_id int,
site_provenance_id int,
description varchar(250),
date_creation datetime not null,
date_prelevement datetime,
date_arrivee datetime,
transport_step_id int,
  foreign key (patient_id) references patient(id),
  foreign key (transport_step_id) references transport_step(id),
  foreign key (type_prelevement_id) references type_prelevement(id))
engine = innodb;

create table echantillon(
	id int not null primary key auto_increment,
	type_id int,
	site_provenance_id int,
	identifier varchar(250) not null,
	description varchar(250),
	quality int(1) default 0,
	volume decimal(7,2),
	volume_unity tinyint,
	quantity int(3) default 0,
	quantity_unity int(1) default 0,
	parent_id int,
	conteneur_id int,
	position int,
	destockage_id int,
	collection_id int,
	prelevement_id int,
	CONSTRAINT unic_identifier UNIQUE (identifier),
	foreign key (conteneur_id) references conteneur(id),
	foreign key (type_id) references type_echantillon(id),
	foreign key (destockage_id) references destockage(id),
	foreign key (collection_id) references collection(id),
	foreign key (prelevement_id) references prelevement(id)
)engine = innodb;

create table machine(
	id int not null primary key auto_increment,
	nom varchar(250) not null,
	description varchar(250),
	couleur varchar(20),
	CONSTRAINT unic_nom UNIQUE (nom)
)engine = innodb;

create table news(
	id int not null primary key auto_increment,
	user_id int not null,
	sujet varchar(250),
	contenu varchar(500),
	creation_date timestamp default current_timestamp,
	foreign key (user_id) references user(id)
)engine = innodb;

create table dossier(
	id int not null primary key auto_increment,
	nom varchar(250),
	description varchar(250),
	parent_id int,
	foreign key (parent_id) references dossier(id)
)engine = innodb;

create table fichier(
	id int not null primary key auto_increment,
	nom varchar(250),
	description varchar(250),
	suffixe varchar(7),
	dossier_id int,
	foreign key (dossier_id) references dossier(id)
)engine = innodb;

create table analyse(
	id int not null primary key auto_increment,
	nom varchar(250) not null,
	description varchar(250),
	type_analyse int,
	machine_id int,
	inactive tinyint(1) not null default 0,
	CONSTRAINT unic_nom UNIQUE (nom),
	foreign key (machine_id) references machine(id)
)engine = innodb;

create table value_option_analyse(
	id int not null primary key auto_increment,
	id_analyse int not null,
	valeur varchar(30) not null,
	foreign key (id_analyse) references analyse(id)
)engine = innodb;

create table catalogue(
	id int not null primary key auto_increment,
	nom varchar(250) not null,
	description varchar(250),
	CONSTRAINT unic_nom UNIQUE (nom)
)engine = innodb;

create table catalogue_echantillon(
	id_catalogue int not null,
	id_echantillon int not null,
	foreign key (id_catalogue) references catalogue(id),
	foreign key (id_echantillon) references echantillon(id),
	primary key(id_catalogue,id_echantillon)
)engine = innodb;

create table log_activity(
	id int not null auto_increment,
	action int not null,
	user_id int not null,
	element_id int,
	table_id int,
	field_id int,
	old_value varchar(250),
	new_value varchar(250),
	date_action timestamp default current_timestamp,
	primary key(id),
	foreign key (user_id) references user(id)
)engine = innodb;


create table custom_field(
	id int not null auto_increment,
	nom varchar(250) not null,
	type int not null,
	description varchar(500),
	primary key(id)
)engine = innodb;

create table select_list(
	id int not null auto_increment,
	nom varchar(50) not null,
	primary key(id)
)engine = innodb;

create table value_select_list(
	id int not null auto_increment,
	id_select_list int not null,
	valeur varchar(50) not null,
	primary key(id),
	foreign key (id_select_list) references select_list(id)
)engine = innodb;

create table resultat_analyse_texte(
	id int not null auto_increment,
	nom varchar(250),
	observations varchar(250),
	analyse_id int not null,
	echantillon_id int not null,
	etat_demande int default 0,
	valeur varchar(250),
	primary key(id),
	foreign key (analyse_id) references analyse(id),
	foreign key (echantillon_id) references echantillon(id)
)engine = innodb;


create table resultat_analyse_area(
	id int not null auto_increment,
	nom varchar(250),
	observations varchar(250),
	analyse_id int not null,
	echantillon_id int not null,
	etat_demande int default 0,
	valeur blob,
	primary key(id),
	foreign key (analyse_id) references analyse(id),
	foreign key (echantillon_id) references echantillon(id)
)engine = innodb;

create table resultat_analyse_selectlist(
	id int not null auto_increment,
	nom varchar(250),
	observations varchar(250),
	analyse_id int not null,
	echantillon_id int not null,
	etat_demande int default 0,
	valeur int,
	primary key(id),
	foreign key (analyse_id) references analyse(id),
	foreign key (echantillon_id) references echantillon(id),
	foreign key (valeur) references value_option_analyse(id)
)engine = innodb;

create table resultat_analyse_checkboxes(
	id int not null auto_increment,
	nom varchar(250),
	observations varchar(250),
	analyse_id int not null,
	echantillon_id int not null,
	etat_demande int default 0,
	valeurs varchar(200),
	primary key(id),
	foreign key (analyse_id) references analyse(id),
	foreign key (echantillon_id) references echantillon(id)
)engine = innodb;

create table resultat_analyse_fichier(
	id int not null primary key auto_increment,
	nom varchar(250),
	observations varchar(250),
	analyse_id int not null,
	echantillon_id int not null,
	etat_demande int default 0,
	valeur int,
	foreign key (analyse_id) references analyse(id),
	foreign key (echantillon_id) references echantillon(id),
	foreign key (valeur) references fichier(id)
)engine = innodb;

create table message (
  id int not null primary key  auto_increment,
  reponse_id int,
  date varchar(20) not null,
  auteur int not null,
  destinataire int(20) not null,
  sujet varchar(60) not null default '',
  message text not null,
  lu tinyint(1) not null default 0,
  trashed tinyint(1) not null default 0
) engine=innodb;

create table reservation_machine (
  id int not null primary key auto_increment,
  machine_id int not null,
  start_date varchar(20) not null,
  end_date varchar(20) not null,
  user_id int not null,
  message text not null,
  foreign key (machine_id) references machine(id),
	foreign key (user_id) references user(id)
) engine=innodb;

create table niveau_importance_non_conformite(
	id int not null primary key auto_increment,
	nom varchar(250) not null,
	priorite tinyint not null,
	description varchar(250),
	CONSTRAINT unic_nom UNIQUE (nom)
)engine = innodb;

create  table non_conformite (
  id int not null primary key auto_increment,
  nom varchar(45) not null ,
  date_creation datetime not null ,
  date_debut_nc datetime null ,
  date_fin_nc datetime null ,
  description varchar(200) null ,
  niveau_importance_id int not null,
   foreign key (niveau_importance_id) references niveau_importance_non_conformite(id))
engine = innodb;

create  table echantillon_has_non_conformite (
  echantillon_id int(11) not null ,
  non_conformite_id int not null ,
  primary key (echantillon_id, non_conformite_id) ,
   foreign key (echantillon_id) references echantillon(id),
   foreign key (non_conformite_id) references non_conformite(id)
  )engine = innodb;
  
create  table contenant_type (
  id int not null  primary key auto_increment ,
  nom varchar(45) not null ,
  description varchar(45) null)
engine = innodb;

create  table quantite_unite (
  id int not null  primary key auto_increment ,
  nom varchar(20) not null ,
  description varchar(45) null)
engine = innodb;

CREATE  TABLE tache (
  id INT PRIMARY KEY NOT NULL auto_increment,
  nom VARCHAR(45) NOT NULL ,
  description VARCHAR(45) NULL ,
  date_limite DATETIME NULL ,
  date_creation DATETIME NOT NULL)
ENGINE = InnoDB;

CREATE  TABLE assignation_tache (
  user_id INT(11) NOT NULL ,
  tache_id INT NOT NULL ,
  date_assignation DATETIME NOT NULL ,
  PRIMARY KEY (user_id, tache_id) ,
  foreign key (user_id) references user(id),
  foreign key (tache_id) references tache(id)
)ENGINE = InnoDB;



create table contact(
	id int not null primary key auto_increment,
	nom varchar(100),
	prenom varchar(50),
	telephone varchar(20),
	gsm varchar(20),
	fonction int,
	site_employeur_id int,
	foreign key (site_employeur_id) references site(id)
)engine = innodb;

create table demande_cession(
	id int not null primary key auto_increment,
	contact_id int not null,
	date_demande datetime not null,
	notes varchar(200)
)engine = innodb;

create table demande_cession_echantillon(
	id_demande_cession int not null,
	id_echantillon int not null,
	foreign key (id_demande_cession) references demande_cession(id),
	foreign key (id_echantillon) references echantillon(id),
	primary key(id_demande_cession,id_echantillon)
)engine=innodb;

create table cession(
	id int not null primary key auto_increment,
	contact_id int not null,
	date_demande datetime not null,
	transport_step_id int,
	notes varchar(200),
	statut_cession tinyint not null,
	demande_cession_id int,
	foreign key (demande_cession_id) references demande_cession(id),
	foreign key (transport_step_id) references transport_step(id)
)engine=innodb;

create table cession_echantillon(
	id_cession int not null,
	id_echantillon int not null,
	foreign key (id_cession) references cession(id),
	foreign key (id_echantillon) references echantillon(id),
	primary key(id_cession,id_echantillon)
)engine=innodb;


create table annotation(
	id int not null primary key auto_increment,
	nom varchar(250),
	description varchar(250),
	type_annotation int not null comment 'defini si c est du texte, entier, fichier, selectlist, checkboxlist' ,
	type_objet int not null comment 'defini si c est pour du patient, du prelevement, echantillon, animal',
	inactive tinyint(1) not null default 0
)engine = innodb;

create table value_option_annotation(
	id int not null primary key auto_increment,
	id_annotation int not null,
	valeur varchar(30) not null comment 'valeur affichable de l option',
	foreign key (id_annotation) references annotation(id)
)engine = innodb;

create table annotation_collection(
	id_annotation int not null,
	id_collection int not null,
	foreign key (id_annotation) references annotation(id),
	foreign key (id_collection) references collection(id),
	primary key(id_annotation,id_collection)
)engine = innodb;

create table resultat_annotation_texte(
	id int not null primary key auto_increment,
	annotation_id int not null,
	objet_id int not null comment 'peut etre un id d echantillon ,de prelevement , tout id objet de la base',
	type_objet int not null comment 'defini le type de l objet echantillon, prelevement',
	valeur varchar(250),
	foreign key (annotation_id) references annotation(id)
)engine = innodb;

create table etude(
	id int not null primary key auto_increment,
	nom varchar(250),
	description varchar(250)
)engine = innodb;

create table etude_echantillon(
	id_etude int not null,
	id_echantillon int not null,
	foreign key (id_etude) references etude(id),
	foreign key (id_echantillon) references echantillon(id),
	primary key(id_etude,id_echantillon)
)engine = innodb;


