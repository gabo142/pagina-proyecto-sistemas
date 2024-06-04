<?php
    session_start(); // Iniciar la sesión para acceder a los datos del usuario
    // Verificar si el usuario ha iniciado sesión
    if(!isset($_SESSION['user_id'])) {
        // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
        header("Location: login.php");
        exit();
    }
    require_once("/xampp/htdocs/proyecto/view/head/head.php"); // Incluir la cabecera de la página
?>
<div class="container">
    <h1 class="mt-5 mb-4">Bienvenido, <?php echo $_SESSION['user_name']; ?>!</h1>
    <!-- Aquí puedes agregar contenido adicional para la página de inicio -->
    <img src="images.jpg" alt="Imagen de bienvenida" class="img-fluid">
</div>
    
    <!-- Enlace para cerrar sesión -->
    <a href="logout.php">Cerrar sesión</a>
</div>
<?php
    require_once("/xampp/htdocs/proyecto/view/head/footer.php"); // Incluir el pie de página
?>
<script>
    // Función para cerrar sesión cuando el usuario deja la página
    window.addEventListener("beforeunload", function() {
        // Hacer una solicitud AJAX para cerrar la sesión
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "logout.php", true);
        xhr.send();
    });

</script>
