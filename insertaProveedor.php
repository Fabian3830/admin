<!DOCTYPE html>
<html lang="en">

<head>
    <!-- HEADER -->
    <?php include("template/header.php") ?>
    <!-- HEADER -->
    <script src="js/proveedor.js" type="text/javascript"></script>
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
                    <h3 class="col-12" style="text-align: center">Datos del Proveedor</h3>
                    <form class="col-6 offset-3" id="frmAgregarProveedor" method="POST">
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
                            <button type="reset" class="btn btn-primary mt-4" id="btnAgregarProveedor">Agregar</button>
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
                            Proveedor</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Teléfono</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Teléfono</th>
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

    <?php include("modalProveedor.php") ?>
</body>

</html>