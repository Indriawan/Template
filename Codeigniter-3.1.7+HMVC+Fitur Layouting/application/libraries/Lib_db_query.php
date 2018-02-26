<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_db_query{


	public function create($table,$data){
		$insert = $this->db->insert($table,$data);
		return $insert;

	}

	public function Read($Select,$Tb,$OrderBy,$SortBy){
		$data = array();
		$this->db->select($Select);
		$this->db->from($Tb);
		$this->db->order_by($OrderBy,$SortBy);
		$hasil=$this->db->get();

		if($hasil->num_rows() > 0){
			foreach ($hasil->result_array() as $row) {
				$data[] = $row;
			}
			$hasil->free_result();

		}
		$hasil->free_result();
		return $data;

	}

	function ReadJoin($Select,$Tb1,$Tb2,$FieldSame,$Type,$Order,$SortBy){

		$data = array();
		$this->db->select($Select);
		$this->db->from($Tb1);
		$this->db->join($Tb2, $FieldSame,$Type); // FieldSame : tabel1.kode = tabel2.kode
		$this->db->order_by($Order,$SortBy);
		$hasil=$this->db->get();

		if($hasil->num_rows() > 0){
			foreach ($hasil->result_array() as $row) {
				$data[] = $row;
			}
			$hasil->free_result();

		}
		$hasil->free_result();
		return $data;
	}

	function GetJoin($Select,$Tb1,$Tb2,$FieldSame,$Type,$Where,$WhereIs,$Order,$SortBy){

		$data = array();
		$this->db->select($Select);
		$this->db->from($Tb1);
		$this->db->join($Tb2, $FieldSame,$Type);
		$this->db->where($Where,$WhereIs);
		$this->db->order_by($Order,$SortBy);
		$hasil=$this->db->get();

		if($hasil->num_rows() > 0){
			foreach ($hasil->result_array() as $row) {
				$data[] = $row;
			}
			$hasil->free_result();

		}
		$hasil->free_result();
		return $data;
	}

	function GetWhere($field,$value,$table) {
        $this->db->where($field,$value);
		$query = $this->db->get($table);
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $row) {
				$Data[] = $row;
			}
			$query->free_result();

		}else{
			$Data = NULL;
		}
		return $Data;
    }

    function GetCheck($field,$value,$table) {
        $this->db->from($table);
        $this->db->where($field,$value);
        $query = $this->db->get();
 
		return $query->num_rows();
    }

	public function edit($Where,$WhereIs,$Tb){
		$this->db->where($Where,$WhereIs);
		$query = $this->db->get($Tb);
		if($query->num_rows() > 0){
			$DataEdit = $query->row();
			$query->free_result();
		}else{
			$DataEdit = NULL;
		}
		return $DataEdit;

	}

	function EditJoin($Select,$Tb1,$Tb2,$FieldSame,$Type,$Where,$WhereIs){

		$data = array();
		$this->db->select($Select);
		$this->db->from($Tb1);
		$this->db->join($Tb2, $FieldSame,$Type);
		$this->db->where($Where,$WhereIs);
		$hasil=$this->db->get();

		if($hasil->num_rows() > 0){
			$DataEdit = $hasil->row();
			$hasil->free_result();
		}else{
			$DataEdit = NULL;
		}
		return $DataEdit;
	}

	function EditJoin2($Select,$Tb1,$Tb2,$Tb3,$FieldSame,$FieldSame2,$Type,$Where,$WhereIs){

		$data = array();
		$this->db->select($Select);
		$this->db->from($Tb1);
		$this->db->join($Tb2, $FieldSame,$Type);
		$this->db->join($Tb3, $FieldSame2,$Type);
		$this->db->where($Where,$WhereIs);
		$hasil=$this->db->get();

		if($hasil->num_rows() > 0){
			$DataEdit = $hasil->row();
			$hasil->free_result();
		}else{
			$DataEdit = NULL;
		}
		return $DataEdit;
	}

	public function update($Where,$WhereIs,$Tb,$data){
		$update = $this->db->where($Where,$WhereIs);
		$update = $this->db->update($Tb,$data);
		return $update;
	}

	public function delete($Where,$WhereIs,$Tb){
		$delete = $this->db->where($Where,$WhereIs);
		$delete = $this->db->delete($Tb);
		return $delete;
	}

	function get_byimage($where,$table) {
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
 
        //cek apakah ada data
        if ($query->num_rows() == 1) {
            return $query->row();
        }
    }

    function rupiah($angka){            
		$jadi="Rp ".number_format($angka,2,',','.');             
		return $jadi;      

	}
	
    function kodeAcak($panjang){
		 $karakter = '';
		 $karakter .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; // karakter alfabet
		 $karakter .= '1234567890'; // karakter numerik
		 //$karakter .= '@#$^*()_+=/?'; // karakter simbol
		 
		 $string = '';
		 for ($i=0; $i < $panjang; $i++) { 
		  $pos = rand(0, strlen($karakter)-1);
		  $string .= $karakter{$pos};
		 }
		 return $string;
		}
}