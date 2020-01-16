
drop table if exists Region;

/*==============================================================*/
/* Table : Region                                               */
/*==============================================================*/
create table Region
(
   refReg               varchar(254) not null,
   nomReg               varchar(254),
   primary key (refReg)
);

drop table if exists Departement;

/*==============================================================*/
/* Table : Departement                                          */
/*==============================================================*/
create table Departement
(
   refReg               varchar(254) not null,
   refDep               varchar(254) not null,
   nomDep               varchar(254),
   primary key (refReg, refDep)
);

alter table Departement add constraint FK_comporter foreign key (refReg)
      references Region (refReg);


drop table if exists Commune;

/*==============================================================*/
/* Table : Commune                                              */
/*==============================================================*/
create table Commune
(
   refReg               varchar(254) not null,
   refDep               varchar(254) not null,
   refCom               varchar(254) not null,
   nomCom               int,
   primary key (refReg, refDep, refCom)
);

alter table Commune add constraint FK_comporter2 foreign key (refReg, refDep)
      references Departement (refReg, refDep);


	  
drop table if exists Personne;

/*==============================================================*/
/* Table : Personne                                             */
/*==============================================================*/
create table Personne
(
   codeP                int not null,
   refCom               varchar(254) not null,
   nom                  varchar(254),
   prenom               varchar(254),
   dateNaiss            date,
   lieuNaiss            varchar(254),
   profession_occupation varchar(254),
   nomPere              varchar(254),
   nomMere              varchar(254),
   domicile_residence   varchar(254),
   numCNI               int,
   tel                  varchar(254),
   photocni             longblob,
   photoP               longblob,
   primary key (codeP)
);

alter table Personne add constraint FK_habiter foreign key (refCom)
      references Commune (refCom) ;

drop table if exists Electeur;

/*==============================================================*/
/* Table : Electeur                                             */
/*==============================================================*/
create table Electeur
(
   codeP                int not null,
   primary key (codeP)
);

alter table Electeur add constraint FK_Generalisation_1 foreign key (codeP)
      references Personne (codeP) ;

drop table if exists Carte_de_vote;

/*==============================================================*/
/* Table : Carte_de_vote                                        */
/*==============================================================*/
create table Carte_de_vote
(
   refC                 varchar(254) not null,
   codeP                int not null,
   imgRecto             longblob,
   imgVerso             longblob,
   dateDeliv            datetime,
   cmpteARebours        int,
   statut               bool,
   primary key (refC)
);

alter table Carte_de_vote add constraint FK_obtenir foreign key (codeP)
      references Electeur (codeP) ;

drop table if exists Bureau_de_vote;

/*==============================================================*/
/* Table : Bureau_de_vote                                       */
/*==============================================================*/
create table Bureau_de_vote
(
   refB                 int not null,
   refReg               varchar(254) not null,
   refDep               varchar(254) not null,
   refCom               varchar(254) not null,
   nomB                 varchar(254),
   primary key (refB)
);

alter table Bureau_de_vote add constraint FK_se_trouver foreign key (refReg, refDep, refCom)
      references Commune (refReg, refDep, refCom) ;


drop table if exists Election;

/*==============================================================*/
/* Table : Election                                             */
/*==============================================================*/
create table Election
(
   codeElec             int not null,
   primary key (codeElec)
);


drop table if exists intervenir;

/*==============================================================*/
/* Table : intervenir                                           */
/*==============================================================*/
create table intervenir
(
   refB                 int not null,
   codeElec             int not null,
   primary key (refB, codeElec)
);

alter table intervenir add constraint FK_intervenir foreign key (refB)
      references Bureau_de_vote (refB) ;

alter table intervenir add constraint FK_intervenir foreign key (codeElec)
      references Election (codeElec) ;
