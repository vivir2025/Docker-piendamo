CREATE TABLE desentimiento (
  id_de int(11) NOT NULL,

  fecha datetime NOT NULL,

  nombre varchar(60) NOT NULL,
  
  tipo_cc varchar(2) NOT NULL,

  identificacion varchar(13) NOT NULL,

  fecha_nam varchar(20) NOT NULL,

  edad varchar(3) NOT NULL,

  direccion varchar(20) NOT NULL,

  tetefono varchar(12) NOT NULL,

  yo varchar(30) NOT NULL,

  identificacion_po varchar(12) NOT NULL,

  manifiesto varchar(13) NOT NULL,

  realiza varchar(15) NOT NULL,

  cargo varchar(10) NOT NULL,

  visita varchar(13) NOT NULL,

  realiza_por varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,

  con_cargo varchar(25) NOT NULL,

  firma_usu varchar(150) NOT NULL,

  nombre_usu varchar(40) NOT NULL,

  identificacion_usu varchar(13) NOT NULL,

  firma_tes varchar(150) NOT NULL,

  nombre_tes varchar(70) NOT NULL,

  identificacion_tes varchar(13) NOT NULL,

  firma_fnpv varchar(50) NOT NULL,

  nombre_fnpv varchar(150) NOT NULL,

  identificacion_fnpv varchar(60) NOT NULL,

  cargo_fnpv varchar(50) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;
