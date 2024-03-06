<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTA DE PROVEEDORES</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="formulario_proveedor2.html" class="btn btn-lg btn-primary">Agregar proveedor</a>
            </div>
        </div>
    </div>
    <table border="0" cellspacing="2" cellpadding="2" id="tabla_proveedores">
        <thead>
            <tr>
                <td>Cod. Proveedor</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Dirección</td>
                <td>Teléfono</td>
                <td>Correo Electrónico</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </thead>
        <tbody>
            <?php
            include("config/conexion.php");

            $consulta = "SELECT * FROM proveedor";
            if ($resultado = $conn->query($consulta)) {
                while ($fila = $resultado->fetch_assoc()) {
                    $cod_proveedor = $fila["cod_proveedor"];
                    $nombre = $fila["nombre"];
                    $apellido = $fila["apellido"];
                    $direccion = $fila["direccion"];
                    $telefono = $fila["telefono"];
                    $correo = $fila["correo"];

                    echo '<tr>
                            <td>'.$cod_proveedor.'</td>
                            <td>'.$nombre.'</td>
                            <td>'.$apellido.'</td>
                            <td>'.$direccion.'</td>
                            <td>'.$telefono.'</td>
                            <td>'.$correo.'</td>
                            <td><a href="editar_proveedor.php?id='.$cod_proveedor.'">Editar</a></td>
                            <td><a href="eliminar_proveedor.php?id='.$cod_proveedor.'">Eliminar</a></td>
                        </tr>';
                }
                $resultado->free();
                mysqli_close($conn);
            }
            ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function () {
            $('#tabla_proveedores').DataTable();
        });
    </script>
</body>
</html>
