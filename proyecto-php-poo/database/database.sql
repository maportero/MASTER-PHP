CREATE DATABASE tienda_master;
USE tienda_master;

CREATE TABLE USUARIOS (
id          int(255) AUTO_INCREMENT not null, 
nombre      varchar(100) not null,
apellidos   varchar(255) ,
email       varchar(255) not null,
password    varchar(255) not null,
rol         varchar(29),
imagen      varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT  uq_email UNIQUE(email) 
) ENGINE=innoDb;

INSERT INTO USUARIOS VALUES(null,'Admin','Admin','admin@admin.com','123','admin','');

CREATE TABLE CATEGORIAS (
id          int(255) AUTO_INCREMENT not null, 
nombre      varchar(100) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id)
) ENGINE=innoDb;

INSERT INTO CATEGORIAS VALUES(null,'Manga Corta');
INSERT INTO CATEGORIAS VALUES(null,'Manga Larga');
INSERT INTO CATEGORIAS VALUES(null,'Tirantes');
INSERT INTO CATEGORIAS VALUES(null,'Sudadera');

CREATE TABLE PRODUCTOS (
id          int(255) AUTO_INCREMENT not null,
categoria_id int(255) not null, 
nombre      varchar(100) not null,
descripcion   text ,
precio      float(100,2) not null,
stock       int(255) not null,
oferta      varchar(2),
fecha       date not null,
imagen      varchar(255), 
CONSTRAINT pk_producto PRIMARY KEY(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES CATEGORIAS(id) 
) ENGINE=innoDb;

CREATE TABLE PEDIDOS (
id          int(255) AUTO_INCREMENT not null,
usuario_id  int(255) not null, 
provincia   varchar(100) not null,
localidad   varchar(100) not null,
direccion   varchar(255) not null,
coste       float(200,2) not null,
estado      varchar(20) not null,
fecha       date ,
hora        time , 
CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES USUARIOS(id) 
) ENGINE=innoDb;

CREATE TABLE LINEAS_PEDIDOS (
id          int(255) AUTO_INCREMENT not null,
pedido_id   int(255) not null,
producto_id int(255) not null,
unidades    int(100),    
CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES PEDIDOS(id),
CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES PRODUCTOS(id)
)ENGINE=innoDb; 