<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTA DE PRODUCTOS</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Cambiamos el botón por un enlace -->
                <a href="formulario_producto.html" class="btn btn-lg btn-primary">Agregar producto</a>
            </div>
        </div>
    </div>
    <table border="0" cellspacing="2" cellpadding="2" id="tabla_datos">
        <thead>
            <tr>
                <td> Cod. Producto</td>
                <td> Producto </td>
                <td> Precio</td>
                <td> Cantidad </td>
                <td> Fecha Elab.</td>
                <td> Fecha Cad.</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </thead>
        <tbody>
            <?php
            include("config/conexion.php"); // Asegúrate de que la conexión se establezca antes de esta línea
            $consulta = "SELECT * FROM compra";
            if ($resultado = $conn->query($consulta)) {
                while ($filas = $resultado->fetch_assoc()) {
                    $cod_producto = $filas["codigo_producto"];
                    $nombre_producto = $filas["nombre_producto"];
                    $cantidad = $filas["cantidad"];
                    $precio = $filas["precio"];
                    $fecha_elaboracion = $filas["fecha_elab"];
                    $fecha_caducidad = $filas["fecha_cant"];

                    echo '<tr>
                            <td>'.$cod_producto.'</td>
                            <td>'.$nombre_producto.'</td>
                            <td>'.$precio.'</td>
                            <td>'.$cantidad.'</td>
                            <td>'.$fecha_elaboracion.'</td>
                            <td>'.$fecha_caducidad.'</td>
                            <td><a href="editar_producto.php?id='.$cod_producto.'">Editar</a></td>
                            <td><a href="eliminar_producto.php?id='.$cod_producto.'">Eliminar</a></td>
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
            $('#tabla_datos').DataTable();
        });
    </script>
</body>
</html>
