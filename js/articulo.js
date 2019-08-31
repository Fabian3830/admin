$(function () {

    listar();

    $(document).on('change', '#img', function () {
        var imagen = document.getElementById("img").files[0];
        var nombre = imagen.name;
        var extension = nombre.split('.').pop().toLowerCase();
        var reader = new FileReader();
        reader.readAsDataURL(imagen);
        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert("Archivo de imagen inválido");
        } else {
            reader.onload = function (e) {
                $('#uploaded + img').remove();
                $('#uploaded').html('<img src="' + e.target.result + '" width="150" /> ');

            }
        }
    })

    $("#btnAgregarArticulo").click(function () {
        var imagen = document.getElementById("img").files[0];
        var nombre = imagen.name;
        form = $("#frmAgregarArticulo").serialize() + "&accion=agregar-articulo" + "&img=" + nombre;
        $.ajax({
            type: "post",
            dataType: "json",
            url: "./procesos/procesaArticulo.php",
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
    });//btnAgregarArticulo

    $(document).on('change', '#tipo', function () {


        document.getElementById("divTamano").style.display = "none";
        document.getElementById("divDesc").style.display = "none";
        document.getElementById("divPrecio").style.display = "none";
        document.getElementById("divCant").style.display = "none";
        document.getElementById("divMaterial").style.display = "none";
        document.getElementById("divPeso").style.display = "none";
        document.getElementById("divFecha").style.display = "none";
        document.getElementById("divDisc").style.display = "none";
        document.getElementById("divColor").style.display = "none";

        var selectValor = $(this).val();

        if (selectValor == 1) {
            document.getElementById("divTamano").style.display = "block";
            document.getElementById("divDesc").style.display = "block";
            document.getElementById("divPrecio").style.display = "block";
            document.getElementById("divCant").style.display = "block";
            document.getElementById("divFecha").style.display = "block";
        } else if (selectValor == 2) {
            document.getElementById("divTamano").style.display = "block";
            document.getElementById("divDesc").style.display = "block";
            document.getElementById("divPrecio").style.display = "block";
            document.getElementById("divCant").style.display = "block";
            document.getElementById("divMaterial").style.display = "block";
            document.getElementById("divFecha").style.display = "block";
        } else if (selectValor == 3) {
            document.getElementById("divTamano").style.display = "block";
            document.getElementById("divDesc").style.display = "block";
            document.getElementById("divPrecio").style.display = "block";
            document.getElementById("divCant").style.display = "block";
            document.getElementById("divMaterial").style.display = "block";
            document.getElementById("divPeso").style.display = "block";
            document.getElementById("divFecha").style.display = "block";
        } else if (selectValor == 4) {
            document.getElementById("divTamano").style.display = "block";
            document.getElementById("divDesc").style.display = "block";
            document.getElementById("divPrecio").style.display = "block";
            document.getElementById("divCant").style.display = "block";
            document.getElementById("divDisc").style.display = "block";
            document.getElementById("divColor").style.display = "block";
            document.getElementById("divFecha").style.display = "block";
        } else {
            document.getElementById("divTamano").style.display = "none";
            document.getElementById("divDesc").style.display = "none";
            document.getElementById("divPrecio").style.display = "none";
            document.getElementById("divCant").style.display = "none";
            document.getElementById("divMaterial").style.display = "none";
            document.getElementById("divPeso").style.display = "none";
            document.getElementById("divFecha").style.display = "none";
            document.getElementById("divDisc").style.display = "none";
            document.getElementById("divColor").style.display = "none";
        }
    })

    $('#btnAgregarArticulo').click(function () {

        var imagen = document.getElementById("img").files[0];
        var nombre = imagen.name;
        var extension = nombre.split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert("Archivo de imagen inválido");
        }
        var form_data = new FormData();
        form_data.append("img", imagen);
        $.ajax({
            url: "upload.php",
            method: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('#uploaded').html("<label class='text-success'>IMAGE UPLOADING...</label>");
            },
            success: function (data) {
                $('#uploaded').html("<label class='text-success'>CARGADA CON ÉXITO AL SERVIDOR</label>");
            }

        })
    })

    function listar() {
        $.ajax({
            url: "./procesos/procesaArticulo.php",
            dataType: "json",
            type: "POST",
            data: "accion=listar-articulo",
            success: function (data) {
                let lista = data;
                let template = '';
                if (lista.tipo = 1) {
                    lista.forEach(list => {
                        template += `
                        <tr>
                        <td class="miId">${list.id}</td>
                        <td>${list.nombre}</td>
                        <td>${list.licencia}</td>
                        <td>${list.artista}</td>
                        <td>${list.proveedor}</td>
                        <td>${list.tipo}</td>
                        <td>${list.fecha}</td>
                        <td>${list.tamano}</td>
                        <td>${list.cant}</td>
                        <td>${list.prec}</td>
                        <td>${list.img}</td>
                        <td></td>
                        <td></td>
                        <td><button type="button" class="btnEliminar btn btn-danger" value='${list.id}'>ELIMINAR</button></td>
                        <td><button type="button" class="mx-2 btnBuscar btn btn-info" data-toggle="modal" data-target="#buscarCamisa" value='${list.id}'>EDITAR</button></td>
                        </tr>
                        `
                    });
                } else if (lista.tipo = 2) {
                    lista.forEach(list => {
                        template += `
                        <tr>
                        <td class="miId">${list.id}</td>
                        <td>${list.nombre}</td>
                        <td>${list.licencia}</td>
                        <td>${list.artista}</td>
                        <td>${list.proveedor}</td>
                        <td>${list.tipo}</td>
                        <td>${list.fecha}</td>
                        <td>${list.tamano}</td>
                        <td>${list.cant}</td>
                        <td>${list.prec}</td>
                        <td>${list.img}</td>
                        <td>${list.material}</td>
                        <td></td>
                        <td><button type="button" class="btnEliminar btn btn-danger" value='${list.id}'>ELIMINAR</button></td>
                        <td><button type="button" class="mx-2 btnBuscar btn btn-info" data-toggle="modal" data-target="#buscarPoster" value='${list.id}'>EDITAR</button></td>
                        </tr>
                        `
                    });
                } else if (lista.tipo = 3) {
                    lista.forEach(list => {
                        template += `
                        <tr>
                        <td class="miId">${list.id}</td>
                        <td>${list.nombre}</td>
                        <td>${list.licencia}</td>
                        <td>${list.artista}</td>
                        <td>${list.proveedor}</td>
                        <td>${list.tipo}</td>
                        <td>${list.fecha}</td>
                        <td>${list.tamano}</td>
                        <td>${list.cant}</td>
                        <td>${list.prec}</td>
                        <td>${list.img}</td>
                        <td>${list.material}</td>
                        <td>${list.peso}</td>
                        <td></td>
                        <td></td>
                        <td><button type="button" class="btnEliminar btn btn-danger" value='${list.id}'>ELIMINAR</button></td>
                        <td><button type="button" class="mx-2 btnBuscar btn btn-info" data-toggle="modal" data-target="#buscarEstatua" value='${list.id}'>EDITAR</button></td>
                        </tr>
                        `
                    });
                } else {
                    lista.forEach(list => {
                        template += `
                        <tr>
                        <td class="miId">${list.id}</td>
                        <td>${list.nombre}</td>
                        <td>${list.licencia}</td>
                        <td>${list.artista}</td>
                        <td>${list.proveedor}</td>
                        <td>${list.tipo}</td>
                        <td>${list.fecha}</td>
                        <td>${list.tamano}</td>
                        <td>${list.cant}</td>
                        <td>${list.prec}</td>
                        <td>${list.img}</td>
                        <td></td>
                        <td></td>
                        <td>${list.color}</td>
                        <td>${list.numero}</td>
                        <td><button type="button" class="btnEliminar btn btn-danger" value='${list.id}'>ELIMINAR</button></td>
                        <td><button type="button" class="mx-2 btnBuscar btn btn-info" data-toggle="modal" data-target="#buscarDisco" value='${list.id}'>EDITAR</button></td>
                        </tr>
                        `
                    });
                }

                $('#lista').html(template);
            }// final success
        });//ajax
    }//Final listar


    $(document).on('click', '.btnEliminar', function () {
        if (confirm('Esta seguro de borrar este dato?')) {
            let boton = $(this)[0];
            let id = $(boton).val();
            let accion = 'eliminar-articulo';
            $.post('./procesos/procesaArticulo.php', { id, accion }, function (data) {
                listar();
            });//Fin .post
        }
    });//Fin document on click

    $(document).on('click', '.btnBuscar', function () {
        let boton = $(this)[0];
        let id = $(boton).val();
        let accion = 'buscar-articulo';
        $.ajax({
            type: "post",
            dataType: "json",
            url: "./procesos/procesaArticulo.php",
            data: { id, accion },
            success: function (data) {
                if (data[0].tipo = 1) {
                    $("#id-edit").html(data[0].id);
                    $("#nombre-edit").val(data[0].nombre);
                    $("#idd-edit").val(data[0].id);
                    $("#tipo-edit").val(data[0].tipo);
                    $("#cant-edit").val(data[0].cant);
                    $("#prec-edit").val(data[0].prec);
                    $("#tamano-edit").val(data[0].tamano);
                    $("#desc-edit").val(data[0].descrip);
                } else if (data[0].tipo = 2) {
                    $("#id-edit").html(data[0].id);
                    $("#nombre-edit").val(data[0].nombre);
                    $("#idd-edit").val(data[0].id);
                    $("#tipo-edit").val(data[0].tipo);
                    $("#cant-edit").val(data[0].cant);
                    $("#prec-edit").val(data[0].prec);
                    $("#tamano-edit").val(data[0].tamano);
                    $("#mate-edit").val(data[0].material);
                } else if (data[0].tipo = 3) {
                    $("#id-edit").html(data[0].id);
                    $("#nombre-edit").val(data[0].nombre);
                    $("#idd-edit").val(data[0].id);
                    $("#tipo-edit").val(data[0].tipo);
                    $("#cant-edit").val(data[0].cant);
                    $("#prec-edit").val(data[0].prec);
                    $("#tamano-edit").val(data[0].tamano);
                    $("#mate-edit").val(data[0].material);
                    $("#peso-edit").val(data[0].peso);
                } else {
                    $("#id-edit").html(data[0].id);
                    $("#nombre-edit").val(data[0].nombre);
                    $("#idd-edit").val(data[0].id);
                    $("#tipo-edit").val(data[0].tipo);
                    $("#cant-edit").val(data[0].cant);
                    $("#prec-edit").val(data[0].prec);
                    $("#tamano-edit").val(data[0].tamano);
                    $("#color-edit").val(data[0].color);
                    $("#disc-edit").val(data[0].numero);
                }
            }//success
        });

    });//Fin document on click

    $("#btnEditarArticulo").click(function () {
        form = $("#frmEditarCamisa").serialize() + "&accion=editar-articulo";
        $.ajax({
            type: "post",
            dataType: "json",
            url: "./procesos/procesaArticulo.php",
            data: form,
            success: function (data) {
                if (data.valida) {
                    listar();
                } else {
                    alert("No pueden haber espacios vacíos");
                }
            }//success
        });//ajax
    });//btnAgregarArticulo

})//FIN PRIMERO FUNCTION