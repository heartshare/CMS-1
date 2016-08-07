--DROP Table IF EXISTS  ;
--DROP Table IF EXISTS  ;

--DROP Table IF EXISTS  ;
--DROP Table IF EXISTS  ;
--DROP Table IF EXISTS  ;

--DROP Table IF EXISTS  ;
--DROP Table IF EXISTS  ;
--DROP Table IF EXISTS  ;



--User
--Tag 
--Category
--Taxonomy(PostType)
--(Haber,Duyuru,Albüm,Page,Block...)
--


--Post
--PostMeta
--PostTag
--PostComment
--PostDocument

--Config

--Page
--Block
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `superadmin` smallint(1) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `registration_ip` varchar(15) DEFAULT NULL,
  `bind_to_ip` varchar(255) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `email_confirmed` smallint(1) NOT NULL DEFAULT '0'
);




CREATE TABLE IF NOT EXISTS `cms_tag` (
 `id_tag` 	       int unsigned AUTO_INCREMENT PRIMARY KEY NOT NULL,
 `id_user`         int unsigned NOT NULL,		
 `name`		         varchar(64),

 `status`          bit(1) NOT NULL DEFAULT 1,
 `datetime_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `datetime_update` datetime DEFAULT NULL
);

ALTER TABLE `cms_tag` ADD FOREIGN KEY (id_user) REFERENCES user(id);



CREATE TABLE IF NOT EXISTS `cms_category` (
 `id_category`     int unsigned AUTO_INCREMENT PRIMARY KEY NOT NULL,
 `id_user` 	       int unsigned NOT NULL,		
 `name`		         varchar(64),
 
 `status`          bit(1) NOT NULL DEFAULT 1,
 `datetime_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `datetime_update` datetime DEFAULT NULL
);

ALTER TABLE `cms_category` ADD FOREIGN KEY (id_user) REFERENCES user(id);



CREATE TABLE IF NOT EXISTS `cms_taxonomy` (
 `id_taxonomy`     int unsigned AUTO_INCREMENT PRIMARY KEY NOT NULL,
 `id_user` 	       int unsigned NOT NULL,		
 `name`		         varchar(64),
 
 `status`          bit(1) NOT NULL DEFAULT 1,
 `datetime_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `datetime_update` datetime DEFAULT NULL
);

ALTER TABLE `cms_taxonomy` ADD FOREIGN KEY (id_user) REFERENCES user(id);

CREATE TABLE IF NOT EXISTS `cms_post` (
  `id_post` 	      int unsigned AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `id_user` 	      int unsigned NOT NULL,
  `id_category`     int unsigned DEFAULT NULL,
  `id_taxonomy`     int unsigned NOT NULL,

  
  `content`          longtext NOT NULL,
  `title`            varchar(1024) NOT NULL,
  `cover_photo`      varchar(1024) NOT NULL,
 
  `status`           bit(1) NOT NULL DEFAULT 1,
  `comment_status`   bit(1) NOT NULL DEFAULT 1,
  `comment_count`    int NOT NULL DEFAULT 0,
  `display_count`    int NOT NULL DEFAULT 0,

  `datetime_publish` datetime DEFAULT NULL,
  `datetime_create`  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datetime_update`  datetime DEFAULT NULL
);

ALTER TABLE `cms_post` ADD FOREIGN KEY (id_user)     REFERENCES user(id);
ALTER TABLE `cms_post` ADD FOREIGN KEY (id_category) REFERENCES cms_category(id_category);
ALTER TABLE `cms_post` ADD FOREIGN KEY (id_taxonomy) REFERENCES cms_taxonomy(id_taxonomy);


CREATE TABLE IF NOT EXISTS `cms_post_metadata` (
 `id_post_metadata` int unsigned AUTO_INCREMENT  PRIMARY KEY NOT NULL,
 `id_post`  		    int unsigned NOT NULL,
 `id_user`  	      int unsigned NOT NULL,		
 `name`				      varchar(64),

 `datetime_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `datetime_update` datetime DEFAULT NULL
);

ALTER TABLE `cms_post_metadata` ADD FOREIGN KEY (id_user) REFERENCES user(id);
ALTER TABLE `cms_post_metadata` ADD FOREIGN KEY (id_post) REFERENCES cms_post(id_post);



CREATE TABLE IF NOT EXISTS `cms_post_tag` (
 `id_post_tag` 	int unsigned AUTO_INCREMENT  PRIMARY KEY NOT NULL,
 `id_user`  	  int unsigned NOT NULL,	
 `id_post`  	  int unsigned NOT NULL,
 `id_tag`  	    int unsigned NOT NULL			
);

ALTER TABLE `cms_post_tag` ADD FOREIGN KEY (id_user) REFERENCES user(id);
ALTER TABLE `cms_post_tag` ADD FOREIGN KEY (id_post) REFERENCES cms_post(id_post);
ALTER TABLE `cms_post_tag` ADD FOREIGN KEY (id_tag) REFERENCES  cms_tag(id_tag);



CREATE TABLE IF NOT EXISTS `cms_post_comment` (
  `id_comment`      int unsigned AUTO_INCREMENT  PRIMARY KEY NOT NULL,
  `id_post`         int unsigned NOT NULL,
  
  `author`          varchar(64)   NOT NULL,
  `author_email`    varchar(64)   DEFAULT NULL,
  `author_IP`       varchar(64)   DEFAULT NULL,
  `content` 	      varchar(2048) NOT NULL,
  `status`          bit(1) NOT NULL DEFAULT 0,

  `datetime_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datetime_update` datetime DEFAULT NULL
);

ALTER TABLE `cms_post_comment` ADD FOREIGN KEY (id_post) REFERENCES cms_post(id_post);


CREATE TABLE IF NOT EXISTS `cms_post_document` (
 `id_post_document`  int unsigned AUTO_INCREMENT  PRIMARY KEY NOT NULL,
 `id_post`           int unsigned NOT NULL,	
 `document_path`	   varchar(64)
);

ALTER TABLE `cms_post_document` ADD FOREIGN KEY (id_post) REFERENCES cms_post(id_post);


CREATE TABLE IF NOT EXISTS `cms_config` (
  `id_config`  int unsigned AUTO_INCREMENT  PRIMARY KEY NOT NULL,
  `title`      varchar(512) NOT NULL,
  `name`       varchar(64) NOT NULL,
  `value`      longtext NOT NULL,
  `type`       varchar(20) DEFAULT NULL
);




















