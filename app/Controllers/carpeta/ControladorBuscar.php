<?php namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\EstatusGeneralModel;
use App\Models\EstatusCotejoInfoModel;
use App\Models\UsuariosModel;
use Config\Database;
//use Config\Database;

class ControladorBuscar extends BaseController
{
    public function index()
    {
        if(isset($_GET['funcion']) && !empty($_GET['funcion'])) {
            $funcion = $_GET['funcion'];

    //En función del parámetro que nos llegue ejecutamos una función u otra
            switch($funcion) {
                case 'buscar': 
                
                $where = $_GET['where'];
                $db = Database::connect();

                $query = $db->query("select tbl_ent_alumno.id, sigaprep.tbl_ent_usuario.usuario, tbl_ent_alumno.nombres, tbl_ent_alumno.apellidopaterno, tbl_ent_alumno.apellidomaterno,
                tbl_ent_alumno.curp,
                tbl_ent_alumno.correoelectronicoprincipal,
                tbl_cat_estatus_dictaminacion.descripcion as perfil,tbl_ent_alumno.matricula,
                tbl_rmm_dictaminacion_alumno.fecharegistro as fechaDictaminacion,
                tbl_cat_cotejo_informacion.descripcion from tbl_ent_alumno
                inner join sigaprep.tbl_rmm_dictaminacion_alumno
                on sigaprep.tbl_rmm_dictaminacion_alumno.alumno_id = sigaprep.tbl_ent_alumno.id
                inner join sigaprep.tbl_cat_estatus_dictaminacion
                on sigaprep.tbl_rmm_dictaminacion_alumno.estatusdictaminacion_id = sigaprep.tbl_cat_estatus_dictaminacion.id 
                inner join sigaprep.tbl_ent_usuario
                on sigaprep.tbl_ent_usuario.id = sigaprep.tbl_ent_alumno.usuario_id 

                inner join sigaprep.tbl_rmm_cotejo_informacion_alumno
                on sigaprep.tbl_rmm_cotejo_informacion_alumno.alumno_id = sigaprep.tbl_ent_alumno.id 

                inner join tbl_cat_cotejo_informacion
                on sigaprep.tbl_cat_cotejo_informacion.id = sigaprep.tbl_rmm_cotejo_informacion_alumno.cotejoinformacion_id

                where sigaprep.tbl_rmm_cotejo_informacion_alumno.id in 
                (select max(sigaprep.tbl_rmm_cotejo_informacion_alumno.id) from tbl_rmm_cotejo_informacion_alumno 
                group by sigaprep.tbl_rmm_cotejo_informacion_alumno.alumno_id
                order by sigaprep.tbl_rmm_cotejo_informacion_alumno.id desc) and 

                sigaprep.tbl_rmm_dictaminacion_alumno.id in 
                (select max(sigaprep.tbl_rmm_dictaminacion_alumno.id) from tbl_rmm_dictaminacion_alumno 
                group by sigaprep.tbl_rmm_dictaminacion_alumno.alumno_id
                order by sigaprep.tbl_rmm_dictaminacion_alumno.id desc) and tbl_ent_alumno.id>210 and tbl_ent_alumno.id<240 ".$where);


                $data = $query->getResultArray();
                $html="";

                foreach ($data as $key) {

                   $db2 = Database::connect();
                   $query2 = $db2->query("select count(id) as contar from tbl_rmm_cotejo_documentos_alumno where id in (select max(id) 
                       from tbl_rmm_cotejo_documentos_alumno group by alumno_id,tipodocumentos_id) 
                       and alumno_id='" . $key['id'] . "' and cotejodocumentos_id=1;");

                   $data2 = $query2->getResultArray();
                   
                   $html.='<tr>';
                   $html.='<td>'.$key['id'].'</td>';
                   $html.='<td>'.$key['nombres'].' '. $key['apellidopaterno'] .' '.$key['apellidomaterno'].'</td>';
                   $html.='<td>'.$key['curp'].'</td>';
                   $html.='<td>'.$key['correoelectronicoprincipal'].'</td>';
                   $html.='<td>'.$key['matricula'].'</td>';
                   $html.='<td>'.$key['fechaDictaminacion'].'</td>';
                   $html.='<td>'.$key['perfil'].'</td>';
                   $html.='<td>'.$key['descripcion'].'</td>';
                   foreach ($data2 as $key2) {
                    $html.='<td>'.$key2['contar'].'</td>';
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





