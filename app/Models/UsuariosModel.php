<?php namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class UsuariosModel extends Model
{
    public function getUsuarios(){
    	$db = Database::connect();

        $query = $db->query("SELECT distinct(tbl_ent_usuario.usuario) as usuario, tbl_ent_usuario.id FROM sigaprep.tbl_rmm_cotejo_documentos_alumno
            inner join tbl_ent_usuario
            on tbl_rmm_cotejo_documentos_alumno.usuariomodifico_id = tbl_ent_usuario.id
            union
            SELECT distinct(tbl_ent_usuario.usuario) as usuario, tbl_ent_usuario.id FROM sigaprep.tbl_rmm_cotejo_informacion_alumno
            inner join tbl_ent_usuario
            on tbl_rmm_cotejo_informacion_alumno.usuario_id = tbl_ent_usuario.id group by tbl_ent_usuario.usuario order by usuario;");
                    $usuarios = $query->getResultArray();
        return $usuarios;
    }
}


