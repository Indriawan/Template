<?php

class Model_user extends CI_Model{
    
    protected $_kode = 5;
    protected $table = '';

	public function __construct(){
		parent::__construct();
		$this->load->library('lib_db_query');
		
		
	}

	public function create($data){
		$insert = $this->db->insert($this->table,$data);
		return $insert;

	}

    function kode(){
		 return $this->lib_db_query->kodeAcak($this->_kode);
		}
}