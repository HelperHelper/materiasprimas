CREATE DATABASE IF NOT EXISTS materiasprimas;
USE materiasprimas;


CREATE TABLE users(
	id int(255)  auto_increment not null,
	rol varchar(20),
	name varchar(255),
	apellido varchar(255),
	email varchar(255),
	telefono varchar(255),
	password varchar(255) not null,
	nombre_tienda varchar(255),
	created_at datetime,
	updated_at datetime,
	remember_token varchar(255),
	CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE tiendas(
    id int(255) auto_increment not null,
    users_id int(255) not null,
    name varchar(255),
    direccion varchar(255),
    email varchar(255),
    telefono varchar(255),
    imagen varchar(255),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_tiendas PRIMARY KEY(id),
    CONSTRAINT fk_tiendas_users FOREIGN KEY(users_id) REFERENCES users(id)
  
   

)ENGINE=InnoDb;


CREATE TABLE materiaprima(
	id int(255) auto_increment not null,
	users_id int(255) not null,
	tienda_id int(255) not null,
	nombre varchar(255),
	imagen varchar(255),
	cantidad int(255),
	precio decimal,
	descripcion text,
	deshabilitar int,
	created_at datetime,
	updated_at datetime,
    CONSTRAINT pk_materiaprima PRIMARY KEY(id),
    CONSTRAINT fk_materiaprima_users FOREIGN KEY(users_id) REFERENCES users(id),
    CONSTRAINT fk_materiaprima_tiendas FOREIGN KEY(tienda_id) REFERENCES tiendas(id)
   
    

)ENGINE=InnoDb;



CREATE TABLE compras(
   id int(255) auto_increment not null,
   materiaprima_id int(255) not null,
   users_id int(255) not null,
   nombre varchar(255),
   cantidad int(255),
   precio decimal,
   cantidadvendida int(255),
   created_at datetime,
   updated_at datetime,
  CONSTRAINT pk_compras PRIMARY KEY(id),
  CONSTRAINT fk_compras_materiaprima FOREIGN KEY(materiaprima_id) REFERENCES materiaprima(id),
  CONSTRAINT fk_compras_users FOREIGN KEY(users_id) REFERENCES users(id)   

)ENGINE=InnoDb;

CREATE TABLE mediosdepago(
	id int(255)  auto_increment not null,
	tipodepago varchar(20),
	numero varchar(255),
	created_at datetime,
	updated_at datetime,
	CVV varchar(255),
    compra_id int(255) not null,
    users_id int(255) not null,
	CONSTRAINT pk_mediosdepago PRIMARY KEY(id),
	CONSTRAINT fk_mediosdepago_compras FOREIGN KEY(compra_id) REFERENCES compras(id),
	CONSTRAINT fk_mediosdepago_users FOREIGN KEY(users_id) REFERENCES users(id)
)ENGINE=InnoDb;


CREATE TABLE facturas(
	id int(255) auto_increment not null,
	compra_id int(255) not null,
	tienda_id int(255) not null,
	users_id int(255) not null,
	created_at datetime,
	updated_at datetime,
	CONSTRAINT pk_facturas PRIMARY KEY(id),
	CONSTRAINT fk_facturas_compras FOREIGN KEY(compra_id) REFERENCES compras(id),
	CONSTRAINT fk_facturas_tiendas FOREIGN KEY(tienda_id) REFERENCES tiendas(id),
	CONSTRAINT fk_facturas_users FOREIGN KEY(users_id) REFERENCES users(id)

)ENGINE=InnoDb;