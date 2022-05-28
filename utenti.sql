create DATABASE utenti;
use DATABASE utenti;

CREATE TABLE login 
( Nome VARCHAR(256) NOT NULL ,
 Cognome VARCHAR(256) NOT NULL , 
 Username VARCHAR(256) primary KEY , 
 Pass VARCHAR(256) NOT NULL
 
 ) ENGINE = InnoDB;

CREATE TABLE preferiti
( user VARCHAR(256) NOT NULL ,
 autore VARCHAR(256) NOT NULL ,
  titolo VARCHAR(256) NOT NULL ,
   immagine BLOB NOT NULL,
   index idx_user(user),
   FOREIGN KEY (user) REFERENCES login(Username) 
   ) ENGINE = InnoDB;





