<div class="modal fade" tabindex="-1" role="dialog" id="buscarDisco" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document" style="border-radius: none;">
        <div class="modal-content">
            <h4 style="text-align: center">Edición</h4>
            <form class="mx-auto my-auto px-4" id="frmEditarArticulo" method="POST" style="width:100%">
                <div class="form-group col-12 my-2">
                    <h6 class="w-auto" style="DISPLAY: INLINE-BLOCK;">ID:</h6>
                    <h6 class="w-auto" id="id-edit" style="DISPLAY: INLINE-BLOCK" ;></h6>
                </div>
                <div class="form-group col-12 my-2">
                    <label for="nombre-edit">Nombre</label>
                    <input type="text" class="form-control" name="nombre-edit" id="nombre-edit" value="">
                </div>
                <div class="form-group col-12 my-2">
                    <input type="text" class="form-control" name="idd-edit" id="idd-edit" value="" style="display:none">
                </div>
                <div class="form-group col-12 my-2">
                    <input type="text" class="form-control" name="tipo-edit" id="tipo-edit" value="" style="display:none">
                </div>
                <div class="form-group col-12 my-2">
                    <label for="cant-edit">Cantidad</label>
                    <input type="text" class="form-control" name="cant-edit" id="cant-edit" value="">
                </div>
                <div class="form-group col-12 my-2">
                    <label for="prec-edit">Precio</label>
                    <input type="text" class="form-control" name="prec-edit" id="prec-edit" value="">
                </div>
                <div class="form-group col-12 my-2">
                    <label for="tamano-edit">Tamaño</label>
                    <input type="text" class="form-control" name="tamano-edit" id="tamano-edit" value="">
                </div>
                <div class="form-group col-12 my-2">
                    <label for="color-edit">Color</label>
                    <input type="text" class="form-control" name="color-edit" id="color-edit" value="">
                </div>
                <div class="form-group col-12 my-2">
                    <label for="disc-edit">Cantidad de discos</label>
                    <input type="text" class="form-control" name="disc-edit" id="disc-edit" value="">
                </div>
                <div class="form-group col-12 my-2">
                    <label for="desc-edit">Descripción</label>
                    <input type="text" class="form-control" name="desc-edit" id="desc-edit" value="">
                    <button type="reset" class="col-4 offset-4 btn btn-primary mt-2" id="btnEditarArticulo" data-dismiss="modal">Editar</button>
            </form>
        </div>
    </div>
</div>