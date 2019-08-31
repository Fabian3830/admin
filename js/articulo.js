$(function () {

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
    /*
        $(document).on('change','#img', function(){
            var imagen = document.getElementById("img").files[0];
            var nombre = imagen.name;
            var extension = nombre.split('.').pop().toLowerCase();
            if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])== -1){
                alert("Archivo de imagen inválido");
            }
            var form_data = new FormData();
            form_data.append("img",imagen);
            $.ajax({
                url:"upload.php",
                method:"POST",
                data: form_data,
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                    $('#uploaded').html(data);
                }
    
            })
        })
    
    */

})//FIN PRIMERO FUNCTION