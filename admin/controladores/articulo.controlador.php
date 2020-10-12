<?php

class ControladorArticulos
{

    static public function ctrMostrarTotalArticulos($orden)
    {
        $tabla = "articulos";

        $respuesta = ModeloArticulos::mdlMostrarTotalArticulos($tabla, $orden);

        return $respuesta;
    }

    static public function ctrMostrarArticulos($item, $valor)
    {

        $tabla = "articulos";

        $respuesta = ModeloArticulos::mdlMostrarArticulos($tabla, $item, $valor);

        return $respuesta;
    }
    static public function ctrCrearArticulo($datos)
    {
        if (isset($datos["tituloArticulo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloArticulo"])) {

                $rutaFotoPrincipal = "../vistas/img/Articulos/default/default.jpg";

                if (
                    isset($datos["fotoPrincipal"]["tmp_name"]) &&
                    !empty($datos["fotoPrincipal"]["tmp_name"])
                ) {
                    list($ancho, $alto) = getimagesize($datos["fotoPrincipal"]["tmp_name"]);
                    $nuevoAncho = 400;
                    $nuevoAlto = 450;

                    if ($datos["fotoPrincipal"]["type"] == "image/jpeg") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
                        $aleatorio = mt_rand(100, 999);

                        $rutaFotoPrincipal = "../vistas/img/Articulos/" . $datos["rutaArticulo"] . ".jpg";
                        $origen = imagecreatefromjpeg($datos["fotoPrincipal"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $rutaFotoPrincipal);
                    }

                    if ($datos["fotoPrincipal"]["type"] == "image/png") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $rutaFotoPrincipal = "../vistas/img/Articulos/" . $datos["rutaArticulo"] . ".png";

                        $origen = imagecreatefrompng($datos["fotoPrincipal"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagealphablending($destino, FALSE);

                        imagesavealpha($destino, TRUE);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $rutaFotoPrincipal);
                    }
                }


                $datosArticulo = array(
                    "titulo" => $datos["tituloArticulo"],
                    "idCategoria" => $datos['categoria'],
                    "idSubCategoria" => $datos['subCategoria'],
                    "ruta" => $datos["rutaArticulo"],
                    "estado" => 1,
                    "precio" => $datos["precio"],
                    "imgFotoPrincipal" => substr($rutaFotoPrincipal, 3),
                );

                $respuesta = ModeloArticulos::mdlIngresarArticulo("Articulos", $datosArticulo);

                return $respuesta;
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El nombre del Articulo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';
            }
        }
    }


    static public function ctrEditarArticulo($datos)
    {

        if (isset($datos["idArticulo"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloArticulo"])) {



                /*=============================================
				VALIDAR IMAGEN PRINCIPAL
				=============================================*/

                $rutaFotoPrincipal = "../" . $datos["antiguaFotoPrincipal"];

                if (isset($datos["fotoPrincipal"]["tmp_name"]) && !empty($datos["fotoPrincipal"]["tmp_name"])) {

                    /*=============================================
					BORRAMOS ANTIGUA FOTO PRINCIPAL
					=============================================*/

                    unlink("../" . $datos["antiguaFotoPrincipal"]);

                    /*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

                    list($ancho, $alto) = getimagesize($datos["fotoPrincipal"]["tmp_name"]);

                    $nuevoAncho = 400;
                    $nuevoAlto = 450;


                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                    if ($datos["fotoPrincipal"]["type"] == "image/jpeg") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $rutaFotoPrincipal = "../vistas/img/Articulos/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($datos["fotoPrincipal"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $rutaFotoPrincipal);
                    }

                    if ($datos["fotoPrincipal"]["type"] == "image/png") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $rutaFotoPrincipal = "../vistas/img/Articulos/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($datos["fotoPrincipal"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagealphablending($destino, FALSE);

                        imagesavealpha($destino, TRUE);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $rutaFotoPrincipal);
                    }
                }


                $datosArticulo = array(
                    "id" => $datos["idArticulo"],
                    "titulo" => $datos["tituloArticulo"],
                    "idCategoria" => $datos['categoria'],
                    "idSubCategoria" => $datos['subCategoria'],

                    "estado" => 1,
                    "precio" => $datos["precio"],
                    "imgFotoPrincipal" => substr($rutaFotoPrincipal, 3),
                );

                $respuesta = ModeloArticulos::mdlEditarArticulo("Articulos", $datosArticulo);

                return $respuesta;
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El nombre del Articulo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';
            }
        }
    }

    static public function ctrEliminarArticulo()
    {

        if (isset($_GET["idArticulo"])) {

            $datos = $_GET["idArticulo"];


            /*=============================================
			ELIMINAR FOTO PRINCIPAL
			=============================================*/

            if ($_GET["imgportada"] != "" && $_GET["imgportada"] != "vistas/img/Articulos/default/default.jpg") {

                unlink($_GET["imgportada"]);
            }


            $respuesta = ModeloArticulos::mdlEliminarArticulo("Articulos", $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El Articulo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "productos";

								}
							})

				</script>';
            }
        }
    }
}
