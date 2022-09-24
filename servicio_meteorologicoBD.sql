-- drop database escuela;
create database servicio_meteorologico_bd;
use servicio_meteorologico_bd;

create table dia(
    id_dia int AUTO_INCREMENT,
    fecha date,
    primary key(id_dia)
    );

create table llovio(
    id int,
    if_rain boolean,
    cantidad float,
    tipo_clima varchar (30),
    primary key(id),
    id_dia int,
    foreign key(dia) references dia(id_dia)
);