<style>
label {display: inline-block;} .errores {color: red;}
</style>
<h3>Editar Jugador</h3>
<?php echo form_open('admin/editar-jugador'); ?>
<!-- idBusqueda -->
<p>
    <?php
    echo form_label('Nombre o codigo del jugador: ', 'idBusqueda');
    echo form_input('idBusqueda', '', 'id=idBusqueda');
    ?>
</p>
<!-- Boton -->
<p>
    <?php
    // Parametros:
    // 1. ID del elemento form
    // 2. Texto visible al usuario
    echo form_submit('submit', 'Buscar');
    ?>
</p>

<?php echo form_close(); ?>
<div class="errores">
    <?php echo validation_errors(); ?>
</div>
