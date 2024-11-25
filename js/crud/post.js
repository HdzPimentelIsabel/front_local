// Cargar nuevo registro
$(document).on('click', '#buton_nuevo',  function(e){  
    e.preventDefault(); 
    e.stopImmediatePropagation(); 
    $(this).removeData("titulo");
    var titulo = $(this).data("titulo");
    console.log(titulo);
    $("#Modal .modal-title").html("");
    $("#Modal .modal-title").html(titulo);
    $("#Modal #contenido_modal").html("");
    var template = document.querySelector("#post");
    let content = template.content.cloneNode(true);
    document.querySelector("#Modal #contenido_modal").appendChild(content);
    $('#Modal').modal('show'); 
});


// Guardar nuevo responsable
$(document).on('click', '#post__guardar',  function(e){   
    e.preventDefault(); 
    e.stopImmediatePropagation();  
    $(this).removeData("endpoint");
    var form = "#post_formulario";
    var array = $(form).serializeArray(); 
    var validar = false;
    $.each(array, function () {
        if(this.value == '' || this.value == null){
            var name = $('[for='+this.name+']').text();
            alert("Debes llenar el campo "+name.toLowerCase());
            validar = true;
            return false;
        }else{
            validar = false;
        }
    });
    if(validar == false){
        var form_data = new FormData();  
        form_data.append("endpoint", $(this).data("endpoint"));
        form_data.append("json", convertFormToJSON(form));
        $.ajax({
        url: 'crud/post.php',
        dataType: 'json', 
        cache: false,
        contentType: false,
        processData: false,
        async: false,
        data: form_data,                         
        type: 'post',
        success: function(response){
            var resultado = $.trim(response);
            console.log(resultado);
            $('#post__respuesta').css('display', 'block'); 
            $('#post__guardar').css('display', 'none'); 
            if(resultado == 200){
                $('#post__respuesta').html('<i class="far fa-check-circle"></i><span>Se almaceno correctamente. <button id ="buton_aceptar" type="button" class="btn btn-secondary">Aceptar</button></span>');  
            }else{
                $('#post__respuesta').html('<i class="fas fa-times-circle"></i><span>Error al guardar, intentarlo más tarde.</span>'); 
            }			
        }
        });
    }
});
