<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content_Model extends CI_Model {
	function getContent($shortcutURL)
	{
		$this->db->join('master_user AS b','a.idUser=b.idUser','LEFT');
		$q = $this->db->get_where('front_contents AS a',array('a.shortcutURL'=>$shortcutURL));
		return $q;
	}
	function getContentImages($shortcutURL)
	{
		$q = $this->db->get_where('images',array('shortcutURL'=>$shortcutURL));
		return $q->result_array();
	}
	function uploadGambar($data)
	{
		$q = $this->db->insert('images',$data);
		if (!$q) {
			echo "Terjadi kesalahan saat penambahan data";
		}
	}
	function getTotalSkor($idKategori)
	{
		$this->db->select('SUM(a.skor) AS totalSkor');
		$this->db->join('master_elemen AS b','a.idElemen=b.idElemen','LEFT');
		$q = $this->db->get_where('master_deskriptor AS a',array('b.idKategori'=>$idKategori));
		return $q->row();
		// echo $this->db->last_query();
	}
	function saveBorang($idDeskriptor,$data)
	{
		$this->db->where('idDeskriptor',$idDeskriptor);
		$q = $this->db->update('master_deskriptor',$data);
		if ($q) {
            $this->session->set_flashdata('bgcolor','bg-success');
            $this->session->set_flashdata('message','Data telah berhasil disimpan');
        }else{
            $this->session->set_flashdata('bgcolor','bg-danger');
            $this->session->set_flashdata('message','Data tidak berhasil disimpan');
        }
	}
}
?>