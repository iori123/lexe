<?php

class ControladorProductos{

	/*=============================================
	MOSTRAR CATEGORÍAS
	=============================================*/

	static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloProductos::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR SUBCATEGORÍAS
	=============================================*/

	static public function ctrMostrarSubCategorias($item, $valor){

		$tabla = "subcategorias";

		$respuesta = ModeloProductos::mdlMostrarSubCategorias($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo){

		$tabla = "articulos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $ordenar, $item, $valor, $base, $tope, $modo);

		return $respuesta;
	}


	/*=============================================
	LISTAR PRODUCTOS
	=============================================*/

	static public function ctrListarProductos($ordenar, $item, $valor){

		$tabla = "articulos";

		$respuesta = ModeloProductos::mdlListarProductos($tabla, $ordenar, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR BANNER
	=============================================*/

	static public function ctrMostrarBanner(){

		$tabla = "banner";

		$respuesta = ModeloProductos::mdlMostrarBanner($tabla);

		return $respuesta;

	}

	


	/*=============================================
	ACTUALIZAR VISTA PRODUCTO
	=============================================*/

	static public function ctrActualizarProducto($item1, $valor1, $item2, $valor2){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlActualizarProducto($tabla, $item1, $valor1, $item2, $valor2);

		return $respuesta;
	}

}