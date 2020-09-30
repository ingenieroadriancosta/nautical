
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
	matricula bigint not null primary key,
    nombres varchar(32) not null, 
	idamarre bigint,
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
	nombres varchar(32),
	apellidos varchar(32),
	tipo_documento int,
	documento bigint primary key not null
);



-- Crear tabla operaciones.
-- el destino y los datos personales del Capit�n del barco, 
create table if not exists operaciones(
	idoperaciones bigint not null primary key AUTO_INCREMENT,
	matricula bigint not null,
	fecha_salida Date,
	tiempo_salida time,
	destino varchar(128),
	idsocios bigint,
	idcapitanes bigint
);
-- hacer clave foranea de tabla operaciones con tabla socios.
ALTER TABLE operaciones
ADD CONSTRAINT fk_foreign_matricula
FOREIGN KEY (matricula)
REFERENCES barcos(matricula);

-- hacer clave foranea de tabla operaciones con tabla capitanes.
ALTER TABLE operaciones
ADD CONSTRAINT fk_foreign_idcapitanes
FOREIGN KEY (idcapitanes)
REFERENCES capitanes(documento);

-- hacer clave foranea de tabla operaciones con tabla socios.
ALTER TABLE operaciones
ADD CONSTRAINT fk_foreign_idsocios
FOREIGN KEY (idsocios)
REFERENCES socios(documento);



