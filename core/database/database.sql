create database db_pietrain;
use db_pietrain;
 

create table institucion(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    titulo varchar(100) not null,
    resumen text null,
    mision varchar(500) null,
    vision varchar(500) null,
    estado int(1) default 1,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table categoria(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    institucion_id  int not null,
    nombre varchar(200) not null,
    descripcion text null,
    estado int(1) default 1,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    foreign key (institucion_id) REFERENCES institucion(id)
);

create table subcategoria(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    categoria_id  int not null,
    nombre varchar(200) not null,
    descripcion text null,
    estado int(1) default 1,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    foreign key (categoria_id) REFERENCES categoria(id)
);

create table usuario(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    institucion_id  int not null,
    dni varchar(8) not null,
    nombre varchar(50) not null,
    apellidos varchar(80) not null,
    direccion varchar(100) null,
    correo varchar(100) null,
    fecha_nacimiento date null,
    estado int(1) default 1,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    foreign key (institucion_id) REFERENCES institucion(id)
);

create table producto(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    subcategoria_id  int not null,
    usuario_id int not null,
    titulo varchar(200) not null,
    descripcion text null,
    resumen varchar(250) null,
    imagen varchar(100) null,
    estado int(1) default 1,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    foreign key (subcategoria_id) REFERENCES subcategoria(id)
);


insert into institucion (id, titulo, resumen, vision, mision)  values (1, 'EL PIETRAIN', '', '', '');




