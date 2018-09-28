
CREATE TABLE  Statut(
  Id_statut char(10) NOT NULL,
  libelle char(100) NOT NULL,
  CONSTRAINT pk_statut PRIMARY KEY (Id_statut)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO Statut Values ("STTSR", "Adhérent sans Remboursement");
INSERT INTO Statut Values ("STTAR", "Adhérent avec Remboursement");

CREATE TABLE  adherent(
  Id_adherent char(8) NOT NULL,
  Mdp char(100) NOT NULL,
  Mdpconfirm char(100) NOT NULL,
  Nom char(30) NOT NULL,
  Prenom char(30) NOT NULL,
  Email char(50) NOT NULL,
  DateNaissance char(20) NOT NULL,
  Adresse char(100) NOT NULL,
  Téléphone char(50) NOT NULL,
  Id_sexe int(1) NOT NULL,
  Unom  char(30) NOT NULL,
  Uprenom char(30) NOT NULL,
  Utel char(10) NOT NULL,
  Photo_profil char(100) DEFAULT "PPModele.png",
  Rib char(100) DEFAULT "RIBModele.pdf",
  CertificatMedical char(100) DEFAULT "CMModele.pdf",
  Licence char(100) DEFAULT "LicenceModele.pdf",
  Clef char(100),
  Validation boolean DEFAULT false,
  CONSTRAINT pk_adherent PRIMARY KEY (Id_adherent),
  CONSTRAINT fk_adherentSexe FOREIGN KEY (Id_sexe) REFERENCES Sexe(Id_sexe)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO adherent Values ("ADMINLUN", "LK6SGK5hHK9FI","LK6SGK5hHK9FI","Admin","Boss","admin@yahoo.fr","01/10/1999","59 ter rue Eugène Lefebvre","0666556293",2,"Kuster","Lunuel","0666556293",DEFAULT,DEFAULT,DEFAULT,DEFAULT,DEFAULT,"nhgyhfkjhliefhdjkljd",DEFAULT);

CREATE TABLE  admin(
  Id_admin char(8) NOT NULL,
  Pseudo char(100) NOT NULL,
  Mdp char(100) NOT NULL,
  CONSTRAINT pk_admin PRIMARY KEY (Id_admin)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO admin Values ("ADMINYTB", "admin", "admin");

CREATE TABLE  sexe(
  Id_sexe int(1) NOT NULL,
  Sexe char(100) NOT NULL,
  CONSTRAINT pk_sexe PRIMARY KEY (Id_sexe)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO sexe Values (1, "Femme");
INSERT INTO sexe Values (2, "Homme");




CREATE TABLE  taille(
  Id_taille int(2) NOT NULL,
  libelle_taille char(20) NOT NULL,
  CONSTRAINT pk_taille PRIMARY KEY (Id_taille)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO taille Values (1,"S");
INSERT INTO taille Values (2,"M");
INSERT INTO taille Values (3,"L");
INSERT INTO taille Values (4,"XS");
INSERT INTO taille Values (5,"XL");
INSERT INTO taille Values (6,"XXL");


CREATE TABLE  article(
  Id_article char(8) NOT NULL,
  Titre_Article text NOT NULL,
  DateArticle date,
  Contenu text NOT NULL,
  CONSTRAINT pk_article PRIMARY KEY (Id_article)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE galerie(
  Id_galerie char(8) NOT NULL,
  Id_course char(8),
  CONSTRAINT pk_galerie PRIMARY KEY (Id_galerie),
  CONSTRAINT fk_galerie FOREIGN KEY (Id_course ) REFERENCES Course(Id_course)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO galerie Values ("NHGDCGU","JHF5VD4");

CREATE TABLE photos_galerie(
  Id_photosgalerie char(8) NOT NULL,
  Id_galerie char(8) NOT NULL,
  url char(100),
  CONSTRAINT pk_photosgalerie PRIMARY KEY (Id_galerie),
  CONSTRAINT fk_photosgaleriet FOREIGN KEY (Id_galerie) REFERENCES Galerie(Id_galerie)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO photos_galerie Values ("JJGFDJ","NHGDCGU","GLocodutieux.jpg");

CREATE TABLE  course(
  Id_course char(8) NOT NULL,
  libelle char(100),
  Saison int(4),
  CompteRendu char(100),
  Resultats char(100),
  Siteweb char(100),
  CONSTRAINT pk_course PRIMARY KEY (Id_course)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO course Values ("sllzfz","Trail de la Loco du Trieux",2018,"CRLocodutieux.pdf","ResLocodutieux.png","http://www.lalocodutrieux.com/");


CREATE TABLE  type_vetement(
  Id_typeVetement char(8) NOT NULL,
  Libelle char(100) NOT NULL,
  Url char(100) NOT NULL,
  Prix int(3) NOT NULL,
  Id_sexe int(1) NOT NULL,
  Details char (200),
  CONSTRAINT pk_TypeVetement PRIMARY KEY (Id_typeVetement),
    CONSTRAINT fk_typeAdherentSexe FOREIGN KEY (Id_sexe) REFERENCES Sexe(Id_sexe)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO type_vetement Values ("TYPEVET1",'DEBARDEUR F',"Erima-debardeur.jpg",22,1,"Le débardeur ultra léger pour les longues distances !");
INSERT INTO type_vetement Values ("TYPEVET2",'T-shirt PERFORMANCE F',"Erima-t-shirt.jpg",22,1,"Le t-shirt ultra léger pour les longues distances !");
INSERT INTO type_vetement Values ("TYPEVET3",'Polo F',"Erima-polo.jpg",44,1,"Le polo ultra léger pour les longues distances !");

CREATE TABLE commande(
  Id_commande char(8) NOT NULL,
  Id_adherent char(8) NOT NULL,
  Id_typeVetement char(8) NOT NULL,
  Id_taille int(2) NOT NULL,
  DateCommande date,
  Id_statutCommande int(1) NOT NULL DEFAULT 1,
  CONSTRAINT pk_commandee PRIMARY KEY (Id_commande),
  CONSTRAINT fk_adherentC FOREIGN KEY (Id_adherent) REFERENCES adherent(Id_adherent),
  CONSTRAINT fk_type_vetementC FOREIGN KEY (Id_typeVetement) REFERENCES type_vetement(Id_typeVetement),
  CONSTRAINT fk_tailleC FOREIGN KEY (Id_taille) REFERENCES taille(Id_taille),
  CONSTRAINT fk_statutCommandeC FOREIGN KEY (Id_statutCommande) REFERENCES STcommande(Id_statutCommande )
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE STcommande(
  Id_statutCommande int(1) NOT NULL,
  libelleCommande char(40) NOT NULL,
  CONSTRAINT pk_statutCommande PRIMARY KEY (Id_statutCommande)
   ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO STcommande Values (1,"effectuée");
INSERT INTO STcommande Values (2,"payée");
INSERT INTO STcommande Values (3,"distribuée");

CREATE TABLE questionnaire(
  Id_questionnaire char(8) NOT NULL,
  Libelle_questionnaire char(200),
  CONSTRAINT pk_questionnaire PRIMARY KEY (Id_questionnaire)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO questionnaire Values ("QSRE1","Niveau Adhérent");

CREATE TABLE cat_questionnaire(
  Id_cat_questionnaire char(3) NOT NULL,
  Libelle_cat_questionnaire char(200),
  link char(200),
  CONSTRAINT pk_cat_questionnaire  PRIMARY KEY (Id_cat_questionnaire)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO cat_questionnaire Values ("C1","Condition physique","Condition_Physique");
INSERT INTO cat_questionnaire Values ("C2","Motivation","Motivation");
INSERT INTO cat_questionnaire Values ("C3","Entraînement","Entrainement");
INSERT INTO cat_questionnaire Values ("C4","Compétition","Competition");
INSERT INTO cat_questionnaire Values ("C5","Connaissances","Connaissances");


CREATE TABLE checkbox_questionnaire(
  Id_checkbox_questionnaire char(8) NOT NULL,
  Libelle_checkbox_questionnaire char(200),
  CONSTRAINT pk_checkbox_questionnaire  PRIMARY KEY (Id_checkbox_questionnaire)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO checkbox_questionnaire Values ("CHECK1","Faible (aucune activité physique pratiquée régulièrement)");
INSERT INTO checkbox_questionnaire Values ("CHECK2","Moyenne (pratique ou a pratiqué un autre sport, est capable de courir 30' sans s'arrêter)");
INSERT INTO checkbox_questionnaire Values ("CHECK3","Bonne");
INSERT INTO checkbox_questionnaire Values ("CHECK4","Recherche de mieux-être (perdre du poids, cesser de fumer)");
INSERT INTO checkbox_questionnaire Values ("CHECK5","Recherche d'une activité physique individuelle sans contrainte");
INSERT INTO checkbox_questionnaire Values ("CHECK6","Recherche d'un groupe pour partager le plaisir de la course à pied");
INSERT INTO checkbox_questionnaire Values ("CHECK7","Amélioration de son niveau");
INSERT INTO checkbox_questionnaire Values ("CHECK8","La compétition");
INSERT INTO checkbox_questionnaire Values ("CHECK9","Recherche de la convivialité des courses hors stades");
INSERT INTO checkbox_questionnaire Values ("CHECK10","Autre");
INSERT INTO checkbox_questionnaire Values ("CHECK11","1 à 2 fois par semaines");
INSERT INTO checkbox_questionnaire Values ("CHECK12","1 à 3 fois par semaines");
INSERT INTO checkbox_questionnaire Values ("CHECK13","plus...");
INSERT INTO checkbox_questionnaire Values ("CHECK14","Aucune");
INSERT INTO checkbox_questionnaire Values ("CHECK15","Occasionnelles sur des compétitions populaires");
INSERT INTO checkbox_questionnaire Values ("CHECK16","Plus concerné par le défi personnel de terminer la course que le classement et la performance");
INSERT INTO checkbox_questionnaire Values ("CHECK17","Lecture de revues");
INSERT INTO checkbox_questionnaire Values ("CHECK18","Conseil d'amis...");

CREATE TABLE liaison_questionnaire(
    Id_questionnaire char(8) NOT NULL,
    Id_cat_questionnaire char(3) NOT NULL,
    Id_checkbox_questionnaire char(8) NOT NULL,
  CONSTRAINT pk_liaison_questionnaire  PRIMARY KEY (Id_checkbox_questionnaire,Id_questionnaire,Id_cat_questionnaire),
  CONSTRAINT fk_liasonQ_questionnaire FOREIGN KEY  (Id_questionnaire) REFERENCES questionnaire(Id_questionnaire),
  CONSTRAINT fk_liaisonQ_cat_questionnaire FOREIGN KEY  (Id_cat_questionnaire) REFERENCES cat_questionnaire(Id_cat_questionnaire),
  CONSTRAINT fk_liaisonQ_checkbox_questionnaire FOREIGN KEY  (Id_checkbox_questionnaire) REFERENCES checkbox_questionnaire(Id_checkbox_questionnaire )
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO liaison_questionnaire Values ("QSRE1","C1","CHECK1");
INSERT INTO liaison_questionnaire Values ("QSRE1","C1","CHECK2");
INSERT INTO liaison_questionnaire Values ("QSRE1","C1","CHECK3");

INSERT INTO liaison_questionnaire Values ("QSRE1","C2","CHECK4");
INSERT INTO liaison_questionnaire Values ("QSRE1","C2","CHECK5");
INSERT INTO liaison_questionnaire Values ("QSRE1","C2","CHECK6");
INSERT INTO liaison_questionnaire Values ("QSRE1","C2","CHECK7");
INSERT INTO liaison_questionnaire Values ("QSRE1","C2","CHECK8");
INSERT INTO liaison_questionnaire Values ("QSRE1","C2","CHECK9");
INSERT INTO liaison_questionnaire Values ("QSRE1","C2","CHECK10");

INSERT INTO liaison_questionnaire Values ("QSRE1","C3","CHECK11");
INSERT INTO liaison_questionnaire Values ("QSRE1","C3","CHECK12");
INSERT INTO liaison_questionnaire Values ("QSRE1","C3","CHECK13");

INSERT INTO liaison_questionnaire Values ("QSRE1","C4","CHECK14");
INSERT INTO liaison_questionnaire Values ("QSRE1","C4","CHECK15");
INSERT INTO liaison_questionnaire Values ("QSRE1","C4","CHECK16");

INSERT INTO liaison_questionnaire Values ("QSRE1","C5","CHECK17");
INSERT INTO liaison_questionnaire Values ("QSRE1","C5","CHECK14");
INSERT INTO liaison_questionnaire Values ("QSRE1","C5","CHECK18");


CREATE TABLE res_questionnaire(
  Id_res_questionnaire char(8) NOT NULL,
  Id_adherent char(8) NOT NULL,
  Condition_Physique char(8),
  Motivation char(8),
  Entrainement char(8),
  Competition char(8),
  Connaissances char(8),
  Divers char(250),
  CONSTRAINT pk_res_questionnaire  PRIMARY KEY (Id_res_questionnaire),
  CONSTRAINT fk_res_questionnairet FOREIGN KEY  (Id_adherent) REFERENCES adherent(Id_adherent )
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE remboursement(
  Id_remboursement char(8) NOT NULL,
  Montant int(5) NOT NULL,
  Id_adherent char(8) NOT NULL,
  Id_course char(8) NOT NULL,
  Id_StatutRemboursement int(1) DEFAULT 1,
  Id_ValidationRemboursement int(1) DEFAULT 1,
  CONSTRAINT pk_reboursement PRIMARY KEY (Id_remboursement),
  CONSTRAINT fk_res_questionnairet FOREIGN KEY  (Id_adherent) REFERENCES adherent(Id_adherent )
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE StatutRemboursement(
  Id_StatutRemboursement int(1) NOT NULL,
  Libelle_StatutRemboursement char (100),
  CONSTRAINT pk_StatutRemboursement  PRIMARY KEY (Id_StatutRemboursement)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO StatutRemboursement Values (1,"en demande");
INSERT INTO StatutRemboursement Values (2,"remboursé");


CREATE TABLE ValidationRemboursement(
  Id_ValidationRemboursement int(1) NOT NULL,
  Libelle_ValidationRemboursement char (100),
  CONSTRAINT pk_ValidationRemboursement  PRIMARY KEY (Id_ValidationRemboursement)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO ValidationRemboursement Values (1,"non validé");
INSERT INTO ValidationRemboursement Values (2,"validé");

SELECT Nom,Prenom,Libelle,libelleCommande,Id_commande,libelle_taille,DateCommande,Prix,C.Id_statutCommande FROM commande as C,adherent as A,stcommande as ST,type_vetement as TV,taille as T
WHERE C.Id_adherent = A.Id_adherent AND TV.Id_typeVetement = C.Id_typeVetement AND ST.Id_statutCommande = C.Id_statutCommande AND T.Id_taille = C.Id_taille