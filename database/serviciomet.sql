create database serviciomet;
-- drop database serviciomet;
use serviciomet;

create table anio(
	fecha int(4),
    primary key (fecha)
);
insert into anio values(2022);

create table mes(
	mes int(2),
    nombremes varchar(20),
    primary key (mes)
);
insert into mes values (1,'Enero'),(2,'Febrero'),(3,'Marzo'),(4,'Abril'),(5,'Mayo'),(6,'Junio'),(7,'Julio'),(8,'Agosto'),(9,'Septiembre'),(10,'Octubre'),(11,'Noviembre'),(12,'Diciembre');
-- select * from mes;

-- drop table mes;


create table datos(
	dia int (2),
    mes int (2),
    anio int(4),
    cantidad float(4,2),
    foreign key (mes) references mes(mes),
    foreign key (anio) references anio(fecha),
    primary key (dia,mes,anio)
);



-- select sumaPrecipitaciones(3);
select * from datos order by mes;

# drop database serviciomet;

-- select * from datos;



delimiter $$
create function sumaPrecipitaciones(dato int) returns float(8.2)
begin declare cantidadTotal float(10.2);
select sum(cantidad) into cantidadTotal from datos where mes= dato;
return cantidadTotal;
end
$$
delimiter ;

-- select cantidadDeMesesDiferentesSinLluvia();

delimiter $$
create function cantidadDeMesesDiferentesSinLLuvia() returns int
begin declare total int(30);
select count(distinct mes) into total from datos;
return Total;
end
$$
delimiter ;

delimiter $$
create procedure mesesSinLluvia()
begin
select mes from datos where sum(cantidad) = 0;
end
$$
delimiter ;

-- call mesesSinLluvia();

-- select mes from datos where sum(cantidad) = 0;

-- select count(distinct mes) from datos;
