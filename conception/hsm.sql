-- Supprimer et recréer la base
DROP DATABASE IF EXISTS hsmdb;
CREATE DATABASE IF NOT EXISTS hsmdb;
USE hsmdb;

-- Table USERS (anciennement user)
CREATE TABLE IF NOT EXISTS users (
  iduser CHAR(36) NOT NULL, -- UUID ou identifiant fixe
  nom_complet VARCHAR(100) NULL,
  email VARCHAR(150) NULL,
  telephone VARCHAR(20) NULL,
  adresse TEXT NULL,
  cni TEXT NULL,
  profil TEXT NULL,
  `role` VARCHAR(50) NULL,
  `password` VARCHAR(255) NULL,
  domaine_tech VARCHAR(100) NULL,
  attestation_cv TEXT NULL,
  created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (iduser)
);

-- Table NOTIFICATION
CREATE TABLE IF NOT EXISTS `notification` (
  idnotification INT NOT NULL AUTO_INCREMENT,
  iduser CHAR(36) NOT NULL,
  objet VARCHAR(150) NULL,
  `description` TEXT NULL,
  statut VARCHAR(20) NULL,
  created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (idnotification),
  FOREIGN KEY (iduser) REFERENCES users (iduser)
);

-- Table TACHE
CREATE TABLE IF NOT EXISTS tache (
  idtache INT NOT NULL AUTO_INCREMENT,
  iduser CHAR(36) NOT NULL,
  iduser_tech CHAR(36) NOT NULL,
  reference VARCHAR(50) NULL,
  intitule VARCHAR(150) NULL,
  `description` TEXT NULL,
  email_tech VARCHAR(150) NULL,
  email_client VARCHAR(150) NULL,
  date_intervention DATETIME NULL,
  lieu_intervention VARCHAR(250),
  statut VARCHAR(20) NULL,
  created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (idtache),
  FOREIGN KEY (iduser) REFERENCES users (iduser),
  FOREIGN KEY (iduser_tech) REFERENCES users (iduser)
);


-- Table PAIEMENT
CREATE TABLE IF NOT EXISTS paiement (
  idpaiement INT NOT NULL AUTO_INCREMENT,
  idtache INT NOT NULL,
  motif TEXT NULL,
  intitule TEXT NULL,
  montant DECIMAL(10,2) NULL,
  created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (idpaiement),
  FOREIGN KEY (idtache) REFERENCES tache (idtache)
);

-- Table DEVIS
CREATE TABLE IF NOT EXISTS devis (
  iddevis INT NOT NULL AUTO_INCREMENT,
  idtache INT NOT NULL,
  diagnostic TEXT NULL,
  materiels TEXT NULL,
  main_oeuvre INT NULL,
  date_debut DATETIME NULL,
  date_fin DATETIME NULL,
  duree INT NULL,
  created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (iddevis),
  FOREIGN KEY (idtache) REFERENCES tache (idtache)
);

-- Table AVIS
CREATE TABLE IF NOT EXISTS avis (
  idavis INT NOT NULL AUTO_INCREMENT,
  iduser_auteur CHAR(36) NOT NULL,
  iduser_cible CHAR(36) NOT NULL,
  idtache INT NOT NULL,
  intitule VARCHAR(150),
  note VARCHAR(10) NULL,
  commentaires TEXT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (idavis),
  FOREIGN KEY (iduser_auteur) REFERENCES users (iduser),
  FOREIGN KEY (idtache) REFERENCES tache (idtache)
  FOREIGN KEY (iduser_cible) REFERENCES users (iduser),
);

-- Table FRAIS
CREATE TABLE IF NOT EXISTS frais (
  idfrais INT NOT NULL AUTO_INCREMENT,
  iddevis INT NOT NULL,
  montant DECIMAL(10,2) NULL,
  intitule VARCHAR(150) NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (idfrais),
  FOREIGN KEY (iddevis) REFERENCES devis (iddevis)
);
