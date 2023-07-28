<h1 class="nombre-pagina">Panel de Administración</h1>

<?php include_once __DIR__ . '/../templates/barra.php'; ?>

<h2>Buscar citas</h2>
<div class="busqueda">
    <div class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" value="<?php echo $fecha ?>">
        </div>
    </div>
</div>
<?php
if (count($citas) === 0) {
    echo "<h2>No hay citas en esta fecha</h2>";
}
?>
<div id="citas-admin">
    <ul class="citas">
        <?php $idCita = 0;
        foreach ($citas as $key => $cita) { ?>
            <?php if ($idCita !== $cita->id) { //Comprobamos si el anterior id ya esta para no repetir todo por cada 
                $total = 0;
                $idCita = $cita->id ?>
                <li>
                    <p>ID: <span><?php echo $cita->id ?></span></p>
                    <p>Hora: <span><?php echo $cita->hora ?></span></p>
                    <p>Cliente: <span><?php echo $cita->cliente ?></span></p>
                    <p>Email: <span><?php echo $cita->email ?></span></p>
                    <p>Telefono: <span><?php echo $cita->telefono ?></span></p>
                    <h3>Servicios</h3>
                <?php } //Endif
                ?>
                <p class="servicio"><?php echo $cita->servicio . " $" . $cita->precio; ?></p>
                <?php
                $actual = $cita->id;
                $proximo = $citas[$key + 1]->id ?? 0;
                $precio = (float)$cita->precio;
                $total += $precio;
                if (esUltimo($actual, $proximo)) { ?>
                    <p>Total: <span>$<?php echo $total ?></span></p>

                    <form action="/api/eliminar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                        <input type="submit" class="boton-eliminar" value="Eliminar">
                    </form>
            <?php }
            } //EndforEach
            ?>
    </ul>
</div>

<?php
$script = "<script src='build/js/buscador.js'></script>";
?>