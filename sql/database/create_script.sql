create database if not exists immotasells;

use immotasells;

create Table if not exists news (
	id int auto_increment,
	titel varchar(80),
	newstext TEXT,
	datum date,
	PRIMARY KEY(id)
)ENGINE=INNODB;

create Table if not exists klassen (
	id int auto_increment,
	name varchar(80),
	color varchar (80),
	symbol varchar (180),
	PRIMARY KEY(id)
)ENGINE=INNODB;

create Table if not exists raid (
	id int auto_increment,
	name varchar(80),
	kuerzel varchar(10),
	pic varchar(120),
	PRIMARY KEY(id)
)ENGINE=INNODB;

create Table if not exists angebote (
	id int auto_increment,
	name varchar(120),
	preis varchar(80),
	info text,
	raid_id int,
	PRIMARY KEY(id),
	FOREIGN KEY(raid_id) REFERENCES raid(id)
)ENGINE=INNODB;
	
create Table if not exists benutzer (
	id int auto_increment,
	benutzername varchar(80),
	passwort varchar (80),
	PRIMARY KEY(id)
)ENGINE=INNODB;

create Table if not exists kaeufer (
	id int auto_increment,
	charname varchar (80),
	klassen_id int,
	angebot_name varchar(120),
	angebot_preis varchar(80),
	angebot_info text,
	PRIMARY KEY(id),
	FOREIGN KEY(klassen_id) REFERENCES klassen(id)
)ENGINE=INNODB;

