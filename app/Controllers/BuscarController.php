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

    //En función del parámetro que nos llegue ejecutamos una función u otra
            switch($funcion) {
                case 'buscar': 
                
                $where = $_GET['where'];
                $where2 = $_GET['where2'];
                $db = Database::connect();

                $query = $db->query("SELECT * FROM sigaprep.vw_reporteador_estatus ".$where);


                $data = $query->getResultArray();

                 $db2 = Database::connect();
                $query2=$db2->query("SELECT * FROM sigaprep.vw_estatus_documentos ".$where2);


                   $data2 = $query2->getResultArray();

                $html="";
                $validados='';
                    $novalidados='';
                    $pendientes='';
                    $observaciones='';

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
                   
                   $html.='<tr>';
                   $html.='<td class="filas">'.$key['id'].'</td>';
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

                $html.='</tr>';
            }

            return $html;
            break;
            case 'funcion2': 
            $b -> accion2();
            break;
            }
        }
    }

}



