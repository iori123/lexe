<?php

require_once "../controladores/articulo.controlador.php";
require_once "../modelos/articulos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/subcategorias.controlador.php";
require_once "../modelos/subcategorias.modelo.php";


class TablaArticulos
{

	/*=============================================
  MOSTRAR LA TABLA DE ArticuloS
  =============================================*/

	public function mostrarTablaArticulos()
	{

		$item = null;
		$valor = null;

		$Articulos = ControladorArticulos::ctrMostrarArticulos($item, $valor);

		$datosJson = '{
		 
			"data": [ ';

		for ($i = 0; $i < count($Articulos); $i++) {

			/*=============================================
  			TRAER LAS CATEGORÍAS
  			=============================================*/

			$item = "id";
			$valor = $Articulos[$i]["id_categoria"];

			$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

			if ($categorias["categoria"] == "") {

				$categoria = "SIN CATEGORÍA";
			} else {

				$categoria = $categorias["categoria"];
			}

			/*=============================================
  			TRAER LAS SUBCATEGORÍAS
  			=============================================*/

			$item2 = "id";
			$valor2 = $Articulos[$i]["id_subcategoria"];

			$subcategorias = ControladorSubCategorias::ctrMostrarSubCategorias($item2, $valor2);
			if(!empty($subcategorias)){
				if ($subcategorias[0]["subcategoria"] == '' ) {
					$subcategoria = "SIN SUBCATEGORÍA";
				} else {
	
					$subcategoria = $subcategorias[0]["subcategoria"];
				}
	
			}else {
				$subcategoria = 'SIN SUBCATEGORIA';
			}
			
			/*=============================================
  			AGREGAR ETIQUETAS DE ESTADO
  			=============================================*/

			if ($Articulos[$i]["estado"] == 0) {

				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado";
				$estadoArticulo = 1;
			} else {

				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoArticulo = 0;
			}

			$estado = "<button class='btn btn-xs btnActivar " . $colorEstado . "' idArticulo='" . $Articulos[$i]["id"] . "' estadoArticulo='" . $estadoArticulo . "'>" . $textoEstado . "</button>";



			/*=============================================
  			TRAER IMAGEN PRINCIPAL
  			=============================================*/

			$imagenPrincipal = "<img src='" . $Articulos[$i]["portada"] . "' class='img-thumbnail imgTablaPrincipal' width='100px'>";



			/*=============================================
  			TRAER PRECIO
  			=============================================*/

			if ($Articulos[$i]["precio"] == 0) {

				$precio = "Gratis";
			} else {

				$precio = "S/. " . number_format($Articulos[$i]["precio"], 2);
			}




			/*=============================================
  			TRAER LAS ACCIONES
  			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarArticulo' idArticulo='" . $Articulos[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarArticulo'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarArticulo' idArticulo='" . $Articulos[$i]["id"]  . "' imgPortada='" .  $Articulos[$i]["portada"] . "'><i class='fa fa-times'></i></button></div>";

			/*=============================================
  			CONSTRUIR LOS DATOS JSON
  			=============================================*/


			$datosJson .= '[
					
					"' . ($i + 1) . '",
					"' . $Articulos[$i]["titulo"] . '",
				    "' . $imagenPrincipal . '",
				    "' . $categoria . '",
				    "' . $subcategoria . '",
					"' . $estado . '",
		  			"' . $precio . '",
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
ACTIVAR TABLA DE ArticuloS
=============================================*/
$activarArticulos = new TablaArticulos();
$activarArticulos->mostrarTablaArticulos();
