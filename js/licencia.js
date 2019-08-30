$(function () {
    listar();
    $("#btnAgregarLicencia").click(function () {
        form = $("#frmAgregarLicencia").serialize() + "&accion=agregar-licencia";
        $.ajax({
            type: "post",
            dataType: "json",
            url: "./procesos/procesaLicencia.php",
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
    });//btnAgregarLicencia

    function listar() {
        $.ajax({
            url: "./procesos/procesaLicencia.php",
            dataType: "json",
            type: "POST",
            data: "accion=listar-licencia",
            success: function (data) {
                let lista = data;
                let template = '';
                lista.forEach(list => {
                    template += `
                    <tr>
                    <td class="miId">${list.id}</td>
                    <td>${list.dueno}</td>
                    <td>${list.pais}</td>
                    <td>${list.telefono}</td>
                    <td>${list.correo}</td>
                    <td><button type="button" class="btnEliminar btn btn-danger" value='${list.id}'>ELIMINAR</button></td>
                    <td><button type="button" class="mx-2 btnBuscar btn btn-info" data-toggle="modal" data-target="#buscarLicencia" value='${list.id}'>EDITAR</button></td>
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
            let accion = 'eliminar-licencia';
            $.post('procesar.php', { id, accion }, function (data) {
                listar();
            });//Fin .post
        }
    });//Fin document on click

    $(document).on('click', '.btnBuscar', function () {
        let boton = $(this)[0];
        let id = $(boton).val();
        let accion = 'buscar-licencia';
        $.ajax({
            type: "post",
            dataType: "json",
            url: "./procesos/procesaLicencia.php",
            data: {id,accion},
            success: function (data) {
                $("#id-edit").html(data[0].id);
                $("#dueno-edit").val(data[0].dueno);
                $("#idd-edit").val(data[0].id);
                $("#pais-edit").val(data[0].pais);
                $("#tel-edit").val(data[0].telefono);
                $("#correo-edit").val(data[0].correo);
            }//success
        });

    });//Fin document on click

    $("#btnEditarLicencia").click(function () {
        form = $("#frmEditarLicencia").serialize() + "&accion=editar-licencia";
        $.ajax({
            type: "post",
            dataType: "json",
            url: "./procesos/procesaLicencia.php",
            data: form,
            success: function (data) {
                if (data.valida) {
                    listar();
                } else {
                    alert("No pueden haber espacios vacíos");
                }
            }//success
        });//ajax
    });//btnAgregarLicencia

});//FINAL FUNCTION