<style> label {display: block;} .errores {color: red;} </style>

<h3>Admin - Login</h3>
<?php echo form_open('admin/login'); ?>
<!-- Usuario -->
<p>
    <?php
    // Parametros:
    // 1. Texto visible al usuario
    // 2. ID del elemento form
    echo form_label('Correo: ', 'correo');

    // Parametros:
    // 1. ID del input
    // 2. Texto visible al usuario
    // 3. Atributos extras
    echo form_input('correo', set_value('correo'), 'id=correo');
    ?>
</p>
<!-- Contraseña -->
<p>
    <?php
    echo form_label('Contraseña: ', 'contra');
    echo form_password('contra', '', 'id=contra');
    ?>
</p>
<!-- Submit -->
<p>
    <?php
    // Parametros:
    // 1. ID del elemento form
    // 2. Texto visible al usuario
    echo form_submit('submit', 'Iniciar sesion');
    ?>
</p>
<?php echo form_close(); ?>

<div class="errores">
    <?php echo validation_errors(); ?>
</div>
