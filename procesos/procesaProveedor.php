<?php
require '../Clases/claseProveedor.php';
$Proveedor = new claseProveedor();
$accion = $_POST["accion"];
switch ($accion) {
    case "agregar-proveedor":
        $resultado = $Proveedor->agregaProveedor($_POST);
        break;
    case "listar-proveedor":
        $resultado = $Proveedor->listar();
        break;
    case "eliminar-proveedor":
        $resultado = $Proveedor->eliminar($_POST);
        break;
    case "buscar-proveedor":
        $resultado = $Proveedor->buscar($_POST);
        break;
    case "editar-proveedor":
        $resultado = $Proveedor->editar($_POST);
        break;
    default:
        $resultado = $_POST;
}

echo json_encode($resultado);