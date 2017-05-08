<style> label {display: block;} .errores {color: red;}</style>
<?= form_open("/admin/editar-jugador/".$id) ?>
<?php

	$n_hits = array(
		'name' => 'n_hits',
		'value' => $jugador->result()[0]->N_hits,
		'placeholder' => '# Hits',
		'type' => 'number'
		);

	$veces_plato = array(
		'name' => 'veces_plato',
		'value' => $jugador->result()[0]->Veces_plato,
		'placeholder' => '# Turnos al Bate',
		'type' => 'number'
		);

	$carreras_limpias = array(
		'name' => 'carreras_limpias',
		'value' => $jugador->result()[0]->Carreras_limpias,
		'placeholder' => '# Carreras Limpias',
		'type' => 'number'
		);

	$n_innings = array(
		'name' => 'n_innings',
		'value' => $jugador->result()[0]->N_Innings,
		'placeholder' => '# Innings Lanzados',
		'type' => 'number'
		);
?>
<h3><?= form_label('#'.$jugador->result()[0]->Identificador.' Nombre del Jugador: '.$jugador->result()[0]->Nombre,'nombre_jugador') ?></h3>

<?= form_label('Numero de Hits:','n_hits'); ?>
<?= form_input($n_hits); ?>
<br><br>
<?= form_label('Turnos al Bate','veces_plato'); ?>
<?= form_input($veces_plato); ?>

<?php 
if ($jugador->result()[0]->Lanzador==1){
	?>
	<br><br>
	<?=	form_label('Carreras Limpias:','carreras_limpias') ?>
	<?= form_input($carreras_limpias) ?>
	<br><br>
	<?=	form_label('Innings Lanzados:','n_innings') ?>
	<?= form_input($n_innings) ?>
<?php }else{
	form_input($carreras_limpias);
	form_input($n_innings);
	} ?>



<br><br>
<?= form_submit('submit','Modificar Jugador') ?>
<?= form_close() ?>

<div class="errores">
	<?= validation_errors(); ?>
</div>
