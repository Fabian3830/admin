$(function () {
    listar();
    $("#btnAgregarProveedor").click(function () {
        form = $("#frmAgregarProveedor").serialize() + "&accion=agregar-proveedor";
        $.ajax({
            type: "post",
            dataType: "json",
            url: "./procesos/procesaProveedor.php",
            data: form,
            success: function (data) {
                listar();
                if (data.valida) {
                    document.getElementById("acierto").style.display = "block";
                    document.getElementById("falla").style.display = "none";
                } else {
                    document.getElementById("falla").style.display = "block";
                    document.getElementById("acierto").style.display = "none";
                }
            }//success
        });//ajax
    });//btnAgregarProveedor

    function listar() {
        $.ajax({
            url: "./procesos/procesaProveedor.php",
            dataType: "json",
            type: "POST",
            data: "accion=listar-proveedor",
            success: function (data) {
                let lista = data;
                let template = '';
                lista.forEach(list => {
                    template += `
                    <tr>
                    <td class="miId">${list.id}</td>
                    <td>${list.nombre}</td>
                    <td>${list.correo}</td>
                    <td>${list.telefono}</td>
                    <td><button type="button" class="btnEliminar btn btn-danger" value='${list.id}'>ELIMINAR</button></td>
                    <td><button type="button" class="mx-2 btnBuscar btn btn-info" data-toggle="modal" data-target="#buscarProveedor" value='${list.id}'>EDITAR</button></td>
                    </tr>
                    `
                });
                $('#lista').html(template);
            }// final success
        });//ajax
    }//Final listar


    $(document).on('click', '.btnEliminar', function () {
        if (confirm('Esta seguro de borrar este dato?')) {
            let boton = $(this)[0];
            let id = $(boton).val();
            let accion = 'eliminar-proveedor';
            $.post('./procesos/procesaProveedor.php', { id, accion }, function (data) {
                listar();
            });//Fin .post
        }
    });//Fin document on click

    $(document).on('click', '.btnBuscar', function () {
        let boton = $(this)[0];
        let id = $(boton).val();
        let accion = 'buscar-proveedor';
        $.ajax({
            type: "post",
            dataType: "json",
            url: "./procesos/procesaProveedor.php",
            data: { id, accion },
            success: function (data) {
                $("#id-edit").html(data[0].id);
                $("#nombre-edit").val(data[0].nombre);
                $("#idd-edit").val(data[0].id);
                $("#correo-edit").val(data[0].correo);
                $("#tel-edit").val(data[0].telefono);
                $("#empresa-edit").val(data[0].empresa);
            }//success
        });

    });//Fin document on click

    $("#btnEditarProveedor").click(function () {
        form = $("#frmEditarProveedor").serialize() + "&accion=editar-proveedor";
        $.ajax({
            type: "post",
            dataType: "json",
            url: "./procesos/procesaProveedor.php",
            data: form,
            success: function (data) {
                if (data.valida) {
                    listar();
                } else {
                    alert("No pueden haber espacios vacíos");
                }
            }//success
        });//ajax
    });//btnAgregarProveedor

});//FINAL FUNCTION