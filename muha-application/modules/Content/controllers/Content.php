<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Content_Model');
		$this->load->model('master/Master_Model');
	}
	public function index()
	{
		$shortcutURL 		= $this->input->get('page') ? $this->input->get('page') : 'home';
		$getContent			= $this->Content_Model->getContent($shortcutURL);
		if ($getContent->num_rows() == 1) {
			$valContent = $getContent->row();
			$data['shortcutURL']= $valContent->shortcutURL;
			$data['title']		= $valContent->title;
			$data['contents']	= $valContent->contents;
			$data['template']	= $valContent->template;
			$data['lastUpdated']= $valContent->lastUpdated;
			$data['fullname']	= $valContent->fullname;
			$data['images']		= $this->Content_Model->getContentImages($shortcutURL);
			$template = 'content-template'.$data['template'];
			$this->template->load('frontend',$template,$data);
		}else{
			$data['heading']	= 'Halaman tidak ditemukan<br>';
			$data['message']	= 'Maaf, alamat yang anda tuju salah. Mohon periksa kembali.';
			$this->template->load('frontend','errors/cli/error_404',$data);
		}
	}
	function penilaian()
	{
		$data['kategori']		= $this->Master_Model->getKategori()->result_array();
		$data['standar']		= $this->Master_Model->getStandar()->result_array();
		if ($this->input->post('submit')) {
			$idDeskriptor			= $this->input->post('idDeskriptor');
			$data2['response']		= $this->input->post('response');
			$data2['skor']			= $this->input->post('skor');
			$this->Content_Model->saveBorang($idDeskriptor,$data2);
		}
		$this->template->load('frontend','isi_borang',$data);
	}
	function saveBorang()
	{
		$idDeskriptor			= $this->input->post('idDeskriptor');
		$data['response']		= $this->input->post('response');
		$data['skor']			= $this->input->post('skor');
		$this->Content_Model->saveBorang($idDeskriptor,$data);
	}
	function getTotalSkor()
	{
		$idKategori = $this->input->post('kategori');
		echo $this->Content_Model->getTotalSkor($idKategori)->totalSkor;
	}
	function uploadGambar()
	{
		$config['upload_path'] = 'muha-assets/img/contents/';
        // $config['max_size'] = '3000';
        // $config['file_name'] = 'logo';
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->set_allowed_types('*');
        if (!$this->upload->do_upload('file')) {
            echo $this->upload->display_errors();
        }else{
        	// $imgLoc = $this->db->get_where('core_company',array('idCompany'=>1))->row()->logo;
			// unlink($imgLoc);
	        // $this->db->delete('core_company',array('idCompany'=>1));

            $file = $this->upload->data();
            $data['imageURL']   	= $config['upload_path'].$file['file_name'];
			$data['description']	= $this->input->post('company');
			$data['shortcutURL']	= $this->input->post('address');
			// $data['updateDate']		= date('Y-m-d H:i:s');

            $this->Content_Model->uploadGambar($data);
        }
	}
}