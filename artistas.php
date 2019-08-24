<!DOCTYPE html>
<html lang="en">

<!-- HEADER -->
<?php include("header.php") ?>
<!-- HEADER -->

<body id="page-top">

    <!-- NAVBAR -->
    <?php include("navbar.php") ?>
    <!-- NAVBAR -->

    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("sidebar.php") ?>
        <!-- Sidebar -->

        <div id="content-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <h3 class="col-12" style="text-align: center">Datos del artista</h3>
                    <form class="col-6 offset-3" id="frmAgregarArtista" method="POST">
                        <div class="form-group col-12">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="form-group col-12">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo">
                        </div>
                        <div class="form-group col-12">
                            <label for="tel">Telefono</label>
                            <input type="text" class="form-control" name="tel" id="tel">
                        </div>
                        <div class="form-group col-12">
                            <label for="empresa">Empresa</label>
                            <input type="text" class="form-control" name="empresa" id="empresa">
                            <button type="submit" class="btn btn-primary mt-4" id="btnAgregarArtista">Agregar</button>
                        </div>
                        <div class="form-group col-6 offset-3">
                            <label id="acierto" style="display:none">Los datos se han insertado correctamente</label>
                            <label id="falla" style="display:none">No ha sido posible insertar los datos</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPTS -->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- SCRIPTS -->
</body>

</html>