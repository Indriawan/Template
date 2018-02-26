<?php
class Test extends MY_Controller
{

	public function __construct(){
		parent::__construct();
		$Model = array(
					'model_user' => 'user',
				);
		$this->load->Model($Model);
	}

	public function index()
	{
		$data['kode'] = $this->user->Kode();
		$this->render('test/index',$data);
		$this->render('test/layout');
	}
	public function layout()
	{
		$this->render('test/layout');
	}
}