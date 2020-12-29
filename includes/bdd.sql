--CREAMOS LA BASE DE DATOS
CREATE DATABASE Sistema_Compras

-- CREAMOS LOS DOMINIOS 
CREATE DOMAIN dom_id as integer;
CREATE DOMAIN dom_rif as varchar(10);
CREATE DOMAIN dom_nombre as varchar(20);
CREATE DOMAIN dom_descripcion as text;
CREATE DOMAIN dom_direccion as varchar(36);
CREATE DOMAIN dom_condic as varchar(36);
CREATE DOMAIN dom_telefono as varchar(15);
CREATE DOMAIN dom_email as varchar(25);
CREATE DOMAIN dom_unidad as varchar(5);
CREATE DOMAIN dom_fecha as date;
CREATE DOMAIN tipopago   as varchar(10)   CHECK (VALUE IN('Contado','Credito'));
CREATE DOMAIN tipomoneda as varchar(10)   CHECK (VALUE IN('Bs','Divisas'));
CREATE DOMAIN dom_cantidad as integer CHECK (value > 0);
CREATE DOMAIN dom_precio as real CHECK (value > 0);
CREATE DOMAIN dom_razon as varchar(30);
CREATE DOMAIN dom_cca as varchar(30);
CREATE DOMAIN dom_nota as varchar(30);
CREATE DOMAIN dom_orden as varchar(30);
CREATE DOMAIN dom_prioridad as varchar(15);

-- CREAMOS TABLA PARA LOS USUARIOS QUE MANEJARAN EL SISTEMA
CREATE TABLE Usuario(
	id          serial	 	NOT NULL,
	usuario 	dom_nombre  NOT NULL,
	contrasena 	varchar(20) NOT NULL,
	PRIMARY KEY (id)
);

-- CREAMOS TABLA EMPLEADO
CREATE TABLE Empleado(
	id 			serial			NOT NULL,
	nombre		dom_nombre		NOT NULL,
	direccion   dom_direccion	NOT NULL,
	telefono	dom_telefono	NOT NULL,
	email		dom_email		NOT NULL,
	PRIMARY KEY (id)
);

-- CREAMOS TABLA SOLICITUD DE COMPRA
CREATE TABLE Solicitud_compra(
	id      		serial			NOT NULL,
	fde				dom_fecha		NOT NULL,	
	prioridad		dom_prioridad	NOT NULL,
	nota			dom_nota		NOT NULL,
	precio_estimado dom_precio		NOT NULL,
	PRIMARY KEY (id)
);

-- CREAMOS TABLA DEPENDECIA
CREATE TABLE Dependencia(
	id 					serial			NOT NULL,
	id_empleado 		dom_id			NOT NULL,
	numero_solicitud    dom_id			NOT NULL,
	nombre				dom_nombre		NOT NULL,
	cca					dom_cca			NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY(id_empleado) REFERENCES Empleado(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(numero_solicitud) REFERENCES Solicitud_compra(id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- CREAMOS TABLA COTIZACION
CREATE TABLE Cotizacion(
	id 					serial			NOT NULL,
	numero_solicitud    dom_id			NOT NULL,
	fde					dom_fecha		NOT NULL,
	orden				dom_orden		NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY(numero_solicitud) REFERENCES Solicitud_compra(id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- CREAMOS TABLA ORDEN DE COMPRA
CREATE TABLE Orden_compra(
	id 			serial			NOT NULL,
	fde			dom_fecha		NOT NULL,
	fdo			dom_fecha		NOT NULL,
	monto_orden dom_precio		NOT NULL,
	PRIMARY KEY (id)
);

-- CREAMOS TABLA PROVEEDOR
CREATE TABLE Proveedor(
	rif 			dom_rif 			NOT NULL,
	num_oc		  	dom_id  		NOT NULL,
	razon_social	dom_razon		NOT NULL,
	direccion		dom_direccion  	NOT NULL,
	PRIMARY KEY (rif),
	FOREIGN KEY(num_oc) REFERENCES Orden_compra(id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- CREAMOS TABLA TELEFONO PROVEEDOR
CREATE TABLE Telefono_proveedor(
	rif			dom_rif			NOT NULL,
	telefono	dom_telefono	NOT NULL,
	PRIMARY KEY (rif),
	FOREIGN KEY(rif) REFERENCES Proveedor(rif) ON DELETE SET NULL ON UPDATE CASCADE
);

-- CREAMOS TABLA EMAIL PROVEEDOR
CREATE TABLE Email_proveedor(
	rif     dom_rif			NOT NULL,
	email	dom_email		NOT NULL,
	PRIMARY KEY (rif),
	FOREIGN KEY(rif) REFERENCES Proveedor(rif) ON DELETE SET NULL ON UPDATE CASCADE
);

-- CREAMOS TABLA RESPUESTA COTIZACION
CREATE TABLE Respuesta_cotizacion(
	id_cotizacion   		dom_id		NOT NULL UNIQUE,
	rif						dom_rif		NOT NULL UNIQUE,
	num_oc					dom_id      NOT NULL,
	forma_pago				tipopago	NOT NULL,
	moneda					tipomoneda  NOT NULL,
	condiciones_entrega		dom_condic  NOT NULL,
	PRIMARY KEY (id_cotizacion,rif,num_oc),
	FOREIGN KEY(id_cotizacion) REFERENCES Cotizacion(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(rif) REFERENCES Proveedor(rif) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(num_oc) REFERENCES Orden_compra(id) ON DELETE SET NULL ON UPDATE CASCADE
);



-- CREAMOS TABLA ARTICULOS
CREATE TABLE Articulo(
	id 			serial			NOT NULL,
	nombre		dom_nombre		NOT NULL,
	descripcion dom_descripcion	NOT NULL,
	unidad		dom_unidad		NOT NULL,
	precio		dom_precio 		NOT NULL,
	PRIMARY KEY (id)
);

-- CREAMOS TABLA ARTICULO SOLICITADO
CREATE TABLE Articulo_solicitado(
	numero_solicitud  dom_id  	   NOT NULL UNIQUE,
	id_articulo		  dom_id  	   NOT NULL UNIQUE,
	cant			  dom_cantidad NOT NULL,
	precio_aproximado dom_precio   NOT NULL,
	PRIMARY KEY (numero_solicitud,id_articulo),
	FOREIGN KEY(numero_solicitud) REFERENCES Solicitud_compra(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(id_articulo) REFERENCES Articulo(id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- CREAMOS TABLA INDICA
CREATE TABLE Indica(
	numero_articulo dom_id  		NOT NULL,
	id_articulo     dom_id  		NOT NULL,
	id_cotizacion   dom_id  		NOT NULL,
	rif_cotizacion  dom_rif 		NOT NULL, 
	num_oc			dom_id  		NOT NULL,
	cantidad		dom_cantidad	NOT NULL,
	precio			dom_precio		NOT NULL,
	PRIMARY KEY (numero_articulo,id_articulo,id_cotizacion,rif_cotizacion,num_oc),
	FOREIGN KEY(numero_articulo)  REFERENCES Articulo_solicitado(numero_solicitud) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(id_articulo) 	  REFERENCES Articulo_solicitado(id_articulo) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(id_cotizacion)  REFERENCES Respuesta_cotizacion(id_cotizacion) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(rif_cotizacion) REFERENCES Respuesta_cotizacion(rif) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(num_oc) REFERENCES Orden_compra(id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- CREAMOS TABLA LINEA DE SUMINISTRO
CREATE TABLE Linea_suministro(
	id 				 serial			NOT NULL,
	id_articulo  	 dom_id			NOT NULL,
	id_cotizacion 	 dom_id			NOT NULL,
	numero_solicitud dom_id			NOT NULL,
	nombre			 dom_nombre		NOT NULL,			
	PRIMARY KEY (id),
	FOREIGN KEY(id_articulo) REFERENCES Articulo(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(id_cotizacion) REFERENCES Cotizacion(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(numero_solicitud) REFERENCES Solicitud_compra(id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- CREAMOS TABLA INCORPORA
CREATE TABLE Incorpora(
	id_linea  dom_id  NOT NULL,
	rif		  dom_rif NOT NULL,
	PRIMARY KEY (id_linea,rif),
	FOREIGN KEY(id_linea) REFERENCES Linea_suministro(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(rif) REFERENCES Proveedor(rif) ON DELETE SET NULL ON UPDATE CASCADE
);

-- CREAMOS TABLA ENVIADA
CREATE TABLE Enviada(
	id_cotizacion dom_id  NOT NULL,
	rif		      dom_rif NOT NULL,	
	PRIMARY KEY (id_cotizacion,rif),
	FOREIGN KEY(id_cotizacion) REFERENCES Cotizacion(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(rif) REFERENCES Proveedor(rif) ON DELETE SET NULL ON UPDATE CASCADE
);

-- CREAMOS TABLA JEFE DE UNIDAD
CREATE TABLE Jefe_unidad(
	id_empleado        dom_id	NOT NULL,
	id_dependencia	   dom_id	NOT NULL,	
	numero_solicitud dom_id	NOT NULL,
	PRIMARY KEY (id_empleado),
	FOREIGN KEY(id_empleado) REFERENCES Empleado(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(numero_solicitud) REFERENCES Solicitud_compra(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(id_dependencia) REFERENCES Dependencia(id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- CREAMOS TABLA DIRECTOR
CREATE TABLE Director(
	id_empleado			dom_id	NOT NULL,
	numero_solicitud    dom_id	NOT NULL,
	PRIMARY KEY (id_empleado),
	FOREIGN KEY(id_empleado) REFERENCES Empleado(id) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(numero_solicitud) REFERENCES Solicitud_compra(id) ON DELETE SET NULL ON UPDATE CASCADE
);