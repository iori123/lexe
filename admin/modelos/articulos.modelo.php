<?php

require_once "conexion.php";

class ModeloArticulos
{

    static public function mdlMostrarTotalArticulos($tabla, $orden)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    static public function mdlActualizarArticulos($tabla, $item1, $valor1, $item2, $valor2): string
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);
        return $stmt->execute() ? 'ok' : 'error';
        $stmt->close();
        $stmt = null;
    }

    static public function mdlMostrarArticulos($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlIngresarArticulo($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, id_subcategoria, ruta, estado, titulo,  precio,portada) VALUES (:id_categoria, :id_subcategoria, :ruta, :estado, :titulo, :precio,:portada)");

        $stmt->bindParam(":id_categoria", $datos["idCategoria"], PDO::PARAM_STR);
        $stmt->bindParam(":id_subcategoria", $datos["idSubCategoria"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        $stmt->bindParam(":portada", $datos["imgFotoPrincipal"], PDO::PARAM_STR);

        return $stmt->execute() ? 'ok' : 'error';
        $stmt->close();
        $stmt = null;
    }

    static public function mdlEditarArticulo($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria = :id_categoria, id_subcategoria = :id_subcategoria,  estado = :estado, titulo = :titulo,precio = :precio , portada = :portada WHERE id = :id");

        $stmt->bindParam(":id_categoria", $datos["idCategoria"], PDO::PARAM_STR);
        $stmt->bindParam(":id_subcategoria", $datos["idSubCategoria"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        $stmt->bindParam(":portada", $datos["imgFotoPrincipal"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        return $stmt->execute() ? 'ok' : 'error';

        $stmt->close();
        $stmt = null;
    }
    static public function mdlEliminarArticulo($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        return $stmt->execute() ? 'ok' : 'error';

        $stmt->close();

        $stmt = null;
    }
}
