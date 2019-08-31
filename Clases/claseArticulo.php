<?php

class ClaseArticulo
{

    function agregaArticulo($datos = array())
    {
        require('../BD/conexion.php');

        $retorno = array();

        if ($datos['tipo'] != null) {

            if ($datos['tipo'] = 1) {
                $sql = "BEGIN Articulo.insertaCamisa (:nombre,:tipo,:cantidad,:prec,:descripcion,:licencia,:artista,:proveedor,:tama,:imagen,:fecha); END;";

                $stid = oci_parse($conn, $sql);
                oci_bind_by_name($stid, ':nombre', $datos['nombre']);
                oci_bind_by_name($stid, ':tipo', $datos['tipo']);
                oci_bind_by_name($stid, ':cantidad', $datos['cant']);
                oci_bind_by_name($stid, ':prec', $datos['precio']);
                oci_bind_by_name($stid, ':descripcion', $datos['desc']);
                oci_bind_by_name($stid, ':licencia', $datos['licencia']);
                oci_bind_by_name($stid, ':artista', $datos['artista']);
                oci_bind_by_name($stid, ':proveedor', $datos['proveedor']);
                oci_bind_by_name($stid, ':tama', $datos['tamano']);
                oci_bind_by_name($stid, ':imagen', $datos['img']);
                oci_bind_by_name($stid, ':fecha', $datos['fecha']);
            } else if ($datos['tipo'] = 2) {
                $sql = "BEGIN Articulo.insertaCamisa (:nombre,:tipo,:cantidad,:prec,:descripcion,:licencia,:artista,:proveedor,:tama,:imagen,:fecha,:mate); END;";

                $stid = oci_parse($conn, $sql);
                oci_bind_by_name($stid, ':nombre', $datos['nombre']);
                oci_bind_by_name($stid, ':tipo', $datos['tipo']);
                oci_bind_by_name($stid, ':cantidad', $datos['cant']);
                oci_bind_by_name($stid, ':prec', $datos['precio']);
                oci_bind_by_name($stid, ':descripcion', $datos['desc']);
                oci_bind_by_name($stid, ':licencia', $datos['licencia']);
                oci_bind_by_name($stid, ':artista', $datos['artista']);
                oci_bind_by_name($stid, ':proveedor', $datos['proveedor']);
                oci_bind_by_name($stid, ':tama', $datos['tamano']);
                oci_bind_by_name($stid, ':imagen', $datos['img']);
                oci_bind_by_name($stid, ':fecha', $datos['fecha']);
                oci_bind_by_name($stid, ':mate', $datos['material']);
            } else if ($datos['tipo'] = 3) {
                $sql = "BEGIN Articulo.insertaCamisa (:nombre,:tipo,:cantidad,:prec,:descripcion,:licencia,:artista,:proveedor,:tama,:imagen,:fecha,:pes,:mate); END;";

                $stid = oci_parse($conn, $sql);
                oci_bind_by_name($stid, ':nombre', $datos['nombre']);
                oci_bind_by_name($stid, ':tipo', $datos['tipo']);
                oci_bind_by_name($stid, ':cantidad', $datos['cant']);
                oci_bind_by_name($stid, ':prec', $datos['precio']);
                oci_bind_by_name($stid, ':descripcion', $datos['desc']);
                oci_bind_by_name($stid, ':licencia', $datos['licencia']);
                oci_bind_by_name($stid, ':artista', $datos['artista']);
                oci_bind_by_name($stid, ':proveedor', $datos['proveedor']);
                oci_bind_by_name($stid, ':tama', $datos['tamano']);
                oci_bind_by_name($stid, ':imagen', $datos['img']);
                oci_bind_by_name($stid, ':fecha', $datos['fecha']);
                oci_bind_by_name($stid, ':pes', $datos['peso']);
                oci_bind_by_name($stid, ':mate', $datos['material']);
            } else {
                $sql = "BEGIN Articulo.insertaCamisa (:nombre,:tipo,:cantidad,:prec,:descripcion,:licencia,:artista,:proveedor,:tama,:imagen,:fecha,:colo,:numero); END;";

                $stid = oci_parse($conn, $sql);
                oci_bind_by_name($stid, ':nombre', $datos['nombre']);
                oci_bind_by_name($stid, ':tipo', $datos['tipo']);
                oci_bind_by_name($stid, ':cantidad', $datos['cant']);
                oci_bind_by_name($stid, ':prec', $datos['precio']);
                oci_bind_by_name($stid, ':descripcion', $datos['desc']);
                oci_bind_by_name($stid, ':licencia', $datos['licencia']);
                oci_bind_by_name($stid, ':artista', $datos['artista']);
                oci_bind_by_name($stid, ':proveedor', $datos['proveedor']);
                oci_bind_by_name($stid, ':tama', $datos['tamano']);
                oci_bind_by_name($stid, ':imagen', $datos['img']);
                oci_bind_by_name($stid, ':fecha', $datos['fecha']);
                oci_bind_by_name($stid, ':colo', $datos['color']);
                oci_bind_by_name($stid, ':numero', $datos['disc']);
            }

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
                'id' => $row['NO_ARTICULO'],
                'nombre' => $row['ARTICULO'],
                'tipo' => $row['TIPO'],
                'cant' => $row['CANT'],
                'prec' => $row['PRECIO'],
                'descrip' => $row['DESCRIP'],
                'licencia' => $row['LICENCIA'],
                'artista' => $row['ARTISTA'],
                'proveedor' => $row['PROVEEDOR'],
                'tamano' => $row['TAMANO'],
                'peso' => $row['PESO'],
                'material' => $row['MATERIAL'],
                'color' => $row['COLOR'],
                'numero' => $row['NODISC'],
                'img' => $row['IMG'],
                'fecha' => $row['FECHA']
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
                'id' => $row['NO_ARTICULO'],
                'nombre' => $row['NOMBRE'],
                'cant' => $row['CANT'],
                'prec' => $row['PRECIO'],
                'descrip' => $row['DESCRIP'],
                'tamano' => $row['TAMANO'],
                'peso' => $row['PESO'],
                'material' => $row['MATERIAL'],
                'color' => $row['COLOR'],
                'numero' => $row['NODISC'],
                'img' => $row['IMG'],
                'fecha' => $row['FECHA'],
                'tipo' => $row['ID_TIPO']
            );
        }
        return $retorno;
    }

    function editar($datos = array())
    {
        require('../BD/conexion.php');
        $null = '';
        $retorno = array();
        $sql = "begin Articulo.actualizaArticulo(:nom,:cantidad,:precio,:desc,:tamano,:peso,:material,:color,:num,:tipo,:id); end;";
        if ($datos['tipo-edit'] = 1) {


            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':nom', $datos['nombre-edit']);
            oci_bind_by_name($stid, ':cantidad', $datos['cant-edit']);
            oci_bind_by_name($stid, ':precio', $datos['prec-edit']);
            oci_bind_by_name($stid, ':desc', $datos['desc-edit']);
            oci_bind_by_name($stid, ':tamano', $datos['tamano-edit']);
            oci_bind_by_name($stid, ':tipo', $datos['tipo-edit']);
            oci_bind_by_name($stid, ':id', $datos['idd-edit']);
            oci_bind_by_name($stid, ':material', $null);
            oci_bind_by_name($stid, ':peso', $null);
            oci_bind_by_name($stid, ':color', $null);
            oci_bind_by_name($stid, ':num', $null);
        } else if ($datos['tipo-edit'] = 2) {

            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':nom', $datos['nombre-edit']);
            oci_bind_by_name($stid, ':cantidad', $datos['cant-edit']);
            oci_bind_by_name($stid, ':precio', $datos['prec-edit']);
            oci_bind_by_name($stid, ':desc', $datos['desc-edit']);
            oci_bind_by_name($stid, ':tamano', $datos['tamano-edit']);
            oci_bind_by_name($stid, ':tipo', $datos['tipo-edit']);
            oci_bind_by_name($stid, ':id', $datos['idd-edit']);
            oci_bind_by_name($stid, ':material', $datos['mate-edit']);
            oci_bind_by_name($stid, ':peso', $null);
            oci_bind_by_name($stid, ':color', $null);
            oci_bind_by_name($stid, ':num', $null);
        } else if ($datos['tipo-edit'] = 3) {

            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':nom', $datos['nombre-edit']);
            oci_bind_by_name($stid, ':cantidad', $datos['cant-edit']);
            oci_bind_by_name($stid, ':precio', $datos['prec-edit']);
            oci_bind_by_name($stid, ':desc', $datos['desc-edit']);
            oci_bind_by_name($stid, ':tamano', $datos['tamano-edit']);
            oci_bind_by_name($stid, ':tipo', $datos['tipo-edit']);
            oci_bind_by_name($stid, ':id', $datos['idd-edit']);
            oci_bind_by_name($stid, ':peso', $datos['peso-edit']);
            oci_bind_by_name($stid, ':material', $datos['mate-edit']);
            oci_bind_by_name($stid, ':color', $null);
            oci_bind_by_name($stid, ':num', $null);
        } else {

            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':nom', $datos['nombre-edit']);
            oci_bind_by_name($stid, ':cantidad', $datos['cant-edit']);
            oci_bind_by_name($stid, ':precio', $datos['prec-edit']);
            oci_bind_by_name($stid, ':desc', $datos['desc-edit']);
            oci_bind_by_name($stid, ':tamano', $datos['tamano-edit']);
            oci_bind_by_name($stid, ':tipo', $datos['tipo-edit']);
            oci_bind_by_name($stid, ':id', $datos['idd-edit']);
            oci_bind_by_name($stid, ':color', $datos['color-edit']);
            oci_bind_by_name($stid, ':num', $datos['disc-edit']);
            oci_bind_by_name($stid, ':peso', $datos['peso-edit']);
            oci_bind_by_name($stid, ':material', $datos['mate-edit']);
        }


        oci_execute($stid);
        oci_commit($conn);
        
        $retorno['valida'] = true;





        return $retorno;
    }

    function agregaColaboradores()
    {
        require('BD/conexion.php');

        $retorno = array();
        $artista = array();
        $licencia = array();
        $proveedor = array();

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
            $artista[] = array(
                'id' => $row['ID_ARTISTA'],
                'nombre' => $row['NOMBRE']
            );
        }

        while ($row = oci_fetch_array($curs2, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $licencia[] = array(
                'id' => $row['ID_LICENCIA'],
                'nombre' => $row['DUENO']
            );
        }

        while ($row = oci_fetch_array($curs3, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $proveedor[] = array(
                'id' => $row['ID_PROVEEDOR'],
                'nombre' => $row['NOMBRE']
            );
        }
        $retorno['artista'] = $artista;
        $retorno['licencia'] = $licencia;
        $retorno['proveedor'] = $proveedor;
        return $retorno;
    }
}
