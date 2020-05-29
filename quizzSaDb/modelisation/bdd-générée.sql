#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        idUser Int  Auto_increment  NOT NULL ,
        prenom Varchar (50) NOT NULL ,
        nom    Varchar (50) NOT NULL ,
        login  Varchar (50) NOT NULL ,
        mdp1   Varchar (50) NOT NULL ,
        mdp2   Varchar (50) NOT NULL ,
        profil Varchar (50) NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (idUser)
)ENGINE=InnoDB;

