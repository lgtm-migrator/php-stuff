<style>
label {display: inline-block;} .errores {color: red;}
table {width: auto;} table, th, td {border: 1px solid black; border-collapse: collapse;}
th, td {padding: 5px;}
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
<?php if(isset($jugadores)): ?>
    <?php foreach ($jugadores as $jugador): ?>
    <div class="main">
        <!--Deja el link ...index.php/admin/editar-jugador/ID-->
        <a href="<?php echo site_url('admin/editar-jugador/'.$jugador['Identificador']);?>">
            <?php echo '#'.$jugador['Identificador'].' - '.$jugador['Nombre'];?>
        </a>
    </div>
    <?php endforeach; ?>
<?php endif; ?>
