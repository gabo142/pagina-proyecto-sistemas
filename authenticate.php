<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibieron los datos del formulario de inicio de sesión
    if (isset($_POST['correo_electronico']) && isset($_POST['password'])) {
        // Obtener los datos del formulario
        $correo_electronico = $_POST['correo_electronico'];
        $password = $_POST['password'];

        // Conectar a la base de datos
        require_once("c://xampp/htdocs/proyecto/controller/usernameController.php");
        $controller = new usernameController();

        // Buscar al usuario por su correo electrónico en la base de datos
        $user = $controller->buscarPorCorreo($correo_electronico);

        // Verificar si se encontró al usuario y si la contraseña es correcta
        if ($user && password_verify($password, $user['password'])) {
            // Iniciar sesión y almacenar los datos del usuario en variables de sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nombre'];

            // Redireccionar al usuario a la página de inicio
            header("Location: index.php");
            exit();
        } else {
            // Si las credenciales son incorrectas, redireccionar de nuevo al formulario de inicio de sesión con un mensaje de error
            header("Location: login.php?error=invalid_credentials");
            exit();
        }
    } else {
        // Si no se recibieron los datos del formulario, redireccionar de nuevo al formulario de inicio de sesión
        header("Location: login.php");
        exit();
    }
} else {
    // Si no se está accediendo a través del método POST, redireccionar a la página de inicio de sesión
    header("Location: login.php");
    exit();
}
?>
