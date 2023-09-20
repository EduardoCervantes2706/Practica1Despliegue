CREATE DATABASE CRUD_Despliegue;

use CRUD_Despliegue;

create table usuarios (
	id int auto_increment not null,
    nombre varchar(100) not null,
    email varchar(70) not null,
    pass varchar(200) not null,
    primary key (id)
);

describe usuarios;

select * from usuarios;