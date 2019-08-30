<?php
require '../Clases/claseLicencia.php';
$Licencia = new claseLicencia();
$accion = $_POST["accion"];
switch ($accion) {
    case "agregar-licencia":
        $resultado = $Licencia->agregaLicencia($_POST);
        break;
    case "listar-licencia":
        $resultado = $Licencia->listar();
        break;
    case "eliminar-licencia":
        $resultado = $Licencia->eliminar($_POST);
        break;
    case "buscar-licencia":
        $resultado = $Licencia->buscar($_POST);
        break;
    case "editar-licencia":
        $resultado = $Licencia->editar($_POST);
        break;
    default:
        $resultado = $_POST;
}

echo json_encode($resultado);