-- Utilisation de la base de données
USE achatvehicule;

-- Insérer des données dans la table PROPRIETAIRES
INSERT INTO proprietaires (nom, prenom, adresse, ville, code_postal) VALUES
('Dupont', 'Jean', '123 Rue Principale', 'Paris', '75000'),
('Martin', 'Claire', '45 Avenue des Champs', 'Lyon', '69000'),
('Durand', 'Pierre', '67 Boulevard de la République', 'Marseille', '13000'),
('Bernard', 'Sophie', '12 Impasse des Lilas', 'Bordeaux', '33000'),
('Lefevre', 'Louis', '89 Chemin Vert', 'Nice', '06000'),
('Rousseau', 'Elodie', '34 Rue des Fleurs', 'Toulouse', '31000'),
('Moreau', 'Julien', '21 Rue de la Paix', 'Nantes', '44000'),
('Fournier', 'Marie', '77 Avenue Victor Hugo', 'Lille', '59000'),
('Girard', 'Thomas', '15 Boulevard Haussmann', 'Paris', '75009'),
('Bonnet', 'Isabelle', '53 Rue de Rivoli', 'Paris', '75004'),
('Garnier', 'Emilie', '99 Rue Saint-Honoré', 'Paris', '75001'),
('Chevalier', 'Luc', '5 Avenue de la République', 'Strasbourg', '67000'),
('Moulin', 'Alice', '3 Rue de la Gare', 'Grenoble', '38000'),
('Robin', 'Nicolas', '8 Rue des Ecoles', 'Rouen', '76000'),
('Morel', 'Camille', '22 Avenue de la Liberté', 'Rennes', '35000'),
('Laurent', 'Hugo', '10 Rue du Château', 'Tours', '37000'),
('Simon', 'Charlotte', '9 Rue des Jardins', 'Le Havre', '76600'),
('Michel', 'Mathieu', '11 Rue de la République', 'Reims', '51100'),
('Leroy', 'Anna', '14 Rue Victor Hugo', 'Saint-Etienne', '42000'),
('Roux', 'Lucas', '7 Rue des Vosges', 'Mulhouse', '68100');

-- Insérer des données dans la table MODELES
INSERT INTO modeles (modele, marque, carburant) VALUES
('Clio', 'Renault', 'essence'),
('208', 'Peugeot', 'diesel'),
('Model S', 'Tesla', 'électrique'),
('Golf', 'Volkswagen', 'gpl'),
('Civic', 'Honda', 'essence'),
('Leaf', 'Nissan', 'électrique'),
('Fiesta', 'Ford', 'diesel'),
('Astra', 'Opel', 'gpl'),
('308', 'Peugeot', 'essence'),
('Corsa', 'Opel', 'diesel'),
('Prius', 'Toyota', 'électrique'),
('A3', 'Audi', 'essence'),
('Focus', 'Ford', 'diesel'),
('Megane', 'Renault', 'essence'),
('Yaris', 'Toyota', 'essence'),
('Octavia', 'Skoda', 'gpl'),
('Impreza', 'Subaru', 'essence'),
('CX-5', 'Mazda', 'diesel'),
('Qashqai', 'Nissan', 'essence'),
('Passat', 'Volkswagen', 'gpl');


-- Insérer des données dans la table VOITURES
INSERT INTO voitures (immatriculation, id_modele, couleur, datevoiture) VALUES
('AB123CD', 1, 'CL', '2023-01-15'),
('EF456GH', 2, 'MO', '2022-06-10'),
('IJ789KL', 3, 'FO', '2021-11-25'),
('MN012OP', 4, 'CL', '2022-08-13'),
('QR345ST', 5, 'MO', '2023-03-19'),
('UV678WX', 6, 'FO', '2021-10-05'),
('YZ123AB', 7, 'CL', '2023-04-22'),
('CD456EF', 8, 'MO', '2022-07-15'),
('GH789IJ', 9, 'FO', '2021-12-20'),
('KL012MN', 10, 'CL', '2022-09-18'),
('OP345QR', 11, 'MO', '2023-05-12'),
('ST678UV', 12, 'FO', '2021-11-30'),
('WX123YZ', 13, 'CL', '2023-06-10'),
('AB456CD', 14, 'MO', '2022-08-05'),
('EF789GH', 15, 'FO', '2021-09-25'),
('IJ012KL', 16, 'CL', '2022-07-30'),
('MN345OP', 17, 'MO', '2023-03-07'),
('QR678ST', 18, 'FO', '2021-11-12'),
('UV901WX', 19, 'CL', '2023-01-18'),
('YZ234AB', 20, 'MO', '2022-05-14');

-- Insérer des données dans la table CARTESGRISES
INSERT INTO cartesgrises (id_personne, immatriculation, dateCarte) VALUES
(1, 'AB123CD', '2023-02-01'),
(2, 'EF456GH', '2022-07-01'),
(3, 'IJ789KL', '2021-12-01'),
(4, 'MN012OP', '2022-09-01'),
(5, 'QR345ST', '2023-04-01'),
(6, 'UV678WX', '2021-11-01'),
(7, 'YZ123AB', '2023-05-01'),
(8, 'CD456EF', '2022-08-01'),
(9, 'GH789IJ', '2022-01-01'),
(10, 'KL012MN', '2022-10-01'),
(11, 'OP345QR', '2023-06-01'),
(12, 'ST678UV', '2021-12-01'),
(13, 'WX123YZ', '2023-07-01'),
(14, 'AB456CD', '2022-09-01'),
(15, 'EF789GH', '2021-10-01'),
(16, 'IJ012KL', '2022-08-01'),
(17, 'MN345OP', '2023-04-01'),
(18, 'QR678ST', '2021-12-01'),
(19, 'UV901WX', '2023-02-01'),
(20, 'YZ234AB', '2022-06-01');
