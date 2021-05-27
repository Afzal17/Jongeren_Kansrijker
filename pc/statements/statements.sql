-- Application Name: Jongeren Kansrijker
-- Spoiler Alert: This application is written in
-- english but the variable names and data is in dutch
-- because the ERD design is given in dutch by the client
-- Stichting Praktijkleren

-- Here we are creating/making a new database
create database pc_database;

USE pc_database;

CREATE TABLE medewerker
(
	id INT NOT NULL AUTO_INCREMENT,
	-- voornaam VARCHAR(255),
	gebruikersnaam VARCHAR(255) UNIQUE, -- Unique toevoegen
	wachtwoord VARCHAR(255),
	PRIMARY KEY(id)
);

CREATE TABLE activiteit
(
	id INT NOT NULL AUTO_INCREMENT,
	activiteit VARCHAR(255),
	PRIMARY KEY(id)
);

CREATE TABLE jongere
(
	id INT NOT NULL AUTO_INCREMENT,
	voornaam VARCHAR(255),
	tussenvoegsel VARCHAR(255),
	achternaam VARCHAR(255),
	registratiedatum DATE,
	PRIMARY KEY(id)
);

CREATE TABLE instituut
(
	id INT NOT NULL AUTO_INCREMENT,
	instituut VARCHAR(255),
	telefoonnummer VARCHAR(255),
	PRIMARY KEY(id)
);

CREATE TABLE jongereactiviteit
(
	id INT NOT NULL AUTO_INCREMENT,
	activiteit_id INT,
	jongere_id INT,
	startdatum DATE,
	afgerond VARCHAR(255),
	PRIMARY KEY(id),
	FOREIGN KEY(activiteit_id) REFERENCES activiteit(id),
	FOREIGN KEY(jongere_id) REFERENCES jongere(id)
);

CREATE TABLE jongereinstituut
(
	id INT NOT NULL AUTO_INCREMENT,
	jongere_id INT,
	instituut_id INT,
	startdatum DATE,
	PRIMARY KEY(id),
	FOREIGN KEY(jongere_id) REFERENCES jongere(id),
	FOREIGN KEY(instituut_id) REFERENCES instituut(id)
);

-- Here ends the statements.sql file




-- Activiteit, Jongere, Instituut zijn de tabellen
-- die als eerste gebruikt moeten worden