<?php

$nombre=$_FILE['img']['name'];

$tipo=$_FILE['img']['type'];

$tamano=$_FILE['img']['size'];


$destino=$_SERVER['DOCUMENT_ROOT'].'/Mnd002/SERVER/img/';

move_uploaded_file($_FILES['img']['tmp_name'],$destino.$nombre);

