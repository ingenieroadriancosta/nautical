

DROP TABLE if exists operaciones;
DROP TABLE if exists  barcos;
DROP TABLE if exists  capitanes;
DROP TABLE if exists  socios;


-- Crear tabla socios.
create table if not exists socios(
    nombres varchar(16) not null,
    apellidos varchar(16) not null,
    tipo_documento int not null,
    documento bigint primary key not null,
    telefono bigint not null,
    celular bigint
);

-- Crear tabla barcos.
create table  if not exists barcos(
	matricula int not null primary key,
    nombre varchar(32) not null, 
	idamarre int,
	costoamarre int,
	id_socios bigint not null
);
-- hacer clave foranea de tabla barcos con tabla socios.
ALTER TABLE barcos
ADD CONSTRAINT fk_foreign_id_socios
FOREIGN KEY (id_socios)
REFERENCES socios(documento);



-- Crear tabla capitanes.
create table capitanes(
	nombre varchar(32),
	apellidos varchar(32),
	tipo_documento int,
	documento bigint primary key not null
);



-- Crear tabla operaciones.
-- el destino y los datos personales del Capitán del barco, 
create table if not exists operaciones(
	matricula int not null primary key,
	fecha_salida Date,
	tiempo_salida time,
	destino varchar(128),
	id_socios_or_capitanes bigint
	
	
);
-- hacer clave foranea de tabla operaciones con tabla socios.
ALTER TABLE operaciones
ADD CONSTRAINT fk_foreign_matricula
FOREIGN KEY (matricula)
REFERENCES barcos(matricula);

-- hacer clave foranea de tabla operaciones con tabla capitanes.
ALTER TABLE operaciones
ADD CONSTRAINT fk_foreign_id_socios_or_capitanes
FOREIGN KEY (id_socios_or_capitanes)
REFERENCES capitanes(documento);

-- hacer clave foranea de tabla operaciones con tabla socios.
ALTER TABLE operaciones
ADD CONSTRAINT fk_foreign_documento
FOREIGN KEY (id_socios_or_capitanes)
REFERENCES socios(documento);



