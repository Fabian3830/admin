<?php
require 'Clases/claseColabora.php';
var_dump($_POST);
$Colabora = new claseColabora();
$accion = $_POST["accion"];
switch ($accion) {
    case "agregar-artista":
        $resultado = $Colabora->agregaArtista($_POST);
        break;
}

echo json_encode($resultado);
