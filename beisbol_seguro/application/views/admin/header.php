<html>
    <head>
        <title>Beisbol Seguro</title>
    </head>
    <body>
        <h2><a href="<?php echo site_url();?>">Beisbol Seguro</a></h2>
        <br>
        <h5><a href="<?php echo site_url('admin');?>">Admin</a></h5>
        <br>

        <h5><a href="<?php echo site_url('equipos');?>">Equipos</a></h5>
        <h5><a href="<?php echo site_url('jugadores');?>">Jugadores</a></h5>
        <h5><a href="<?php echo site_url('partidos');?>">Partidos</a></h5>

        <hr>
        <h3>Portal Administrador - <?php echo $_SESSION['username']; ?> - <a href="<?php echo site_url('admin/logout');?>">Cerrar sesion</a>
        </h3>
        <h5><a href="<?php echo site_url('admin/crear-partidos');?>">Crear Partido</a></h5>
        <h5><a href="<?php echo site_url('admin/editar-jugador');?>">Editar Jugador</a></h5>

<!--Fin de header-->
