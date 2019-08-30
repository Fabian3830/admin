<div class="modal fade" tabindex="-1" role="dialog" id="buscarLicencia" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="border-radius: none;">
        <div class="modal-content">
            <h4 style="text-align: center">Edición</h4>
            <form class="mx-auto my-auto px-4" id="frmEditarLicencia" method="POST" style="width:100%">
                <div class="form-group col-12 my-2">
                    <h6 class="w-auto" style="DISPLAY: INLINE-BLOCK;">ID:</h6>
                    <h6 class="w-auto" id="id-edit" style="DISPLAY: INLINE-BLOCK";></h6>
                </div>
                <div class="form-group col-12 my-2">
                    <label for="dueno-edit">Dueño</label>
                    <input type="text" class="form-control" name="dueno-edit" id="dueno-edit" value="">
                </div>
                <div class="form-group col-12 my-2">
                    <input type="text" class="form-control" name="idd-edit" id="idd-edit" value="" style="display:none">
                </div>
                <div class="form-group col-12 my-2">
                    <label for="pais-edit">Pais</label>
                    <input type="email" class="form-control" name="pais-edit" id="pais-edit" value="">
                </div>
                <div class="form-group col-12 my-2">
                    <label for="tel-edit">Telefono</label>
                    <input type="text" class="form-control" name="tel-edit" id="tel-edit" value="">
                </div>
                <div class="form-group col-12 my-2">
                    <label for="correo-edit">Correo</label>
                    <input type="text" class="form-control" name="correo-edit" id="correo-edit" value="">
                    <button type="reset" class="col-4 offset-4 btn btn-primary mt-2" id="btnEditarLicencia" data-dismiss="modal">Editar</button>
            </form>
        </div>
    </div>
</div>