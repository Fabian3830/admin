<?php

$nombre=$_FILES['img']['name'];

$tipo=$_FILES['img']['type'];

$tamano=$_FILES['img']['size'];


$destino=$_SERVER['DOCUMENT_ROOT'].'/Mnd002/SERVER/img/';

move_uploaded_file($_FILES['img']['tmp_name'],$destino.$nombre);

