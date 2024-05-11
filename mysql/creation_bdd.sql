-- Supprimer la base de données si elle existe
DROP DATABASE IF EXISTS ECOMMERCE;

-- Créer une nouvelle base de données
CREATE DATABASE ECOMMERCE;

-- Utiliser la base de données nouvellement créée
USE ECOMMERCE;

-- Supprimer les tables si elles existent déjà
DROP TABLE IF EXISTS Utilisateur;
DROP TABLE IF EXISTS Domicile;
DROP TABLE IF EXISTS Produit;
DROP TABLE IF EXISTS Facture;
DROP TABLE IF EXISTS Panier;
DROP TABLE IF EXISTS Produit_dans_panier;
DROP TABLE IF EXISTS Commande;
DROP TABLE IF EXISTS Ligne_de_commande;

-- Créer la table Utilisateur
CREATE TABLE Utilisateur(

    Mail VARCHAR(50) NOT NULL,
    Hash_mdp VARCHAR(255) NOT NULL,
    Type_utilisateur VARCHAR(50) NOT NULL,
    Nom VARCHAR(50) NOT NULL,
    Prenom VARCHAR(50) NOT NULL,
    Date_de_naissance DATE NOT NULL,
    Pays VARCHAR(30),
    Code_postal INT(5),
    Ville VARCHAR(30),
    Rue VARCHAR(30),
    Num_rue int(3),
    Info_sup VARCHAR(200),
    CONSTRAINT Utilisateur_PK PRIMARY KEY (Mail)
)ENGINE=InnoDB;


-- Créer la table Produit
CREATE TABLE Produit (
    ID_produit INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(255),
    Description TEXT,
    Prix DECIMAL(10, 2),
    Promotion VARCHAR(3),
    Sexe VARCHAR(255),
    
    nb_image INT,
    Mail VARCHAR(50),
    FOREIGN KEY (Mail) REFERENCES Utilisateur(Mail)
);

-- Créer la table Taille_produit
CREATE TABLE Taille_produit (
    ID_produit INT,
    Taille VARCHAR(10),
    Stock_disponible INT,
    PRIMARY KEY (ID_produit, Taille),
    FOREIGN KEY (ID_produit) REFERENCES Produit(ID_produit)
);

-- Créer la table Panier
CREATE TABLE Panier (
    ID_panier INT AUTO_INCREMENT PRIMARY KEY,
    Mail VARCHAR(50),
    Date_creation DATETIME,
    FOREIGN KEY (Mail) REFERENCES Utilisateur(Mail)
);

-- Créer la table Produit_dans_panier
CREATE TABLE Produit_dans_panier (
    ID_produit_dans_panier INT AUTO_INCREMENT PRIMARY KEY,
    ID_panier INT,
    ID_produit INT,
    Quantite INT,
    Taille VARCHAR (20),
    
    FOREIGN KEY (ID_panier) REFERENCES Panier(ID_panier),
    FOREIGN KEY (ID_produit) REFERENCES Produit(ID_produit)
    
);



-- Créer la table Facture
CREATE TABLE Facture (
    ID_facture INT AUTO_INCREMENT PRIMARY KEY,
    Mail VARCHAR(50) NOT NULL,
    Date_facturation DATETIME,
    Prixtotal DECIMAL,
    FOREIGN KEY (Mail) REFERENCES Utilisateur(Mail)
);

CREATE TABLE Contenu_Facture (
    ID_contenu_facture INT AUTO_INCREMENT PRIMARY KEY,
    ID_facture INT,
    ID_produit  INT,
    Taille VARCHAR(50),
    Quantité INT,

    
    FOREIGN KEY (ID_facture) REFERENCES Facture(ID_facture),
    FOREIGN KEY (ID_produit ) REFERENCES Produit(ID_produit)
);




-- Créer le déclencheur pour créer un panier pour chaque nouvel utilisateur
DELIMITER //
CREATE TRIGGER CreerPanierUtilisateur AFTER INSERT ON Utilisateur
FOR EACH ROW
BEGIN
    INSERT INTO Panier (Mail, Date_creation) VALUES (NEW.Mail, NOW());
END;
//

DELIMITER ;


-- Créer le déclencheur pour ajouter un produit à la table Taille_produit avec une taille par défaut et une quantité par défaut
DELIMITER //

CREATE TRIGGER AjouterProduitTailleProduit AFTER INSERT ON Produit
FOR EACH ROW
BEGIN
    -- Ajouter une entrée dans la table Taille_produit pour la taille par défaut 'L' avec une quantité par défaut de 10
    INSERT INTO Taille_produit (ID_produit, Taille, Stock_disponible) VALUES (NEW.ID_produit, 'L', 10);
END;
//



