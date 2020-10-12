<?php

require_once "../controladores/banner.controlador.php";
require_once "../modelos/banner.modelo.php";


class TablaBanner
{


	public function mostrarTabla()
	{

		$item = null;
		$valor = null;
		$Banner = ControladorBanner::ctrMostrarBanners($item, $valor);
		
		$datosJson = '{
		 
		  "data": [ ';

		for ($i = 0; $i < count($Banner); $i++) {
			if ($Banner[$i]["estado"] == 0) {

				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado";
				$estadoBanner = 1;
			} else {
				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoBanner = 0;
			}

			$estado = "<button class='btn " . $colorEstado . " btn-xs btnActivar' estadoBanner='" . $estadoBanner . "' idBanner='" . $Banner[$i]["id"] . "'>" . $textoEstado . "</button>";

			/*=============================================
			REVISAR IMAGEN PORTADA
			=============================================*/

			if ($Banner[$i]['imagen'] != "") {

				$imgPortada = "<img class='img-thumbnail imgPortadaBanner' src='" . $Banner[$i]['imagen'] . "' width='100px'>";
			} else {

				$imgPortada = "<img class='img-thumbnail imgPortadaBanner' src='vistas/img/cabeceras/default/default.jpg' width='100px'>";
			}

			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarBanner' idBanner='" . $Banner[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarBanner'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarBanner' idBanner='" . $Banner[$i]["id"] . "' imgPortada='" . $Banner[$i]['imagen'] . "' ><i class='fa fa-times'></i></button></div>";

			$datosJson	 .= '[
				      "' . ($i + 1) . '",
				      "' . $Banner[$i]["banner"] . '",
				      "' . $estado . '",
				      "' . $imgPortada . '",
				      "' . $acciones . '"		    
				    ],';
		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .=  ']
		  
	}';

		echo $datosJson;
	}
}

/*=============================================
ACTIVAR TABLA DE CATEGORÍAS
=============================================*/
$activar = new TablaBanner();
$activar->mostrarTabla();
