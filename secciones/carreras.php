<?php
// Llamar al CRUD/UTILS
include 'php/utils.php';
// Llamar al CRUD/GET
include 'php/crud/get.php';
?> 
<!-- Boton nuevo  -->
<div id="buton_nuevo" class="btn btn-secondary" data-titulo="Agregar nuevo carrera"><i class="fas fa-plus"></i> Nuevo</div>
<!-- Tabla de registros  -->
<table id="tabla_carreras" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Activo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($get__response->carreras as $item){ ?>   
            <tr>
                <td><?= $item->idCarrera ?></td>
                <td><?= $item->descripcion ?></td>
                <td><?= ($item->activo == null)? "--" : $item->activo ?></td>
                <td class="td_botones">
                    <div class="btn btn-light" id="buton_editar"    data-titulo="Editar la carrera <?= $item->idCarrera ?>"                           data-id="<?= $item->idCarrera ?>" data-descripcion="<?= $item->descripcion ?>" data-letra="<?= $item->letra ?>" data-diaInicioCargo="<?= $item->diaInicioCargo ?>" data-diaInicioRecargo="<?= $item->diaInicioRecargo ?>" data-activo="<?= $item->activo ?>"><i class="fas fa-edit"></i> Editar</div>
                    <div class="btn btn-light" id="buton_eliminar"  data-mensaje="Realmente desea eliminar carrera con el ID <?= $item->idCarrera ?>" data-id="<?= $item->idCarrera ?>"><i class="fas fa-trash-alt"></i> Eliminar</div>
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
        <label for="letra">Letra</label> 
        <input class="form-control" type="text" name="letra"/>  
        <label for="diaInicioCargo">Día inicio cargo</label> 
        <input class="form-control" type="text" name="diaInicioCargo"/>   
        <label for="diaInicioRecargo">Día inicio recargo</label> 
        <input class="form-control" type="text" name="diaInicioRecargo"/>   
        <label for="activo">Activo</label> 
        <input class="form-control" type="text" name="activo"/>   
        <div id="post__guardar" class="btn btn-success" data-endpoint="<?= $config->endpoint ?>">Guardar</div>
        <div id="post__respuesta" style="display:none;"></div>
    </form>
</template>
<!-- CRUD/PUT Formulario de editar registro  -->
<template id="put">
    <form id="put_formulario"> 
        <label for="descripcion">Descripción</label> 
        <input class="form-control" type="text" name="descripcion"/>   
        <label for="letra">Letra</label> 
        <input class="form-control" type="text" name="letra"/>  
        <label for="diaInicioCargo">Día inicio cargo</label> 
        <input class="form-control" type="text" name="diaInicioCargo"/>   
        <label for="diaInicioRecargo">Día inicio recargo</label> 
        <input class="form-control" type="text" name="diaInicioRecargo"/>   
        <label for="activo">Activo</label> 
        <input class="form-control" type="text" name="activo"/>   
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
    <?= DataTable('tabla_carreras') ?>
</script>