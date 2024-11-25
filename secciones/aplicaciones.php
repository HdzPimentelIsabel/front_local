<?php
// Llamar al CRUD/UTILS
include 'php/utils.php';
// Llamar al CRUD/GET
include 'php/crud/get.php';
?>
<!-- Boton nuevo  -->
<div id="buton_nuevo" class="btn btn-secondary" data-titulo="Agregar nueva aplicación"><i class="fas fa-plus"></i> Nuevo</div>
<!-- Tabla de registros  -->
<table id="tabla_aplicaciones" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Activo</th>
            <th>ID Módulo</th>
            <th>Alias</th>
            <th>Icono</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($get__response->aplicacion as $item){ ?> 
            <tr>
                <td><?= $item->idAplicacion ?></td>
                <td><?= $item->descripcion ?></td>
                <td><?= ($item->activo == null)? "No esta activo" : "Esta activo" ?></td>
                <td><?= $item->idModulo ?></td>
                <td><?= ($item->alias == null)? "--" : $item->alias ?></td>
                <td><?= ($item->icono == null)? "--" : $item->icono ?></td>
                <td class="td_botones">
                    <div class="btn btn-light" id="buton_editar"    data-titulo="Editar la aplicación <?= $item->idAplicacion ?>"                   data-id="<?= $item->idAplicacion ?>" data-descripcion="<?= $item->descripcion ?>" data-activo="<?= $item->activo ?>" data-idModulo="<?= $item->idModulo ?>"><i class="fas fa-edit"></i> Editar</div>
                    <div class="btn btn-light" id="buton_eliminar"  data-mensaje="Realmente desea eliminar la aplicación con el ID <?= $item->idAplicacion ?>" data-id="<?= $item->idAplicacion ?>"><i class="fas fa-trash-alt"></i> Eliminar</div>
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
        <label for="activo">Activo</label> 
        <!--
        <select class="form-select" name="activo">
            <option>Seleccionar...</option>
            <option value="1">Habilitar</option>
            <option value="0">Deshabilitar</option>
        </select>-->
        <input class="form-control" type="text" name="activo"/>   
        <label for="idModulo">ID de Módulo</label> 
        <input class="form-control" type="text" name="idModulo"/>   
        <label for="icono">Icono</label> 
        <input class="form-control" type="text" name="icono"/>  
        <label for="alias">Alias</label> 
        <input class="form-control" type="text" name="alias"/>   
        <div id="post__guardar" class="btn btn-success" data-endpoint="<?= $config->endpoint ?>">Guardar</div>
        <div id="post__respuesta" style="display:none;"></div>
    </form>
</template>
<!-- CRUD/PUT Formulario de editar registro  -->
<template id="put">
    <form id="put_formulario"> 
        <label for="descripcion">Descripción</label> 
        <input class="form-control" type="text" name="descripcion"/>   
        <label for="activo">Activo</label> 
        <input class="form-control" type="text" name="activo"/>  
        <label for="idModulo">ID de Módulo</label> 
        <input class="form-control" type="text" name="idmodulo"/>    
        <label for="icono">Icono</label> 
        <input class="form-control" type="text" name="icono"/>  
        <label for="alias">Alias</label> 
        <input class="form-control" type="text" name="alias"/>   
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
    <?= DataTable('tabla_aplicaciones') ?>
</script>