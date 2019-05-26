/* scrip bd eligeTuDestino */

CREATE DATABASE eligeTuDestino;

USE eligeTuDestino;

/* tabla usuarios*/ 

create table usuarios(
    numUsuario smallint UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  	nombre varchar(80) NOT NULL,
	password varchar(100) NOT NULL,
	tipo ENUM ('A', 'U') NOT NULL,
	correo varchar(80) NOT NULL
    )ENGINE = InnoDB default charset=utf8;
	
	
/*tabla relatos*/

CREATE TABLE relatos (
  numRelato smallint UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  codigo char(6) NOT NULL,
  codigo_colaborador char(6) NULL,
  titulo varchar(100) NOT NULL,
  descripcion varchar(255) NOT NULL,
  autor smallint UNSIGNED NOT NULL,
  terminado boolean,
  publicado boolean,
	CONSTRAINT FOREIGN KEY fk_autor_relato (autor) REFERENCES usuarios(numUsuario)  
)ENGINE = InnoDB default charset=utf8;


/*tabla capitulos*/

CREATE TABLE capitulos (
  idCapitulo int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  numRelato smallint UNSIGNED NOT NULL,
  texto text NOT NULL,
  terminado boolean,
  decision boolean,
  textodecision1 varchar(255) NULL,
  textodecision2 varchar(255) NULL,
  capsig1 int UNSIGNED NULL UNIQUE,
  capsig2 int UNSIGNED NULL UNIQUE,
  autor smallint UNSIGNED NULL,
	CONSTRAINT FOREIGN KEY fk_autor_cap (autor) REFERENCES usuarios(numUsuario),
	CONSTRAINT FOREIGN KEY fk_cap_relato (numRelato) REFERENCES relatos(numRelato) 
)ENGINE = InnoDB default charset=utf8; 

