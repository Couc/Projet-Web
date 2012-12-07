DROP TABLE IF EXISTS COMMENTAIRES;
DROP TABLE IF EXISTS SOURCE_FAV ;
DROP TABLE IF EXISTS ARTICLE_FAV ;
DROP TABLE IF EXISTS ARTICLE_DISLIKE ;
DROP TABLE IF EXISTS CONTACT;
DROP TABLE IF EXISTS ARTICLE ;
DROP TABLE IF EXISTS SOURCE ;
DROP TABLE IF EXISTS CATEGORIE_FAV ;
DROP TABLE IF EXISTS CATEGORIE ;
DROP TABLE IF EXISTS USER ;



CREATE TABLE USER (login CHAR(16) NOT NULL,
password CHAR(32),
email CHAR(255),
derniere_connexion CHAR(12),
PRIMARY KEY (login) ) ENGINE=InnoDB;


CREATE TABLE CATEGORIE (id_cat int AUTO_INCREMENT NOT NULL,
libelle CHAR(50),
description CHAR(100),
date_maj CHAR(12),
image CHAR(50),
PRIMARY KEY (id_cat) ) ENGINE=InnoDB;



CREATE TABLE CATEGORIE_FAV (id_cat int AUTO_INCREMENT NOT NULL,
login CHAR(16),
PRIMARY KEY (id_cat, login) ) ENGINE=InnoDB;
ALTER TABLE CATEGORIE_FAV ADD CONSTRAINT FK_Cat_Fav_idcat FOREIGN KEY (id_cat) REFERENCES CATEGORIE (id_cat);
ALTER TABLE CATEGORIE_FAV ADD CONSTRAINT FK_Cat_Fav_login FOREIGN KEY (login) REFERENCES USER (login);


CREATE TABLE SOURCE (id_source int AUTO_INCREMENT NOT NULL,
id_cat INT,
libelle CHAR(50),
lien CHAR(255),
PRIMARY KEY (id_source, id_cat) ) ENGINE=InnoDB;
ALTER TABLE SOURCE ADD CONSTRAINT FK_Source_idcat FOREIGN KEY (id_cat) REFERENCES CATEGORIE (id_cat);


CREATE TABLE ARTICLE (id_art int AUTO_INCREMENT NOT NULL,
id_source INT,
titre TEXT,
contenu TEXT,
date CHAR(12),
description TEXT,
nb_like INT,
nb_comment INT,
link char(255),
PRIMARY KEY (id_art) ) ENGINE=InnoDB;
ALTER TABLE ARTICLE ADD CONSTRAINT FK_ART_idsource FOREIGN KEY (id_source) REFERENCES SOURCE (id_source);



CREATE TABLE ARTICLE_FAV (login CHAR(16) NOT NULL,
id_art INT,
PRIMARY KEY (login, id_art) ) ENGINE=InnoDB;
ALTER TABLE ARTICLE_FAV ADD CONSTRAINT FK_ART_Fav_login FOREIGN KEY (login) REFERENCES USER (login);
ALTER TABLE ARTICLE_FAV ADD CONSTRAINT FK_ART_Fav_idart FOREIGN KEY (id_art) REFERENCES ARTICLE (id_art);

CREATE TABLE ARTICLE_DISLIKE (login CHAR(16) NOT NULL,
id_art INT,
PRIMARY KEY (login, id_art) ) ENGINE=InnoDB;
ALTER TABLE ARTICLE_DISLIKE ADD CONSTRAINT FK_ART_dis_login FOREIGN KEY (login) REFERENCES USER (login);
ALTER TABLE ARTICLE_DISLIKE ADD CONSTRAINT FK_ART_dis_idart FOREIGN KEY (id_art) REFERENCES ARTICLE (id_art);


CREATE TABLE SOURCE_FAV (login CHAR(16) NOT NULL,
id_source INT,
PRIMARY KEY (login, id_source) ) ENGINE=InnoDB;
ALTER TABLE SOURCE_FAV ADD CONSTRAINT FK_src_Fav_login FOREIGN KEY (login) REFERENCES USER (login);
ALTER TABLE SOURCE_FAV ADD CONSTRAINT FK_src_Fav_source FOREIGN KEY (id_source) REFERENCES SOURCE (id_source);

CREATE TABLE COMMENTAIRES (
login CHAR(16) NOT NULL,
date CHAR(14),
body CHAR(250),
id_art INT,
PRIMARY KEY(login,date)) ENGINE = InnoDB;
ALTER TABLE COMMENTAIRES ADD CONSTRAINT FK_id_art FOREIGN KEY (id_art) REFERENCES ARTICLE (id_art);
ALTER TABLE COMMENTAIRES ADD CONSTRAINT FK_login FOREIGN KEY (login) REFERENCES USER (login);

CREATE TABLE CONTACT (
increment INT AUTO_INCREMENT,
mail CHAR(255),
message TEXT,
PRIMARY KEY(increment)) ENGINE = InnoDB;


INSERT INTO CATEGORIE (id_cat,libelle,description,date_maj,image) VALUES (null,'Politique','descr',Now(),null);
INSERT INTO CATEGORIE (id_cat,libelle,description,date_maj,image) VALUES (null,'Sciences_et_Technologie','descr',Now(),null);
INSERT INTO CATEGORIE (id_cat,libelle,description,date_maj,image) VALUES (null,'Sports','descr',Now(),null);
INSERT INTO CATEGORIE (id_cat,libelle,description,date_maj,image) VALUES (null,'Economie','descr',Now(),null);
INSERT INTO CATEGORIE (id_cat,libelle,description,date_maj,image) VALUES (null,'People','descr',Now(),null);


INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,1,'Le Monde','www.lemonde.fr/rss/tag/politique.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'Le Monde','www.lemonde.fr/rss/tag/sciences.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,3,'Le Monde','www.lemonde.fr/rss/tag/sport.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'Le Monde','www.lemonde.fr/rss/tag/technologies.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,4,'Le Monde','www.lemonde.fr/rss/tag/economie.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,1,'Le Parisien','www.leparisien.fr/politique/rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'Le Parisien','www.leparisien.fr/high-tech/rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,3,'Le Parisien','www.leparisien.fr/sports/rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,4,'Le Parisien','www.leparisien.fr/economie/rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'Euro News','feeds.feedburner.com/euronews/fr/sci-tech/');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,4,'Euro News','feeds.feedburner.com/euronews/fr/business/');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,1,'Europe1','www.europe1.fr/rss/politique.rss');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,4,'Europe1','www.europe1.fr/rss/economie.rss');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,4,'France24','www.france24.com/fr/economie/rss');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,3,'France24','www.france24.com/fr/sports/rss');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,3,'Metro France','www.metrofrance.com/rss.xml?c=1157379271-45');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'Metro France','www.metrofrance.com/rss.xml?c=1157379272-44');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,1,'Metro France','www.metrofrance.com/rss.xml?c=1157379272-44');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,4,'Presse Europe','www.presseurop.eu/fr/taxonomy/term/3/%2A/feed');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,3,'Presse Europe','www.presseurop.eu/fr/taxonomy/term/17/%2A/feed');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'Presse Europe','www.presseurop.eu/fr/taxonomy/term/4/%2A/feed');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'Presse Europe','www.presseurop.eu/fr/taxonomy/term/32/%2A/feed');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'JeuxVideo','www.jeuxvideo.com/rss/rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,3,'Lequipe','www.lequipe.fr/rss/actu_rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,3,'Sports','www.sports.fr/fr/cmc/rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'FRAndroid','feeds.feedburner.com/frandroid');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'IphonneAddict','feeds.feedburner.com/Iphoneaddictfr');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'PhonAndroid','feeds.feedburner.com/phonandroid');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'PointGphone','feeds.feedburner.com/pointgphone');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'Tomsguide','www.tomsguide.fr/feeds/rss2/tom-s-guide-fr,20-0.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,5,'Le Parisien','www.leparisien.fr/actualite-people-medias/rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,5,'Metro France','www.metrofrance.com/rss.xml?c=1341917533-1');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,5,'Public','www.public.fr/var/exports/rss_news.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,5,'DontMiss','feeds.feedburner.com/dmpeople');

