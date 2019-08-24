<?php

class ClaseColabora
{

    function agregaArtista($datos = array())
    {
        $resultado = array();
        $conn = oci_connect("Proyecto", "1", "localhost:1521/xe");
        $query = oci_parse($conn, "EXEC insertaArtista('" . $datos["nombre"] . "','" . $datos["correo"] . "'," . $datos["tel"] . ",'" . $datos["empresa"] . "');");
        $verificar = oci_execute($query);

        if ($verificar) {
            $resultado["valido"] = true;
        } else {
            $resultado["valido"] = false;
        }
        return $resultado;
    }
}
