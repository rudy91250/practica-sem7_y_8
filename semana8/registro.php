<?php

// Verificar método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitizar datos
    $usuario = trim($_POST['usuario'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirmar = trim($_POST['confirmar'] ?? '');
    $rol = trim($_POST['rol'] ?? '');

    // Array de errores
    $errores = [];

    // Validar usuario vacío
    if (empty($usuario)) {
        $errores[] = "El nombre de usuario es obligatorio.";
    }

    // Validar formato del usuario
    if (!preg_match("/^[a-zA-Z0-9]+$/", $usuario)) {
        $errores[] = "El usuario solo debe contener letras y números.";
    }

    // Validar longitud mínima del usuario
    if (strlen($usuario) < 4) {
        $errores[] = "El usuario debe tener mínimo 4 caracteres.";
    }

    // Validar correo
    if (empty($correo)) {
        $errores[] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no es válido.";
    }

    // Validar contraseña
    if (empty($password)) {
        $errores[] = "La contraseña es obligatoria.";
    } elseif (strlen($password) < 8) {
        $errores[] = "La contraseña debe tener al menos 8 caracteres.";
    }

    // Validar confirmación
    if ($password !== $confirmar) {
        $errores[] = "Las contraseñas no coinciden.";
    }

    // Validar rol
    if (empty($rol)) {
        $errores[] = "Debe seleccionar un rol.";
    }

    // Validar checkbox
    if (!isset($_POST['terminos'])) {
        $errores[] = "Debe aceptar los términos y condiciones.";
    }

    // Mostrar errores
    if (!empty($errores)) {

        echo "<h1>Errores encontrados</h1>";

        foreach ($errores as $error) {
            echo "<p>• " . htmlspecialchars($error) . "</p>";
        }

    } else {

        // Simular hash de contraseña
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Simulación de registro exitoso
        echo "<h1>Registro exitoso</h1>";

        echo "<p>Usuario registrado correctamente.</p>";

        echo "<h3>Datos registrados:</h3>";

        echo "<p><strong>Usuario:</strong> " . htmlspecialchars($usuario) . "</p>";

        echo "<p><strong>Correo:</strong> " . htmlspecialchars($correo) . "</p>";

        echo "<p><strong>Rol:</strong> " . htmlspecialchars($rol) . "</p>";

        echo "<p><strong>Contraseña cifrada:</strong> " . htmlspecialchars($password_hash) . "</p>";

        echo "<p>Datos simulados enviados a la base de datos.</p>";
    }

} else {

    echo "Acceso no permitido.";

}

?>