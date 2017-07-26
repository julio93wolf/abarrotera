create table proveedor(
	id_proveedor serial,
	proveedor varchar (100) not null,
    primary key (id_proveedor)
);

create table categoria(
	id_categoria serial,
	categoria varchar (100) not null,
    primary key (id_categoria)
);

create table marca(
	id_marca serial,
	marca varchar (100) not null,
	id_proveedor int not null,
	id_categoria int not null,
    primary key (id_marca),
    foreign key (id_proveedor) references proveedor (id_proveedor),
    foreign key (id_categoria) references categoria (id_categoria)
);

create table unidad_medida(
	id_unidad_medida serial,
	unidad_medida varchar (100) not null,
    primary key (id_unidad_medida)
);

alter table proveedor add column logo varchar(100);

create table producto(
	id_producto serial,
	producto varchar (100) not null,
	id_marca int not null,
    primary key (id_producto),
    foreign key (id_marca) references marca (id_marca)
);

create table presentacion(
	id_producto int not null,
	sku varchar(13) not null,
	presentacion varchar (100) not null,
	id_unidad_medida int not null,
	preciou numeric (10,2) not null,
	cantidadm numeric (10,2) not null,
	preciom numeric (10,2) not null,
    imagen varchar (100) not null,
    primary key (sku),
    foreign key (id_producto) references producto (id_producto),
    foreign key (id_unidad_medida) references unidad_medida (id_unidad_medida)
);

create table promocion(
	id_promocion serial ,
	fechai date not null,
	fechat date not null,
    imagen varchar (100) not null,
    primary key (id_promocion)
);

create table promocion_producto(
	id_promocion int not null,
	sku varchar (13) not null,
	descuento numeric (5,2) not null,
    primary key (id_promocion,sku),
    foreign key (id_promocion) references promocion (id_promocion),
    foreign key (sku) references presentacion (sku)
);

create table rol(
	id_rol serial,
	rol varchar (100) not null,
    primary key (id_rol)
);

create table usuario(
	id_usuario serial,
	correo varchar (100) not null unique,
	contrasena varchar (32) not null,
    primary key (id_usuario)
);

create table usuario_rol(
	id_usuario int not null,
	id_rol int not null,
	primary key (id_usuario,id_rol),
    foreign key (id_usuario) references usuario (id_usuario),
    foreign key (id_rol) references rol (id_rol)
);

create table cliente (
	id_cliente serial,
	id_usuario int not null,
	nombre varchar (100) not null,
	apaterno varchar (100),
	amaterno varchar (100),
	domicilio text,
	foto varchar (100),
	primary key (id_cliente),
    foreign key (id_usuario) references usuario (id_usuario)
);

create table sucursal(
	id_sucursal serial,
	sucursal varchar (100) not null,
    primary key (id_sucursal)
);

create table empleado(
	id_empleado serial,
	id_usuario int not null,
	nombre varchar (100) not null,
	apaterno varchar (100),
	amaterno varchar (100),
    primary key (id_empleado),
    foreign key (id_usuario) references usuario (id_usuario)
);

create table carrito(
	id_carrito serial,
	id_cliente int not null,
	id_empleado int not null,
	id_sucursal int not null,
	fecha date not null,
    primary key (id_carrito),
    foreign key (id_cliente) references cliente (id_cliente),
    foreign key (id_empleado) references empleado (id_empleado),
    foreign key (id_sucursal) references sucursal (id_sucursal)
);

create table carrito_detalle(
	id_carrito int not null,
	sku varchar (13) not null,
	cantidad numeric(12,3) not null,
	precio_unitario numeric(10,2) not null,
	descuento_aplicado numeric(10,2) not null,
    primary key (id_carrito,sku),
    foreign key (id_carrito) references carrito (id_carrito),
    foreign key (sku) references presentacion (sku)
);

create table comentario (
	id_comentario serial,
	id_cliente int,
    nombre varchar (100) not null,
    email varchar (100) not null,
    tipo_comentario varchar (100) not null,
    comentario text not null,
    fecha date not null,
    primary key (id_comentario),
    foreign key (id_cliente) references cliente (id_cliente)
);




/* Productos */
drop view  if exists productos_view;
create view productos_view as
select cat.id_categoria,cat.categoria,mar.id_marca,pro.id_producto,pro.producto,pre.sku,pre.presentacion,um.id_unidad_medida,um.unidad_medida,pre.preciou,pre.cantidadm,pre.preciom,pre.imagen
from categoria cat inner join marca mar on cat.id_categoria = mar.id_categoria
					inner join producto pro on pro.id_marca = mar.id_marca
                    inner join presentacion pre on pre.id_producto = pro.id_producto
                    inner join unidad_medida um on pre.id_unidad_medida = um.id_unidad_medida
order by producto asc;

/* Top 5 más vendidos */
drop view if exists vw_top;
create view vw_top as
select pro.producto,pre.presentacion,cd.sku, sum(cd.cantidad) as cantidad
from carrito_detalle cd inner join presentacion pre on cd.sku = pre.sku
						inner join producto pro on pre.id_producto = pro.id_producto
group by 1,2,3 order by sum(cantidad) desc
limit 5;

/* 5 productos recomendados random */
drop view if exists vw_rand;
create view vw_rand as
select pro.producto,pre.presentacion,cd.sku
from carrito_detalle cd inner join presentacion pre on cd.sku = pre.sku
						inner join producto pro on pre.id_producto = pro.id_producto
group by 1,2,3 order by rand() desc
limit 5;

drop view  if exists vw_productos;
create view vw_productos as
select 
	cat.id_categoria,
    cat.categoria,
    mar.id_marca,
    pro.id_producto,
    pro.producto,
    um.id_unidad_medida,
    pre.sku,
    pre.presentacion,
    um.unidad_medida,
    pre.preciou,
    pre.cantidadm,
    pre.preciom,
    pre.imagen,
    ifnull(prp.descuento,0) as descuento,
    cast(pre.preciou-(pre.preciou*(ifnull(prp.descuento,0))/100) as decimal(10,2)) as preciou_descuento,
    cast(pre.preciom-(pre.preciom*(ifnull(prp.descuento,0))/100) as decimal(10,2)) as preciom_descuento
from 
	categoria cat 
	inner join marca mar on cat.id_categoria = mar.id_categoria
	left join producto pro on pro.id_marca = mar.id_marca
    right join presentacion pre on pre.id_producto = pro.id_producto
    left join unidad_medida um on pre.id_unidad_medida = um.id_unidad_medida
    left join promocion_producto prp on prp.sku = pre.sku
order by producto asc;

alter table usuario add llave varchar (96);