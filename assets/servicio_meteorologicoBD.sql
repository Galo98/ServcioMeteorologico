#drop database servicio_meteorologico_bd;
create database servicio_meteorologico_bd;
use servicio_meteorologico_bd;

create table dia(
    id_dia int AUTO_INCREMENT,
    fecha date,
    primary key(id_dia)
    );

create table llovio(
    id int auto_increment,
    if_rain boolean,
    cantidad float,
    tipo_clima varchar (30),
    id_dia int,
    primary key(id),
    foreign key(id_dia) references dia(id_dia)
);

#select * from dia;
#select * from llovio;