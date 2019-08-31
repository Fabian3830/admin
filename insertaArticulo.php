<?php
require('Clases/claseArticulo.php');

$Articulo = new ClaseArticulo();

$resultado = $Articulo->agregaColaboradores();

var_dump($resultado[0].['artista']);
?>
<!DOCTYPE html>
<html lang="en">

<!-- HEADER -->

<head>
    <?php include("template/header.php") ?>
    <script src="js/articulo.js" type="text/javascript"></script>
</head>
<!-- HEADER -->

<body id="page-top">

    <!-- NAVBAR -->
    <?php include("template/navbar.php") ?>
    <!-- NAVBAR -->

    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("template/sidebar.php") ?>
        <!-- Sidebar -->

        <div id="content-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <h3 class="col-12" style="text-align: center">Datos del Articulo</h3>
                    <form class="col-6 offset-1" id="frmAgregarArticulo" method="POST">
                        <div class="form-group col-12">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="tipo">
                                <option selected>Licencia</option>
                                <?php
                                if ($resultado != null) {
                                    $keys = array_keys($resultado);
                                    for ($i = 0; $i < count($resultado); $i++) {
                                        echo $keys[$i] . "\n";
                                        foreach ($resultado[$keys[$i]] as $key => $value) {
                                            echo $key . " : " . $value . "\n";
                                        }
                                        echo "\n";
                                    }
                                } else {
                                    echo "<option value=''>No hay registros, debe crearlos</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="tipo">
                                <option selected>Artista</option>
                                <?php
                                if ($resultado["artista"] != null) {
                                    foreach ($resultado["artista"] as $artista) {
                                        echo "<option value='" . $artista . id . "'>" . $artista . nombre . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>No hay registros, debe crearlos</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="tipo">
                                <option selected>Proveedor</option>
                                <?php
                                if ($resultado["proveedor"] != null) {
                                    foreach ($resultado["proveedor"] as $proveedor) {
                                        echo "<option value='" . $proveedor . id . "'>" . $proveedor . nombre . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>No hay registros, debe crearlos</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="tipo">
                                <option selected>Tipo</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="tel">Fecha</label>
                            <input type="date" class="form-control" name="tel" id="tel">
                        </div>
                        <div class="form-group col-12">
                            <label for="tel">Articulo</label>
                            <input type="text" class="form-control" name="tel" id="tel">
                        </div>
                        <div class="form-group col-12">
                            <label for="tel">Articulo</label>
                            <input type="text" class="form-control" name="tel" id="tel">
                        </div>
                        <div class="form-group col-12">
                            <label for="tel">Articulo</label>
                            <input type="text" class="form-control" name="tel" id="tel">
                        </div>
                        <div class="form-group col-12">
                            <label for="empresa">Descripción</label>
                            <input type="text" class="form-control" name="empresa" id="empresa">
                            <button type="reset" class="btn btn-primary mt-4" id="btnAgregarArticulo">Agregar</button>
                        </div>
                        <div class="form-group col-8 offset-2">
                            <h6 class="col-12" id="acierto" style="text-align: center; display: none;">Datos insertados correctamente</h6>
                            <label id="falla" style="text-align: center; display:none">No ha sido posible insertar los datos</label>
                        </div>
                    </form>
                    <div class="col-3 my-auto ml-4">
                        <div class="img-thumbnail" id="uploaded" style="width: 160px; height: 175px;"></div>
                        <input type="file" name="img" size="20" id="img" class="mt-2">
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>