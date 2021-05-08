  -- mysql -h localhost -u root -p
  
  -- creando base de datos
  create database sistema_riego

  -- accediendo a base de datos  
  use sistema_riego  

  -- CREANDO TABLAS DE REGISTRO

  CREATE TABLE roles (
    id_rol integer NOT NULL, 
    desc_rol varchar (32) NOT NULL,
    PRIMARY KEY(id_rol)
  ) ENGINE=INNODB;

  insert into roles values(1,'ADMINISTRADOR');
  insert into roles values(2,'VISITANTE');  

-- -------------------------------------------------------------------------------------------------------- 

  CREATE TABLE usuarios (
    id_user integer NOT NULL,
    nombres varchar(64) NOT NULL,
    apellidos varchar(64) NOT NULL,
    telefono varchar(64) NOT NULL,
    login varchar(64) NOT NULL,
    password varchar(64) NOT NULL,
    id_rol integer NOT NULL,
    estado integer default 1,
    INDEX (id_rol),
    FOREIGN KEY (id_rol) REFERENCES roles(id_rol),
    PRIMARY KEY (id_user)
  ) ENGINE=INNODB;

  insert into usuarios values(1,'JUAN RO','MALDONADO','9621900297','juanro','riego1',1,default);
  insert into usuarios values(2,'JARBIN','BARRIOS','96454169841','jarbin','riego2',2,default);  
  insert into usuarios values(3,'DENISSE','LOPEZ','96563164588','denue2','riego3',2,default);  

-- -------------------------------------------------------------------------------------------------------

  CREATE TABLE menus (
    idmenu integer NOT NULL,
    nombre varchar (32) NOT NULL,
    link varchar (512) NOT NULL,
    PRIMARY KEY(idmenu)
  ) ENGINE=INNODB;

  insert into menus values (1,'UBICACION','mantenimiento/ubicacion');
  insert into menus values (2,'CULTIVO','mantenimiento/cultivo');
  insert into menus values (3,'SUELO','mantenimiento/suelo');
  insert into menus values (4,'COMPUESTO','mantenimiento/compuesto');
  insert into menus values (5,'ZONA','mantenimiento/zona');
  insert into menus values (6,'LECTURAS','mantenimiento/registros');
  insert into menus values (7,'OBSERVACION','mantenimiento/observacion');
  insert into menus values (8,'USUARIOS','mantenimiento/Usuario');
  insert into menus values (9,'PERMISOS','user/permisos');

-- -------------------------------------------------------------------------------------------------------

  CREATE TABLE permisos (
    idpermiso integer NOT NULL,
    idmenu integer,
    id_rol integer,
    reader integer,
    inserter integer,
    updater integer,
    deleter integer,
    INDEX (idmenu),
    FOREIGN KEY (idmenu) REFERENCES menus(idmenu),
    INDEX (id_rol),
    FOREIGN KEY (id_rol) REFERENCES roles(id_rol),
    PRIMARY KEY (idpermiso)  
  ) ENGINE=INNODB;

  insert into permisos values(1,1,1,1,1,1,1);
  insert into permisos values(2,2,1,1,1,1,1);
  insert into permisos values(3,3,1,1,1,1,1);
  insert into permisos values(4,4,1,1,1,1,1);
  insert into permisos values(5,5,1,1,1,1,1);
  insert into permisos values(6,6,1,1,1,1,1);
  insert into permisos values(7,7,1,1,1,1,1);
  insert into permisos values(8,8,1,1,1,1,1);
  insert into permisos values(9,9,1,1,1,1,1);  

-- -------------------------------------------------------------------------------------------------------- 

  CREATE TABLE ubicacion (
    id_ubi integer NOT NULL, 
    desc_ubi varchar (32) NOT NULL,
    tipo_zona varchar (32) NOT NULL,
    estado integer default 1,
    PRIMARY KEY(id_ubi)
  ) ENGINE=INNODB;

  insert into ubicacion values(1,'AZOTEA 1','VEGETALES',default);
  insert into ubicacion values(2,'AZOTEA 2','FRUTAS',default);

-- -------------------------------------------------------------------------------------------------------- 

  CREATE TABLE cultivo (
    id_cultivo integer NOT NULL, 
    desc_cultivo varchar (32) NOT NULL,
    duracion varchar (32) NOT NULL,
    estado integer default 1,
    PRIMARY KEY(id_cultivo)
  ) ENGINE=INNODB;

  insert into cultivo values(1,'TOMATE','3 MESES',default);
  insert into cultivo values(2,'FRESA','4 MESES',default);
  
-- -------------------------------------------------------------------------------------------------------- 
  
  CREATE TABLE suelo ( -- % de contenido
    id_suelo integer NOT NULL, 
    densidad integer NOT NULL,
    materia_org integer NOT NULL,
    arcilla integer NOT NULL,
    arena integer NOT NULL,
    limo integer NOT NULL,
    estado integer default 1,
    desc_suelo varchar(32) NOT NULL,
    PRIMARY KEY(id_suelo)
  ) ENGINE=INNODB;

  insert into suelo values(1,30,45,20,10,15,default,'TIERRA NEGRA');
  insert into suelo values(2,50,35,60,20,20,default,'COMPOSTA');
  
-- -------------------------------------------------------------------------------------------------------- 
  
  CREATE TABLE compuesto ( -- nutrientes del agua
    id_comp integer NOT NULL,
    nom_comp varchar (64) NOT NULL, 
    react1 varchar (64) NULL,
    react2 varchar (64) NULL,
    react3 varchar (64) NULL,
    react4 varchar (64) NULL,
    react5 varchar (64) NULL,
    estado integer default 1,
    PRIMARY KEY(id_comp)
  ) ENGINE=INNODB;

  insert into compuesto values(1,'NUTRIENTE 1','CLORO','CALCIO','POTASIO','','',default);
  insert into compuesto values(2,'NUTRIENTE 2','SODIO','LITIO','COBRE','','',default);

-- --------------------------------------------------------------------------------------------------------

    CREATE TABLE zona (
    id_zona integer NOT NULL,
    nom_zona varchar (32) NOT NULL, 
    id_ubi integer NOT NULL,
    id_cultivo integer NOT NULL,
    id_suelo integer NOT NULL,
    id_comp integer NOT NULL,
    fec_inicio date NOT NULL,
    fec_cosecha date NULL,
    estado integer default 1,
    INDEX (id_ubi),
    FOREIGN KEY (id_ubi) REFERENCES ubicacion(id_ubi),
    INDEX (id_cultivo),
    FOREIGN KEY (id_cultivo) REFERENCES cultivo(id_cultivo),
    INDEX (id_suelo),
    FOREIGN KEY (id_suelo) REFERENCES suelo(id_suelo),
    INDEX (id_comp),
    FOREIGN KEY (id_comp) REFERENCES compuesto(id_comp),
    PRIMARY KEY(id_zona,id_ubi)
  ) ENGINE=INNODB;

    insert into zona values(1,'ZONA ALTA',1,1,1,1,'2020-01-14','',default);
    insert into zona values(2,'ZONA BAJA',2,2,2,2,'2020-01-14','',default);
  
    select z.id_zona,z.nom_zona,u.desc_ubi,c.desc_cultivo,s.desc_suelo,k.nom_comp,z.fec_inicio,z.fec_cosecha from zona z inner join ubicacion u on z.id_ubi = u.id_ubi inner join cultivo c on z.id_cultivo = c.id_cultivo inner join suelo s on z.id_suelo = s.id_suelo inner join compuesto k on z.id_comp = k.id_comp where z.estado = 1;

-- --------------------------------------------------------------------------------------------------------     
    CREATE TABLE registros (
    id_reg integer NOT NULL, 
    id_zona integer NOT NULL,
    id_ubi integer NOT NULL,
    cultivo varchar(32) NOT NULL,--    
    fechahora timestamp(0) default current_timestamp(0),
    temp_amb numeric(9,2)  NULL,
    hume_amb numeric(9,2)  NULL,
    iluminacion numeric(9,2)  NULL,
    temp_suelo numeric(9,2)  NULL,
    hume_suelo numeric(9,2)  NULL,
    ph numeric(9,2)  NULL,
    co2 numeric(9,2) NULL,
    -- humedad numeric(9,2) NULL,
    INDEX (id_zona,id_ubi),
    FOREIGN KEY (id_zona,id_ubi) REFERENCES zona(id_zona,id_ubi),
    PRIMARY KEY(id_reg)
  ) ENGINE=INNODB;

    insert into registros values(1,2,2,(select c.desc_cultivo as cultivo from cultivo c inner join zona z where c.id_cultivo = z.id_cultivo and z.id_zona = 2 and z.id_ubi = 2),default,25,70,55,22,80,4,16);
    
    select r.*,z.nom_zona,u.desc_ubi,date(r.fechahora) as fecha from registros r inner join zona z on r.id_zona = z.id_zona inner join ubicacion u on r.id_ubi = u.id_ubi;
    
-- --------------------------------------------------------------------------------------------------------    
  CREATE TABLE observacion (
    id_obs integer NOT NULL, 
    id_zona integer NOT NULL,
    id_ubi integer NOT NULL,
    desc_obs varchar (32) NOT NULL, 
    cultivo varchar(32) NOT NULL,--    
    foto_zona varchar (64) NOT NULL,
    usuario varchar(64) NOT NULL, -- NOMBRE DE USUARIO     
    fec_obs timestamp(0) default current_timestamp(0),
    INDEX (id_zona,id_ubi),
    FOREIGN KEY (id_zona,id_ubi) REFERENCES zona(id_zona,id_ubi),
    PRIMARY KEY(id_obs)
  ) ENGINE=INNODB;  
  
    insert into observacion values(1,2,2,'LA TEMPERATURA AUMENTA',(select c.desc_cultivo as cultivo from cultivo c inner join zona z where c.id_cultivo = z.id_cultivo and z.id_zona = 2 and z.id_ubi = 2),'image1.jpg','JUAN RO',default);
    
    select o.*,z.nom_zona,u.desc_ubi,date(o.fec_obs) as fecha,time(o.fec_obs) as hora from observacion o inner join zona z on o.id_zona = z.id_zona inner join ubicacion u on o.id_ubi = u.id_ubi;
    
-- --------------------------------------------------------------------------------------------------------