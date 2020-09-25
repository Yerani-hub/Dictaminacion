<?php namespace App\Models;

use CodeIgniter\Model;

class EstatusCotejoInfoModel extends Model
{
    protected $table      = 'tbl_cat_cotejo_informacion';


    public function getEstatus($id = false){
    	if($id==false){
    		return $this->findAll();
    	}else{
    		return $this->getWhere(['id' => $id]);
    	}
    }
}
