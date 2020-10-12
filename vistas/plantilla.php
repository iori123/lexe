<!DOCTYPE html>
<html lang="es">

<head>
	<?php
	$server = Ruta::ctrRutaServidor();
	$url = Ruta::ctrRuta();
	$plantilla = ControladorPlantilla::ctrEstiloPlantilla();
	
	?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Lekkermax</title>
	
	<link rel="icon" href="<?php echo $server .$plantilla['icono']; ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url ?>vistas/css/style.css" />
	<script type="text/javascript" src="<?php echo $url ?>vistas/js/boxOver.js"></script>
	<style type="text/css">
		
		.style1 {
			color: #0000CC
		}
		
	</style>
	
</head>

<body>
	<div id="main_container">
		<?php

		include "modulos/cabezote.php";

		$rutas = array();
		if (isset($_GET["ruta"])) {
			$rutas = explode("/", $_GET["ruta"]);
			$item = "ruta";
			$valor =  $rutas[0];
			$categoriaDB = ControladorProductos::ctrMostrarCategorias($item, $valor);
			if ($rutas[0] == $categoriaDB["ruta"]) {
				$categoria = $categoriaDB;
				include "modulos/categorias.php";
			} elseif ($rutas[0]  == 'inicio') {
				include "modulos/home.php";
			} else {
				include "modulos/error404.php";
			}
		} else {
			include "modulos/home.php";
		}
		include "modulos/footer.php";

		?>

	</div>

	<div align="center"></div>
</body>

</html>