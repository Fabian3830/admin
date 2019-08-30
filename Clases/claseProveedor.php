<?php

class ClaseProveedor
{

    function agregaProveedor($datos = array())
    {
        require('../BD/conexion.php');

        $retorno = array();

        if ($datos['nombre'] != null and $datos['correo'] != null and $datos['tel'] != null) {
            $sql = "BEGIN Proveedor.INSERTAProveedor (:nombre,:correo,:tel); END;";

            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':nombre', $datos['nombre']);
            oci_bind_by_name($stid, ':correo', $datos['correo']);
            oci_bind_by_name($stid, ':tel', $datos['tel']);

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

        $stid = oci_parse($conn, "begin Proveedor.listarProveedor(:cursbv); end;");
        oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);

        oci_execute($stid);
        oci_execute($curs);

        while ($row = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $retorno[] = array(
                'id' => $row['ID_PROVEEDOR'],
                'nombre' => $row['NOMBRE'],
                'correo' => $row['CORREO'],
                'telefono' => $row['TELEFONO']
            );
        }
        return $retorno;
    }

    function eliminar($datos = array())
    {
        require('../BD/conexion.php');

        $retorno = array();

        $sql = "BEGIN Proveedor.eliminaProveedor (:id); END;";

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

        $stid = oci_parse($conn, 'begin Proveedor.buscaProveedor(:id,:curs); end;');

        oci_bind_by_name($stid, ':id', $datos['id']);
        oci_bind_by_name($stid, ":curs", $curs, -1, OCI_B_CURSOR);

        oci_execute($stid);
        oci_execute($curs);

        while ($row = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $retorno[] = array(
                'id' => $row['ID_PROVEEDOR'],
                'nombre' => $row['NOMBRE'],
                'correo' => $row['CORREO'],
                'telefono' => $row['TELEFONO']
            );
        }
        return $retorno;
    }

    function editar($datos = array())
    {
        require('../BD/conexion.php');

        $retorno = array();

        if ($datos['nombre-edit'] != null and $datos['correo-edit'] != null and $datos['tel-edit'] != null) {

            $sql = "begin Proveedor.actualizaProveedor(:nombre,:correo,:tel,:id); end;";

            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':nombre', $datos['nombre-edit']);
            oci_bind_by_name($stid, ':correo', $datos['correo-edit']);
            oci_bind_by_name($stid, ':tel', $datos['tel-edit']);
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
