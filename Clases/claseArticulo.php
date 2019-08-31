<?php

class ClaseArticulo
{

    function agregaArticulo($datos = array())
    {
        require('../BD/conexion.php');

        $retorno = array();

        if ($datos['correo'] != null and $datos['nombre'] != null and $datos['tel'] != null and $datos['empresa'] != null) {

            $sql = "BEGIN Articulo.INSERTAArticulo (:nombre,:correo,:tel,:empresa); END;";

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

        $stid = oci_parse($conn, "begin Articulo.listarArticulo(:cursbv); end;");
        oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);

        oci_execute($stid);
        oci_execute($curs);

        while ($row = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $retorno[] = array(
                'id' => $row['ID_Articulo'],
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

        $sql = "BEGIN Articulo.eliminaArticulo (:id); END;";

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

        $stid = oci_parse($conn, 'begin Articulo.buscaArticulo(:id,:curs); end;');

        oci_bind_by_name($stid, ':id', $datos['id']);
        oci_bind_by_name($stid, ":curs", $curs, -1, OCI_B_CURSOR);

        oci_execute($stid);
        oci_execute($curs);

        while ($row = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $retorno[] = array(
                'id' => $row['ID_Articulo'],
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

            $sql = "begin Articulo.actualizaArticulo(:nom,:correo,:tel,:emp,:id); end;";

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

    function agregaColaboradores(){
        require('BD/conexion.php');

        $retorno = array();

        $curs1 = oci_new_cursor($conn);
        $curs2 = oci_new_cursor($conn);
        $curs3 = oci_new_cursor($conn);

        $stid = oci_parse($conn, "begin colaboradores(:curs1,:curs2,:curs3); end;");

        oci_bind_by_name($stid, ":curs1", $curs1, -1, OCI_B_CURSOR);
        oci_bind_by_name($stid, ":curs2", $curs2, -1, OCI_B_CURSOR);
        oci_bind_by_name($stid, ":curs3", $curs3, -1, OCI_B_CURSOR);

        oci_execute($stid);
        oci_execute($curs1);
        oci_execute($curs2);
        oci_execute($curs3);

        while ($row = oci_fetch_array($curs1, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $retorno[] = array(
                "artista" => array( 
                'id' => $row['ID_ARTISTA'],
                'nombre' => $row['NOMBRE']
            )
                );
        }

        while ($row = oci_fetch_array($curs2, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $retorno[] = array(
                "licencia" => array(
                'id' => $row['ID_LICENCIA'],
                'nombre' => $row['DUENO']
            )
                );
        }

        while ($row = oci_fetch_array($curs3, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $retorno[] = array(
                "proveedor" => array(
                'id' => $row['ID_PROVEEDOR'],
                'nombre' => $row['NOMBRE']
            )
                );
        }
        return $retorno;

    }
}