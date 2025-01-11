<?php
// Llamar al CRUD/UTILS
include 'crud/utils.php';
// Llamar al CRUD/GET    
include 'crud/get.php';  
?> 

<!-- Botón nuevo -->
<div id="buton_nuevo" class="btn btn-primary" style="border: 0px; background-color: #146836;" data-titulo="Nuevo módulo" >
   <img src="/images/agregar.png" title="Agregar" alt="Agregar" style="background-color: transparent; width: 30px; height: 30px; "> 
   Nuevo
</div>         
<div id="post__imprimir"  class="btn btn-primary" style="border: 0px; background-color: #146836;" data-endpoint="<?= $config->endpoint ?>">
    <img src="/images/pdf.png" title="Imprime pdf" alt="Imprimir pdf" style="background-color: transparent; width: 30px; height: 30px; "> 
    PDF  
</div>
<div id="post__imprimir" class="btn btn-primary" style="border: 0px; background-color: #146836;" data-endpoint="<?= $config->endpoint ?>">
   <img src="/images/csv.png" title="Imprime csv" alt="Imprimir csv" style="background-color: transparent; width: 30px; height: 30px; "> 
    Excel  
</div>       

<div class="modal fade" id="reporteModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reporteModalLabel">Reporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="false">&times;</span>  
        </button>       
      </div>
      <div class="modal-body" id="reporteContent">
        <!-- Aquí se cargará el contenido del reporte -->
      </div>
    </div>
  </div>
</div>

<script>
  // Evento para limpiar el contenido del modal al cerrarlo
  $('#reporteModal').on('hidden.bs.modal', function () {
      $('#reporteContent').html(''); // Limpia el contenido del modal
  });
  // Forzar el cierre del modal manualmente
  $('.close').on('click', function () {
      $('#reporteModal').modal('hide'); // Forzar cierre
      console.log('Modal cerrado al hacer clic en la X');
  });
</script>   

<!-- Tabla de registros -->
<table id="tabla_modulos" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th style="text-align: left;">ID</th>
            <th style="text-align: left;">Descripción</th>
            <th style="text-align: left;">Icono</th>
            <th style="text-align: left;">Alias</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($get__response->modulos as $item) { ?>   
            <tr>  
                <td style="text-align: left;"><?= $item->idModulo ?></td>
                <td style="text-align: left;"><?= $item->descripcion ?></td>
                <td><?= ($item->icono == null) ? "--" : $item->icono ?></td>
                <td><?= ($item->alias == null) ? "--" : $item->alias ?></td>
                <td class="td_botones">
                    <div id="buton_editar" 
                         data-titulo="Editar el modulo <?= $item->idModulo ?>" 
                         data-id="<?= $item->idModulo ?>" data-descripcion="<?= $item->descripcion ?>" 
                         data-icono="<?= $item->icono ?>" data-alias="<?= $item->alias ?>">
                         <img src="/images/editar.png" alt="Editar" title="Editar" style="border:none;background-color: transparent; width: 20px; height: 20x; "> 
                    </div>
                    <div id="buton_eliminar"  
                         data-mensaje="Realmente desea eliminar módulo con el ID <?= $item->idModulo ?>" 
                         data-id="<?= $item->idModulo ?>">
                         <img src="/images/eliminar.png" alt="Eliminar" title="Eliminar" style="border:none;background-color: transparent; width: 25px; height: 25px; "> 
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- CRUD/POST Formulario de nuevo registro -->
<template id="post">
    <form id="post_formulario"> 
        <label for="descripcion">Descripción</label> 
        <input class="form-control" type="text" name="descripcion"/>   
        <label for="icono">Icono</label> 
        <input class="form-control" type="text" name="icono"/>     
        <label for="alias">Alias</label> 
        <input class="form-control" type="text" name="alias"/>   
        <div id="post__guardar" class="btn btn-success" data-endpoint="<?= $config->endpoint ?>">Guardar</div>
        <div id="post__respuesta" style="display:none;"></div>
    </form>   
</template>

<!-- CRUD/PUT Formulario de editar registro -->
<template id="put">
    <form id="put_formulario"> 
        <label for="descripcion">Descripción</label> 
        <input class="form-control" type="text" name="descripcion"/>   
        <label for="icono">Icono</label> 
        <input class="form-control" type="text" name="icono"/>  
        <label for="alias">Alias</label> 
        <input class="form-control" type="text" name="alias"/>   
        <div id="put__guardar" class="btn btn-success" data-endpoint="<?= $config->endpoint ?>">Actualizar</div>
        <div id="put__respuesta" style="display:none;"></div>
    </form>
</template>

<!-- CRUD/DELETE Eliminar registro -->
<template id="delete">
    <div id="delete__mensaje"></div> 
    <div id="delete__guardar" class="btn btn-success" data-endpoint="<?= $config->endpoint ?>">Eliminar</div>
    <div id="delete__respuesta" style="display:none;"></div> 
</template>

<!-- CRUD -->
<script src="js/crud/utils.js?v=<?= time(); ?>"></script> 
<script src="js/crud/post.js?v=<?= time(); ?>"></script> 
<script src="js/crud/put.js?v=<?= time(); ?>"></script> 
<script src="js/crud/delete.js?v=<?= time(); ?>"></script>   
<script> 
    <?= DataTable('tabla_modulos') ?>
</script>
