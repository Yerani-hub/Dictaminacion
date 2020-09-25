<?php namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\EstatusGeneralModel;
use App\Models\EstatusCotejoInfoModel;
use App\Models\EstatusCotejoDocModel;
use Config\Database;

class Home extends BaseController
{
	public function index()
	{
		
		$estatusGeneralModel = new EstatusGeneralModel();
		$data['estatusGeneral'] = $estatusGeneralModel->getEstatus();

		$estatusCotejoInfoModel = new EstatusCotejoInfoModel();
		$data['estatusCotejoInfo'] = $estatusCotejoInfoModel->getEstatus();

		$estatusCotejoDocModel = new EstatusCotejoDocModel();
		$data['estatusCotejoDoc'] = $estatusCotejoDocModel->getEstatus();

		return view('dictamenes/index2', $data);
	}
}




