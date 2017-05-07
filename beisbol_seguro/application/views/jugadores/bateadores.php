<h3>Bateadores</h3>

<table>
    <tr>
        <th>Identificador</th>
        <th>Nombre</th>
        <th>Posicion</th>
        <th>N hits</th>
        <th>Veces plato</th>
        <th>Promedio de bateo</th>
    </tr>

<?php foreach ($jugadores as $jugador): ?>
    <tr>
        <?php
        echo '<td>'.$jugador['Identificador'].'</td>';
        echo '<td>'.$jugador['Nombre'].'</td>';
        echo '<td>'.$jugador['Posicion'].'</td>';
        echo '<td>'.$jugador['N_hits'].'</td>';
        echo '<td>'.$jugador['Veces_plato'].'</td>';
        echo '<td>'.$jugador['Promedio_bateo'].'</td>';
        ?>
    </tr>
<?php endforeach; ?>

</table>
