CREATE DATABASE freelanceIT;
USE freelanceIT;
CREATE TABLE utilisateurs (
  id int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL,
  email varchar(255) NOT NULL UNIQUE,
  mot_de_passe varchar(255) NOT NULL,
  role varchar(50) NOT NULL,
  date_inscription date NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; /** engine de stockage InnoDB pour les transactions et les clés étrangères, charset utf8mb4 pour supporter les emojis et les caractères spéciaux **/

CREATE TABLE entreprises (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_utilisateur int(11) NOT NULL,
  raison_sociale varchar(255) NOT NULL,
  siret varchar(14) DEFAULT NULL,
  description text DEFAULT NULL,
  adresse varchar(255) DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id) ON DELETE CASCADE /* ON DELETE CASCADE pour supprimer l'entreprise si l'utilisateur est supprimé */
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE profils_dev (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_utilisateur int(11) NOT NULL,
  titre_profil varchar(255) DEFAULT NULL,
  competences text DEFAULT NULL,
  cv_url varchar(255) DEFAULT NULL,
  est_disponible tinyint(1) DEFAULT 1,
  PRIMARY KEY (id),
  FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE administrateurs (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_utilisateur int(11) NOT NULL,
  niveau_droits varchar(50) DEFAULT 'moderateur',
  telephone_pro varchar(20) DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE missions (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_entreprise int(11) NOT NULL,
  titre varchar(255) NOT NULL,
  description text NOT NULL,
  budget int(11) DEFAULT NULL,
  statut varchar(50) DEFAULT 'en_attente',
  date_creation date NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_entreprise) REFERENCES entreprises(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;