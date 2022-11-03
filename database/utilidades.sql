
# Creacion de Funcion suma sumaPrecipitaciones 

delimiter $$
create function sumaPrecipitaciones(dato int) returns float(8.2)
begin declare cantidadTotal float(10.2);
select sum(cantidad) into cantidadTotal from datos where mes= dato;
return cantidadTotal;
end
$$
delimiter ;

# Uso de sumaPrecipitaciones
-- select sumaPrecipitaciones(3);


# Creacion de funcion cantidadDeMesesDiferentesSinLLuvia 

delimiter $$
create function cantidadDeMesesDiferentesSinLLuvia() returns int
begin declare total int(30);
select count(distinct mes) into total from datos;
return Total;
end
$$
delimiter ;

# Uso de cantidadDeMesesDiferentesSinLLuvia
-- select cantidadDeMesesDiferentesSinLluvia();

# Creacion del procedimiento mesesSinLluvia

delimiter $$
create procedure mesesSinLluvia()
begin
select mes from datos where sum(cantidad) = 0;
end
$$
delimiter ;

# Uso del procedimiento mesesSinLluvia
-- call mesesSinLluvia();


# experimentos
-- select mes from datos where sum(cantidad) = 0;
-- select count(distinct mes) from datos;
