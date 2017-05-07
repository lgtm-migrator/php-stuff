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

<h3>Partidos</h3>
<table>
    <tr>
        <th>Identificador</th>
        <th>Equipo 1</th>
        <th>Puntos Equipo 1</th>
        <th>Equipo 2</th>
        <th>Puntos Equipo 2</th>
        <th>Estadio</th>
    </tr>
<?php foreach ($partidos as $partido): ?>
    <tr>
        <?php
        echo '<td>'.$partido['Identificador'].'</td>';
        echo '<td>'.$partido['Equipo1'].'</td>';
        echo '<td>'.$partido['Puntos_Equipo1'].'</td>';
        echo '<td>'.$partido['Equipo2'].'</td>';
        echo '<td>'.$partido['Puntos_Equipo2'].'</td>';
        echo '<td>'.$partido['Estadio'].'</td>';
        ?>
    </tr>
<?php endforeach; ?>
</table>
