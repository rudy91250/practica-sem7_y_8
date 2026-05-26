<?php

// Verificar si llegan datos por GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // Obtener y limpiar datos
    $producto = htmlspecialchars($_GET['producto'] ?? '');
    $categoria = htmlspecialchars($_GET['categoria'] ?? '');
    $precio = htmlspecialchars($_GET['precio'] ?? '');

    // Validar campos vacíos
    if (empty($producto) || empty($categoria) || empty($precio)) {

        echo "<h2>Faltan completar algunos campos.</h2>";

    } else {

        echo "<h1>Resultado de la búsqueda</h1>";

        echo "<p><strong>Producto:</strong> " . $producto . "</p>";

        echo "<p><strong>Categoría:</strong> " . $categoria . "</p>";

        echo "<p><strong>Precio Máximo:</strong> S/ " . $precio . "</p>";
    }

} else {

    echo "Acceso no permitido.";

}

?>