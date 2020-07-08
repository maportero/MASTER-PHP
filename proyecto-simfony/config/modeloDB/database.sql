CREATE DATABASE IF NOT EXISTS symfony_master;
USE DATABASE symfony_master;
CREATE TABLE IF NOT EXISTS users (
id          int(255) auto_increment not null,
role        varchar(50),
name        varchar(100),
surname     varchar(200),
email       varchar(255),
password    varchar(255),
created_at  datetime,
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE = innoDB;

INSERT INTO users values(NULL,"ROLE_USER","Leonardo","Portero","lvportero@gmail.com","password",CURTIME());
INSERT INTO users values(NULL,"ROLE_USER","Marco","Portero","maportero@gmail.com","password",CURTIME());
INSERT INTO users values(NULL,"ROLE_USER","Jaime","Portero","jportero@gmail.com","password",CURTIME());


CREATE TABLE IF NOT EXISTS tasks (
id          int(255) auto_increment not null,
user_id     int(255) not null,
title       varchar(255),
content     text,
priority    varchar(50),
hours       int(10),
created_at  datetime,
CONSTRAINT pk_tasks PRIMARY KEY(id),
CONSTRAINT fk_tasks_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE = innoDB;

INSERT INTO tasks values(NULL,1,"Titulo T1" ,"Contenido T1","High",40,CURTIME());
INSERT INTO tasks values(NULL,1,"Titulo T2" ,"Contenido T2","Low",20,CURTIME());
INSERT INTO tasks values(NULL,2,"Titulo T3" ,"Contenido T3","Medium",30,CURTIME());
INSERT INTO tasks values(NULL,2,"Titulo T4" ,"Contenido T4","Low",10,CURTIME());
INSERT INTO tasks values(NULL,3,"Titulo T5" ,"Contenido T5","High",50,CURTIME());
INSERT INTO tasks values(NULL,3,"Titulo T6" ,"Contenido T6","Medium",100,CURTIME());


