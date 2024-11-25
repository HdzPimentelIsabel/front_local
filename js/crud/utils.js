function convertFormToJSON(form) {
    const array = $(form).serializeArray(); 
    const json = {};
    $.each(array, function () {
      json[this.name] = this.value || "";
    });
    return JSON.stringify(json);
}

// Recargar la pagina
$(document).on('click', '#buton_aceptar',  function(e){   
    e.preventDefault(); 
    e.stopImmediatePropagation();  
    location.reload();
});
