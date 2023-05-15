<?php
include('../seguridad.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Registro de Estudiante</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">REGISTRO ESTUDIANTES</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Estudiante</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../CRUD_usuarios/index.php">Registrar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Cerrar Sesion</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    
      <div class="row">
        <div class="col-12 col-md-6">

            <form method="POST" id="frmEstudiante"> 
                <div class="container-fluid">
                    <div class="row p-1">
                         <div class="col-9 col-md-2">
                             <label for="txtnombre">NOMBRE:</label>
                         </div>
                         <div class="col-9 col-md-5">
                                <input type="text" name="txtnombre" id="txtnombre" 
                                    placeholder="Nombre Estudiante:" class="form-control" required pattern="[a-Z ]{3,30}">
                        </div>
                        <div class="row p-1">
                            <div class="col-3 col-md-2">
                                <label for="txtapellido">APELLIDO:</label>
                            </div>
                            <div class="col-9 col-md-5">
                                <input type="text" name="txtapellido" id="txtapellido" 
                                    placeholder="Apellido Estudiante:" class="form-control" required pattern="[a-Z ]{3,30}">
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-3 col-md-2">
                                <label for="txtcarnet">CARNET:</label>
                            </div>
                            <div class="col-9 col-md-5">
                                <input type="text" name="txtcarnet" id="txtcarnet" 
                                    placeholder="Carnet Estudiante:" class="form-control" required pattern="[a-Z]{4}[0-9]{6}">
                            </div>
                        
                            <div class="row p-1">
                                <div class="col-3 col-md-2">
                                    <input type="submit" value="REGISTRAR" name="btnguardar" id="btnguardar"
                                        class="btn btn-primary">
                                </div>
                                <div class="row p-1">
                                <div class="col-3 col-md-2">
                                    <input type="reset" value="NUEVO REGISTRO" name="btnnuevo" id="btnnuevo"
                                        class="btn btn-warning">
                                </div>
                        
                        
                        
                            </div>
                        
                        
                            </form>

            </div>

 <div class="col-3 col-md-1">   
    <table class="table table-sm" id="tblEstudiante">
<thead>
<tr>
<th>NOMBRE</th>>
<th>APELLIDO</th>>
<th>CARNET</th>>
<th></th>>
<th>
<a href="../exportar.php?tipo=pdf" id="btnPdfEstudiantes" class="btn btn-primary">PDF</a>
</th>
<th>
<a href="../exportar.php?tipo=excel" id="btnExcelEstudiantes" class="btn btn-primary">EXCEL</a>
</th>

</tr>
</thead>>
<body>

</body>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="estudiante.js"></script>
</body>
</html>