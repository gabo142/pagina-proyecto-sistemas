<?php
require_once("c://xampp/htdocs/proyecto/view/head/head.php");
?>


<form action="store.php" method="POST" autocomplete="off">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del usuario</label>
        <input type="text" name="nombre" required class="form-control" id="nombre">
    </div>
    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" name="direccion" required class="form-control" id="direccion">
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" name="telefono" required class="form-control" id="telefono">
    </div>
    <div class="mb-3">
        <label for="correo_electronico" class="form-label">Correo Electrónico</label>
        <input type="text" name="correo_electronico" required class="form-control" id="correo_electronico">
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" name="estado" required class="form-control" id="estado">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" name="password" required class="form-control" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a class="btn btn-danger" href="index.php">Cancelar</a>
</form>

<?php
require_once("c://xampp/htdocs/proyecto/view/head/footer.php");
?>
