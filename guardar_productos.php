
 <?php 
include("config/conexion.php");
$codigo = $conn->real_escape_string($_POST['cod_producto']);
$nom_producto = $conn->real_escape_string($_POST['nom_producto']);
$cantidad = $conn->real_escape_string($_POST['cantidad']);
$precio = $conn->real_escape_string($_POST['precio']);
$fecha_elaboracion = $conn->real_escape_string($_POST['fecha_elab']);
$categoria = $conn->real_escape_string($_POST['categoria']);

$fecha_caducidad = $conn->real_escape_string($_POST['fecha_cant']);
?>
