<?php
require '../Clases/claseArticulo.php';
$Articulo = new claseArticulo();
$accion = $_POST["accion"];
switch ($accion) {
    case "agregar-articulo":
        $resultado = $Articulo->agregaArticulo($_POST);
        break;
    case "listar-articulo":
        $resultado = $Articulo->listar();
        break;
    case "eliminar-articulo":
        $resultado = $Articulo->eliminar($_POST);
        break;
    case "buscar-articulo":
        $resultado = $Articulo->buscar($_POST);
        break;
    case "editar-articulo":
        $resultado = $Articulo->editar($_POST);
        break;
    default:
        $resultado = $_POST;
}

echo json_encode($resultado);