<h3>Lanzadores</h3>

<table>
    <tr>
        <th>Identificador</th>
        <th>Nombre</th>
        <th>N_hits</th>
        <th>Veces plato</th>
        <th>Carreras Limpias</th>
        <th>N Innings</th>
        <th>Efectividad</th>
    </tr>

<?php foreach ($jugadores as $jugador): ?>
    <tr>
        <?php
        echo '<td>'.$jugador['Identificador'].'</td>';
        echo '<td>'.$jugador['Nombre'].'</td>';
        echo '<td>'.$jugador['N_hits'].'</td>';
        echo '<td>'.$jugador['Veces_plato'].'</td>';
        echo '<td>'.$jugador['Carreras_limpias'].'</td>';
        echo '<td>'.$jugador['N_Innings'].'</td>';
        echo '<td>'.$jugador['Efectividad'].'</td>';
        ?>
    </tr>
<?php endforeach; ?>

</table>
