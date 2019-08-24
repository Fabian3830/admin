$(function () {
    $("#btnAgregarArtista").click(function () {
        form = $("#frmAgregarArtista").serialize() + "&accion=agregar-artista";
        $.ajax({
            type: "post",
            datatype: "json",
            url: "procesar.php",
            data: form,
            success: function (data) {
                if (data.valido) {
                    document.getElementById("acierto").style.display = "block";
                } else {
                    alert(data);
                    document.getElementById("falla").style.display = "block";
                } 
            }//success
        });//ajax
    });//btnAgregarArtista
});//FINAL FUNCTION