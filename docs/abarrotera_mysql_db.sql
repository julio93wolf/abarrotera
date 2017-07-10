drop database if exists abarrotera;
create database abarrotera default charset utf8 default collate utf8_general_ci;
use abarrotera;

create table proveedor(
	id_proveedor int auto_increment primary key,
	proveedor varchar (100) not null
);

create table categoria(
	id_categoria int auto_increment primary key,
	categoria varchar (100) not null
);

create table marca(
	id_marca int auto_increment primary key,
	marca varchar (100) not null,
	id_proveedor int references proveedor (id_proveedor),
	id_categoria int references categoria (id_categoria)
);

create table unidad_medida(
	id_unidad_medida int auto_increment primary key,
	unidad_medida varchar (100) not null
);

alter table proveedor add column logo varchar(100);

create table producto(
	id_producto int auto_increment primary key,
	producto varchar (100) not null,
	id_marca int references marca (id_marca)
);

create table presentacion(
	id_producto int references producto (id_producto),
	sku varchar(13) primary key,
	presentacion varchar (100) not null,
	id_unidad_medida int references unidad_medida (id_unidad_medida),
	preciou numeric (10,2) not null,
	cantidadm numeric (10,2) not null,
	preciom numeric (10,2) not null
);

create table promocion(
	id_promocion int auto_increment primary key,
	codigo varchar (13) not null,
	sku varchar (13) references presentacion(sku),
	fechai date not null,
	fechat date not null
);

alter table promocion add column descuento numeric (3,2) not null;
alter table promocion add column imagen varchar (100) not null;

alter table promocion drop column codigo;
alter table promocion drop column sku;
alter table promocion drop column descuento;

create table promocion_producto(
	id_promocion int references promocion (id_promocion),
	sku varchar (13) references presentacion (sku),
	descuento numeric (5,2) not null
);

/* Usuarios */

create table rol(
	id_rol int auto_increment primary key,
	rol varchar (100) not null
);

create table usuario(
	id_usuario int auto_increment primary key,
	correo varchar (100) not null unique,
	contraseña varchar (32) not null
);

create table usuario_rol(
	id_usuario int references usuario (id_usuario),
	id_rol int references rol (id_rol),
	primary key (id_usuario,id_rol)
);

create table cliente (
	id_cliente int auto_increment primary key,
	id_usuario int references usuario (id_usuario),
	nombre varchar (100) not null,
	apaterno varchar (100),
	amaterno varchar (100),
	domicilio text,
	foto varchar (100)
);

create table sucursal(
	id_sucursal int auto_increment primary key,
	sucursal varchar (100) not null
);

create table empleado(
	id_empleado int auto_increment primary key,
	id_usuario int references usuario (id_usuario),
	nombre varchar (100) not null,
	apaterno varchar (100),
	amaterno varchar (100)
);

create table carrito(
	id_carrito int auto_increment primary key,
	id_cliente int references cliente (id_cliente),
	id_empleado int references empleado (id_empleado),
	id_sucursal int references sucursal (id_sucursal),
	fecha date not null
);

create table carrito_detalle(
	id_carrito int references carrito (id_carrito),
	sku varchar (13) references presentacion (sku),
	cantidad numeric(12,3) not null,
	precio_unitario numeric(10,2) not null,
	descuento_aplicado numeric(10,2) not null
);

alter table presentacion add column imagen varchar (100) not null;

create user 'gerente'@'localhost' identified by '12345';
grant all on abarrotera.* to 'gerente'@'localhost';

create table comentario (
	id_comentario int auto_increment,
	id_cliente int,
    nombre varchar (100) not null,
    email varchar (100) not null,
    tipo_comentario varchar (100) not null,
    comentario text not null,
    fecha date,
    primary key (id_comentario),
    foreign key (id_cliente) references cliente (id_cliente)
);

select * from comentario;