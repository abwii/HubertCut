#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Cut
#------------------------------------------------------------

CREATE TABLE Cut(
        cutId          Int  Auto_increment  NOT NULL ,
        cutName        Varchar (50) NOT NULL ,
        cutPrice       DECIMAL (15,3)  NOT NULL ,
        cutDescription Varchar (50) NOT NULL
	,CONSTRAINT Cut_PK PRIMARY KEY (cutId)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Role
#------------------------------------------------------------

CREATE TABLE Role(
        roleId   Int  Auto_increment  NOT NULL ,
        roleName Varchar (50) NOT NULL
	,CONSTRAINT Role_PK PRIMARY KEY (roleId)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        userId             Int  Auto_increment  NOT NULL ,
        userFirstname      Varchar (50) NOT NULL ,
        userLastname       Varchar (50) NOT NULL ,
        userEmail          Varchar (50) NOT NULL ,
        userPassword       Varchar (50) NOT NULL ,
        userProfilePicture Longblob NOT NULL ,
        roleId             Int NOT NULL
	,CONSTRAINT User_PK PRIMARY KEY (userId)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Comment
#------------------------------------------------------------

CREATE TABLE Comment(
        commentId   Int  Auto_increment  NOT NULL ,
        commentRate Int NOT NULL ,
        commentText Text NOT NULL ,
        commentDate Date NOT NULL ,
        userId      Int NOT NULL
	,CONSTRAINT Comment_PK PRIMARY KEY (commentId)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: RDV
#------------------------------------------------------------

CREATE TABLE RDV(
        rdvId     Int  Auto_increment  NOT NULL ,
        rdvDate   Date NOT NULL ,
        rdvStatus Varchar (50) NOT NULL ,
        cutId     Int NOT NULL ,
        billId    Int NOT NULL
	,CONSTRAINT RDV_PK PRIMARY KEY (rdvId)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Bill
#------------------------------------------------------------

CREATE TABLE Bill(
        billId     Int  Auto_increment  NOT NULL ,
        billPrice  DECIMAL (15,3)  NOT NULL ,
        billDate   Date NOT NULL ,
        billStatus Varchar (50) NOT NULL ,
        rdvId      Int NOT NULL
	,CONSTRAINT Bill_PK PRIMARY KEY (billId)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Has
#------------------------------------------------------------

CREATE TABLE Has(
        userId Int NOT NULL ,
        rdvId  Int NOT NULL
	,CONSTRAINT Has_PK PRIMARY KEY (userId,rdvId)
)ENGINE=InnoDB;




ALTER TABLE User
	ADD CONSTRAINT User_Role0_FK
	FOREIGN KEY (roleId)
	REFERENCES Role(roleId);

ALTER TABLE Comment
	ADD CONSTRAINT Comment_User0_FK
	FOREIGN KEY (userId)
	REFERENCES User(userId);

ALTER TABLE RDV
	ADD CONSTRAINT RDV_Cut0_FK
	FOREIGN KEY (cutId)
	REFERENCES Cut(cutId);

ALTER TABLE RDV
	ADD CONSTRAINT RDV_Bill1_FK
	FOREIGN KEY (billId)
	REFERENCES Bill(billId);

ALTER TABLE RDV 
	ADD CONSTRAINT RDV_Bill0_AK 
	UNIQUE (billId);

ALTER TABLE Bill
	ADD CONSTRAINT Bill_RDV0_FK
	FOREIGN KEY (rdvId)
	REFERENCES RDV(rdvId);

ALTER TABLE Bill 
	ADD CONSTRAINT Bill_RDV0_AK 
	UNIQUE (rdvId);

ALTER TABLE Has
	ADD CONSTRAINT Has_User0_FK
	FOREIGN KEY (userId)
	REFERENCES User(userId);

ALTER TABLE Has
	ADD CONSTRAINT Has_RDV1_FK
	FOREIGN KEY (rdvId)
	REFERENCES RDV(rdvId);
