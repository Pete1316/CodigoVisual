<?php
include("config/conexion.php");

// Verificar si se han enviado datos del formulario
if(isset($_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['telefono'], $_POST['correo'])) {
    // Procesar los datos del formulario
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellido = $conn->real_escape_string($_POST['apellido']);
    $direccion = $conn->real_escape_string($_POST['direccion']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $correo = $conn->real_escape_string($_POST['correo']);

    // Realizar la inserción en la base de datos
    $sql = "INSERT INTO proveedor (nombre, apellido, direccion, telefono, correo) 
            VALUES ('$nombre', '$apellido', '$direccion', '$telefono', '$correo')";

    if ($conn->query($sql) === TRUE) {
        echo "Proveedor registrado correctamente.";
    } else {
        echo "Error al registrar el proveedor: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
