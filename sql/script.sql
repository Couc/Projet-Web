
DROP TABLE IF EXISTS SOURCE_FAV ;
DROP TABLE IF EXISTS ARTICLE_FAV ;
DROP TABLE IF EXISTS ARTICLE ;
DROP TABLE IF EXISTS SOURCE ;
DROP TABLE IF EXISTS CATEGORIE_FAV ;
DROP TABLE IF EXISTS CATEGORIE ;
DROP TABLE IF EXISTS USER ;


CREATE TABLE USER (login CHAR(16) NOT NULL,
password CHAR(32),
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
titre CHAR(100),
contenu TEXT,
date CHAR(12),
PRIMARY KEY (id_art) ) ENGINE=InnoDB;
ALTER TABLE ARTICLE ADD CONSTRAINT FK_ART_idsource FOREIGN KEY (id_source) REFERENCES SOURCE (id_source);



CREATE TABLE ARTICLE_FAV (login CHAR(16) NOT NULL,
id_art INT,
id_source INT,
titre CHAR(100),
contenu TEXT,
date CHAR(12),
id_cat INT,
PRIMARY KEY (login, id_art) ) ENGINE=InnoDB;
ALTER TABLE ARTICLE_FAV ADD CONSTRAINT FK_ART_Fav_idcat FOREIGN KEY (id_cat) REFERENCES CATEGORIE (id_cat);
ALTER TABLE ARTICLE_FAV ADD CONSTRAINT FK_ART_Fav_login FOREIGN KEY (login) REFERENCES USER (login);
ALTER TABLE ARTICLE_FAV ADD CONSTRAINT FK_ART_Fav_idart FOREIGN KEY (id_art) REFERENCES ARTICLE (id_art);
ALTER TABLE ARTICLE_FAV ADD CONSTRAINT FK_ART_Fav_idsrc FOREIGN KEY (id_source) REFERENCES SOURCE (id_source);



CREATE TABLE SOURCE_FAV (login CHAR NOT NULL,
id_source INT,
PRIMARY KEY (login, id_source) ) ENGINE=InnoDB;
ALTER TABLE ARTICLE_FAV ADD CONSTRAINT FK_src_Fav_login FOREIGN KEY (login) REFERENCES USER (login);
ALTER TABLE ARTICLE_FAV ADD CONSTRAINT FK_src_Fav_source FOREIGN KEY (id_source) REFERENCES SOURCE (id_source);


INSERT INTO CATEGORIE (id_cat,libelle,description,date_maj,image) VALUES (null,'Politique','descr',Now(),null);
INSERT INTO CATEGORIE (id_cat,libelle,description,date_maj,image) VALUES (null,'Sciences_et_Technologie','descr',Now(),null);
INSERT INTO CATEGORIE (id_cat,libelle,description,date_maj,image) VALUES (null,'Sports','descr',Now(),null);
INSERT INTO CATEGORIE (id_cat,libelle,description,date_maj,image) VALUES (null,'Economie','descr',Now(),null);
INSERT INTO CATEGORIE (id_cat,libelle,description,date_maj,image) VALUES (null,'People','descr',Now(),null);


INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,1,'le_monde_politique','http://www.lemonde.fr/rss/tag/politique.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'le_monde_science','http://www.lemonde.fr/rss/tag/sciences.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'le_monde_tech','http://www.lemonde.fr/rss/tag/technologies.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,4,'le_monde_economie','http://www.lemonde.fr/rss/tag/economie.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,1,'le_parisien_politique','http://www.leparisien.fr/politique/rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'le_parisien_sciencetech','http://www.leparisien.fr/high-tech/rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,3,'le_parisien_sport','http://www.leparisien.fr/sports/rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,5,'le_parisien_people','http://www.leparisien.fr/actualite-people-medias/rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,4,'le_parisien_economie','http://www.leparisien.fr/economie/rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'euro_news_tech','http://feeds.feedburner.com/euronews/fr/sci-tech/');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,4,'euro_news_eco','http://feeds.feedburner.com/euronews/fr/business/');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,1,'europe1_politique','http://www.europe1.fr/rss/politique.rss');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,4,'europe1_eco','http://www.europe1.fr/rss/economie.rss');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,4,'france24_eco','http://www.france24.com/fr/economie/rss');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,3,'france24_sport','http://www.france24.com/fr/sports/rss');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,3,'metro_france_sport','http://www.metrofrance.com/rss.xml?c=1157379271-45');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,5,'metro_france_people','http://www.metrofrance.com/rss.xml?c=1341917533-1');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'metro_france_science','http://www.metrofrance.com/rss.xml?c=1157379272-44');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,1,'metro_france_politique','http://www.metrofrance.com/rss.xml?c=1157379272-44');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,4,'presse_europe_eco','http://www.presseurop.eu/fr/taxonomy/term/3/%2A/feed');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,3,'presse_europe_sport','http://www.presseurop.eu/fr/taxonomy/term/17/%2A/feed');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'presse_europe_tech','http://www.presseurop.eu/fr/taxonomy/term/4/%2A/feed');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'presse_europ,tech','http://www.presseurop.eu/fr/taxonomy/term/32/%2A/feed');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'jeuxvideo','http://www.jeuxvideo.com/rss/rss-news.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'jeuxvideo','http://www.jeuxvideo.com/rss/rss-articles.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'jeuxvideo','http://www.jeuxvideo.com/rss/rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,3,'lequipe','http://www.lequipe.fr/rss/actu_rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,3,'sports','http://www.sports.fr/fr/cmc/rss.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'frandroid','http://feeds.feedburner.com/frandroid');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'iphonneaddict','http://feeds.feedburner.com/Iphoneaddictfr');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'phonandroid','http://feeds.feedburner.com/phonandroid');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'pointgphone','http://feeds.feedburner.com/pointgphone');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,2,'tomsguide','http://www.tomsguide.fr/feeds/rss2/tom-s-guide-fr,20-0.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,5,'public','http://www.public.fr/var/exports/rss_news.xml');
INSERT INTO SOURCE (id_source,id_cat,libelle,lien) VALUES (null,5,'dontmiss','http://feeds.feedburner.com/dmpeople');