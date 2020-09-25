<?php namespace App\Models;

use CodeIgniter\Model;

class EstatusGeneralModel extends Model
{
    protected $table      = 'tbl_cat_estatus_dictaminacion';

    public function getEstatus($id = false){
    	if($id==false){
    		return $this->findAll();
    	}else{
    		return $this->getWhere(['id' => $id]);
    	}
    }
}
