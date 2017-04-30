<h3><?php echo $titulo;?></h3>

<?php foreach ($estadios as $estadio): ?>
    <!--Donde Nombre es un atributo de la tabla en la base de datos-->
    <div class="main">
        <!--Deja el link ...index.php/estadios/Cartagena-->
        <a href="<?php echo site_url('estadios/'.$estadio['Nombre']);?>"><?php echo '#'.$estadio['Identificador'].' ';echo $estadio['Nombre'];?></a>
    </div>
    <br>
<?php endforeach; ?>
