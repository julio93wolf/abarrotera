use abarrotera;

/*** Catergoria ***/

insert into categoria values (NULL,'Aceites Comestibles');
insert into categoria values (NULL,'Agua');
insert into categoria values (NULL,'Alimento para Mascotas');
insert into categoria values (NULL,'Alimentos/Abarrotes');
insert into categoria values (NULL,'Atún y Sardinas');
insert into categoria values (NULL,'Azúcar y Endulzantes');
insert into categoria values (NULL,'Bebés');
insert into categoria values (NULL,'Bebidas');
insert into categoria values (NULL,'Café y Té');
insert into categoria values (NULL,'Cereales y Avenas');
insert into categoria values (NULL,'Chiles Enlatados');
insert into categoria values (NULL,'Cloros');
insert into categoria values (NULL,'Desechables');
insert into categoria values (NULL,'Desodorantes');
insert into categoria values (NULL,'Detergentes');
insert into categoria values (NULL,'Dulcerias');
insert into categoria values (NULL,'Galletas');
insert into categoria values (NULL,'Granos y Semillas');
insert into categoria values (NULL,'Harinas');
insert into categoria values (NULL,'Jabones de Lavanderia');
insert into categoria values (NULL,'Jabones de Tocador');
insert into categoria values (NULL,'Jugos');
insert into categoria values (NULL,'Lavatrastes');
insert into categoria values (NULL,'Lácteos');
insert into categoria values (NULL,'Lavatrastes');
insert into categoria values (NULL,'Mayonesas');
insert into categoria values (NULL,'Pañales');
insert into categoria values (NULL,'Papel Higiénico');
insert into categoria values (NULL,'Refrescos');
insert into categoria values (NULL,'Servilletas y Servitoallas');
insert into categoria values (NULL,'Shampoo');
insert into categoria values (NULL,'Sopa Instantanea y Sopa de Sobre');
insert into categoria values (NULL,'Sopas');
insert into categoria values (NULL,'Suavizantes');
insert into categoria values (NULL,'Toalla Femenina');
insert into categoria values (NULL,'Velas y Veladoras');
insert into categoria values (NULL,'Higiene');

insert into proveedor values (NULL,'Grupo Herdez','herdez.jpg');
insert into proveedor values (NULL,'PepsiCo','pepsico.jpg');
insert into proveedor values (NULL,'Kimberly Clark','kimberly_clark.jpg');
insert into proveedor values (NULL,'Colgate-Palmolive','colgate.jpg');
insert into proveedor values (NULL,'La Costeña','la_costena.jpg');
insert into proveedor values (NULL,'Fábrica de Jabón la Corona','la_corona.jpg');
insert into proveedor values (NULL,'La Moderna ','la_moderna.jpg');
insert into proveedor values (NULL,'Unilever','unilever.jpg');
insert into proveedor values (NULL,'Nestlé','nestle.jpg');
insert into proveedor values (NULL,'Alpura','alpura.jpg');
insert into proveedor values (NULL,'Procter & Gamble','procter_gamble.jpg');

/*Grupo Herdez*/
insert into marca values (NULL,'McCormick',1,26);
insert into marca values (NULL,'Nair',1,4);
insert into marca values (NULL,'Herdez',1,4);
insert into marca values (NULL,'Doña María',1,4);
insert into marca values (NULL,'Carlota',1,6);
insert into marca values (NULL,'Del Fuerte',1,4);
insert into marca values (NULL,'Embasa',1,4);
/*PepsiCo*/
insert into marca values (NULL,'Gamesa',2,17);
insert into marca values (NULL,'Sabritas',2,16);
insert into marca values (NULL,'Quaker',2,19);
insert into marca values (NULL,'Gatorade',2,8);
insert into marca values (NULL,'Pepsico',2,29);
/*Kimberly Clark*/
insert into marca values (NULL,'Huggies',3,27);
insert into marca values (NULL,'Vogue',3,28);
insert into marca values (NULL,'Vogue',3,30);
insert into marca values (NULL,'Suavel',3,28);
insert into marca values (NULL,'Delsey',3,30);
insert into marca values (NULL,'Pétalo',3,28);
insert into marca values (NULL,'Pétalo',3,30);
insert into marca values (NULL,'Kleenex',3,13);
insert into marca values (NULL,'Kotex',3,35);
insert into marca values (NULL,'Cottonelle',3,28);
insert into marca values (NULL,'Fancy',3,30);
/*Colgate-Palmolive*/
insert into marca values (NULL,'Palmolive',4,31);
insert into marca values (NULL,'Suavitel',4,34);
insert into marca values (NULL,'Vel Rosita',4,34);
insert into marca values (NULL,'Fabuloso',4,15);
insert into marca values (NULL,'AJAX',4,15);
insert into marca values (NULL,'Colgate',4,37);
/*La Costeña*/
insert into marca values (NULL,'La Costeña',5,4);
insert into marca values (NULL,'Campbells',5,4);
insert into marca values (NULL,'Búfalo',5,4);
/*La Corona*/

/*McCormick*/
insert into producto values (null,'Mayonesa',1);
insert into producto values (null,'Té de Manzanilla',1);
insert into producto values (null,'Té de Hierbabuena',1);
insert into producto values (null,'Té de Limon',1);
insert into producto values (null,'Té de Canela',1);
insert into producto values (null,'Mermelada de Fresa',1);
insert into producto values (null,'Té de Canela Manzana',1);
insert into producto values (null,'Mostaza',1);
insert into producto values (null,'Té 7 Azahares',1);	
insert into producto values (null,'Especia Sal con Ajo',1);	
insert into producto values (null,'Ablandador de Carne',1);	
insert into producto values (null,'Mermelada de Zarzamora',1);	
/*Nair*/
insert into producto values (null,'Atun en Agua',2);
insert into producto values (null,'Atun en Aceite',2);
/*Herdez*/
insert into producto values (null,'Ensalada de Legumbres',3);
insert into producto values (null,'Granos de Elote',3);
insert into producto values (null,'Atun Lomo en Agua',3);
insert into producto values (null,'Duraznos en Almibar',3);
insert into producto values (null,'Champiñones Trozos',3);
insert into producto values (null,'Chícharo',3);
insert into producto values (null,'Champiñon Rebanado',3);
insert into producto values (null,'Atun Lomo en Aceite',3);
insert into producto values (null,'Chícharo con Zanahoria',3);
insert into producto values (null,'Coctel de Frutas en Almíbar',3);
insert into producto values (null,'Pimiento Morron Tira',3);
insert into producto values (null,'Salsa Verde',3);
/*Doña María*/
insert into producto values (null,'Mole',4);
insert into producto values (null,'Mole Rojo',4);
/*Carlota*/
insert into producto values (null,'Miel',5);
/*Del Fuerte*/
insert into producto values (null,'Pure de Tomate Condimentado',6);
insert into producto values (null,'Pure de Tomate',6);
/*Embasa*/
insert into producto values (null,'Salsa Catsup',7);

insert into unidad_medida values (null,'Gramos');
insert into unidad_medida values (null,'Sobres');
insert into unidad_medida values (null,'Mililitros');
insert into unidad_medida values (null,'Litro');
insert into unidad_medida values (null,'Kilogramos');

/*Mayonesa*/
insert into presentacion values (1,'SKU-MCK000001','105',1,15,12,10.4);
insert into presentacion values (1,'SKU-MCK000002','190',1,18,12,15.6);
insert into presentacion values (1,'SKU-MCK000003','390',1,30,6,27.5);
insert into presentacion values (1,'SKU-MCK000004','725',1,45,12,44);
/*Té de Manzanilla*/
insert into presentacion values (2,'SKU-MCK000005','25',2,18,12,15.9);
/*Té de Hierbabuena*/
insert into presentacion values (3,'SKU-MCK000006','25',2,18,12,15.9);
/*Té de Limon*/
insert into presentacion values (4,'SKU-MCK000007','25',2,18,12,15.9);
/*Té de Canela*/
insert into presentacion values (5,'SKU-MCK000008','25',2,18,12,15.9);
/*Mermelada de Fresa*/
insert into presentacion values (6,'SKU-MCK000009','270',1,19,12,16.7);
/*Té de Canela Manzana*/
insert into presentacion values (7,'SKU-MCK000010','25',2,30,24,27.9);
/*Mostaza*/
insert into presentacion values (8,'SKU-MCK000011','115',1,10,12,8.2);
insert into presentacion values (8,'SKU-MCK000012','210',1,15,12,10.7);
/*Té 7 Azahares*/
insert into presentacion values (9,'SKU-MCK000013','25',2,26,12,22.4);
/*Especia Sal con Ajo*/
insert into presentacion values (10,'SKU-MCK000014','157',1,20,6,17.9);
insert into presentacion values (10,'SKU-MCK000015','1170',1,98,3,89.9);
/*Ablandador de Carne*/
insert into presentacion values (11,'SKU-MCK000016','992',1,82,6,77.4);
/*Mermelada de Zarzamora*/
insert into presentacion values (12,'SKU-MCK000017','500',1,35,12,27.9);

/*Atun en Agua*/
insert into presentacion values (13,'SKU-NAI0000001','130',1,15,24,12.7);
/*Atun en Aceite*/
insert into presentacion values (14,'SKU-NAI0000002','130',1,15,24,12.7);

/*Ensalada de Legumbres*/
insert into presentacion values (15,'SKU-HDZ000001','400',1,13,24,10.8);
insert into presentacion values (15,'SKU-HDZ000002','220',1,13,24,6.9);
/*Granos de Elote*/
insert into presentacion values (16,'SKU-HDZ000003','220',1,10,12,7.3);
/*Atun Lomo en Agua*/
insert into presentacion values (17,'SKU-HDZ000004','130',1,18,24,15.75);
/*Duraznos en Almibar*/
insert into presentacion values (18,'SKU-HDZ000005','800',1,47,12,43.30);
/*Champiñones Trozos*/
insert into presentacion values (19,'SKU-HDZ000006','186',1,16,12,13);
/*Chícharo*/
insert into presentacion values (20,'SKU-HDZ000007','215',1,8,24,5.70);
insert into presentacion values (20,'SKU-HDZ000008','400',1,12,24,9.60);
/*Champiñon Rebanado*/
insert into presentacion values (21,'SKU-HDZ000009','380',1,28,12,25.2);
insert into presentacion values (21,'SKU-HDZ000010','800',1,46,6,42.2);
/*Atun Lomo en Aceite*/
insert into presentacion values (22,'SKU-HDZ000011','130',1,20,48,15.3);
/*Chícharo con Zanahoria*/
insert into presentacion values (23,'SKU-HDZ000012','225',1,10,24,6.8);
insert into presentacion values (23,'SKU-HDZ000013','400',1,15,24,11.3);
/*Coctel de Frutas en Almíbar*/
insert into presentacion values (24,'SKU-HDZ000014','850',1,55,12,49.5);
/*Pimiento Morron Tira*/
insert into presentacion values (25,'SKU-HDZ000015','185',1,16,24,14.3);
/*Salsa Verde*/
insert into presentacion values (26,'SKU-HDZ000016','210',1,12,24,8.8);

/*Roles*/
insert into rol values (null,'Cliente');
insert into rol values (null,'Administrador');

/*Usuarios*/
insert into usuario values (null,'abc123@gmail.com','123');
insert into usuario values (null,'abc456@gmail.com','123');
insert into usuario values (null,'def123@gmail.com','123');
insert into usuario values (null,'def456@gmail.com','123');

insert into usuario_rol values (1,1);
insert into usuario_rol values (2,1);
insert into usuario_rol values (3,2);
insert into usuario_rol values (4,2);

insert into cliente values (null,1,'Juan',null,null,null,null);
insert into cliente values (null,2,'Maria',null,null,null,null);

insert into empleado values (null,3,'Pedro',null,null);
insert into empleado values (null,4,'Alfonso',null,null);

insert into sucursal values (null,'Celaya');
insert into sucursal values (null,'Cortazar');

/*Carrito y Carrito Detalle*/
insert into carrito values (null,1,3,1,'2017-7-5');
insert into carrito_detalle values (1,'SKU-MCK000001',10,15.00,0);
insert into carrito_detalle values (1,'SKU-MCK000005',5,18.00,0);
insert into carrito_detalle values (1,'SKU-HDZ000010',3,46.00,0);

insert into carrito values (null,2,4,1,'2017-7-8');
insert into carrito_detalle values (2,'SKU-HDZ000006',10,16.00,0);
insert into carrito_detalle values (2,'SKU-HDZ000013',5,15.00,0);
insert into carrito_detalle values (2,'SKU-HDZ000016',3,12.00,0);

insert into carrito values (null,2,3,2,'2017-7-8');
insert into carrito_detalle values (3,'SKU-HDZ000007',10,8.00,0);
insert into carrito_detalle values (3,'SKU-HDZ000008',5,12.00,0);
insert into carrito_detalle values (3,'SKU-HDZ000009',3,28.00,0);

insert into promocion values (null,'2017-7-3','2017-7-8','');
insert into promocion values (null,'2017-7-15','2017-7-9','');

drop view productos_view;
create view productos_view as
select cat.id_categoria,cat.categoria,mar.id_marca,pro.id_producto,pro.producto,pre.sku,pre.presentacion,um.id_unidad_medida,um.unidad_medida,pre.preciou,pre.cantidadm,pre.preciom,pre.imagen
from categoria cat inner join marca mar on cat.id_categoria = mar.id_categoria
					inner join producto pro on pro.id_marca = mar.id_marca
                    inner join presentacion pre on pre.id_producto = pro.id_producto
                    inner join unidad_medida um on pre.id_unidad_medida = um.id_unidad_medida
order by producto asc;

use abarrotera;                    

/*Top 5*/
/*sku, id_producto, presentacion*/
drop view top5_view;
create view top5_view as
select pro.producto,pre.presentacion,cd.sku, sum(cd.cantidad) as cantidad
from carrito_detalle cd inner join presentacion pre on cd.sku = pre.sku
						inner join producto pro on pre.id_producto = pro.id_producto
group by 1,2,3 order by sum(cantidad) desc
limit 5;

/*5 productos random*/
create view rand5_view as
select pro.producto,pre.presentacion,cd.sku
from carrito_detalle cd inner join presentacion pre on cd.sku = pre.sku
						inner join producto pro on pre.id_producto = pro.id_producto
group by 1,2,3 order by rand() desc
limit 5;

select * from rand5_view;

select * from promocion;

select *
from promocion 
where now() between fechai and fechat;

/*Promociones 680 X 300*/