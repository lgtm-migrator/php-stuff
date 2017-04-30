<h2><?php echo $titulo; ?></h2>

<?php //Funcion de form helper para renderizar los mensajes de error del form ?>
<?php echo validation_errors(); ?>

<?php //Llama al controlador estadios y su metodo crear ?>
<?php echo form_open('estadios/crear') ?>

    <label for="Identificador">ID</label>
    <?php //El for y el name solo sirven para vincular un label a un field ?>
    <input type="input" name="Identificador" /><br>

    <label for="Nombre">Nombre</label>
    <textarea name="Nombre"></textarea><br>

    <input type="submit" name="submit" value="Crear nuevo estadio" />
</form>
