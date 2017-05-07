<h3>Bateadores</h3>
<?php

?>

<table>
    <tr>
        <th>Identificador</th>
        <th>Nombre</th>
        <th>Posicion</th>
        <th>N_hits</th>
        <th>Veces_plato</th>
        <th>Promedio de bateo</th>
    </tr>

<?php
    foreach ($jugadores as $jugador):
        $jugador['Promedio de bateo'] = round($jugador['N_hits']/$jugador['Veces_plato'], 2);
    endforeach;
    var_dump($jugadores);
?>
<?php foreach ($jugadores as $jugador): ?>
    <tr>
        <?php
        echo '<td>'.$jugador['Identificador'].'</td>';
        echo '<td>'.$jugador['Nombre'].'</td>';
        echo '<td>'.$jugador['Posicion'].'</td>';
        echo '<td>'.$jugador['N_hits'].'</td>';
        echo '<td>'.$jugador['Veces_plato'].'</td>';
        $promedio_bateo = $jugador['N_hits']/$jugador['Veces_plato'];
        echo '<td>'.round($promedio_bateo, 2).'</td>';
        ?>
    </tr>
<?php endforeach; ?>
</table>
