<?php

class ClaseLicencia
{

    function agregaLicencia($datos = array())
    {
        require('../BD/conexion.php');

        $retorno = array();

        if ($datos['dueno'] != null and $datos['pais'] != null and $datos['tel'] != null and $datos['correo'] != null) {
            $sql = "BEGIN Licencia.INSERTALicencia (:dueno,:pais,:tel,:correo); END;";

            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':pais', $datos['pais']);
            oci_bind_by_name($stid, ':dueno', $datos['dueno']);
            oci_bind_by_name($stid, ':tel', $datos['tel']);
            oci_bind_by_name($stid, ':correo', $datos['correo']);

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

        $stid = oci_parse($conn, "begin Licencia.listarLicencia(:cursbv); end;");
        oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);

        oci_execute($stid);
        oci_execute($curs);

        while ($row = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $retorno[] = array(
                'id' => $row['ID_LICENCIA'],
                'dueno' => $row['DUENO'],
                'pais' => $row['PAIS'],
                'telefono' => $row['TELEFONO'],
                'correo' => $row['CORREO']
            );
        }
        return $retorno;
    }

    function eliminar($datos = array())
    {
        require('../BD/conexion.php');

        $retorno = array();

        $sql = "BEGIN Licencia.eliminaLicencia (:id); END;";

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

        $stid = oci_parse($conn, 'begin Licencia.buscaLicencia(:id,:curs); end;');

        oci_bind_by_name($stid, ':id', $datos['id']);
        oci_bind_by_name($stid, ":curs", $curs, -1, OCI_B_CURSOR);

        oci_execute($stid);
        oci_execute($curs);

        while ($row = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $retorno[] = array(
                'id' => $row['ID_LICENCIA'],
                'dueno' => $row['DUENO'],
                'pais' => $row['PAIS'],
                'telefono' => $row['TELEFONO'],
                'correo' => $row['CORREO']
            );
        }
        return $retorno;
    }

    function editar($datos = array())
    {
        require('../BD/conexion.php');

        $retorno = array();

        if ($datos['dueno-edit'] != null and $datos['pais-edit'] != null and $datos['tel-edit'] != null and $datos['correo-edit'] != null) {

            $sql = "begin Licencia.actualizaLicencia(:dueno,:pais,:tel,:correo,:id); end;";

            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':dueno', $datos['dueno-edit']);
            oci_bind_by_name($stid, ':pais', $datos['pais-edit']);
            oci_bind_by_name($stid, ':tel', $datos['tel-edit']);
            oci_bind_by_name($stid, ':correo', $datos['correo-edit']);
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
