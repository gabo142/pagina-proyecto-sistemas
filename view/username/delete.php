<?php
// Verificar si se recibió el ID del usuario a eliminar
if(isset($_POST['delete_id'])) {
    // Obtener el ID del usuario a eliminar
    $id = $_POST['delete_id'];

    // Conectar a la base de datos
    require_once("c://xampp/htdocs/proyecto/controller/usernameController.php");
    $obj = new usernameController();
    
    // Eliminar el usuario de la base de datos
    $result = $obj->delete($id);

    // Verificar si la eliminación fue exitosa
    if($result) {
        // Redireccionar al índice con un mensaje de éxito
        header("Location: index.php?delete_success=true");
        exit();
    } else {
        // Redireccionar al índice con un mensaje de error
        header("Location: index.php?delete_error=true");
        exit();
    }
} else {
    // Redireccionar al índice si no se recibió el ID del usuario a eliminar
    header("Location: index.php");
    exit();
}
?>
