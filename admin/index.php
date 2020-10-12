<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/banner.controlador.php";
require_once "controladores/subcategorias.controlador.php";
require_once "controladores/comercio.controlador.php";
require_once "controladores/articulo.controlador.php";
require_once "controladores/banner.controlador.php";


require_once "modelos/banner.modelo.php";
require_once "modelos/administradores.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/subcategorias.modelo.php";
require_once "modelos/comercio.modelo.php";
require_once "modelos/articulos.modelo.php";
require_once "modelos/usuarios.modelo.php";


require_once "modelos/rutas.php";

$plantilla = new ControladorPlantilla();
$plantilla->plantilla();
