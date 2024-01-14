-- User Table
CREATE TABLE User (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Candidat Table
CREATE TABLE Candidat (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    photo VARCHAR(255),
    date_naiss DATE,
    sexe VARCHAR(1), 
    nationalite VARCHAR(255),
    annee_bac2 INT,
    serie VARCHAR(255),
    copie_nais VARCHAR(255),
    copie_nation VARCHAR(255),
    copie_attes_bac2 VARCHAR(255),
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES User(id)
);

-- Concours Table
CREATE TABLE Concours (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date_lim_dep DATE,
    date_conc DATE
);

-- Administrateur Table
CREATE TABLE Administrateur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);


-- Verifier si un utilisateur a postulé à un concours
SELECT * FROM User u, Candidat c
WHERE u.id = ?
AND c.id_user = ?