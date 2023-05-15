<?php
include('seguridad.php');
include('Config/Config.php');

$conexion->consultas('SELECT * FROM estudiantes');
$estudiantes = $conexion->obtener_datos();

if( $_GET && isset($_GET['tipo']) )
    $tipo = $_GET['tipo'];
    switch($tipo){
        case 'pdf':
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="estudiantes.pdf"');
            break;
        case 'excel':
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="estudiantes.xls"');
            break;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Estudiante</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"/>

</head>
<body>
    <div class="container-fluid"><br>
        <h2 class="text-center">LISTADO DE ESTUDIANTES</h2><br><br>
        <table class="table table-sm" id="tblEstudiantes">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>CARNET</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($estudiantes as $index => $estudiante ){ ?>
                <tr>
                    <td><?php echo $estudiante['nombre'] ?></td>
                    <td><?php echo $estudiante['apellido'] ?></td>
                    <td><?php echo $estudiante['carnet'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>