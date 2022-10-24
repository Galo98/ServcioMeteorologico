create database serviciomet;

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
insert into mes values (1,'enero'),(2,'enero'),(3,'enero'),(4,'enero'),(5,'enero'),(6,'enero'),(7,'enero'),(8,'enero'),(9,'enero'),(10,'enero'),(11,'enero'),(12,'enero');

create table datos(
	dia int (2),
    mes int (2),
    anio int(4),
    cantidad float(4,2),
    foreign key (mes) references mes(mes),
    foreign key (anio) references anio(fecha),
    primary key (dia,mes,anio)
);