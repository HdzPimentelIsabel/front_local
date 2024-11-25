// Cargar nuevo registro
$(document).on('click', '#buton_eliminar',  function(e){  
    e.preventDefault(); 
    e.stopImmediatePropagation(); 
    $(this).removeData("mensaje");
    var mensaje = $(this).data("mensaje");
    console.log(mensaje);
    $(this).removeData("id");
    var id = $(this).data("id");
    $("#Modal .modal-title").html("");
    $("#Modal #contenido_modal").html("");
    var template = document.querySelector("#delete");
    let content = template.content.cloneNode(true);
    document.querySelector("#Modal #contenido_modal").appendChild(content);
    $("#delete__mensaje").html("");
    $("#delete__mensaje").html(mensaje);
    $("#delete__guardar").attr("data-id", id);
    $('#Modal').modal('show'); 
});


// Guardar nuevo responsable
$(document).on('click', '#delete__guardar',  function(e){   
    e.preventDefault(); 
    e.stopImmediatePropagation();  
    $(this).removeData("endpoint");
    $(this).removeData("id");
    var id = $(this).data("id");

    var form_data = new FormData(); 
    form_data.append("id", id); 
    form_data.append("endpoint", $(this).data("endpoint"));
    $.ajax({
        url: 'crud/delete.php',
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
            $('#delete__respuesta').css('display', 'block'); 
            $('#delete__guardar').css('display', 'none'); 
            if(resultado == 200){
                $('#delete__respuesta').html('<i class="far fa-check-circle"></i><span>Se eliminó correctamente. <button id ="buton_aceptar" type="button" class="btn btn-secondary">Aceptar</button></span>');  
            }else{
                $('#delete__respuesta').html('<i class="fas fa-times-circle"></i><span>Error al eliminar, intentarlo más tarde.</span>'); 
            }			
        }
    });
});
