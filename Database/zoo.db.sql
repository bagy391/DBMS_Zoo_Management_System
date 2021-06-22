
CREATE TABLE IF NOT EXISTS CUSTOMER (
	Cid int(10) NOT NULL,
	CFname VARCHAR(30) NOT NULL,
	CLname VARCHAR(30) NOT NULL,
	Email VARCHAR(30) DEFAULT NULL,
	Address VARCHAR(100) DEFAULT NULL,
	Credit_Card_Info VARCHAR(100) DEFAULT NULL,
	PRIMARY KEY(Cid)
);
CREATE TABLE IF NOT EXISTS TICKET (
	Tid int(10) NOT NULL,
	Price INT NOT NULL,
	Cid int(10) NOT NULL,
	PRIMARY KEY(Tid),
	CONSTRAINT fk_ticket_cid FOREIGN KEY(Cid) REFERENCES CUSTOMER(Cid) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS ANIMAL_GUIDE (
	AGid int(10) NOT NULL,
	Zoo_Introduction TEXT NOT NULL,
	Updated_Year INT DEFAULT NULL,
	PRIMARY KEY(AGid)
);
CREATE TABLE IF NOT EXISTS ZOO (
	Zid int(10) NOT NULL,
	ZName VARCHAR(50) NOT NULL,
	Location VARCHAR(100) NOT NULL,
	Hours VARCHAR(100) NOT NULL,
	Contact VARCHAR(100) NOT NULL,
	AGid int(10) NOT NULL,
	PRIMARY KEY(Zid),
	CONSTRAINT fk_zoo_AGid FOREIGN KEY(AGid) REFERENCES ANIMAL_GUIDE(AGid) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS EMPLOYEE (
	Eid int(10) NOT NULL,
	EFname VARCHAR(30) NOT NULL,
	ELname VARCHAR(30) NOT NULL,
	Phone_No VARCHAR(30) NOT NULL,
	Salary INT NOT NULL,
	Zid int(10) NOT NULL,
	PRIMARY KEY(Eid),
	CONSTRAINT fk_emp_zid FOREIGN KEY(Zid) REFERENCES ZOO(Zid) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS ANIMAL_KIND (
	AKid int(10) NOT NULL,
	AName VARCHAR(30) NOT NULL,
	Physical_Characteristics TEXT NOT NULL,
	Zoo_Region VARCHAR(50) NOT NULL,
	Diet VARCHAR(30) NOT NULL,
	Population_Status VARCHAR(30) NOT NULL,
	AnimalImage VARCHAR(100) NOT NULL,
	PRIMARY KEY(AKid)
);
CREATE TABLE ANIMAL_DETAIL
(
	ADid int(10) NOT NULL,
	Height VARCHAR(10) DEFAULT NULL,
	Weight VARCHAR(10) DEFAULT NULL,
	Age INT DEFAULT NULL,
	Aid int(10) NOT NULL,
	PRIMARY KEY(ADid),
	CONSTRAINT fk_ad_aid
	FOREIGN KEY (Aid)
	REFERENCES ANIMAL(Aid)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS GOES_TO (
	Cid int(10) NOT NULL,
	Zid int(10) NOT NULL,
	CONSTRAINT fk1_gt_cid FOREIGN KEY(Cid) REFERENCES CUSTOMER(Cid) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY(Cid,Zid),
	CONSTRAINT fk2_gt_zid FOREIGN KEY(Zid) REFERENCES ZOO(Zid) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS MANAGES (
	Eid int(10) NOT NULL,
	Tid int(10) NOT NULL,
	PRIMARY KEY(Eid,Tid),
	CONSTRAINT fk1_man_eid FOREIGN KEY(Eid) REFERENCES EMPLOYEE(Eid) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk2_manages_tid FOREIGN KEY(Tid) REFERENCES TICKET(Tid) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS LOOKS_AFTER (
	Eid int(10) NOT NULL,
	Aid int(10) NOT NULL,
	PRIMARY KEY(Eid,Aid),
	CONSTRAINT fk1_la_eid FOREIGN KEY(Eid) REFERENCES EMPLOYEE(Eid) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk2_looka_aid FOREIGN KEY(Aid) REFERENCES ANIMAL(Aid) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS CONTAINS (
	AKid int(10) NOT NULL,
	AGid int(10) NOT NULL,
	PRIMARY KEY(AKid,AGid),
	CONSTRAINT fk2_contains_agid FOREIGN KEY(AGid) REFERENCES ANIMAL_GUIDE(AGid) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk1_cont_akid FOREIGN KEY(AKid) REFERENCES ANIMAL_KIND(AKid) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS ANIMAL (
	Aid int(10) NOT NULL,
	Gender VARCHAR(10) DEFAULT NULL,
	Cage_Number INT NOT NULL,
	Feed_Time VARCHAR(30) NOT NULL,
	AKid int(10) NOT NULL,
	PRIMARY KEY(Aid),
	CONSTRAINT fk_ani_akid FOREIGN KEY(AKid) REFERENCES ANIMAL_KIND(AKid) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About us', 'Our Project on Zoo Management<div><br></div>','NMIT@nmit.ac.in', 1800251240, '2021-01-09 02:59:31'),
(2, 'contactus', 'Contact Us', '#8Nitte Meenakshi Institute of Technology Banglore-India.', 'NMIT@nmit.ac.in', 1800251240, '2021-01-09 02:59:43');

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8989898989, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2019-12-30 21:38:00');

INSERT INTO CUSTOMER VALUES (1,'raj','sai','raj12@gmail.com','Banglore','Visa2130'),
 (2,'Kishan','Lal','Lal112@gmail.com','Banglore','Rupay2130'),
 (3,'kavya','sati','kavya@gmail.com','Lahore','Master157800'),
 (4,'Heema','kashap','Heema2@gmail.com','Newjersy','Visa1430'),
 (5,'sai','raj','sai21@gmail.com','Hyderabad','Mestro2130');
INSERT INTO TICKET VALUES (1,150,4),
 (2,50,3),
 (3,50,1),
 (4,50,2),
 (5,50,5);
INSERT INTO ANIMAL_GUIDE VALUES (1,'Zoos are places where wild animals are kept for public display. Zoos are often the sites of sophisticated breeding centers, where endangered species may be protected and studied.WELCOME TO OUR ZOO',2015);
INSERT INTO ZOO VALUES (1,'JAWAHAR_ZOO','Banglore','8AM-6PM','180012150',1),
 (2,'Manohar_ZOO','Mysore','7AM-7PM','180024150',1);
INSERT INTO EMPLOYEE VALUES (1,'Vishal','Dillikar','8754987548',50000,1),
 (2,'Kishore','khan','8787587548',48000,1),
 (3,'Ram','Prasad','8467987548',32000,2),
 (4,'shivani','lakkula','4784987548',55000,1),
 (5,'Raghu','Vamshi','8964987548',50000,2),
 (6,'sony','kumar','9458987548',51000,2);
INSERT INTO ANIMAL_KIND VALUES (1,'tiger','The tiger (Panthera tigris) is the largest extant cat species and a member of the genus Panthera. It is most recognisable for its dark vertical stripes on orange-brown fur with a lighter underside.','south','Meat','very_few','tiger.jpg'),
 (2,'Lion','The lion (Panthera leo) is a species in the family Felidae and a member of the genus Panthera. It has a muscular, deep-chested body, short, rounded head, round ears, and a hairy tuft at the end of its tail.','south','Meat','very_few','lion.jpg'),
 (3,'Deer','Deer or true deer are hoofed ruminant mammals forming the family Cervidae. The two main groups of deer are the Cervinae, including the muntjac, the elk (wapiti)','west','Grass','Moderate','deer.jpg'),
 (4,'Elephant','Elephants are mammals of the family Elephantidae and the largest existing land animals. Three species are currently recognised','west','Grass','Moderate','elephant.jpg'),
 (5,'Snakes','Snakes are elongated, legless, carnivorous reptiles of the suborder Serpentes /sɜːrˈpɛntiːz/. Like all other squamates, snakes are ectothermic, amniote vertebrates covered in overlapping scales.','north','Species','Moderate','snake.jpg'),
 (6,'Hippo','The hippopotamus also called the hippo, common hippopotamus or river hippopotamus, is a large, mostly herbivorous, semiaquatic mammal ','north','fishes','Moderate','hippo.jpg'),
 (7,'giraffe','The giraffe (Giraffa) is an African artiodactyl mammal, the tallest living terrestrial animal and the largest ruminant. It is traditionally considered to be one species, Giraffa camelopardalis, with nine subspecies.','east','species','Moderate','giraf.jpg'),
 (8,'Birds','TBirds are a group of warm-blooded vertebrates constituting the class Aves, characterized by feathers, toothless beaked jaws, the laying of hard-shelled eggs,','east','species','High','birds.jpg');
INSERT INTO ANIMAL_DETAIL VALUES (1,'60','120',20,1),
 (2,'62','133',21,2),
 (3,'60','174',20,3),
 (4,'60','180',20,4),
 (5,'60','170',7,5),
 (6,'60','170',20,6),
 (7,'60','170',20,7),
 (8,'60','170',20,8),
 (9,'160','2000',20,9),
 (10,'160','2270',20,10),
 (11,'60','1870',20,11),
 (12,'600','70',20,12),
 (13,'04','70',20,13),
 (14,'60','70',20,14),
 (15,'60','1770',20,15),
 (16,'600','170',20,16),
 (17,'600','170',20,17),
 (18,'6','0.5',20,18),
 (19,'5','1',20,19),
 (20,'6','0.75',20,20),
 (21,'3','1',20,21),
 (22,'7','1',20,22),
 (23,'5','0.8',20,23),
 (24,'6','0.7',20,24),
 (25,'3.5','1',20,25);
INSERT INTO GOES_TO VALUES (1,1),
 (2,1),
 (3,2),
 (4,1),
 (5,2);
INSERT INTO MANAGES VALUES (1,1),
 (2,2),
 (3,3),
 (4,4),
 (5,5);
INSERT INTO LOOKS_AFTER VALUES (1,1),
 (1,2),
 (1,3),
 (1,4),
 (1,5),
 (2,6),
 (2,7),
 (2,8),
 (3,9),
 (3,10),
 (3,11),
 (3,12),
 (5,13),
 (5,14),
 (5,15),
 (4,16),
 (4,17),
 (4,18),
 (6,19),
 (6,20),
 (6,21),
 (6,22),
 (6,23),
 (6,24),
 (6,25);
INSERT INTO CONTAINS VALUES (1,1),
 (2,1),
 (3,1),
 (4,1),
 ( 5,1),
 (6,1),
 (7,1),
 (8,1);
INSERT INTO ANIMAL VALUES (1,'male',1,'12:30pm',1),
 (2,'female',2,'12:30pm',1),
 (3,'male',3,'1:30pm',2),
 (4,'female',4,'2:30pm',2),
 (5,'male',5,'1:30pm',3),
 (6,'female',5,'1:30pm',3),
 (7,'male',5,'1:30pm',3),
 (8,'female',5,'1:30pm',3),
 (9,'male',6,'12:30pm',4),
 (10,'female',6,'12:30pm',4),
 (11,'male',7,'12:30pm',5),
 (12,'male',7,'12:30pm',5),
 (13,'female',7,'12:30pm',5),
 (14,'female',7,'12:30pm',5),
 (15,'male',8,'2:30pm',6),
 (16,'female',9,'2:30pm',7),
 (17,'male',9,'2:30pm',7),
 (18,'female',10,'1:30pm',8),
 (19,'male',10,'12:30pm',8),
 (20,'female',10,'12:30pm',8),
 (21,'male',10,'12:30pm',8),
 (22,'male',10,'12:30pm',8),
 (23,'female',10,'12:30pm',8),
 (24,'female',10,'12:30pm',8),
 (25,'male',10,'2:30pm',8);
