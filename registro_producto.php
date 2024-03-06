<?php 
include("config/conexion.php");

$nombre_producto = $conn->real_escape_string($_POST['nombre_producto']);
$precio = $conn->real_escape_string($_POST['precio']);
$cantidad = $conn->real_escape_string($_POST['cantidad']);
$categoria = $conn->real_escape_string($_POST['categoria']);

// Formatear la fecha de elaboración
$fecha_elaboracion = date('Y-m-d', strtotime($conn->real_escape_string($_POST['fecha_elaboracion'])));
// Formatear la fecha de caducidad
$fecha_caducidad = date('Y-m-d', strtotime($conn->real_escape_string($_POST['fecha_caducidad'])));

$sql = "INSERT INTO compra (nombre_producto, precio, cantidad, cod_categoria, fecha_elab, fecha_cant) 
        VALUES ('$nombre_producto','$precio','$cantidad','$categoria','$fecha_elaboracion','$fecha_caducidad')";

if ($conn->query($sql) === TRUE) {
    echo "Producto registrado correctamente.";
} else {
    echo "Error al registrar el producto: " . $conn->error;
}

$conn->close();
?>
