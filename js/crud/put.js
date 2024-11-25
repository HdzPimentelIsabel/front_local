// Cargar nuevo registro
$(document).on('click', '#buton_editar',  function(e){  
    e.preventDefault(); 
    e.stopImmediatePropagation(); 
    $(this).removeData("titulo");
    var titulo = $(this).data("titulo");
    console.log(titulo);
    $(this).removeData("id");
    var id = $(this).data("id");
    $("#Modal .modal-title").html("");
    $("#Modal .modal-title").html(titulo);
    $("#Modal #contenido_modal").html("");
    var template = document.querySelector("#put");
    let content = template.content.cloneNode(true);
    document.querySelector("#Modal #contenido_modal").appendChild(content);
    // Mostrar datos en el input
    var array = $("#put_formulario").serializeArray(); 
    var info_button =  this;
    $.each(array, function (index, item) {
        $(info_button).removeData(this.name);
        var valor = $(info_button).data(this.name);
        $('[name='+item.name+']').val(valor); 
    });
    $("#put__guardar").attr("data-id", id);
    $('#Modal').modal('show'); 
});


// Guardar nuevo responsable
$(document).on('click', '#put__guardar',  function(e){   
    e.preventDefault(); 
    e.stopImmediatePropagation();  
    $(this).removeData("endpoint");
    $(this).removeData("id");
    var id = $(this).data("id");
    var form = "#put_formulario";
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
        form_data.append("id", id); 
        form_data.append("endpoint", $(this).data("endpoint"));
        form_data.append("json", convertFormToJSON(form));
        $.ajax({
        url: 'crud/put.php',
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
            $('#put__respuesta').css('display', 'block'); 
            $('#put__guardar').css('display', 'none'); 
            if(resultado == 200){
                $('#put__respuesta').html('<i class="far fa-check-circle"></i><span>Se actualizó correctamente. <button id ="buton_aceptar" type="button" class="btn btn-secondary">Aceptar</button></span>');  
            }else{
                $('#put__respuesta').html('<i class="fas fa-times-circle"></i><span>Error al actualizar, intentarlo más tarde.</span>'); 
            }			
        }
        });
    }
});
