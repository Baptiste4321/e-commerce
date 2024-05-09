INSERT into Utilisateur (Mail, Hash_mdp, Type_utilisateur, Date_de_naissance, Nom, Prenom)
VALUES ('client@example.com', 'smdfgsdfg', "client", '2000-01-01', 'Michelle', 'trou');

INSERT into Utilisateur (Mail, Hash_mdp, Type_utilisateur, Date_de_naissance, Nom, Prenom)
VALUES ('admin@example.com', '$2y$10$XqSNTHAWqvUPk5FWKoA/luCjkKX3pWnZYsgoSQDF2nWi1AYlHk3ZW', "admin", '2000-01-01', 'Bernard', 'Malin');

INSERT into produit(ID_produit, Nom, Description, Prix, Stock_disponible, promotion, sexe, Taille)
VALUES ('1', 'T-shirt','rien','100','40','oui','homme','L' );

INSERT into produit(ID_produit, Nom, Description, Prix, Stock_disponible, promotion, sexe, Taille)
VALUES ('2', 'Pantalon','rien','90','25','non','femme','XL' );

INSERT INTO Produit (Nom, Description, Prix, Stock_disponible, promotion, sexe, Taille, nb_image) VALUES
                                                                                                      ('T-shirt blanc', 'Un t-shirt blanc classique', 15.99, 50, 'Non', 'Unisexe', 'M', 1),
                                                                                                      ('Jeans noir', 'Un jean noir tendance', 29.99, 30, 'Oui', 'Homme', 'L', 1),
                                                                                                      ('Robe rouge', 'Une belle robe rouge pour les occasions spéciales', 49.99, 20, 'Non', 'Femme', 'M', 1),
                                                                                                      ('Chaussures de sport', 'Des chaussures de sport confortables', 59.99, 40, 'Non', 'Unisexe', '40', 1),
                                                                                                      ('Sac à dos', 'Un sac à dos robuste pour le quotidien', 39.99, 60, 'Oui', 'Unisexe', 'N/A', 1),
                                                                                                      ('Chemise à carreaux', 'Une chemise à carreaux élégante', 24.99, 35, 'Non', 'Homme', 'XL', 1),
                                                                                                      ('Jupe en denim', 'Une jupe en denim tendance', 34.99, 25, 'Non', 'Femme', 'S', 1),
                                                                                                      ('Casquette de baseball', 'Une casquette de baseball classique', 19.99, 70, 'Non', 'Unisexe', 'N/A', 1),
                                                                                                      ('Veste en cuir', 'Une veste en cuir de qualité', 89.99, 15, 'Oui', 'Homme', 'L', 1),
                                                                                                      ('Bottes en cuir', 'Des bottes en cuir élégantes', 79.99, 10, 'Non', 'Femme', '38', 1),
                                                                                                      ('Chemise à rayures', 'Une chemise à rayures élégante', 29.99, 45, 'Non', 'Homme', 'M', 1),
                                                                                                      ('Baskets blanches', 'Des baskets blanches classiques', 49.99, 55, 'Non', 'Unisexe', '39', 1),
                                                                                                      ('Manteau long', 'Un manteau long et chaud pour l hiver', 79.99, 25, 'Oui', 'Femme', 'S', 1),
                                                                                                      ('Short en jean', 'Un short en jean décontracté', 19.99, 65, 'Non', 'Homme', 'L', 1),
                                                                                                      ('Robe noire', 'Une petite robe noire indispensable', 39.99, 30, 'Non', 'Femme', 'M', 1),
                                                                                                      ('Chaussures habillées', 'Des chaussures habillées pour les occasions spéciales', 69.99, 20, 'Non', 'Homme', '42', 1),
                                                                                                      ('Sac à main', 'Un sac à main élégant pour toutes les occasions', 59.99, 40, 'Non', 'Femme', 'N/A', 1),
                                                                                                      ('Veste légère', 'Une veste légère parfaite pour le printemps', 49.99, 50, 'Oui', 'Unisexe', 'XL', 1),
                                                                                                      ('Pantalon de survêtement', 'Un pantalon de survêtement confortable', 34.99, 35, 'Non', 'Unisexe', 'M', 1);
INSERT INTO Utilisateur (Mail, Hash_mdp, Type_utilisateur, Date_de_naissance, Nom, Prenom) VALUES
                                                                                               ('baptiste.chesnot@gmail.com', '1234', 'client', '1990-01-01', 'Chesnot', 'Baptiste'),
                                                                                               ('utilisateur2@example.com', 'hash2', 'client', '1991-02-02', 'Smith', 'Alice'),
                                                                                               ('utilisateur3@example.com', 'hash3', 'client', '1992-03-03', 'Johnson', 'Bob'),
                                                                                               ('utilisateur4@example.com', 'hash4', 'client', '1993-04-04', 'Brown', 'Emily'),
                                                                                               ('utilisateur5@example.com', 'hash5', 'client', '1994-05-05', 'Wilson', 'Mike'),
                                                                                               ('utilisateur6@example.com', 'hash6', 'client', '1995-06-06', 'Taylor', 'Sarah'),
                                                                                               ('utilisateur7@example.com', 'hash7', 'client', '1996-07-07', 'Anderson', 'Laura'),
                                                                                               ('utilisateur8@example.com', 'hash8', 'client', '1997-08-08', 'Thomas', 'David'),
                                                                                               ('utilisateur9@example.com', 'hash9', 'client', '1998-09-09', 'Jackson', 'Jessica'),
                                                                                               ('utilisateur10@example.com', 'hash10', 'client', '1999-10-10', 'White', 'Chris');



