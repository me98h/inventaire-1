	INSERT INTO emprunteur (no_emp,num_code_barre) VALUES 
	(1,'20190001'),
	(2,'20190002'),
	(3,'20190003'),
	(4,'20190004'),
	(5,'20190005'),
	(6,'20190006'),
	(7,'20190007'),
	(8,'20190008'),
	(9,'20190009'),
	(10,'20190010'),
	(11,'20190011'),
	(12,'20190012');


	INSERT INTO utilisateurs (no_emp_util, nom, prenom, mail) VALUES
	(1, 'laib', 'sonia', 'laib_sonia06@hotmail.com'),
	(2, 'el mouaouine', 'mehdi', 'mehdielmouaouine@gmail.com'),
	(3, 'ayad', 'ishak', 'ishak.ayad@gmail.com'),
	(4, 'khelfane', 'lydia', 'khelfane.lydia@gmail.com'),
	(5, 'kaced', 'yasmine', 'kaced.yasmine@gmail.com'),
	(6, 'abdelmoumen', 'djahid', 'avdelmoumen.djahid@gmail.com'),
	(7, 'galouz', 'zinedine', 'zinedine.galouz@u_cergy.fr'),
	(8, 'lemaire', 'marc', 'marc.lemaire@u_cergy.fr'),
	(9, 'derdouri', 'ibrahim', 'ibrahim.derdouri@u_cergy.fr'),
	(10, 'andriyanova', 'iryna', 'iryna.andriyanova@u_cergy.fr');

	INSERT INTO etudiant (no_util_etu, niveau, num_etu) VALUES
	(1, 'L3 informatique', '21702990'),
	(2, 'L3 informatique', '21702991'),
	(3, 'M1 informatique', '21702993'),
	(4, 'L2 informatique', '21702992'),
	(5, 'L2 informatique', '21702994'),
	(6, 'L2 informatique', '21702995');

	INSERT INTO enseignant ( no_util_ens, fonction) VALUES
	(7,'ATRE'),
	(8,'enseiganant des université'),
	(9,'maitre de conférence'),
	(10,'maitre de conférence');

	INSERT INTO groupe (no_emp_grou, nb_max_etu, nom_groupe) VALUES
	(11, 2, 'Projet inventaires'),
	(12, 2, 'Projet souris');

	INSERT INTO appartenir (no_emp_grou_app, no_util_etu_app, est_chef) VALUES
	(11, 1, 1),
	(11, 2, 0),
	(12, 4, 0),
	(12, 5, 1),
	(12, 6, 0);

	INSERT INTO encadrer (no_emp_grou, no_util_ens) VALUES
	(11, 8),
	(12, 7);

	INSERT INTO materiel(no_mat, nom_materiel, image, categorie, code_barre_mat) VALUES
	(1, 'PC Ultra-Portable Dell Inspiron 14 5480 14” 128 Go SSD 8 Go RAM Intel Core i7', null, 'informatique','250001'),
	(2, 'Dell XPS 13-9380 Ordinateur Portable 13,3" Full HD Argent (Intel Core i5, 8Go de RAM, SSD 256Go, Intel UHD Graphics, Windows 10 Home) Clavier AZERTY Français', null, 'informatique','250002'),
	(3, 'Asus Vivobook Convertible TP412UA-EC036T PC portable 14" Full HD Gris Clair (Intel Core i3, 4 Go de RAM, SSD 128 Go, Windows 10) Clavier AZERTY Français', null, 'informatique','250003'),
	(4, 'Microsoft Surface Laptop 2, 13.5" tactile (Core i5, RAM 8 Go, SSD 128 Go, Windows 10) - Platine', null, 'informatique','250004'),
	(5, 'Dell Latitude E6320 Ordinateur Portable 33,8 cm Intel Core i5 2.50 GHz 4 Go RAM 250 Go HDD Genuine Windows 7 Professional Widescreen DVD +/-RW sans Fil léger WiFi (reconditionné)', null, 'informatique','250005'),
	(6, 'Asus C423NA-BZ0004 Chromebook 14" Argent (Intel Celeron, 4 Go de RAM, EMMC 32 Go) Clavier AZERTY Français', null, 'informatique','250006'),
	(7, 'Asus Vivobook flip TP401MA-EC012TS PC portable 14" Gris Clair (Intel Pentium, 4 Go de RAM, EMMC 64 Go, Windows 10) Clavier AZERTY Français - Office 365 Personnel inclus - 1 an', null, 'informatique','250007'),
	(8, 'Asus Vivobook S S410UA-EB1056T PC portable 14" Gris métal (Intel Core i3, RAM 8Go, 1 to + SSD 128 Go, Windows 10) Clavier AZERTY Français', null, 'informatique','250008'),
	(9, 'Apple MacBook Pro (13 pouces, Processeur i5 Bicœur à 2,3 GHz, 256 GO) - Gris Sidéral', null, 'informatique','250009'),
	(10, 'Apple MacBook Pro (13 pouces avec Touch Bar, Processeur Intel Core i5 Quadricœur de 8e Génération à 2,3 GHz, 256 GO) - Gris Sidéral', null, 'informatique','250010'),
	(11, 'Asus Vivobook Convertible TP412UA-EC036T PC portable 14" Full HD Gris Clair (Intel Core i3, 4 Go de RAM, SSD 128 Go, Windows 10) Clavier AZERTY Français', null, 'informatique','250011'),
	(12, 'Acer Aspire 7 A715-72G-54DZ Ordinateur portable 15,6" Full HD Noir (Intel Core i5, 8 Go de RAM, Disque Dur 1 To, Nvidia GeForce GTX1050, Windows 10)', null, 'informatique','250012'),
	(13, 'Acer Aspire A517-51-31VZ Ordinateur portable 17,3" HD Noir (Intel Core i3, 4 Go de RAM, Disque Dur 1 To, Intel HD Graphics, Windows 10) [Ancien Modèle]', null, 'informatique','250013'),
	(14, 'Asus C423NA-BV0044 Chromebook 14" Argent (Intel Pentium, 8 Go de RAM, EMMC 64 Go) Clavier AZERTY Français', null, 'informatique','250014'),
	(15, 'PC Ultra-Portable Asus ZenBook UX433FA-A6074T 14"', null, 'informatique','250015'),
	(16, 'PC Ultra-Portable Asus ZenBook UX333FA-A3023T 13.3"', null, 'informatique','250016'),
	(17, 'PC Ultra-Portable Acer Swift 5 SF514-53T58PJ 14" Tactile', null, 'informatique','250017'),
	(18, 'PC Ultra-Portable Asus VivoBook S330FA-EY023T 13.3"', null, 'informatique','250018'),
	(19, 'PC Ultra-Portable Acer Swift 3 SF314-56-74U7 14"', null, 'informatique','250019'),
	(20, 'PC Ultra-Portable HP 14-cf0009nf 14"', null, 'informatique','250020'),
	(21, 'Clavier Type Cover pour Surface Pro Commercial (noir)', null, 'informatique','250021'),
	(22, 'Clavier Type Cover pour Surface Pro Commercial (blanc)', null, 'informatique','250022'),
	(23, 'DELL Clavier Mince USB AZERTY KB216 - Numero Dell: R5KCK', null, 'informatique','250023'),
	(24, 'AmazonBasics Souris sans fil avec nano récepteur Noir', null, 'informatique','250024'),
	(25, 'AmazonBasics Souris sans fil avec nano récepteur Blanc', null, 'informatique','250025'),
	(26, 'Souris Surface Arc (bleu cobalt)', null, 'informatique','250026'),
	(27, 'Souris laser sans fil Lenovo', null, 'informatique','250027'),
	(28, 'D-Link DES 105 - Commutateur - 5 x 10/100 - Ordinateur de bureau', null, 'informatique','250028'),
	(29, 'Cisco Systems AIR-CAP1702I-E-K9', null, 'informatique','250029'),
	(30, 'Carte de développement. Processeur Raspberry Pi B+', null, 'informatique','250030');

	INSERT INTO ordinateur(no_mat_ord, num_serie) VALUES
	(1, '33ZG1245'),
	(2, '33ZG1246'),
	(3, '33ZG1247'),
	(4, '33ZG1248'),
	(5, '33ZG1249'),
	(6, '33ZG1250'),
	(7, '33ZG1251'),
	(8, '33ZG1252'),
	(9, '33ZG1253'),
	(10, '33ZG1254'),
	(11, '33ZG1255'),
	(12, '33ZG1256'),
	(13, '33ZG1257'),
	(14, '33ZG1258'),
	(15, '33ZG1259'),
	(16, '33ZG1260'),
	(17, '33ZG1261'),
	(18, '33ZG1262'),
	(19, '33ZG1263'),
	(20, '33ZG1264');

	INSERT INTO objet(no_mat_obj, quantite) VALUES 
	(21, 3),
	(22, 2),
	(23, 3),
	(24, 4),
	(25, 2),
	(26, 3),
	(27, 1),
	(28, 8),
	(29, 5),
	(30, 10);

	INSERT INTO pret (no_pret, no_emp_pr, date_debut, date_prevu, date_fin) VALUES
	(1,11,'2019-05-07', '2019-05-17', NULL),
	(2,10,'2018-12-21', '2019-04-21', NULL),
	(3,12,'2019-05-02', '2019-05-05', '2019-05-05'),
	(4,3, '2019-03-15', '2019-04-15', '2019-04-20'),
	(5,9,'2019-02-05', '2019-04-17', NULL),
	(6,3, '2019-05-15', '2019-06-21', NULL);

	INSERT INTO contenir (no_pret, no_mat) VALUES
	(1,28),
	(1,2),
	(1,12),
	(2,5),
	(3,16),
	(3,18),
	(4,10),
	(5,20),
	(6,21);