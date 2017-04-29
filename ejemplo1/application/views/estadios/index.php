<h3><?php echo $titulo;?></h3>

<?php foreach ($estadios as $estadio): ?>
    <!--<h3><?php echo $estadio['Identificador']?></h3>-->
    <!--Donde Nombre es un atributo de la tabla en la base de datos-->
    <div class="main"><?php echo $estadio['Nombre'];?></div>
    <!--Deja el link ...index.php/estadios/Cartagena-->
    <p><a href="<?php echo site_url('estadios/'.$estadio['Nombre']);?>">Ver estadio</a></p>
<?php endforeach; ?>
