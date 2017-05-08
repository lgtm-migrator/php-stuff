<?php if(isset($jugadores)): ?>
    <?php foreach ($jugadores as $jugador): ?>
    <!--Deja el link ...index.php/admin/editar-jugador/ID-->
    <a href="<?php echo site_url('admin/editar-jugador/'.$jugador['Identificador']);?>">
        <?php echo '#'.$jugador['Identificador'].' - '.$jugador['Nombre'];?>
    </a>
    <br>
    <?php endforeach; ?>
<?php endif; ?>
