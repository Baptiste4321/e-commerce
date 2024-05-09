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
<<<<<<< HEAD
    Mail VARCHAR(50) NOT NULL,
    Hash_mdp VARCHAR(50) NOT NULL,
    Type_utilisateur VARCHAR(50) NOT NULL,
    Date_de_naissance DATE NOT NULL,
    Nom VARCHAR(50) NOT NULL,
    Prenom VARCHAR(50) NOT NULL,
    CONSTRAINT Utilisateur_PK PRIMARY KEY (Mail)
) ENGINE=InnoDB;
=======
                            Mail              Varchar (50) NOT NULL ,
                            Hash_mdp          Varchar (255) NOT NULL ,
                            Type_utilisateur  Varchar (50) NOT NULL ,
                            Date_de_naissance Date NOT NULL ,
                            Nom               Varchar (50) NOT NULL ,
                            Prenom            Varchar (50) NOT NULL,
                            CONSTRAINT Utilisateur_PK PRIMARY KEY (Mail)
)ENGINE=InnoDB;
>>>>>>> 98498b6f6280af5c3f36efaa886294f42081a6cb

-- Créer la table Domicile
CREATE TABLE Domicile(
    Pays VARCHAR(50),
    Nbr_rue VARCHAR(50),
    Rue VARCHAR(50),
    Ville VARCHAR(50),
    Code_postale INT,
    Mail VARCHAR(50),
    PRIMARY KEY (Mail),
    FOREIGN KEY (Mail) REFERENCES Utilisateur(Mail)
);

-- Créer la table Produit
CREATE TABLE Produit (
<<<<<<< HEAD
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
=======
                         ID_produit INT AUTO_INCREMENT PRIMARY KEY,
                         Nom VARCHAR(255),
                         Description TEXT,
                         Prix DECIMAL(10, 2),
                         Stock_disponible INT,
                         promotion Varchar(3),
                         sexe VARCHAR(255),
                         Taille VARCHAR(255),
                         nb_image INT
);
>>>>>>> 98498b6f6280af5c3f36efaa886294f42081a6cb

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
    Mail VARCHAR(50),
    FOREIGN KEY (ID_panier) REFERENCES Panier(ID_panier),
    FOREIGN KEY (ID_produit) REFERENCES Produit(ID_produit),
    FOREIGN KEY (Mail) REFERENCES Utilisateur(Mail)
);

-- Créer la table Commande
CREATE TABLE Commande (
    ID_commande INT AUTO_INCREMENT PRIMARY KEY,
    Mail VARCHAR(50),
    Date_commande DATETIME,
    Statut VARCHAR(50),
    FOREIGN KEY (Mail) REFERENCES Utilisateur(Mail)
);

-- Créer la table Ligne_de_commande
CREATE TABLE Ligne_de_commande (
    ID_ligne_commande INT AUTO_INCREMENT PRIMARY KEY,
    ID_commande INT,
    ID_produit INT,
    Quantite INT,
    Prix_unitaire DECIMAL(10, 2),
    FOREIGN KEY (ID_commande) REFERENCES Commande(ID_commande),
    FOREIGN KEY (ID_produit) REFERENCES Produit(ID_produit)
);

-- Créer la table Facture
CREATE TABLE Facture (
    ID_facture INT AUTO_INCREMENT PRIMARY KEY,
    ID_commande INT,
    Date_facturation DATETIME,
    Total DECIMAL(10, 2),
    FOREIGN KEY (ID_commande) REFERENCES Commande(ID_commande)
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

DELIMITER ;
