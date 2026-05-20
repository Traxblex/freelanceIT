-- Exécute ce script dans phpMyAdmin pour ajouter la table messages
USE freelanceIT;

CREATE TABLE IF NOT EXISTS messages (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_expediteur int(11) NOT NULL,
  id_destinataire int(11) NOT NULL,
  sujet varchar(255) NOT NULL,
  contenu text NOT NULL,
  date_envoi datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  lu tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  FOREIGN KEY (id_expediteur) REFERENCES utilisateurs(id) ON DELETE CASCADE,
  FOREIGN KEY (id_destinataire) REFERENCES utilisateurs(id) ON DELETE CASCADE
);
