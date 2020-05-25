CREATE DATABASE IF NOT EXISTS laravel_master;
USE laravel_master;
CREATE TABLE IF NOT EXISTS users(
id              int(255) auto_increment not null,
role            varchar(20),
name            varchar(100),
surname         varchar(200),
nick            varchar(100),
email           varchar(255),
password        varchar(255),
image           varchar(255),
created_at      datetime,
updated_at      datetime,
remember_token  varchar(255),
CONSTRAINT pk_users PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO USERS VALUES(null, 'user','Marco','Portero','maportero','maportero@gmail.com','123456',null,CURTIME(),CURTIME(),null);
INSERT INTO USERS VALUES(null, 'user','Leonardo','Portero','lvportero','lvportero@gmail.com','123456',null,CURTIME(),CURTIME(),null);
INSERT INTO USERS VALUES(null, 'user','Valentin','Portero','vportero','vportero@gmail.com','123456',null,CURTIME(),CURTIME(),null);

CREATE TABLE IF NOT EXISTS images(
id              int(255) auto_increment not null,
user_id         int(255),
image_path      varchar(255),
description     text,
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_images PRIMARY KEY (id),
CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDB;

INSERT INTO images VALUES (null,1,'prueba1.jpg','Imagen prueba 1',CURDATE(),CURDATE());
INSERT INTO images VALUES (null,1,'prueba2.jpg','Imagen prueba 2',CURDATE(),CURDATE());
INSERT INTO images VALUES (null,1,'prueba3.jpg','Imagen prueba 3',CURDATE(),CURDATE());
INSERT INTO images VALUES (null,3,'prueba4.jpg','Imagen prueba 4',CURDATE(),CURDATE());
INSERT INTO images VALUES (null,3,'prueba5.jpg','Imagen prueba 5',CURDATE(),CURDATE());
INSERT INTO images VALUES (null,3,'prueba6.jpg','Imagen prueba 6',CURDATE(),CURDATE());
INSERT INTO images VALUES (null,4,'prueba7.jpg','Imagen prueba 7',CURDATE(),CURDATE());
INSERT INTO images VALUES (null,4,'prueba8.jpg','Imagen prueba 8',CURDATE(),CURDATE());
INSERT INTO images VALUES (null,4,'prueba9.jpg','Imagen prueba 9',CURDATE(),CURDATE());

CREATE TABLE IF NOT EXISTS comments(
id              int(255) auto_increment not null,
user_id         int(255),
image_id        int(255),
content         text,
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_comments PRIMARY KEY (id),
CONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_comments_image FOREIGN KEY(image_id) REFERENCES images(id)
)ENGINE=InnoDB;

INSERT INTO comments VALUES (null,1,1,'comentario 1.jpg',CURDATE(),CURDATE());
INSERT INTO comments VALUES (null,1,1,'comentario 1.1.jpg',CURDATE(),CURDATE());
INSERT INTO comments VALUES (null,3,1,'comentario 1.2.jpg',CURDATE(),CURDATE());
INSERT INTO comments VALUES (null,1,2,'comentario 2.jpg',CURDATE(),CURDATE());
INSERT INTO comments VALUES (null,1,3,'comentario 3.jpg',CURDATE(),CURDATE());
INSERT INTO comments VALUES (null,3,4,'comentario 4.jpg',CURDATE(),CURDATE());
INSERT INTO comments VALUES (null,3,5,'comentario 5.jpg',CURDATE(),CURDATE());
INSERT INTO comments VALUES (null,3,6,'comentario 6.jpg',CURDATE(),CURDATE());
INSERT INTO comments VALUES (null,4,7,'comentario 7.jpg',CURDATE(),CURDATE());
INSERT INTO comments VALUES (null,4,8,'comentario 8.jpg',CURDATE(),CURDATE());
INSERT INTO comments VALUES (null,4,9,'comentario 9.jpg',CURDATE(),CURDATE());



CREATE TABLE IF NOT EXISTS likes(
id              int(255) auto_increment not null,
user_id         int(255),
image_id        int(255),
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_likes PRIMARY KEY (id),
CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_likes_image FOREIGN KEY(image_id) REFERENCES images(id)
)ENGINE=InnoDB;

INSERT INTO likes VALUES (null,1,1,CURDATE(),CURDATE());
INSERT INTO likes VALUES (null,3,1,CURDATE(),CURDATE());
INSERT INTO likes VALUES (null,4,1,CURDATE(),CURDATE());
INSERT INTO likes VALUES (null,1,2,CURDATE(),CURDATE());
INSERT INTO likes VALUES (null,1,3,CURDATE(),CURDATE());
INSERT INTO likes VALUES (null,3,4,CURDATE(),CURDATE());
INSERT INTO likes VALUES (null,3,5,CURDATE(),CURDATE());
INSERT INTO likes VALUES (null,3,6,CURDATE(),CURDATE());
INSERT INTO likes VALUES (null,4,7,CURDATE(),CURDATE());
INSERT INTO likes VALUES (null,4,8,CURDATE(),CURDATE());
INSERT INTO likes VALUES (null,4,9,CURDATE(),CURDATE());