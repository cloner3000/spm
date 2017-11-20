<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Master_Model');
	}
	function index()
	{
		$this->elemen();
	}
	function getKategori()
	{
		$this->Master_Model->getKategori()->result_array();
	}
	function getStandar()
	{
		$kategori	= $this->input->post('kategori');
		$q = $this->Master_Model->getStandar($kategori)->result_array();
$ret ='
	Standar
	<select name="standar" id="standar" class="form-control" onchange="getElemen()">
		<option value=""></option>
';
	foreach ($q as $rowStandar) {
		$ret.='<option value="'.$rowStandar['standar'].'">'.$rowStandar['standar'].'</option>';
	}
$ret.='</select>';
		echo $ret;
	}
	function getElemen()
	{
		$standar	= $this->input->post('standar');
		$kategori	= $this->input->post('kategori');
		$q = $this->Master_Model->getElemen($standar,$kategori)->result_array();
$ret ='
	Elemen Penilaian
	<select name="idDeskriptor" id="idDeskriptor" class="form-control" onchange="getElemenContent()">
		<option value=""></option>
';
	foreach ($q as $rowDeskriptor) {
		$ret.='<option value="'.$rowDeskriptor['idDeskriptor'].'">'.$rowDeskriptor['butir'].' '.$rowDeskriptor['deskriptor'].'</option>';
	}
$ret.='</select>';
		echo $ret;
	}
	function getElemenContent()
	{
		$idDeskriptor	= $this->input->post('idDeskriptor');
		$this->Master_Model->getElemenContent($idDeskriptor);
	}
	function elemen()
	{
		$data = array();
		$this->template->load('frontend','elemen',$data);
	}
	function deskriptor()
	{
		$data = array();
		$this->template->load('frontend','deskriptor',$data);
	}
	function pengguna()
	{
		$data = array();
		$this->template->load('frontend','pengguna',$data);
	}
	function getDataPengguna()
	{
		$q = $this->input->post('q');
        $order      = $this->input->post('order') ? $this->input->post('order') : 'asc';
        $sort       = $this->input->post('sort') ? $this->input->post('sort')   : 'fullname';
        $page       = $this->input->post('page') ? $this->input->post('page')   : 1;
        $rows       = $this->input->post('rows') ? $this->input->post('rows')   : 10;
        $offset     = ($page - 1) * $rows;
        header("Content-Type: application/json");
		$this->Master_Model->getDataPengguna($rows, $offset, $sort, $order, $q);
	}
	function getDataElemen()
	{
		$q = $this->input->post('q');
        $order      = $this->input->post('order') ? $this->input->post('order') : '';
        $sort       = $this->input->post('sort') ? $this->input->post('sort')   : 'a.idKategori ASC, a.standar ASC, a.noUrut ASC';
        $page       = $this->input->post('page') ? $this->input->post('page')   : 1;
        $rows       = $this->input->post('rows') ? $this->input->post('rows')   : 10;
        $offset     = ($page - 1) * $rows;
        header("Content-Type: application/json");
		$this->Master_Model->getDataElemen($rows, $offset, $sort, $order, $q);
	}
	function getDataDeskriptor()
	{
		$q = $this->input->post('q');
        $order      = $this->input->post('order') ? $this->input->post('order') : '';
        $sort       = $this->input->post('sort') ? $this->input->post('sort')   : 'b.idKategori ASC, b.standar ASC, b.noUrut ASC';
        $page       = $this->input->post('page') ? $this->input->post('page')   : 1;
        $rows       = $this->input->post('rows') ? $this->input->post('rows')   : 10;
        $offset     = ($page - 1) * $rows;
        header("Content-Type: application/json");
		$this->Master_Model->getDataDeskriptor($rows, $offset, $sort, $order, $q);
	}
	function register()
	{
		$data['idUser']		 	= $this->Master_Model->getNewIDuser();
		$data['identityNo'] 	= $this->input->post('identityNo');
		$data['fullname']	 	= $this->input->post('fullname');
		$data['occupation']	 	= $this->input->post('occupation');
		$data['email']		 	= $this->input->post('email');
		$data['address']	 	= $this->input->post('address');
		$data['idGender']	 	= $this->input->post('gender');
		$data['password']	 	= $this->input->post('password');
		// $valKTP = $this->Home_Model->validate("master_user","identityNo",$data['identityNo']);
		// if ($valKTP > 0) {
			// $this->output->set_output(json_encode(array('msg'=>"Data dengan Nomor Identitas <strong>".$data['identityNo']."</strong> telah ada di dalam sistem.")));
		// }else{
			$this->Master_Model->register($data);
		// }
	}
	function validate()
	{
		$table = $this->input->post('table');
		$field = $this->input->post('field');
		$value = $this->input->post('value');
		$this->Master_Model->validate($table,$field,$value);
	}
	function getNewIDuser()
	{
		$this->Master_Model->getNewIDuser();
	}
}