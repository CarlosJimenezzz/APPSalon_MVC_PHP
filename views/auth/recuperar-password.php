<h1 class="nombre-pagina">Recuperar Password</h1>
<p class="descripcion-pagina">Coloca tu nuevo password a continuación</p>
<?php
include_once __DIR__ . '/../templates/alertas.php';

if ($error) return;
?>
<form class="formulario" method="POST">
    <div class="campo">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Tu Password" name="password" value="<?php echo s($auth->password) ?>">
    </div>
    <div class="campo">
        <label for="password">Confirma tu Password</label>
        <input type="password" id="password1" placeholder="Tu Password" name="password1">
    </div>
    <input type="submit" class="boton" value="Guarda Nuevo Password">

</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Iniciar Sesión</a>
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
</div>