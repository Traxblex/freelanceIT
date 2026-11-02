-- Import these tables into the database provisioned for the site in HebMat.

CREATE TABLE utilisateurs (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL,
    date_inscription DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE entreprises (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur INT NOT NULL,
    Nom_entreprise VARCHAR(255) NOT NULL,
    siret VARCHAR(14) NOT NULL,
    description TEXT DEFAULT NULL,
    adresse VARCHAR(255) NOT NULL,
    CONSTRAINT fk_entreprises_utilisateurs
        FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE profils_freelances (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur INT NOT NULL,
    titre_profil VARCHAR(255) DEFAULT NULL,
    description TEXT DEFAULT NULL,
    competences TEXT DEFAULT NULL,
    localisation VARCHAR(255) DEFAULT NULL,
    tarif_horaire INT DEFAULT NULL,
    cv_url VARCHAR(255) DEFAULT NULL,
    disponibilite TINYINT(1) DEFAULT 1,
    exp VARCHAR(255) DEFAULT NULL,
    photo VARCHAR(255) DEFAULT NULL,
    CONSTRAINT fk_profils_utilisateurs
        FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE missions (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_entreprise INT NOT NULL,
    titre VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    budget INT DEFAULT NULL,
    statut VARCHAR(50) DEFAULT 'ouvert',
    date_creation DATE NOT NULL,
    competences_requises TEXT DEFAULT NULL,
    duree VARCHAR(255) NOT NULL DEFAULT 'indéterminée',
    CONSTRAINT fk_missions_entreprises
        FOREIGN KEY (id_entreprise) REFERENCES entreprises(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE candidatures (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_mission INT NOT NULL,
    id_freelance INT NOT NULL,
    proposition TEXT DEFAULT NULL,
    tarif_propose INT DEFAULT NULL,
    delai_livraison VARCHAR(255) DEFAULT NULL,
    statut VARCHAR(50) DEFAULT 'en_attente',
    date_postulation DATE NOT NULL,
    CONSTRAINT fk_candidatures_missions
        FOREIGN KEY (id_mission) REFERENCES missions(id) ON DELETE CASCADE,
    CONSTRAINT fk_candidatures_profils
        FOREIGN KEY (id_freelance) REFERENCES profils_freelances(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE messages (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_expediteur INT NOT NULL,
    id_destinataire INT NOT NULL,
    sujet VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL,
    date_envoi DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    lu TINYINT(1) NOT NULL DEFAULT 0,
    CONSTRAINT fk_messages_expediteur
        FOREIGN KEY (id_expediteur) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    CONSTRAINT fk_messages_destinataire
        FOREIGN KEY (id_destinataire) REFERENCES utilisateurs(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
