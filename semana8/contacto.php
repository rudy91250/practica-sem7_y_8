<?php

// Verificar si llegan datos
if ($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener datos con $_REQUEST
    $nombres = trim($_REQUEST['nombres'] ?? '');
    $correo = trim($_REQUEST['correo'] ?? '');
    $asunto = trim($_REQUEST['asunto'] ?? '');
    $mensaje = trim($_REQUEST['mensaje'] ?? '');

    // Eliminar etiquetas HTML
    $mensaje = strip_tags($mensaje);

    // Array para guardar errores
    $errores = [];

    // Validaciones
    if (empty($nombres)) {
        $errores[] = "El nombre es obligatorio.";
    }

    if (empty($correo)) {
        $errores[] = "El correo es obligatorio.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo no tiene un formato válido.";
    }

    if (empty($asunto)) {
        $errores[] = "Debe seleccionar un asunto.";
    }

    if (empty($mensaje)) {
        $errores[] = "El mensaje es obligatorio.";
    } elseif (strlen($mensaje) < 10) {
        $errores[] = "El mensaje debe tener al menos 10 caracteres.";
    }

    // Mostrar errores o resultados
    if (!empty($errores)) {

        echo "<h1>Errores encontrados</h1>";

        foreach ($errores as $error) {
            echo "<p>• " . $error . "</p>";
        }

    } else {

        echo "<h1>Mensaje enviado correctamente</h1>";

        echo "<h3>Resumen de datos recibidos:</h3>";

        echo "<p><strong>Nombres:</strong> " . htmlspecialchars($nombres) . "</p>";

        echo "<p><strong>Correo:</strong> " . htmlspecialchars($correo) . "</p>";

        echo "<p><strong>Asunto:</strong> " . htmlspecialchars($asunto) . "</p>";

        echo "<p><strong>Mensaje:</strong> " . htmlspecialchars($mensaje) . "</p>";
    }

} else {

    echo "Acceso no permitido.";

}

?>