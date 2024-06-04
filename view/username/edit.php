<?php
// Verificar si se recibieron los datos del formulario de edición
if(isset($_POST['edit_id']) && isset($_POST['edit_nombre']) && isset($_POST['edit_direccion']) && isset($_POST['edit_telefono']) && isset($_POST['edit_correo']) && isset($_POST['edit_estado'])) {
    // Obtener los datos del formulario
    $id = $_POST['edit_id'];
    $nombre = $_POST['edit_nombre'];
    $direccion = $_POST['edit_direccion'];
    $telefono = $_POST['edit_telefono'];
    $correo = $_POST['edit_correo'];
    $estado = $_POST['edit_estado'];

    // Conectar a la base de datos
    require_once("c://xampp/htdocs/proyecto/controller/usernameController.php");
    $obj = new usernameController();
    
    // Actualizar el usuario en la base de datos
    $result = $obj->update($id, $nombre, $direccion, $telefono, $correo, $estado);

    // Verificar si la actualización fue exitosa
    if($result) {
        // Redireccionar al índice con un mensaje de éxito
        header("Location: index.php?edit_success=true");
        exit();
    } else {
        // Redireccionar al índice con un mensaje de error
        header("Location: index.php?edit_error=true");
        exit();
    }
} else {
    // Redireccionar al índice si no se recibieron los datos del formulario
    header("Location: index.php");
    exit();
}
?>
