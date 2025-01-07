create database DriveLoc;




CREATE TABLE `Car` (
  `id_car` int NOT NULL,
  `modele` varchar(50) NOT NULL,
  `id_color` int NOT NULL,
  `prix` double NOT NULL,
  `disponibilite` varchar(10) NOT NULL,
  `id_type` int DEFAULT NULL,
  `anneefabrication` varchar(50) DEFAULT NULL,
  `lieu` varchar(150) DEFAULT NULL,
  `kilometrage` varchar(100) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `Description` text NOT NULL
) 



CREATE TABLE `color` (
  `id_color` int NOT NULL,
  `nameColor` varchar(20) NOT NULL
) 



INSERT INTO `color` (`id_color`, `nameColor`) VALUES
(1, 'Red'),
(2, 'Blue'),
(3, 'Green'),
(4, 'Yellow'),
(5, 'Orange'),
(6, 'Purple'),
(7, 'Brown'),
(8, 'Pink'),
(9, 'Gray'),
(10, 'Black');


CREATE TABLE `Ratin` (
  `id_ratin` int NOT NULL,
  `ratin` int NOT NULL
) 



INSERT INTO `Ratin` (`id_ratin`, `ratin`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);


CREATE TABLE `RatinUser` (
  `id_ratinuser` int NOT NULL,
  `id_car` int NOT NULL,
  `id_user` int NOT NULL,
  `id_ratin` int NOT NULL
) 

CREATE TABLE `RESEVER` (
  `id_Reserve` int NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `times` datetime NOT NULL,
  `id_user` int NOT NULL,
  `id_car` int NOT NULL,
  `statut` enum('actif','inactif','en_attente') NOT NULL DEFAULT 'actif'
) 

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `type_role` varchar(70) NOT NULL
)


INSERT INTO `role` (`id_role`, `type_role`) VALUES
(1, 'admin'),
(2, 'user');


CREATE TABLE `type` (
  `id_type` int NOT NULL,
  `nameType` varchar(40) NOT NULL
) 

INSERT INTO `type` (`id_type`, `nameType`) VALUES
(1, 'Sedan'),
(2, 'SUV'),
(3, 'Hatchback'),
(4, 'Coupe'),
(5, 'Convertible'),
(6, 'Pickup'),
(7, 'Minivan'),
(8, 'Wagon'),
(9, 'Crossover'),
(10, 'Sports Car');



CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `id_role` int DEFAULT NULL,
  `image_user` varchar(255) DEFAULT NULL
)

ALTER TABLE `Car`
  ADD PRIMARY KEY (`id_car`),



ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);


ALTER TABLE `Ratin`
  ADD PRIMARY KEY (`id_ratin`);


ALTER TABLE `RatinUser`
  ADD PRIMARY KEY (`id_ratinuser`),


ALTER TABLE `RESEVER`
  ADD PRIMARY KEY (`id_Reserve`),





ALTER TABLE `Car`
  ADD CONSTRAINT `Car_ibfk_1` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`),
  ADD CONSTRAINT `Car_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);



ALTER TABLE `RatinUser`
  ADD CONSTRAINT `RatinUser_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `RatinUser_ibfk_2` FOREIGN KEY (`id_car`) REFERENCES `Car` (`id_car`),
  ADD CONSTRAINT `RatinUser_ibfk_3` FOREIGN KEY (`id_ratin`) REFERENCES `Ratin` (`id_ratin`);


ALTER TABLE `RESEVER`
  ADD CONSTRAINT `RESEVER_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `RESEVER_ibfk_2` FOREIGN KEY (`id_car`) REFERENCES `Car` (`id_car`);


ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;



create TABLE ARTICLE
(
    id_ARTICLE int not null AUTO_INCREMENT PRIMARY KEY,
    Titer varchar(255) not null,
    contenu text not null,
    tags varchar(700)not null,
    id_user int NOT null,
    s_status ENUM('active','Not Active') not null,
    id_them int not null,
	D_date DATETIME NULL 
)

create table them 
( 
    id_them int not null AUTO_INCREMENT PRIMARY key,
     namethem varchar(50) not null 
);

create table Favoris
(
    id_Favoris int not null AUTO_INCREMENT PRIMARY KEY,
    id_user int not null,
    id_ARTICLE int not null,
    f_date DATETIME not NULL 
)



create table commentaires
(
    id_commentaires int not null AUTO_INCREMENT PRIMARY KEY,
    contenu varchar(300) not null,
    id_Article int not null,
	id_user int not null,
    c_date DATETIME not NULL 
)

ALTER TABLE Favoris
ADD FOREIGN KEY (id_user) REFERENCES user(id_user)


ALTER TABLE Favoris
ADD FOREIGN KEY (id_ARTICLE) REFERENCES ARTICLE(id_ARTICLE)



ALTER TABLE commentaires
ADD FOREIGN KEY (id_Article) REFERENCES ARTICLE(id_ARTICLE)


ALTER TABLE commentaires
ADD FOREIGN KEY (id_user) REFERENCES user(id_user)



ALTER TABLE ARTICLE
ADD FOREIGN KEY (id_user) REFERENCES user(id_user)