<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/subcategorias.controlador.php";
require_once "../modelos/subcategorias.modelo.php";

require_once "../controladores/cabeceras.controlador.php";
require_once "../modelos/cabeceras.modelo.php";

class TablaProductos
{

	/*=============================================
  MOSTRAR LA TABLA DE PRODUCTOS
  =============================================*/

	public function mostrarTablaProductos()
	{

		$item = null;
		$valor = null;

		$productos = ControladorProductos::ctrMostrarProductos($item, $valor);

		$datosJson = '

  		{	
  			"data":[';

		for ($i = 0; $i < count($productos); $i++) {

			/*=============================================
  			TRAER LAS CATEGORÍAS
  			=============================================*/

			$item = "id";
			$valor = $productos[$i]["id_categoria"];

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
			$valor2 = $productos[$i]["id_subcategoria"];

			$subcategorias = ControladorSubCategorias::ctrMostrarSubCategorias($item2, $valor2);

			if ($subcategorias[0]["subcategoria"] == "") {

				$subcategoria = "SIN SUBCATEGORÍA";
			} else {

				$subcategoria = $subcategorias[0]["subcategoria"];
			}

			/*=============================================
  			AGREGAR ETIQUETAS DE ESTADO
  			=============================================*/

			if ($productos[$i]["estado"] == 0) {

				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado";
				$estadoProducto = 1;
			} else {

				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoProducto = 0;
			}

			$estado = "<button class='btn btn-xs btnActivar " . $colorEstado . "' idProducto='" . $productos[$i]["id"] . "' estadoProducto='" . $estadoProducto . "'>" . $textoEstado . "</button>";



			/*=============================================
  			TRAER IMAGEN PRINCIPAL
  			=============================================*/

			$imagenPrincipal = "<img src='" . $productos[$i]["portada"] . "' class='img-thumbnail imgTablaPrincipal' width='100px'>";



			/*=============================================
  			TRAER PRECIO
  			=============================================*/

			if ($productos[$i]["precio"] == 0) {

				$precio = "Gratis";
			} else {

				$precio = "S/. " . number_format($productos[$i]["precio"], 2);
			}




			/*=============================================
  			TRAER LAS ACCIONES
  			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='" . $productos[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='" . $productos[$i]["id"]  . "' imgPortada='" .  $productos[$i]["portada"] . "'><i class='fa fa-times'></i></button></div>";

			/*=============================================
  			CONSTRUIR LOS DATOS JSON
  			=============================================*/


			$datosJson .= '[
					
					"' . ($i + 1) . '",
					"' . $productos[$i]["titulo"] . '",
				    "' . $imagenPrincipal . '",
				    "' . $categoria . '",
				    "' . $subcategoria . '",
					"' . $estado . '",
		  			"' . $precio . '",
				  	"' . $acciones . '"	   

			],';
		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']

		}';

		echo $datosJson;
	}
}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/
$activarProductos = new TablaProductos();
$activarProductos->mostrarTablaProductos();
