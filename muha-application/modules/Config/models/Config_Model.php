<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_Model extends CI_Model {
	function getConfig()
	{
		$q = $this->db->get_where('core_company',array('idCompany'=>1));
		return $q->row();
	}
	function saveConfig($data)
	{
        $q = $this->db->insert('core_company',$data);
        if ($q) {
            $this->session->set_flashdata('bgcolor','bg-success');
            $this->session->set_flashdata('message','Data telah berhasil disimpan');
        }else{
            $this->session->set_flashdata('bgcolor','bg-danger');
            $this->session->set_flashdata('message','Data tidak berhasil disimpan');
        }
	}
	function getContents($shortcutURL)
	{
		$this->db->join('master_user AS b','a.idUser=b.idUser','LEFT');
		$q = $this->db->get_where('front_contents AS a',array('a.shortcutURL'=>$shortcutURL));
		return $q;
	}
	function getImages($shortcutURL)
	{
		$q = $this->db->get_where('images',array('shortcutURL'=>$shortcutURL));
		if ($q->num_rows() > 0) {
			$return = '';
			foreach ($q->result_array() as $rowImgs) {
				$return.= '<img src="'.base_url().$rowImgs['imageURL'].'" style="width:100px;height:30px;border:1px solid gray;">';
			}
			return $return;
		}else{
			return "Belum ada gambar";
		}
	}
}
?>