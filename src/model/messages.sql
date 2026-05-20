-- Exécute ce script dans phpMyAdmin pour ajouter la table messages
USE freelanceIT;

CREATE TABLE IF NOT EXISTS messages (
  id              INT(11)      NOT NULL AUTO_INCREMENT,
  id_expediteur   INT(11)      NOT NULL,
  id_destinataire INT(11)      NOT NULL,
  sujet           VARCHAR(255) NOT NULL,
  contenu         TEXT         NOT NULL,
  date_envoi      DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  lu              TINYINT(1)   NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  FOREIGN KEY (id_expediteur)   REFERENCES utilisateurs(id) ON DELETE CASCADE,
  FOREIGN KEY (id_destinataire) REFERENCES utilisateurs(id) ON DELETE CASCADE
);
