-- Supprimer et recréer la base
DROP DATABASE IF EXISTS hsm;
CREATE DATABASE IF NOT EXISTS hsm;
USE hsm;

-- Table USERS (anciennement user)
CREATE TABLE IF NOT EXISTS users (
  iduser CHAR(36) NOT NULL, -- UUID ou identifiant fixe
  iddomaine INT NULL,
  nom VARCHAR(100) NULL,
  prenom VARCHAR(100) NULL,
  adresse TEXT NULL,
  telephone VARCHAR(20) NULL,
  email VARCHAR(150) NULL,
  `password` VARCHAR(255) NULL,
  `role` VARCHAR(50) NULL,
  media TEXT NULL,
  cni TEXT NULL,
  attestation_cv TEXT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (iduser)
);

-- Table DOMAINE
CREATE TABLE IF NOT EXISTS domaine (
  iddomaine INT NOT NULL AUTO_INCREMENT,
  intitule VARCHAR(100) NULL,
  `description` TEXT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (iddomaine)
);

-- Table NOTIFICATION
CREATE TABLE IF NOT EXISTS `notification` (
  idnotification INT NOT NULL AUTO_INCREMENT,
  iduser CHAR(36) NOT NULL,
  objet VARCHAR(150) NULL,
  `description` TEXT NULL,
  statut VARCHAR(20) NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (idnotification),
  FOREIGN KEY (iduser) REFERENCES users (iduser)
);

-- Table TACHE
CREATE TABLE IF NOT EXISTS tache (
  idtache INT NOT NULL AUTO_INCREMENT,
  iduser CHAR(36) NOT NULL,
  iduser_tech CHAR(36) NOT NULL,
  iddomaine INT NOT NULL,
  reference VARCHAR(50) NULL,
  intitule VARCHAR(150) NULL,
  `description` TEXT NULL,
  date_intervention DATETIME NULL,
  photo1 TEXT NULL,
  photo2 TEXT NULL,
  statut VARCHAR(20) NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (idtache),
  FOREIGN KEY (iduser) REFERENCES users (iduser),
  FOREIGN KEY (iduser_asso_6) REFERENCES users (iduser),
  FOREIGN KEY (iddomaine) REFERENCES domaine (iddomaine)
);

-- Table MODE de paiement
CREATE TABLE IF NOT EXISTS mode (
  idmode INT NOT NULL AUTO_INCREMENT,
  intitule VARCHAR(100) NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (idmode)
);

-- Table PAIEMENT
CREATE TABLE IF NOT EXISTS paiement (
  idpaiement INT NOT NULL AUTO_INCREMENT,
  idtache INT NOT NULL,
  idmode INT NOT NULL,
  motif TEXT NULL,
  montant DECIMAL(10,2) NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (idpaiement),
  FOREIGN KEY (idtache) REFERENCES tache (idtache),
  FOREIGN KEY (idmode) REFERENCES mode (idmode)
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
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (iddevis),
  FOREIGN KEY (idtache) REFERENCES tache (idtache)
);

-- Table AVIS
CREATE TABLE IF NOT EXISTS avis (
  idavis INT NOT NULL AUTO_INCREMENT,
  iduser_auteur CHAR(36) NOT NULL,
  iduser_cible CHAR(36) NOT NULL,
  idtache INT NOT NULL,
  note VARCHAR(10) NULL,
  commentaires TEXT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (idavis),
  FOREIGN KEY (iduser_auteur) REFERENCES users (iduser),
  FOREIGN KEY (idtache) REFERENCES tache (idtache)
  FOREIGN KEY (iduser_cible) REFERENCES users (iduser),
);

-- Table CATEGORIE
CREATE TABLE IF NOT EXISTS categorie (
  idcategorie INT NOT NULL AUTO_INCREMENT,
  intitule VARCHAR(100) NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (idcategorie)
);

-- Table FRAIS
CREATE TABLE IF NOT EXISTS frais (
  idfrais INT NOT NULL AUTO_INCREMENT,
  iddevis INT NOT NULL,
  idcategorie INT NOT NULL,
  montant DECIMAL(10,2) NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (idfrais),
  FOREIGN KEY (iddevis) REFERENCES devis (iddevis),
  FOREIGN KEY (idcategorie) REFERENCES categorie (idcategorie)
);

-- Ajout de la FK de users vers domaine (après création des deux tables)
ALTER TABLE users
ADD CONSTRAINT fk_user_domaine FOREIGN KEY (iddomaine) REFERENCES domaine (iddomaine);
