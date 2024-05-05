DROP DATABASE IF EXISTS ECOMMERCE;
CREATE DATABASE ECOMMERCE;
USE ECOMMERCE;
DROP TABLE IF EXISTS Utilisateur;

DROP TABLE IF EXISTS Domicile;
DROP TABLE IF EXISTS Produit;

DROP TABLE IF EXISTS Facture;

DROP TABLE IF EXISTS Panier;
DROP TABLE IF EXISTS Produit_dans_panier;

-- Table Utilisateur
CREATE TABLE Utilisateur(
                            Mail              Varchar (50) NOT NULL ,
                            Hash_mdp          Varchar (50) NOT NULL ,
                            Type_utilisateur  Varchar (50) NOT NULL ,
                            Date_de_naissance Date NOT NULL ,
                            Nom               Varchar (50) NOT NULL ,
                            Prenom            Varchar (50) NOT NULL,
                            CONSTRAINT Utilisateur_PK PRIMARY KEY (Mail)
)ENGINE=InnoDB;

CREATE table Domicile(
                         Pays Varchar(50),
                         Nbr_rue VARCHAR(50),
                         rue Varchar(50),
                         ville Varchar(50),
                         Code_postale int,
                         Mail Varchar(50),
                         PRIMARY KEY (Mail),
                         FOREIGN KEY (Mail) REFERENCES Utilisateur(Mail)
);

-- Table Produit
CREATE TABLE Produit (
                         ID_produit INT PRIMARY KEY,
                         Nom VARCHAR(255),
                         Description TEXT,
                         Prix DECIMAL(10, 2),
                         Stock_disponible INT,
                         promotion Varchar(3),
                         sexe VARCHAR(255),
                         Taille VARCHAR(255),
                         nb_image INT
);

-- Table Panier
CREATE TABLE Panier (
                        ID_panier INT AUTO_INCREMENT PRIMARY KEY,
                        Mail VARCHAR(50),
                        Date_creation DATETIME,
                        FOREIGN KEY (Mail) REFERENCES Utilisateur(Mail)
);

-- Table Produit_dans_panier
CREATE TABLE Produit_dans_panier (
                                     ID_produit_dans_panier INT PRIMARY KEY,
                                     ID_panier INT,
                                     ID_produit INT,
                                     Quantite INT,
                                     FOREIGN KEY (ID_panier) REFERENCES Panier(ID_panier),
                                     FOREIGN KEY (ID_produit) REFERENCES Produit(ID_produit)
);

-- Table Commande
CREATE TABLE Commande (
                          ID_commande INT PRIMARY KEY,
                          Mail VARCHAR(50),
                          Date_commande DATETIME,
                          Statut VARCHAR(50),
                          FOREIGN KEY (Mail) REFERENCES Utilisateur(Mail)
);

-- Table Ligne_de_commande
CREATE TABLE Ligne_de_commande (
                                   ID_ligne_commande INT PRIMARY KEY,
                                   ID_commande INT,
                                   ID_produit INT,
                                   Quantite INT,
                                   Prix_unitaire DECIMAL(10, 2),
                                   FOREIGN KEY (ID_commande) REFERENCES Commande(ID_commande),
                                   FOREIGN KEY (ID_produit) REFERENCES Produit(ID_produit)
);

-- Table Facture
CREATE TABLE Facture (
                         ID_facture INT PRIMARY KEY,
                         ID_commande INT,
                         Date_facturation DATETIME,
                         Total DECIMAL(10, 2),
                         FOREIGN KEY (ID_commande) REFERENCES Commande(ID_commande)
);

-- Créer la procédure stockée pour ajouter un produit
DELIMITER //
CREATE PROCEDURE AjouterProduit (
    IN p_Nom VARCHAR(255),
    IN p_Description TEXT,
    IN p_Prix DECIMAL(10, 2),
    IN p_Stock_disponible INT
)
BEGIN
    DECLARE isAdmin VARCHAR(50);
    SET isAdmin = (SELECT Type_utilisateur FROM Utilisateur WHERE Mail = CURRENT_USER);

    IF isAdmin = 'admin' THEN
        INSERT INTO Produit (Nom, Description, Prix, Stock_disponible)
        VALUES (p_Nom, p_Description, p_Prix, p_Stock_disponible);
ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Vous n''avez pas les droits pour effectuer cette opération.';
END IF;
END;
//
DELIMITER ;

DELIMITER //

CREATE TRIGGER CreerPanierUtilisateur AFTER INSERT ON Utilisateur
    FOR EACH ROW
BEGIN
    INSERT INTO Panier (Mail, Date_creation) VALUES (NEW.Mail, NOW());
END;
//

DELIMITER ;