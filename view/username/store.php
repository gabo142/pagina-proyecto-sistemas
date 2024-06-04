<?php
// Verificar si se recibieron los datos del formulario de creación de usuario
if(isset($_POST['nombre']) && isset($_POST['direccion']) && isset($_POST['telefono']) && isset($_POST['correo_electronico']) && isset($_POST['estado']) && isset($_POST['password'])) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo_electronico = $_POST['correo_electronico'];
    $estado = $_POST['estado'];
    $password = $_POST['password'];

    // Conectar a la base de datos
    require_once("c://xampp/htdocs/proyecto/controller/usernameController.php");
    $obj = new usernameController();
    
    // Agregar el usuario a la base de datos
    $result = $obj->guardar($nombre, $direccion, $telefono, $correo_electronico, $estado, $password);

    // Verificar si la inserción fue exitosa
    if($result) {
        // Redireccionar al índice con un mensaje de éxito
        header("Location: index.php?store_success=true");
        exit();
    } else {
        // Redireccionar al índice con un mensaje de error
        header("Location: index.php?store_error=true");
        exit();
    }
} else {
    // Redireccionar al índice si no se recibieron los datos del formulario
    header("Location: index.php");
    exit();
}
?>
