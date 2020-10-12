<?php

require_once "../controladores/Banner.controlador.php";
require_once "../modelos/banner.modelo.php";


class AjaxBanners
{

  public $activarBanner;
  public $activarId;

  public function ajaxActivarBanner()
  {

    $respuesta = ModeloBanner::mdlActualizarBanner("banner", "estado", $this->activarBanner, "id", $this->activarId);

    echo $respuesta;
  }

  /*=============================================
  VALIDAR NO REPETIR CATEGORÍA
  =============================================*/

  public $validarBanner;

  public function ajaxValidarBanner()
  {

    $item = "banner";
    $valor = $this->validarBanner;

    $respuesta = ControladorBanner::ctrMostrarBanners($item, $valor);

    echo json_encode($respuesta);
  }

  /*=============================================
  EDITAR Banner
  =============================================*/

  public $idBanner;

  public function ajaxEditarBanner()
  {

    $item = "id";
    $valor = $this->idBanner;

    $respuesta = ControladorBanner::ctrMostrarBanners($item, $valor);

    echo json_encode($respuesta);
  }
}

/*=============================================
ACTIVAR Banner
=============================================*/

if (isset($_POST["activarBanner"])) {

  $activarBanner = new AjaxBanners();
  $activarBanner->activarBanner = $_POST["activarBanner"];
  $activarBanner->activarId = $_POST["activarId"];
  $activarBanner->ajaxActivarBanner();
}

/*=============================================
VALIDAR NO REPETIR CATEGORÍA
=============================================*/

if (isset($_POST["validarBanner"])) {

  $valBanner = new AjaxBanners();
  $valBanner->validarBanner = $_POST["validarBanner"];
  $valBanner->ajaxValidarBanner();
}

/*=============================================
EDITAR Banner
=============================================*/
if (isset($_POST["idBanner"])) {

  $editar = new AjaxBanners();
  $editar->idBanner = $_POST["idBanner"];
  $editar->ajaxEditarBanner();
}
