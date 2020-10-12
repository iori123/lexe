<?php

class ControladorComercio
{

    static public function ctrSeleccionarComercio()
    {

        $tabla = "comercio";

        $respuesta = ModeloComercio::mdlSeleccionarComercio($tabla);

        return $respuesta;
    }
}
