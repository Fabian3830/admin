<?php
require('Clases/claseArticulo.php');

$Articulo = new ClaseArticulo();

$resultado = $Articulo->agregaColaboradores();
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
                            <label for="nombre"> Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="form-group col-12">
                            <select class="custom-select" id="licencia" name="licencia">
                                <option selected>Licencia</option>
                                <?php
                                if ($resultado != null) {
                                    foreach ($resultado["licencia"] as $licencia) {
                                        echo "<option value='" . $licencia['id'] . "'>" . $licencia['nombre'] . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>No hay registros, debe crearlos</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <select class="custom-select" id="artista" name="artista">
                                <option selected>Artista</option>
                                <?php
                                if ($resultado["artista"] != null) {
                                    foreach ($resultado["artista"] as $artista) {
                                        echo "<option value='" . $artista['id'] . "'>" . $artista['nombre'] . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>No hay registros, debe crearlos</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <select class="custom-select" id="proveedor" name="proveedor">
                                <option selected>Proveedor</option>
                                <?php
                                if ($resultado["proveedor"] != null) {
                                    foreach ($resultado["proveedor"] as $proveedor) {
                                        echo "<option value='" . $proveedor['id'] . "'>" . $proveedor['nombre'] . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>No hay registros, debe crearlos</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <select class="custom-select" id="tipo" name="tipo">
                                <option selected>Tipo</option>
                                <option value="1">Camisa</option>
                                <option value="2">Poster</option>
                                <option value="3">Estatuilla</option>
                                <option value="4">Disco</option>
                            </select>

                        </div>
                        <div class="form-group col-12" style="display: none" id="divFecha">
                            <label for="fecha"></label> Fecha</label>
                            <input type="text" class="form-control" name="fecha" id="fecha" placeholder="DD/MM/YYYY">
                        </div>

                        <div class="form-group col-12" style="display: none" id="divTamano">
                            <label for="tamano">Tamaño</label>
                            <input type="text" class="form-control" name="tamano" id="tamano">
                        </div>

                        <div class="form-group col-12" style="display: none" id="divPeso">
                            <label for="peso">Peso</label>
                            <input type="text, hidden" class="form-control" name="peso" id="peso">
                        </div>

                        <div class="form-group col-12" style="display: none" id="divMaterial">
                            <label for="material">Material</label>
                            <input type="text" class="form-control" name="material" id="material">
                        </div>

                        <div class="form-group col-12" style="display: none" id="divColor">
                            <label for="color">Color</label>
                            <input type="text" class="form-control" name="color" id="color">
                        </div>

                        <div class="form-group col-12" style="display: none" id="divDisc">
                            <label for="disc">Número de discos</label>
                            <input type="text" class="form-control" name="disc" id="disc">
                        </div>

                        <div class="form-group col-12" style="display: none" id="divCant">
                            <label for="cant">Cantidad</label>
                            <input type="text" class="form-control" name="cant" id="cant">
                        </div>

                        <div class="form-group col-12" style="display: none" id="divPrecio">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" name="precio" id="precio">
                        </div>

                        <div class="form-group col-12" style="display: none" id="divDesc">
                            <label for="desc">Descripción</label>
                            <input type="text" class="form-control" name="desc" id="desc">
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
                <div class="row">
                    <div class="card mb-3 col">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Artistas</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>LICENCIA</th>
                                            <th>ARTISTA</th>
                                            <th>PROVEEDOR</th>
                                            <th>TIPO</th>
                                            <th>FECHA</th>
                                            <th>TAMAÑO</th>
                                            <th>CANTIDAD</th>
                                            <th>PRECIO</th>
                                            <th>IMAGEN</th>
                                            <th>MATERIAL</th>
                                            <th>PESO</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>LICENCIA</th>
                                            <th>ARTISTA</th>
                                            <th>PROVEEDOR</th>
                                            <th>TIPO</th>
                                            <th>FECHA</th>
                                            <th>TAMAÑO</th>
                                            <th>CANTIDAD</th>
                                            <th>PRECIO</th>
                                            <th>IMAGEN</th>
                                            <th>MATERIAL</th>
                                            <th>PESO</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="lista">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php include("template/footer.php") ?>

    </div>
    <!-- /.content-wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- SCRIPTS -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php include("modalCamisa.php") ?>
    <?php include("modalPoster.php") ?>
    <?php include("modalEstatua.php") ?>
    <?php include("modalDisco.php") ?>
</body>

</html>