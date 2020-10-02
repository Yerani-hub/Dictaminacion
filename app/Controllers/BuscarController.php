<?php namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\EstatusGeneralModel;
use App\Models\EstatusCotejoInfoModel;
use App\Models\UsuariosModel;
use Config\Database;
//use Config\Database;

class BuscarController extends BaseController
{
    public function index()
    {
        if(isset($_GET['funcion']) && !empty($_GET['funcion'])) {
            $funcion = $_GET['funcion'];
            $indicador = $_GET['indicador'];

    //En función del parámetro que nos llegue ejecutamos una función u otra
            switch($funcion) {
                case 'buscar': 

                $html="";
                $html2="";
                $validados='';
                $novalidados='';
                $pendientes='';
                $observaciones='';
                $modificiondoc='';


                $where = $_GET['where'];
                $where2 = $_GET['where2'];
                $where3 = $_GET['where3'];
                $usuarioDoc =  $_GET['usuarioDoc'];

                
                $db = Database::connect();
                $query = $db->query("SELECT * FROM sigaprep.vw_reporteador_estatus ".$where);
                $data = $query->getResultArray();
                $db->close();

                $db2 = Database::connect();
                $query2=$db2->query("SELECT * FROM sigaprep.vw_estatus_documentos ".$where2);
                $data2 = $query2->getResultArray();
                $db2->close();
                
                $db3 = Database::connect();
                $query3=$db3->query("SELECT * FROM sigaprep.vw_estatus_documentos_usuarios ".$where3);
                $data3 = $query3->getResultArray();
                $db3->close();
                $nombredoc="";
                foreach ($data as $key) {

                    foreach ($data2 as $key2) {

                    if($key2['alumno_id']==$key['id']){

                      if($key2['cotejo']=='Validados'){
                        $validados=$key2['contar'].' validados <br>';
                      }elseif ($key2['cotejo']=='No validados') {
                        $novalidados=$key2['contar'].' no validados <br>';
                      }elseif ($key2['cotejo']=='Pendientes por Revisar') {
                        $pendientes=$key2['contar'].' pendientes por revisar <br>';
                      }elseif ($key2['cotejo']=='Observaciones') {
                        $observaciones=$key2['contar'].' con observaciones <br>';
                    }
                   }
                  }
                  foreach ($data3 as $key3) {
                    if($key3['id']==$key['id']){
                      $modificiondoc=$modificiondoc . $key3['contar'] . ' documentos cotejados por ' . $key3['usuarionombremodificodoc'] . '<br>';
                      if( $key3['usuarionombremodificodoc']==$usuarioDoc){
                    $nombredoc="si";
                   }
                   }
                   
                  }

                   $html.='<tr>';
                   $html.='<td class="filas">'.$key['usuario'].'</td>';
                   $html.='<td class="filas">'.$key['nombres'].' '. $key['apellidopaterno'] .' '.$key['apellidomaterno'].'</td>';
                   $html.='<td class="filas">'.$key['matricula'].'</td>';
                   $html.='<td class="filas">'.$key['curp'].'</td>';
                   $html.='<td class="filas">'.$key['correoelectronicoprincipal'].'</td>';
                   $html.='<td class="filas">'.$key['fechaDictaminacion'].'</td>';
                   $html.='<td class="filas">'.$key['perfil'].'</td>';
                   $html.='<td class="filas">'.$key['descripcion'].'</td>';

                   if($validados=='' && $novalidados=='' && $pendientes=='' && $observaciones==''){
                    $html.='<td class="filas">Sin documentos</td>';
                   }else{
                   $html.='<td class="filas">'.$validados.' '.$novalidados .' '.$pendientes.' '.$observaciones.'</td>';
                    $validados='';
                    $novalidados='';
                    $pendientes='';
                    $observaciones='';
                   }

                  $html.='<td class="filas">' . $key['modificacionInfoNombre'] . '</td>';
                  $html.='<td class="filas">' . $modificiondoc . '</td>';

                $html.='</tr>';

                if($indicador==0){
                  $html2.=$html;
                }else{
                  if($nombredoc=="si"){
                    $html2.=$html;
                  }
                }
                $html='';
                $nombredoc="";
                $modificiondoc='';
            }

            return $html2;
            
           break;


            case 'funcion2': 
            $b -> accion2();
            break;
            }
        }
    }

}



