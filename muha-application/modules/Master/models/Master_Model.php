<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_Model extends CI_Model {
	function getKategori()
	{
		$q = $this->db->get('master_kategori');
		return $q;
	}
	function getStandar()
	{
		$this->db->select('standar');
		$this->db->group_by('standar');
		$this->db->order_by('standar');
		$q = $this->db->get('master_elemen');
		return $q;
	}
	function getElemen($standar,$kategori)
	{
		$this->db->select("*,CONCAT(b.standar,'.',b.noUrut,IF(a.noUrut = 0,'',CONCAT('.',a.noUrut))) AS butir");
		$this->db->join('master_elemen AS b','a.idElemen=b.idElemen','LEFT');
		$q = $this->db->get_where('master_deskriptor AS a',array('b.standar'=>$standar,'b.idKategori'=>$kategori));
		return $q;
		// echo $this->db->last_query();
	}
	function getElemenContent($idDeskriptor)
	{
		$this->db->select("*,CONCAT(b.standar,'.',b.noUrut,IF(a.noUrut = 0,'',CONCAT('.',a.noUrut))) AS butir");
		$this->db->join('master_elemen AS b','a.idElemen=b.idElemen','LEFT');
		$q = $this->db->get_where('master_deskriptor AS a',array('a.idDeskriptor'=>$idDeskriptor))->result_array();
		$this->output->set_output(json_encode($q));
		// return $q;
	}
}
?>