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
}