<?php 
include("config/conexion.php");

// Verificar si se han enviado datos del formulario
if(isset( $_POST['apellido_cliente'], $_POST['nombre_cliente'],$_POST['direccion_cliente'], $_POST['numero_telefono'], $_POST['correo_cliente'])) {
    // Procesar los datos del formulario
    
    $apellido_cliente = $conn->real_escape_string($_POST['apellido_cliente']);
    $nombre_cliente = $conn->real_escape_string($_POST['nombre_cliente']);
    $direccion_cliente = $conn->real_escape_string($_POST['direccion_cliente']);
    $numero_telefono = $conn->real_escape_string($_POST['numero_telefono']);
    $correo_cliente = $conn->real_escape_string($_POST['correo_cliente']);

    // Realizar la inserción en la base de datos
    $sql = "INSERT INTO cliente ( apellidos, nombre, direccion, telefono, correo) 
            VALUES ( '$apellido_cliente', '$nombre_cliente', '$direccion_cliente', '$numero_telefono', '$correo_cliente')";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente registrado correctamente.";
    } else {
        echo "Error al registrar el cliente: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
