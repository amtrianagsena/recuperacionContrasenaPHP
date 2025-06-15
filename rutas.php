<?php
// Asegúrate de que $c y $a vienen definidos desde index.php con GET
$c = $_GET['c'] ?? 'Auth';     // Controlador por defecto
$a = $_GET['a'] ?? 'login';    // Acción por defecto

$controlador = $c . 'Controller';
$archivo = "Controlador/$controlador.php";

if (file_exists($archivo)) {
    require_once $archivo;
    $obj = new $controlador();

    if (method_exists($obj, $a)) {
        $obj->$a(); // Llama el método como reset(), login(), etc.
    } else {
        echo "No existe el método '$a' en el controlador '$controlador'";
    }
} else {
    echo "No se encontró el archivo del controlador: $archivo";
}
