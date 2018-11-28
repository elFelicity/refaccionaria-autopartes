DROP TABLE marcas;

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_marca` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO marcas VALUES("1","Ford","La Ford Motor Company, o conocido como Ford, es una empresa multinacional estadounidense fabricante de automÃ³viles con sede en Dearborn.");
INSERT INTO marcas VALUES("2","Toyota","?Toyota Motor Corporation, es un fabricante de automoviles japones con sede en Toyota, Japon.");
INSERT INTO marcas VALUES("3","Honda","Honda Motor Co. Ltd es una empresa de origen japones que fabrica automoviles, propulsores para vehiculos terrestres, acuaticos y aéreos, motocicletas, robots y en general componentes para la industria automotriz.");



DROP TABLE productos;

CREATE TABLE `productos` (
  `codigo_barras` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `numero_pieza` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `costo` float NOT NULL,
  `ubicacion_edificio` enum('BODEGA','MOSTRADOR') CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ubicacion_pasillo` smallint(6) NOT NULL,
  `ubicacion_anaquel` smallint(6) NOT NULL,
  `ubicacion_charola` smallint(6) NOT NULL,
  PRIMARY KEY (`codigo_barras`),
  KEY `fk_marca` (`id_marca`),
  KEY `fk_proveedor` (`id_proveedor`),
  CONSTRAINT `fk_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO productos VALUES("000-123-123-123-123","HGJ9456","Llantas 44","100","1","1","150","BODEGA","1","1","1");
INSERT INTO productos VALUES("000-123-123-123-177","DAKG-1528","Valvula de alivio","6","1","1","50","BODEGA","5","5","5");
INSERT INTO productos VALUES("000-123-123-123-189","SJJ9456","Valvula de Escape","50","1","1","40","MOSTRADOR","1","1","1");



DROP TABLE proveedores;

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO proveedores VALUES("1","Keep On Green","3318485906","Jardines Rosas #612","keepit@gmail.com");
INSERT INTO proveedores VALUES("2","Halt","3318485906","José Domínguez #1231","halto@gmail.com");
INSERT INTO proveedores VALUES("3","Blink","3319667796","Calle Victoria #1","lisalisa@hotmail.com");



DROP TABLE usuarios;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_empleado` enum('ADMN','EMPL') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO usuarios VALUES("1","reynoso","c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec","ADMN");
INSERT INTO usuarios VALUES("2","meza","c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec","ADMN");
INSERT INTO usuarios VALUES("3","admin","c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec","ADMN");
INSERT INTO usuarios VALUES("4","control","3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2","ADMN");
INSERT INTO usuarios VALUES("5","fresas","c31ff4680147f6756b4fd90e83e356e18c6d78b50b73768bc2021f18ece10da289646f572f7ab073aa30bd2926c4e3715ee4d3adbce1f1bcd70904840061e1c8","ADMN");
INSERT INTO usuarios VALUES("6","cartera","f88b6df79e1af12e12afcf3dcc0eaf1cfbb5f873ef68204098b078ac46faf2e120e01fa1202a9f8656d9dba8242b0d458afee7c6a3ff037b1ce5fbd21110502e","EMPL");
INSERT INTO usuarios VALUES("7","moneda","21c4e8f290ac40e1c045cdf2428fc79b5a7e5a5d13654985015b1be995b6553b28ee3dcd712226f4fe33b792f48186441096db17bc37ffa457668bd46975d1ba","ADMN");
INSERT INTO usuarios VALUES("8","noadmin","c905ddade1f0c125f19c54006d830116705d124c1880cc90ba0e301f598a6f14655ae07531b6e7133e130769f3aece1843d4dd034b72c407573f0ca502afb067","EMPL");
INSERT INTO usuarios VALUES("9","paty","3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79","ADMN");
INSERT INTO usuarios VALUES("10","luis","e0f6027174679fa6707768654fe17896072953a44d72def1c4b6cd015575338938757090db978df3ff79187ad411f827eb9e90e169ed8d26a1f64c2c7e40389c","EMPL");



