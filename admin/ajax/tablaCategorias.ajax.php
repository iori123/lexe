<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


class TablaCategorias
{


	public function mostrarTabla()
	{

		$item = null;
		$valor = null;
		$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
		
		$datosJson = '{
		 
		  "data": [ ';

		for ($i = 0; $i < count($categorias); $i++) {
			if ($categorias[$i]["estado"] == 0) {

				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado";
				$estadoCategoria = 1;
			} else {
				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoCategoria = 0;
			}

			$estado = "<button class='btn " . $colorEstado . " btn-xs btnActivar' estadoCategoria='" . $estadoCategoria . "' idCategoria='" . $categorias[$i]["id"] . "'>" . $textoEstado . "</button>";

			/*=============================================
			REVISAR IMAGEN PORTADA
			=============================================*/

			if ($categorias[$i]['imagen'] != "") {

				$imgPortada = "<img class='img-thumbnail imgPortadaCategorias' src='" . $categorias[$i]['imagen'] . "' width='100px'>";
			} else {

				$imgPortada = "<img class='img-thumbnail imgPortadaCategorias' src='vistas/img/cabeceras/default/default.jpg' width='100px'>";
			}

			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='" . $categorias[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarCategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCategoria' idCategoria='" . $categorias[$i]["id"] . "' imgPortada='" . $categorias[$i]['imagen'] . "' ><i class='fa fa-times'></i></button></div>";

			$datosJson	 .= '[
				      "' . ($i + 1) . '",
				      "' . $categorias[$i]["categoria"] . '",
				      "' . $categorias[$i]["ruta"] . '",
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
$activar = new TablaCategorias();
$activar->mostrarTabla();
