CREATE DATABASE freelanceIT;
USE freelanceIT;

CREATE TABLE utilisateurs (
  id int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL,
  email varchar(255) NOT NULL unique,
  mot_de_passe varchar(255) NOT NULL,
  role varchar(50) NOT NULL,
  date_inscription date NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE entreprises (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_utilisateur int(11) NOT NULL,
  Nom_entreprise varchar(255) NOT NULL,
  siret varchar(14) NOT NULL,
  description text DEFAULT NULL,
  adresse varchar(255) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id) ON DELETE CASCADE
);

CREATE TABLE profils_freelances (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_utilisateur int(11) NOT NULL,
  titre_profil varchar(255) DEFAULT NULL,
  description text DEFAULT NULL,
  competences text DEFAULT NULL,
  localisation varchar(255) DEFAULT NULL,
  tarif_horaire int(11) DEFAULT NULL,
  cv_url varchar(255) DEFAULT NULL,
  disponibilite tinyint(1) DEFAULT 1,
  exp VARCHAR(255) DEFAULT NULL,
  photo varchar(255) DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id) ON DELETE CASCADE
);

CREATE TABLE missions (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_entreprise int(11) NOT NULL,
  titre varchar(255) NOT NULL,
  description text NOT NULL,
  budget int(11) DEFAULT NULL,
  statut varchar(50) DEFAULT 'ouvert',
  date_creation date NOT NULL,
  competences_requises text DEFAULT NULL,
  duree varchar(255) NOT NULL default 'indéterminée',
  PRIMARY KEY (id),
  FOREIGN KEY (id_entreprise) REFERENCES entreprises(id) ON DELETE CASCADE
);

CREATE TABLE candidatures (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_mission int(11) NOT NULL,
  id_utilisateur_dev int(11) NOT NULL,
  message_motivation text DEFAULT NULL,
  statut varchar(50) DEFAULT 'en_attente',
  date_postulation date NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_mission) REFERENCES missions(id) ON DELETE CASCADE,
  FOREIGN KEY (id_utilisateur_dev) REFERENCES utilisateurs(id) ON DELETE CASCADE
)