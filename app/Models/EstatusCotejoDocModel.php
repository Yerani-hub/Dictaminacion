<?php namespace App\Models;

use CodeIgniter\Model;

class EstatusCotejoDocModel extends Model
{
    protected $table      = 'tbl_cat_cotejo_documentos';


    public function getEstatus($id = false){
    	if($id==false){
    		return $this->findAll();
    	}else{
    		return $this->getWhere(['id' => $id]);
    	}
    }

    //protected $primaryKey = 'Id';

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    //protected $allowedFields = ['Id', 'Foto', 'Nombres', 'Perfil', 'Matricula', 'FechaRegistro', 'Cotejo', 'CotejoAdmin', 'EstatusGeneral', 'Historial';
}
