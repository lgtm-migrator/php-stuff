<style>
    table {
        width: auto;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
    }
</style>

<h5><a href="<?php echo site_url('equipos/1');?>">Division 1</a></h5>
<h5><a href="<?php echo site_url('equipos/2');?>">Division 2</a></h5>
<h5><a href="<?php echo site_url('equipos/3');?>">Division 3</a></h5>
<h5><a href="<?php echo site_url('equipos/4');?>">Division 4</a></h5>

<h3>Equipos</h3>
<table>
    <tr>
        <th>Identificador</th>
        <th>Nombre</th>
        <th>Division</th>
        <th>Partidos Ganados</th>
        <th>Partidos Perdidos</th>
    </tr>
<?php foreach ($equipos as $equipo): ?>
    <tr>
        <?php
        echo '<td>'.$equipo['Identificador'].'</td>';
        echo '<td>'.$equipo['Nombre'].'</td>';
        echo '<td>'.$equipo['Division'].'</td>';
        echo '<td>'.$equipo['N_Partidos_Ganados'].'</td>';
        echo '<td>'.$equipo['N_Partidos_Perdidos'].'</td>';
        ?>
    </tr>
<?php endforeach; ?>
</table>
