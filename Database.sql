


CREATE DATABASE projet IF NOT EXISTS;

USE projet;

CREATE TABLE Utilisateur(
   Id_Utilisateur INT AUTO_INCREMENT,
   Pseudo VARCHAR(50) ,
   E_mail VARCHAR(50) ,
   Rôle VARCHAR(50) ,
   Mot_de_passe VARCHAR(50) ,
   PRIMARY KEY(Id_Utilisateur)
);

CREATE TABLE Article(
   Id_Article INT AUTO_INCREMENT,
   Titre VARCHAR(50) ,
   Sujet VARCHAR(100) ,
   Contenue TEXT,
   Id_Utilisateur INT NOT NULL,
   PRIMARY KEY(Id_Article),
   FOREIGN KEY(Id_Utilisateur) REFERENCES Utilisateur(Id_Utilisateur)
);

CREATE TABLE Image(
   Id_Image INT AUTO_INCREMENT,
   link VARCHAR(50) ,
   Id_Article INT NOT NULL,
   PRIMARY KEY(Id_Image),
   FOREIGN KEY(Id_Article) REFERENCES Article(Id_Article)
);

CREATE TABLE Commentaire(
   Id_Commentaire INT AUTO_INCREMENT,
   Contenue VARCHAR(50) ,
   Id_Utilisateur INT NOT NULL,
   Id_Article INT NOT NULL,
   PRIMARY KEY(Id_Commentaire),
   FOREIGN KEY(Id_Utilisateur) REFERENCES Utilisateur(Id_Utilisateur),
   FOREIGN KEY(Id_Article) REFERENCES Article(Id_Article)
);
