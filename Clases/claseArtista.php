<?php

class ClaseArtista
{

    function agregaArtista($datos = array())
    {
        require('../BD/conexion.php');

        $retorno = array();

        if ($datos['correo'] != null and $datos['nombre'] != null and $datos['tel'] != null and $datos['empresa'] != null) {

            $sql = "BEGIN artista.INSERTAARTISTA (:nombre,:correo,:tel,:empresa); END;";

            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':correo', $datos['correo']);
            oci_bind_by_name($stid, ':nombre', $datos['nombre']);
            oci_bind_by_name($stid, ':tel', $datos['tel']);
            oci_bind_by_name($stid, ':empresa', $datos['empresa']);

            oci_execute($stid);

            oci_commit($conn);
            $retorno['valida'] = true;
        } else {
            $retorno['valida'] = false;
        }
        return $retorno;
    }

    function listar()
    {
        require('../BD/conexion.php');

        $retorno = array();
        $curs = oci_new_cursor($conn);

        $stid = oci_parse($conn, "begin artista.listarArtista(:cursbv); end;");
        oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);

        oci_execute($stid);
        oci_execute($curs);

        while ($row = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $retorno[] = array(
                'id' => $row['ID_ARTISTA'],
                'nombre' => $row['NOMBRE'],
                'correo' => $row['CORREO'],
                'telefono' => $row['TELEFONO'],
                'empresa' => $row['EMPRESA']
            );
        }
        return $retorno;
    }

    function eliminar($datos = array())
    {
        require('../BD/conexion.php');

        $retorno = array();

        $sql = "BEGIN artista.eliminaArtista (:id); END;";

        $stid = oci_parse($conn, $sql);
        oci_bind_by_name($stid, ':id', $datos['id']);

        oci_execute($stid);

        oci_commit($conn);
        $retorno['valida'] = true;
        return $retorno;
    }

    function buscar($datos = array())
    {
        require('../BD/conexion.php');

        $retorno = array();
        $curs = oci_new_cursor($conn);

        $stid = oci_parse($conn, 'begin artista.buscaArtista(:id,:curs); end;');

        oci_bind_by_name($stid, ':id', $datos['id']);
        oci_bind_by_name($stid, ":curs", $curs, -1, OCI_B_CURSOR);

        oci_execute($stid);
        oci_execute($curs);

        while ($row = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $retorno[] = array(
                'id' => $row['ID_ARTISTA'],
                'nombre' => $row['NOMBRE'],
                'correo' => $row['CORREO'],
                'telefono' => $row['TELEFONO'],
                'empresa' => $row['EMPRESA']
            );
        }
        return $retorno;
    }

    function editar($datos = array())
    {
        require('../BD/conexion.php');

        $retorno = array();

        if ($datos['correo-edit'] != null and $datos['nombre-edit'] != null and $datos['tel-edit'] != null and $datos['empresa-edit'] != null) {

            $sql = "begin artista.actualizaArtista(:nom,:correo,:tel,:emp,:id); end;";

            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':correo', $datos['correo-edit']);
            oci_bind_by_name($stid, ':nom', $datos['nombre-edit']);
            oci_bind_by_name($stid, ':tel', $datos['tel-edit']);
            oci_bind_by_name($stid, ':emp', $datos['empresa-edit']);
            oci_bind_by_name($stid, ':id', $datos['idd-edit']);

            oci_execute($stid);

            oci_commit($conn);
            $retorno['valida'] = true;
        } else {
            $retorno['valida'] = false;
        }
        return $retorno;
    }
}
