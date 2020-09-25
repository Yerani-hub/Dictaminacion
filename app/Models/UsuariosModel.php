<?php namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class UsuariosModel extends Model
{
    //protected $table      = 'tbl_cat_estatus_dictaminacion';

    public function getUsuarios(){
    	$db = Database::connect();

        $query = $db->query("select distinct(u.id), u.usuario, u.contrasenia, u.activo from tbl_rmm_cotejo_informacion_alumno ci inner join tbl_ent_usuario u on u.id=ci.usuario_id order by u.usuario");
        $usuarios = $query->getResultArray();
        return $usuarios;
    }

    //protected $primaryKey = 'Id';

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    //protected $allowedFields = ['Id', 'Foto', 'Nombres', 'Perfil', 'Matricula', 'FechaRegistro', 'Cotejo', 'CotejoAdmin', 'EstatusGeneral', 'Historial';
}


