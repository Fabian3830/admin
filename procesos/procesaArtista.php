<?php
require '../Clases/claseArtista.php';
$Artista = new claseArtista();
$accion = $_POST["accion"];
switch ($accion) {
    case "agregar-artista":
        $resultado = $Artista->agregaArtista($_POST);
        break;
    case "listar-artista":
        $resultado = $Artista->listar();
        break;
    case "eliminar-artista":
        $resultado = $Artista->eliminar($_POST);
        break;
    case "buscar-artista":
        $resultado = $Artista->buscar($_POST);
        break;
    case "editar-artista":
        $resultado = $Artista->editar($_POST);
        break;
    default:
        $resultado = $_POST;
}

echo json_encode($resultado);
