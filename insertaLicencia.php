<!DOCTYPE html>
<html lang="en">

<head>
    <!-- HEADER -->
    <?php include("template/header.php") ?>
    <!-- HEADER -->
    <script src="js/licencia.js" type="text/javascript"></script>
</head>


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
                    <h3 class="col-12" style="text-align: center">Datos de la licencia</h3>
                    <form class="col-6 offset-3" id="frmAgregarLicencia" method="POST">
                        <div class="form-group col-12">
                            <label for="dueno">Dueño</label>
                            <input type="text" class="form-control" name="dueno" id="dueno">
                        </div>
                        <div class="form-group col-12">
                            <label for="pais">País</label>
                            <input type="text" class="form-control" name="pais" id="pais">
                        </div>
                        <div class="form-group col-12">
                            <label for="tel">Teléfono</label>
                            <input type="text" class="form-control" name="tel" id="tel">
                        </div>
                        <div class="form-group col-12">
                            <label for="correo">Correo</label>
                            <input type="text" class="form-control" name="correo" id="correo">
                            <button type="reset" class="btn btn-primary mt-4" id="btnAgregarLicencia">Agregar</button>
                        </div>
                        <div class="form-group col-8 offset-2">
                            <h6 class="col-12" id="acierto" style="text-align: center; display: none;">Datos insertados correctamente</h6>
                            <label id="falla" style="text-align: center; display:none">No ha sido posible insertar los datos</label>
                        </div>
                    </form>
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
                                            <th>Dueño</th>
                                            <th>País</th>
                                            <th>Teléfono</th>
                                            <th>Correo</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Dueño</th>
                                            <th>País</th>
                                            <th>Teléfono</th>
                                            <th>Correo</th>
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

    <?php include("modalLicencia.php") ?>
</body>

</html>