CREATE  TABLE  IF NOT EXISTS emprunteur (
	no_emp INT NOT NULL AUTO_INCREMENT,
	num_code_barre VARCHAR ( 50 ),
    CONSTRAINT pk_emp PRIMARY KEY (no_emp)
);

CREATE  TABLE  IF NOT EXISTS utilisateurs (
	no_emp_util INT,
	nom VARCHAR ( 50 ) NOT NULL ,
	prenom VARCHAR ( 50 ) NOT NULL ,
	mail VARCHAR ( 50 ) NOT NULL ,
	CONSTRAINT pk_util PRIMARY KEY (no_emp_util),
	CONSTRAINT fk_util_emp FOREIGN KEY (no_emp_util) REFERENCES emprunteur (no_emp)

);

CREATE  TABLE  IF NOT EXISTS etudiant (
	no_util_etu INT,
	niveau VARCHAR ( 30 ),
	num_etu VARCHAR ( 30 ),
    CONSTRAINT pk_etu PRIMARY KEY (no_util_etu),
    CONSTRAINT fk_etu_util FOREIGN KEY (no_util_etu) REFERENCES utilisateurs (no_emp_util)
);

CREATE  TABLE  IF NOT EXISTS enseignant (
    no_util_ens INT,
    fonction VARCHAR ( 30 ),
    CONSTRAINT pk_ens PRIMARY KEY (no_util_ens),
    CONSTRAINT fk_ens_util FOREIGN KEY (no_util_ens) REFERENCES utilisateurs (no_emp_util)
);

CREATE  TABLE  IF NOT EXISTS groupe (
	no_emp_grou INT,
	nom_groupe VARCHAR ( 30 ) NOT NULL ,
	nb_max_etu INT DEFAULT 0,
	CONSTRAINT pk_groupe PRIMARY KEY (no_emp_grou),
	CONSTRAINT fk_groupe_emp FOREIGN KEY (no_emp_grou) REFERENCES emprunteur (no_emp)
);

CREATE  TABLE  IF NOT EXISTS appartenir (
	no_emp_grou_app INT,
	no_util_etu_app INT,
	est_chef boolean ,
	CONSTRAINT pk_appartenir PRIMARY KEY (no_emp_grou_app, no_util_etu_app),
	CONSTRAINT fk_appar_groupe FOREIGN KEY (no_emp_grou_app) REFERENCES groupe (no_emp_grou),
	CONSTRAINT fk_appar_etu FOREIGN KEY (no_util_etu_app) REFERENCES etudiant (no_util_etu)
);

CREATE  TABLE  IF NOT EXISTS encadrer (
	no_emp_grou INT,
	no_util_ens INT,
	CONSTRAINT pk_encadrer PRIMARY KEY (no_emp_grou, no_util_ens),
	CONSTRAINT fk_encad_groupe FOREIGN KEY (no_emp_grou) REFERENCES groupe (no_emp_grou),
	CONSTRAINT fk_encad_ens FOREIGN KEY (no_util_ens) REFERENCES enseignant (no_util_ens)
);

CREATE  TABLE  IF NOT EXISTS materiel (
	no_mat INT NOT NULL AUTO_INCREMENT,
	nom_materiel VARCHAR ( 1000 ),
	image VARCHAR ( 100 ),
	categorie VARCHAR ( 50 ),
	code_barre_mat varchar ( 50 ),
    CONSTRAINT pk_mat PRIMARY KEY (no_mat)
);

CREATE  TABLE  IF NOT EXISTS ordinateur (
	no_mat_ord INT,
	num_serie VARCHAR ( 50 ),
    CONSTRAINT pk_ord PRIMARY KEY (no_mat_ord),
    CONSTRAINT fk_ord_mat FOREIGN KEY (no_mat_ord) REFERENCES materiel (no_mat)
);

CREATE  TABLE  IF NOT EXISTS objet (
	no_mat_obj INT,
	quantite INT DEFAULT 0,
    CONSTRAINT pk_obj PRIMARY KEY (no_mat_obj),
    CONSTRAINT fk_obj_mat FOREIGN KEY (no_mat_obj) REFERENCES materiel (no_mat)
);

CREATE  TABLE  IF NOT EXISTS pret (
	no_pret INT NOT NULL AUTO_INCREMENT,
	no_emp_pr INT,
	date_debut DATE NOT NULL,
	date_prevu DATE NOT NULL,
	date_fin DATE,
	CONSTRAINT pk_pret PRIMARY KEY (no_pret, no_emp_pr),
	CONSTRAINT fk_pret_emp FOREIGN KEY (no_emp_pr) REFERENCES emprunteur (no_emp)
);

CREATE  TABLE  IF NOT EXISTS contenir  (
	no_pret INT NOT NULL AUTO_INCREMENT,
	no_mat INT,
	CONSTRAINT pk_contenir PRIMARY KEY (no_pret, no_mat),
	CONSTRAINT fk_cont_pret FOREIGN KEY (no_pret) REFERENCES pret (no_pret),
	CONSTRAINT fk_cont_mat FOREIGN KEY (no_mat) REFERENCES materiel (no_mat)
);