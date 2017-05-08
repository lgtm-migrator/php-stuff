<html>
    <head>
        <title>Beisbol Seguro</title>
    </head>
    <body>
        <h2><a href="<?php echo site_url();?>">Beisbol Seguro</a></h2>
        
        <h5><a href="<?php echo site_url('admin');?>">Admin</a></h5>
        <nav>
            <a href="<?php echo site_url('equipos');?>">Equipos</a> |
            <a href="<?php echo site_url('jugadores');?>">Jugadores</a> |
            <a href="<?php echo site_url('partidos');?>">Partidos</a> |
        </nav>

        <hr>
        <h3>Portal Administrador - <?php echo $_SESSION['username']; ?> - <a href="<?php echo site_url('admin/logout');?>">Cerrar sesion</a>
        </h3>
        <nav>
            <a href="<?php echo site_url('admin/crear-partidos');?>">Crear Partido</a> |
            <a href="<?php echo site_url('admin/editar-jugador');?>">Editar Jugador</a> |
        </nav>
        <hr>
<!--Fin de header-->
