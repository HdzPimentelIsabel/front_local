<?php
// Llamar al CRUD/UTILS
include 'php/utils.php';
// Llamar al CRUD/GET
include 'php/crud/get.php';
?> 
<!-- Boton nuevo  -->
<div id="buton_nuevo" class="btn btn-secondary" data-titulo="Agregar nuevo permiso rol"><i class="fas fa-plus"></i> Nuevo</div>
<!-- Tabla de registros  -->
<table id="tabla_permisoRol" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Icono</th>
            <th>Alias</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($get__response->permisoRol as $item){ ?>   
            <tr>
                <td><?= $item->idAplicacion ?></td>
                <td><?= $item->appDescripcion ?></td>
                <td><?= ($item->idRol == null)? "--" : $item->idRol ?></td>
                <td><?= ($item->rolDescripcion == null)? "--" : $item->rolDescripcion ?></td>
                <td class="td_botones">
                    <div class="btn btn-light" id="buton_editar"    data-titulo="Editar el permiso rol <?= $item->idAplicacion ?>"                           data-id="<?= $item->idAplicacion ?>" data-descripcion="<?= $item->appDescripcion ?>" data-idRol="<?= $item->idRol ?>" data-rolDescripcion="<?= $item->rolDescripcion ?>"><i class="fas fa-edit"></i> Editar</div>
                    <div class="btn btn-light" id="buton_eliminar"  data-mensaje="Realmente desea eliminar permiso rol con el ID <?= $item->idAplicacion ?>" data-id="<?= $item->idAplicacion ?>"><i class="fas fa-trash-alt"></i> Eliminar</div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<!-- CRUD/POST Formulario de nuevo registro -->
<template id="post">
    <form id="post_formulario"> 
        <label for="appDescripcion">Descripción</label> 
        <input class="form-control" type="text" name="appDescripcion"/>   
        <label for="idRol">Id Rol</label> 
        <input class="form-control" type="text" name="idRol"/>  
        <label for="rolDescripcion">rol descripcion</label> 
        <input class="form-control" type="text" name="rolDescripcion"/>   
        <div id="post__guardar" class="btn btn-success" data-endpoint="<?= $config->endpoint ?>">Guardar</div>
        <div id="post__respuesta" style="display:none;"></div>
    </form>
</template>
<!-- CRUD/PUT Formulario de editar registro  -->
<template id="put">
    <form id="put_formulario"> 
        <label for="appDescripcion">Descripción</label> 
        <input class="form-control" type="text" name="appDescripcion"/>   
        <label for="idRol">Id Rol</label> 
        <input class="form-control" type="text" name="idRol"/>  
        <label for="rolDescripcion">rol descripcion</label> 
        <input class="form-control" type="text" name="rolDescripcion"/>  
        <div id="put__guardar" class="btn btn-success" data-endpoint="<?= $config->endpoint ?>">Actualizar</div>
        <div id="put__respuesta" style="display:none;"></div>
    </form>
</template>
<!-- CRUD/DELETE Eliminar registro  -->
<template id="delete">
    <div id="delete__mensaje"></div> 
    <div id="delete__guardar" class="btn btn-success" data-endpoint="<?= $config->endpoint ?>">Eliminar</div>
    <div id="delete__respuesta" style="display:none;"></div> 
</template>
<!-- CRUD  -->
<script src="js/crud/utils.js?v=<?= time(); ?>"></script> 
<script src="js/crud/post.js?v=<?= time(); ?>"></script> 
<script src="js/crud/put.js?v=<?= time(); ?>"></script> 
<script src="js/crud/delete.js?v=<?= time(); ?>"></script> 
<script> 
    <?= DataTable('tabla_permisoRol') ?>
</script>