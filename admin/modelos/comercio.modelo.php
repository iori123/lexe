<?php

require_once "conexion.php";

class ModeloComercio
{

	/*=============================================
	SELECCIONAR PLANTILLA
	=============================================*/

	static public function mdlSeleccionarPlantilla($tabla)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR LOGO O ICONO
	=============================================*/

	static public function mdlActualizarLogoIcono($tabla, $id, $item, $valor)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE id = :id");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR COLORES
	=============================================*/

	static public function mdlActualizarColores($tabla, $id, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET barraSuperior = :barraSuperior, textoSuperior = :textoSuperior, colorFondo = :colorFondo, colorTexto = :colorTexto  WHERE id = :id");

		$stmt->bindParam(":barraSuperior", $datos["barraSuperior"], PDO::PARAM_STR);
		$stmt->bindParam(":textoSuperior", $datos["textoSuperior"], PDO::PARAM_STR);
		$stmt->bindParam(":colorFondo", $datos["colorFondo"], PDO::PARAM_STR);
		$stmt->bindParam(":colorTexto", $datos["colorTexto"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR SCRIPT
	=============================================*/

	static public function mdlActualizarScript($tabla, $id, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET apiFacebook = :apiFacebook, pixelFacebook = :pixelFacebook, googleAnalytics = :googleAnalytics WHERE id = :id");

		$stmt->bindParam(":apiFacebook", $datos["apiFacebook"], PDO::PARAM_STR);
		$stmt->bindParam(":pixelFacebook", $datos["pixelFacebook"], PDO::PARAM_STR);
		$stmt->bindParam(":googleAnalytics", $datos["googleAnalytics"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	SELECCIONAR COMERCIO
	=============================================*/

	static public function mdlSeleccionarComercio($tabla)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR INFORMACION
	=============================================*/

	static public function mdlActualizarInformacion($tabla, $id, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET telefono = :telefono,
		distrito = :distrito, direccion = :direccion, correo = :correo WHERE id = :id");

		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":distrito", $datos["distrito"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);

		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
}
