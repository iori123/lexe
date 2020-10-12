<?php

require_once "../controladores/articulo.controlador.php";
require_once "../modelos/articulos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/subcategorias.controlador.php";
require_once "../modelos/subcategorias.modelo.php";


class AjaxArticulos
{

    private  $table = 'Articulos';
    public $activarArticulo;
    public $activarId;

    public function ajaxActivarArticulo()
    {

        $item1 = "estado";
        $valor1 = $this->activarArticulo;

        $item2 = "id";
        $valor2 = $this->activarId;

        $respuesta = ModeloArticulos::mdlActualizarArticulos($this->table, $item1, $valor1, $item2, $valor2);

        echo $respuesta;
    }


    public $validarArticulo;

    public function ajaxValidarArticulo()
    {
        // validamos que el título no se repita
        $item = "titulo";
        $valor = $this->validarArticulo;

        $respuesta = ControladorArticulos::ctrMostrarArticulos($item, $valor);

        echo json_encode($respuesta);
    }



    /*=============================================
	GUARDAR Articulo Y EDITAR Articulo
	=============================================*/

    public $tituloArticulo;
    public $rutaArticulo;
    public $seleccionarCategoria;
    public $seleccionarSubCategoria;
    public $precio;
    public $fotoPrincipal;

    public $id;
    public $antiguaFotoPrincipal;

    public function  ajaxCrearArticulo()
    {

        $datos = array(
            "tituloArticulo" => $this->tituloArticulo,
            "rutaArticulo" => $this->rutaArticulo,
            "categoria" => $this->seleccionarCategoria,
            "subCategoria" => $this->seleccionarSubCategoria,
            "precio" => $this->precio,
            "fotoPrincipal" => $this->fotoPrincipal,
        );

        $respuesta = ControladorArticulos::ctrCrearArticulo($datos);

        echo $respuesta;
    }

    /*=============================================
	TRAER ArticuloS
	=============================================*/

    public $idArticulo;

    public function ajaxTraerArticulo()
    {

        $item = "id";
        $valor = $this->idArticulo;

        $respuesta = ControladorArticulos::ctrMostrarArticulos($item, $valor);

        echo json_encode($respuesta);
    }

    /*=============================================
	EDITAR ArticuloS
	=============================================*/

    public function  ajaxEditarArticulo()
    {

        $datos = array(
            "idArticulo" => $this->id,
            "tituloArticulo" => $this->tituloArticulo,
            "categoria" => $this->seleccionarCategoria,
            "subCategoria" => $this->seleccionarSubCategoria,
            "precio" => $this->precio,
            "fotoPrincipal" => $this->fotoPrincipal,
            "antiguaFotoPrincipal" => $this->antiguaFotoPrincipal,
        );

        $respuesta = ControladorArticulos::ctrEditarArticulo($datos);


        echo $respuesta;
    }
}

/*=============================================
ACTIVAR ArticuloS
=============================================*/

if (isset($_POST["activarArticulo"])) {

    $activarArticulo = new AjaxArticulos();
    $activarArticulo->activarArticulo = $_POST["activarArticulo"];
    $activarArticulo->activarId = $_POST["activarId"];
    $activarArticulo->ajaxActivarArticulo();
}

/*=============================================
VALIDAR NO REPETIR Articulo
=============================================*/

if (isset($_POST["validarArticulo"])) {

    $valArticulo = new AjaxArticulos();
    $valArticulo->validarArticulo = $_POST["validarArticulo"];
    $valArticulo->ajaxValidarArticulo();
}



#CREAR Articulo
#-----------------------------------------------------------
if (isset($_POST["tituloArticulo"])) {

    $Articulo = new AjaxArticulos();
    $Articulo->tituloArticulo = $_POST["tituloArticulo"];
    $Articulo->rutaArticulo = $_POST["rutaArticulo"];
    $Articulo->seleccionarCategoria = $_POST["seleccionarCategoria"];
    $Articulo->seleccionarSubCategoria = $_POST["seleccionarSubCategoria"];
    $Articulo->precio = $_POST["precio"];

    if (isset($_FILES["fotoPrincipal"])) {

        $Articulo->fotoPrincipal = $_FILES["fotoPrincipal"];
    } else {

        $Articulo->fotoPrincipal = null;
    }

    $Articulo->ajaxCrearArticulo();
}

/*=============================================
TRAER Articulo
=============================================*/
if (isset($_POST["idArticulo"])) {

    $traerArticulo = new AjaxArticulos();
    $traerArticulo->idArticulo = $_POST["idArticulo"];
    $traerArticulo->ajaxTraerArticulo();
}

/*=============================================
EDITAR Articulo
=============================================*/
if (isset($_POST["id"])) {

    $editarArticulo = new AjaxArticulos();
    $editarArticulo->id = $_POST["id"];
    $editarArticulo->tituloArticulo = $_POST["editarArticulo"];
    $editarArticulo->seleccionarCategoria = $_POST["seleccionarCategoria"];
    $editarArticulo->seleccionarSubCategoria = $_POST["seleccionarSubCategoria"];
    $editarArticulo->precio = $_POST["precio"];


    if (isset($_FILES["fotoPrincipal"])) {

        $editarArticulo->fotoPrincipal = $_FILES["fotoPrincipal"];
    } else {

        $editarArticulo->fotoPrincipal = null;
    }

    $editarArticulo->antiguaFotoPrincipal = $_POST["antiguaFotoPrincipal"];

    $editarArticulo->ajaxEditarArticulo();
}
