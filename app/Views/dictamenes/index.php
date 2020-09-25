<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tutorial DataTables</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
      
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css">

     <style>
        .datos{
            color: gray;
            font-size: 15px;
        }
    </style>
           
  </head>
    
  <body> 
        <div class="main-panel">
            <div class="content">
                <div style=" width: 90%;  margin: 10px auto;">
                    <div class="card-header" style="background:rgb(95,158,160); color: #fff; height: 70px">
                        <h1>Dictamen de Alumnos</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <h1>Preparatoria en Línea</h1>
                            </div>
                            <div class="col-md-12">
                                <h3 style="color: #808080">Parámetros de Búsqueda</h3>
                                <hr size="2" width="100%"/>
                            </div>

                            <div class="col-md-5">
                                <label class="datos"><em>Folio:</em></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-5">
                                <label  class="datos"><em>Estatus General de Dictaminacion:</em></label>
                                <select class="form-control">
                                    <option>-- Seleccione una opción --</option>
                                </select>
                            </div>
                        </div><div class="form-group row">
                            <div class="col-md-5">
                                <label class="datos"><em>Nombre:</em></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-5">
                                <label  class="datos"><em>Estatus Cotejo de Informacion:</em></label>
                                <select class="form-control">
                                    <option>-- Seleccione una opción --</option>
                                </select>
                            </div>
                        </div><div class="form-group row">
                            <div class="col-md-5">
                                <label class="datos"><em>Apellido Paterno:</em></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-5">
                                <label class="datos"><em>Tipo Estudiante:</em></label>
                                <select class="form-control">
                                    <option>Seleccionar</option>
                                </select>
                            </div>
                        </div><div class="form-group row">
                            <div class="col-md-5">
                                <label class="datos"><em>Apellido Materno:</em></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-1">
                            </div>
                        </div><div class="form-group row">
                            <div class="col-md-5">
                                <label class="datos"><em>CURP:</em></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-1">
                            </div>
                        </div><div class="form-group row">
                            <div class="col-md-5">
                                <label class="datos"><em>Matricula:</em></label>
                                <input type="text" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary"  id="Buscar" value="Buscar" onclick="reload_table()">
                            </div>
                            <div class="col-md-12">
                                <label><b>Cada consulta mostrará un máximo de 1,000 registros con el propósito de agilizar la búsqueda</b></label>
                            </div>
                            
                        </div><br>

                    
     
    <!--Ejemplo tabla con DataTables-->
    <div class="form-group row">
                <div class="col-md-12">
                    <div class="table-responsive">        
                        <table id="example" class="table" style="width:100%">
                        <thead >
                                        <tr>
                                            <td><b>Id</b></td>
                                            <td><b>Foto</b></td>
                                            <td><b>Nombres</b></td>
                                            <td><b>Perfil</b></td>
                                            <td><b>Matricula</b></td>
                                            <td><b>Fecha de Registro</b></td>
                                            <td><b>Cotejo</b></td>
                                            <td><b>Cotejo Admin</b></td>
                                            <td><b>Estatus General</b></td>
                                            <td><b>Historial</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($datos as $key):?>
                                        <tr>
                                        <td><?php echo $key['Id']; ?></td>
                                        <td><?php echo $key['Foto']; ?></td>
                                        <td><?php echo $key['Nombres']; ?></td>
                                        <td><?php echo $key['Perfil']; ?></td>
                                        <td><?php echo $key['Matricula']; ?></td>
                                        <td><?php echo $key['FechaRegistro']; ?></td>
                                        <td><?php echo $key['Cotejo']; ?></td>
                                        <td><?php echo $key['CotejoAdmin']; ?></td>
                                        <td><?php echo $key['EstatusGeneral']; ?></td>
                                        <td><?php echo $key['Historial']; ?></td>
                                    </tr>
     
                                      <?php endforeach; ?>
                                     
                                    </tbody>      
                       </table>                  
                    </div>
                </div>
        </div>  
      
      
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../jquery/jquery-3.5.1.min.js"></script>
    <script src="../popper/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="../datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="../table.js"></script>

    
  </body>
</html>
