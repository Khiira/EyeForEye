
CREATE TABLE Administrador
(
	Run_Admin            VARCHAR(10) NOT NULL,
	Nombre_Admin         VARCHAR(20) NOT NULL,
	Apellido_Admin       VARCHAR(20) NOT NULL,
	NombreUsuario_Admin  VARCHAR(10) NOT NULL,
	Clave                VARCHAR(10) NOT NULL,
	PRIMARY KEY (Run_Admin)
);



CREATE TABLE Categoria
(
	ID_Categoria         INTEGER AUTO_INCREMENT,
	NombreCategoria      VARCHAR(15) NOT NULL,
	Descripcion          VARCHAR() NOT NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (ID_Categoria)
);



CREATE TABLE Ciudad
(
	ID_Ciudad            INTEGER AUTO_INCREMENT,
	Ciudad               VARCHAR(20) NOT NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (ID_Ciudad)
);



CREATE TABLE Denuncias
(
	ID_Denuncia          INTEGER AUTO_INCREMENT,
	Cant_Denuncias       INTEGER NOT NULL,
	ID_EstadoDenun       INTEGER NOT NULL,
	Run_Denunciante      VARCHAR(10) NOT NULL,
	ID_Publicacion       INTEGER NOT NULL,
	Run_examinador       VARCHAR(10) NOT NULL,
	ID_Razon             INTEGER NOT NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (ID_Denuncia)
);



CREATE TABLE Estado
(
	ID_Estado            INTEGER AUTO_INCREMENT,
	tipo_estado          VARCHAR(10) NOT NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (ID_Estado)
);



CREATE TABLE Estado_Publicacion
(
	ID_EstadoPubli       INTEGER AUTO_INCREMENT,
	NombreEstado         VARCHAR(10) NOT NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (ID_EstadoPubli)
);



CREATE TABLE EstadoDenuncia
(
	ID_EstadoDenun       INTEGER AUTO_INCREMENT,
	NombreEstado         VARCHAR(10) NOT NULL,
	Descripcion          VARCHAR() NOT NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (ID_EstadoDenun)
);



CREATE TABLE HistorialPublicacion
(
	ID_Historial         INTEGER AUTO_INCREMENT,
	Cant_Publicaciones   INTEGER NOT NULL,
	Run_Asociado         VARCHAR(10) NOT NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (ID_Historial)
);



CREATE TABLE Mensaje
(
	ID_Mensaje           INTEGER AUTO_INCREMENT,
	Contenido            VARCHAR() NOT NULL,
	RutDestino           VARCHAR(10) NOT NULL,
	Respuesta            VARCHAR() NOT NULL,
	Run_Emisor           VARCHAR(10) NOT NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (ID_Mensaje)
);



CREATE TABLE Notificaciones
(
	ID_Notificacion      INTEGER AUTO_INCREMENT,
	Contenido            VARCHAR() NOT NULL,
	Fecha                DATE NOT NULL,
	Hora                 TIME NOT NULL,
	ID_TipoNoti          INTEGER NOT NULL,
	Admin_Envia          VARCHAR(10) NOT NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (ID_Notificacion)
);



CREATE TABLE Publicacion
(
	ID_Publicacion       INTEGER AUTO_INCREMENT,
	Contenido            VARCHAR() NOT NULL,
	Fecha                DATE NOT NULL,
	Hora                 TIME NOT NULL,
	ID_TipoPublicacion   INTEGER NOT NULL,
	ID_Categoria         INTEGER NOT NULL,
	ID_EstadoPubli       INTEGER NOT NULL,
	Run_Publicador       VARCHAR(10) NOT NULL,
	ID_Historial         INTEGER NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (ID_Publicacion)
);



CREATE TABLE RazonDenuncia
(
	ID_Razon             INTEGER AUTO_INCREMENT,
	Motivo               VARCHAR(20) NOT NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (ID_Razon)
);



CREATE TABLE RegistroActividad
(
	Id_Registro          INTEGER AUTO_INCREMENT,
	Run_Asociado         VARCHAR(10) NOT NULL,
	Actividad            VARCHAR() NOT NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (Id_Registro)
);



CREATE TABLE Reportes
(
	ID_Reporte           INTEGER AUTO_INCREMENT,
	Fecha                DATE NOT NULL,
	Hora                 TIME NOT NULL,
	Run_Encargado        VARCHAR(10) NOT NULL,
	Run_Asociado         VARCHAR(10) NOT NULL,
	Id_Registro          INTEGER NOT NULL,
	ID_Historial         INTEGER NOT NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (ID_Reporte)
);



CREATE TABLE TipoNotificacion
(
	ID_TipoNoti          INTEGER AUTO_INCREMENT,
	NombreTipo           VARCHAR(10) NOT NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (ID_TipoNoti)
);



CREATE TABLE TipoPublicacion
(
	ID_TipoPublicacion   INTEGER AUTO_INCREMENT,
	Nombre_tipo          VARCHAR(20) NOT NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (ID_TipoPublicacion)
);



CREATE TABLE Usuario
(
	Run_User             VARCHAR(10) NOT NULL,
	Nombre_User          VARCHAR(20) NOT NULL,
	Apellido_User        VARCHAR(20) NOT NULL,
	Clave                VARCHAR(10) NOT NULL,
	CorreoElectronico    VARCHAR() NOT NULL,
	Img_Carnet_delante   VARBINARY NOT NULL,
	Img_Rostro           VARBINARY NOT NULL,
	Img_PapelAntecedente VARBINARY NOT NULL,
	ID_Estado            INTEGER NULL,
	NumeroTelefonico     NUMERIC(9) NOT NULL,
	Direccion            VARCHAR(30) NOT NULL,
	ID_Ciudad            INTEGER NOT NULL,
	Sexo                 CHAR(1) NOT NULL,
	Img_CarnetAtras      VARBINARY NOT NULL,
	FechaNacim           DATE NOT NULL,
	PRIMARY KEY (Run_User)
);



CREATE TABLE Valoraciones
(
	Id_Valorizacion      INTEGER AUTO_INCREMENT,
	Comentario           VARCHAR() NULL,
	Cant_Estrellas       INTEGER NULL,
	Fecha                DATE NULL,
	Hora                 TIME NULL,
	Run_Evaluado         VARCHAR(10) NULL,
	Run_Evaluador        VARCHAR(10) NULL
 AUTO_INCREMENT = 1,
	PRIMARY KEY (Id_Valorizacion)
);



ALTER TABLE Denuncias
ADD FOREIGN KEY R_14 (ID_EstadoDenun) REFERENCES EstadoDenuncia (ID_EstadoDenun);



ALTER TABLE Denuncias
ADD FOREIGN KEY R_15 (Run_Denunciante) REFERENCES Usuario (Run_User);



ALTER TABLE Denuncias
ADD FOREIGN KEY R_16 (ID_Publicacion) REFERENCES Publicacion (ID_Publicacion);



ALTER TABLE Denuncias
ADD FOREIGN KEY R_18 (Run_examinador) REFERENCES Administrador (Run_Admin);



ALTER TABLE Denuncias
ADD FOREIGN KEY R_33 (ID_Razon) REFERENCES RazonDenuncia (ID_Razon);



ALTER TABLE HistorialPublicacion
ADD FOREIGN KEY R_25 (Run_Asociado) REFERENCES Usuario (Run_User);



ALTER TABLE Mensaje
ADD FOREIGN KEY R_7 (Run_Emisor) REFERENCES Usuario (Run_User);



ALTER TABLE Notificaciones
ADD FOREIGN KEY R_19 (ID_TipoNoti) REFERENCES TipoNotificacion (ID_TipoNoti);



ALTER TABLE Notificaciones
ADD FOREIGN KEY R_22 (Admin_Envia) REFERENCES Administrador (Run_Admin);



ALTER TABLE Publicacion
ADD FOREIGN KEY R_10 (ID_TipoPublicacion) REFERENCES TipoPublicacion (ID_TipoPublicacion);



ALTER TABLE Publicacion
ADD FOREIGN KEY R_11 (ID_Categoria) REFERENCES Categoria (ID_Categoria);



ALTER TABLE Publicacion
ADD FOREIGN KEY R_12 (ID_EstadoPubli) REFERENCES Estado_Publicacion (ID_EstadoPubli);



ALTER TABLE Publicacion
ADD FOREIGN KEY R_13 (Run_Publicador) REFERENCES Usuario (Run_User);



ALTER TABLE Publicacion
ADD FOREIGN KEY R_34 (ID_Historial) REFERENCES HistorialPublicacion (ID_Historial);



ALTER TABLE RegistroActividad
ADD FOREIGN KEY R_27 (Run_Asociado) REFERENCES Usuario (Run_User);



ALTER TABLE Reportes
ADD FOREIGN KEY R_23 (Run_Encargado) REFERENCES Administrador (Run_Admin);



ALTER TABLE Reportes
ADD FOREIGN KEY R_24 (Run_Asociado) REFERENCES Usuario (Run_User);



ALTER TABLE Reportes
ADD FOREIGN KEY R_30 (Id_Registro) REFERENCES RegistroActividad (Id_Registro);



ALTER TABLE Reportes
ADD FOREIGN KEY R_31 (ID_Historial) REFERENCES HistorialPublicacion (ID_Historial);



ALTER TABLE Usuario
ADD FOREIGN KEY R_4 (ID_Estado) REFERENCES Estado (ID_Estado);



ALTER TABLE Usuario
ADD FOREIGN KEY R_32 (ID_Ciudad) REFERENCES Ciudad (ID_Ciudad);



ALTER TABLE Valoraciones
ADD FOREIGN KEY R_8 (Run_Evaluador) REFERENCES Usuario (Run_User);


