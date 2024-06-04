<?php
    require_once "../../controller/usernameController.php";
    $obj = new usernameController();
    $obj->guardar($_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['correo_electronico'], $_POST['estado'], $_POST['password']);

?>