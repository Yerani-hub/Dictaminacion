<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dictaminacion Alumnos</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css"/>

    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/datetime/jquery.datetimepicker.min.css"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.full.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.min.css" rel="stylesheet"/>

    <style>
        .datos{
            color: gray;
            font-size: 15px;
        }

        .btn-group, .btn-group-vertical {
           padding-bottom: 10px;
           padding-left: 20px;
       }

       .filas{
        font-size: 15px;
       }


   </style>

</head>

<body> 
    <div class="main-panel">
        <div class="content">
            <div style=" width: 90%;  margin: 10px auto;">
                <div class="card-header" style="background:rgb(95,158,160); color: #fff; height: 70px;">
                    <h1>Dictamen de Alumnos</h1>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <h5>Para generar el reporte de alumnos con dictamen, por favor seleccione la fecha inicial y final, y a continuación de clic en el botón Generar Reporte</h5><br>
                        </div>

                        <div class="col-md-5">
                            <label class="datos"><em>Fecha inicial:</em></label>
                            <input id="datetime1" class="form-control">
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-5">
                            <label  class="datos"><em>Estatus del cotejo de Información:</em></label>
                            <select class="form-control" id="cotejoInfo">
                                <option>-- Seleccione una opción --</option>
                                <?php 
                                foreach ($estatusCotejoInfo as $key):?>
                                    <option><?php echo $key['descripcion']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label class="datos"><em>Fecha final:</em></label>
                            <input id="datetime2" class="form-control">
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-5">
                            <!--<label  class="datos"><em>Estatus del Cotejo de documentos:</em></label>
                            <select id="estatusCot" class="form-control">
                                <option>-- Seleccione una opción --</option>
                                <?php 
                                foreach ($estatusCotejoDoc as $key):?>
                                    <option><?php echo $key['descripcion']; ?></option>
                                <?php endforeach; ?>
                            </select> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                           <label class="datos"><em>Estatus General:</em></label>
                           <select id="estatusGen" class="form-control">
                            <option>-- Seleccione una opción --</option>
                            <?php 
                            foreach ($estatusGeneral as $key):?>
                                <option><?php echo $key['descripcion']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-5" style="padding-top: 30px; text-align: right;">
                        <input style="width: 150px" type="submit" class="btn btn-primary"  id="Buscar" onclick="buscar()" value="Buscar">
                    </div>
                    
                </div>
                <br><br><br>

                <!--Ejemplo tabla con DataTables-->
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="table-responsive">        
                            <table id="example" class="table" style="width:100%">
                                <thead >
                                    <tr>
                                        <td><b>Id</b></td>
                                        <td><b>Nombres</b></td>
                                        <td><b>Matricula</b></td>
                                        <td><b>Curp</b></td>
                                        <td><b>Correo</b></td>
                                        <td><b>Fecha de Registro</b></td>
                                        <td><b>Estatus Alumno</b></td>
                                        <td><b>Estatus de Informacion</b></td>
                                        <td><b>Estatus Documentos</b></td>
                                    </tr>
                                </thead>
                                <tbody id="llenarTabla">



                                </tbody>      
                            </table>     

                        </div>
                    </div>
                    <div class="col-md-12" id="pantallaCarga" style="text-align: center;">

                    </div>
                </div>  


                <!-- jQuery, Popper.js, Bootstrap JS -->
                <script src="<?php echo base_url(); ?>/jquery/jquery-3.5.1.min.js"></script>
                <script src="<?php echo base_url(); ?>/popper/popper.min.js"></script>
                <script src="<?php echo base_url(); ?>/bootstrap/js/bootstrap.min.js"></script>

                <script type="text/javascript" src="<?php echo base_url(); ?>/datatables/datatables.min.js"></script>    

                <!-- para usar botones en datatables JS -->  
                <script src="<?php echo base_url(); ?>/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
                <script src="<?php echo base_url(); ?>/datatables/JSZip-2.5.0/jszip.min.js"></script>    
                <script src="<?php echo base_url(); ?>/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
                <script src="<?php echo base_url(); ?>/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
                <script src="<?php echo base_url(); ?>/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>  

                <script  src="<?php echo base_url(); ?>/datatables.js"></script>
                <script src="<?php echo base_url(); ?>/bootstrap/js/bootstrap-notify/bootstrap-notify.min.js"></script>

                <script src="<?php echo base_url(); ?>/datetime/jquery.datetimepicker.full.js"></script>

                <script type="text/javascript">
                 $("#datetime1").datetimepicker( {
                    format: 'Y-m-d' ,
                });
                 $("#datetime2").datetimepicker({
                    format: 'Y-m-d' ,
                });

                 $.datetimepicker.setLocale('es');
                 function buscar(){
                    var datetime1=document.getElementById('datetime1').value;
                    var datetime2=document.getElementById('datetime2').value;
                    var cotejoInfo=document.getElementById('cotejoInfo').value;
                    var estatusGen=document.getElementById('estatusGen').value;
                    var where="where ";
                    var where2="where ";
                    if(estatusGen!='-- Seleccione una opción --'){
                        where+="  sigaprep.vw_reporteador_estatus.perfil='"+estatusGen+"' and";
                        where2+="  sigaprep.vw_estatus_documentos.perfil='"+estatusGen+"' and";
                    }
                    if(cotejoInfo!='-- Seleccione una opción --'){
                        where+="  sigaprep.vw_reporteador_estatus.descripcion='"+cotejoInfo+"' and";
                        where2+="  sigaprep.vw_estatus_documentos.descripcion='"+cotejoInfo+"' and";
                    }
                    
                    if(datetime1!='' && datetime2!=''){
                        where+="  sigaprep.vw_reporteador_estatus.fechaDictaminacion between '"+datetime1+"' and '"+datetime2+"' and";
                        where2+="  sigaprep.vw_estatus_documentos.fechaDictaminacion between '"+datetime1+"' and '"+datetime2+"' and";
                    }

                    where+="  sigaprep.vw_reporteador_estatus.id > 0";
                    where2+="  sigaprep.vw_estatus_documentos.alumno_id > 0";
                    console.log(where2);

                    $('#example').DataTable().destroy();
                    $.ajax({

                        url : '<?php echo base_url(); ?>/index.php/BuscarController',
                        data : { 'funcion' : 'buscar',
                        'where':where, 'where2':where2 },
                        type : 'GET',
                        beforeSend : function(){

                            $('#llenarTabla').html("");
                           $('#pantallaCarga').html('<center><img class="rg_i Q4LuWd" src="../../Dictaminacion/public/espera.gif" ></center>');
                       },
                       success : function(respuesta) {
                        $('#pantallaCarga').html('');
                        if(respuesta.length==0){
                            console.log(respuesta);
                            mensaje("danger","Sin registros");

                            $('#example').DataTable().destroy();
                            $('#llenarTabla').html("");
                            $('#example').DataTable({

                                //para cambiar el lenguaje a español
                                scrollX: false,
                                scrollCollapse: true,
                                filter: true,
                                iDisplayLength: 10,
                                "language": {
                                    "lengthMenu": "Mostrando _MENU_ registros por página",
                                    "zeroRecords": "No se encontraron resultados",
                                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                                    "sSearch": "Búsqueda rápida:",
                                    "oPaginate": {
                                        "sFirst": "Primero",
                                        "sLast":"Último",
                                        "sNext":"Siguiente",
                                        "sPrevious": "Anterior"
                                    },
                                    "sProcessing":"Procesando...",
                                },
                                    //para usar los botones   
                                    responsive: "true",
                                    dom: '<"row"<"col-md-11"><"col-md-1" B>><"row"<"col-md-6" l><"col-md-6" f>>t<"row"<"col-md-6" i><"col-md-6" p>>',      
                                    buttons:[ 
                                    {
                                        extend:    'csv',
                                        text:      'CSV ',
                                        titleAttr: 'Exportar a CSV',
                                        className: 'btn btn-success',
                                    },
                                    ]   
                                });  
                        }else{
                            console.log(respuesta.length);
                            mensaje("success","Registros Encontrados con exito");
                            $('#llenarTabla').fadeIn(1000).html(respuesta);
                            $('#example').DataTable({
                                //para cambiar el lenguaje a español
                                scrollX: false,
                                scrollCollapse: true,
                                filter: true,
                                iDisplayLength: 10,
                                "language": {
                                    "lengthMenu": "Mostrando _MENU_ registros por página",
                                    "zeroRecords": "No se encontraron resultados",
                                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                                    "sSearch": "Búsqueda rápida:",
                                    "oPaginate": {
                                        "sFirst": "Primero",
                                        "sLast":"Último",
                                        "sNext":"Siguiente",
                                        "sPrevious": "Anterior"
                                    },
                                    "sProcessing":"Procesando...",
                                },
                                //para usar los botones   
                                responsive: "true",
                                dom: '<"row"<"col-md-11"><"col-md-1" B>><"row"<"col-md-6" l><"col-md-6" f>>t<"row"<"col-md-6" i><"col-md-6" p>>',     
                                buttons:[ 
                                {
                                    extend:    'csv',
                                    text:      'CSV ',
                                    titleAttr: 'Exportar a CSV',
                                    className: 'btn btn-success',
                                },
                                ]   
                            });  
                        }

                    },
                    error : function(xhr, status) {
                        $('#pantallaCarga').html('');

                        alert('Disculpe, existió un problema');
                    },

                });
}


function mensaje(color,mensaje){
    if(mensaje==""){

    }else{
        var placementFrom = $('#notify_placement_from option:selected').val();
        var placementAlign = $('#notify_placement_align option:selected').val();
        var state =color;
        var style = $('#notify_style option:selected').val();
        var content = {};

        content.message = mensaje;
        content.title = 'SEP<br>';
        if (color == "success") {
            content.icon = 'la la-check';
        } else {
            content.icon = 'la la-close';
        }
        content.url = 'index.html';
        content.target = '_blank';

        $.notify(content,{
            type: state,
            placement: {
                from: placementFrom,
                align: placementAlign
            },
            time: 1000,
        });
    }

}
</script>

</body>
</html>
