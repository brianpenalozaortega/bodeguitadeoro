
USE `db_bodeguitadeoro` ;




INSERT INTO `tb_tipo_persona` (`nombre`) VALUES ('Administrador');
INSERT INTO `tb_tipo_persona` (`nombre`) VALUES ('Cliente');


INSERT INTO `tb_persona` (`nombre`, `apellido`, `correo`, `clave`, `idtb_tipo_persona`) VALUES ('Juan', 'Vargas', 'juan@outlook.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1');
INSERT INTO `tb_persona` (`nombre`, `apellido`, `correo`, `clave`, `idtb_tipo_persona`) VALUES ('Brian', 'Peñaloza Ortega', '2013016328@unfv.edu.pe', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2');

INSERT INTO `tb_cliente` (`celular`, `direccion`, `referencia`, `idtb_persona`) VALUES ('943128704', 'av los alisos', 'parque previ', '2');


INSERT INTO `tb_categoria` (`nombre`) VALUES ('Afeitadora');
INSERT INTO `tb_categoria` (`nombre`) VALUES ('Fideo');
INSERT INTO `tb_categoria` (`nombre`) VALUES ('Galleta');
INSERT INTO `tb_categoria` (`nombre`) VALUES ('Gaseosa');
INSERT INTO `tb_categoria` (`nombre`) VALUES ('Golosina');
INSERT INTO `tb_categoria` (`nombre`) VALUES ('Jabon');
INSERT INTO `tb_categoria` (`nombre`) VALUES ('Paneton');
INSERT INTO `tb_categoria` (`nombre`) VALUES ('Shampoo');

-- INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('', , , '', );
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Gillette', 11, 3.5, 'afeitadoragillette.jpg', 1);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Schick', 12, 2.5, 'afeitadoraschick.png', 1);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Don Vittorio', 13, 1.5, 'fideodonvittorio.jpg', 2);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Lavaggi', 14, 1.5, 'fideolavaggi.jpg', 2);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Molitalia', 15, 1.5, 'fideomolitalia.jpg', 2);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Nicolini', 16, 1.5, 'fideonicolini.png', 2);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Picaras', 17, 1.5, 'galletapicaras.jpg', 3);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Coca Cola 1.75L descartable', 18, 6.5, 'gaseosacocacola.jpg', 4);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Inka Cola 1.75L retornable', 19, 6.5, 'gaseosainkacola.jpg', 4);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Pepsi Cola 1.75L de vidrio', 20, 6.5, 'gaseosapepsicola.jpg', 4);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Cheetos', 21, 1.5, 'golosinacheetos.png', 5);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Chizitos', 22, 1.5, 'golosinachizitos.jpg', 5);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Lays', 23, 1.5, 'golosinalays.jpg', 5);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Piqueo Snax', 24, 1.5, 'golosinapiqueosnax.jpg', 5);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Bolivar', 25, 3.5, 'jabonbolivar.jpg', 6);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Dove', 26, 3.5, 'jabondove.jpg', 6);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Neko', 27, 3.5, 'jabonneko.jpg', 6);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Rexona', 28, 3.5, 'jabonrexona.jpg', 6);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Panettone', 29, 12.5, 'panetonpanettone.jpg', 7);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Dove', 30, 15.5, 'shampoodove.png', 8);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('H&S', 31, 15.5, 'shampoohs.jpg', 8);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('Pantene', 32, 15.5, 'shampoopantene.jpg', 8);
INSERT INTO `tb_producto` (`nombre`, `stock`, `precio`, `imagen`, `idtb_categoria`) VALUES ('TRESemme', 33, 15.5, 'shampootresemme.jpg', 8);


INSERT INTO `tb_estado` (`nombre`) VALUES ('Registrado');
INSERT INTO `tb_estado` (`nombre`) VALUES ('Listo para entregar');
INSERT INTO `tb_estado` (`nombre`) VALUES ('En delivery');
INSERT INTO `tb_estado` (`nombre`) VALUES ('Completado');

INSERT INTO `tb_tipo_pago` (`nombre`) VALUES ('Contra entrega');
INSERT INTO `tb_tipo_pago` (`nombre`) VALUES ('Yape');


-- update db_bodeguitadeoro.tb_pedido set idtb_estado = 3 where DAY(fecha) = 2;