<?php

// Verificar si el formulario fue enviado por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener y limpiar datos
    $correo = trim($_POST['correo'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Usuario y contraseña simulados
    $usuario_correcto = "admin@gmail.com";
    $clave_correcta = "12345678";

    // Validar campos vacíos
    if (empty($correo) || empty($password)) {

        echo "<h2>Todos los campos son obligatorios.</h2>";

    }
    // Validar formato del correo
    elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {

        echo "<h2>El correo electrónico no es válido.</h2>";

    }
    // Validar longitud mínima de contraseña
    elseif (strlen($password) < 8) {

        echo "<h2>La contraseña debe tener al menos 8 caracteres.</h2>";

    }
    // Simular autenticación
    elseif ($correo == $usuario_correcto && $password == $clave_correcta) {

        echo "<h1>Inicio de sesión exitoso</h1>";
        echo "<p>Bienvenido al sistema.</p>";

        // Verificar checkbox
        if (isset($_POST['recordar'])) {
            echo "<p>La opción 'Recordarme' fue seleccionada.</p>";
        }

    } else {

        echo "<h2>Correo o contraseña incorrectos.</h2>";

    }

} else {

    echo "Acceso no permitido.";

}

?>