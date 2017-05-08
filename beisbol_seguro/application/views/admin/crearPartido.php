<style> label {display: block;} .errores {color: red;}</style>
<?= form_open("admin/crear-partidos") ?>
<?php

	$equipo1 = array();
	foreach ($equipos as $equipo):
		$equipo1[$equipo['Nombre']] = $equipo['Nombre'];
	endforeach;

	$equipo2 = $equipo1;

	$puntos_Equipo1 = array(
		'name' => 'puntos_Equipo1',
		'placeholder' => 'Numero de Carreras',
		'type' => 'number'
		);

	$puntos_Equipo2 = array(
		'name' => 'puntos_Equipo2',
		'placeholder' => 'Numero de Carreras',
		'type' => 'number'
		);

	$estadio = array();
	foreach ($estadios as $estadioAux):
		$estadio[$estadioAux['Estadio']] = $estadioAux['Estadio'];
	endforeach;

?>
<nav><ul>
<li><a href="<?php echo site_url('admin/crear-partidos/1');?>">Division 1</a></li>
<li><a href="<?php echo site_url('admin/crear-partidos/2');?>">Division 2</a></li>
<li><a href="<?php echo site_url('admin/crear-partidos/3');?>">Division 3</a></li>
<li><a href="<?php echo site_url('admin/crear-partidos/4');?>">Division 4</a></li>
</ul></nav>

<?= form_label('Equipo 1:','equipo1') ?>
<?= form_dropdown('equipo1',$equipo1) ?>
<br><br>
<?= form_label('Equipo 2:','equipo2') ?>
<?= form_dropdown('equipo2',$equipo2) ?>
<br><br>
<?= form_label('Puntos Equipo 1:','puntos_Equipo1') ?>
<?= form_input($puntos_Equipo1) ?>
<br><br>
<?= form_label('Puntos Equipo 2:','puntos_Equipo2') ?>
<?= form_input($puntos_Equipo2) ?>
<br><br>
<?= form_label('Estadio:','estadio') ?>
<?= form_dropdown('estadio',$estadio) ?>

<br><br>
<?= form_submit('submit','Ingresar Partido') ?>
<?= form_close() ?>

<div class="errores">
	<?= $error ?>
	<?= validation_errors(); ?>
</div>
