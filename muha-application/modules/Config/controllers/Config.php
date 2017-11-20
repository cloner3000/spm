<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Config_Model');
	}
	public function index()
	{
		// echo $_SERVER['DOCUMENT_ROOT'];
		if ($this->input->post('submit')) {
			$config['upload_path'] = 'muha-assets/img/';
	        // $config['max_size'] = '3000';
	        $config['file_name'] = 'logo';
	        $config['overwrite'] = TRUE;
	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);
	        $this->upload->set_allowed_types('*');
	        if (!$this->upload->do_upload('file')) {
	            $this->session->set_flashdata('bgcolor','bg-danger');
	            $this->session->set_flashdata('message',$this->upload->display_errors());
	        }else{
	        	// $imgLoc = $this->db->get_where('core_company',array('idCompany'=>1))->row()->logo;
				// unlink($imgLoc);
		        $this->db->delete('core_company',array('idCompany'=>1));

	            $file = $this->upload->data();
	            $data['logo']   		= $config['upload_path'].$file['file_name'];
				$data['company']		= $this->input->post('company');
				$data['address']		= $this->input->post('address');
				$data['phone']			= $this->input->post('phone');
				$data['email']			= $this->input->post('email');
				$data['updateDate']		= date('Y-m-d H:i:s');

	            $this->Config_Model->saveConfig($data);
	        }
			
			// $data['logo']			= $this->input->post('logo');
		}

		$value = $this->Config_Model->getConfig();
		$data['company']	= $value->company ? $value->company : '';
		$data['address']	= $value->address ? $value->address : '';
		$data['phone']		= $value->phone ? $value->phone : '';
		$data['email']		= $value->email ? $value->email : '';
		$data['logo']		= $value->logo ? $value->logo : '';
		$this->template->load('frontend','sys_config_view',$data);
	}
	function contents($shortcutURL='')
	{
		$q = $this->Config_Model->getContents($shortcutURL);
		if ($q->num_rows() > 0) {
			$rowContent = $q->row();
			$data['shortcutURL']= $shortcutURL;
			$data['title']		= $rowContent->title;
			$data['contents']	= $rowContent->contents;
			$data['template']	= $rowContent->template;
			$data['lastUpdated']= $rowContent->lastUpdated;
			$data['fullname']	= $rowContent->fullname;
			$data['imgs']		= $this->Config_Model->getImages($shortcutURL);
		}else{
			if ($this->input->post('submit')) {		
				$shortcutURL		= $this->input->post('shortcutURL');
				$data['title']		= $this->input->post('title');
				$data['contents']	= $this->input->post('contents');
				$data['template']	= $this->input->post('template');
				$data['lastUpdated']= date('Y-m-d H:i:s');
				$data['idUser']		= $this->session->userdata('idUser');
	            $this->Config_Model->saveContent($shortcutURL,$data);
			}
			$data['shortcutURL']= '';
			$data['title']		= '';
			$data['contents']	= '';
			$data['template']	= '';
			$data['lastUpdated']= '';
			$data['fullname']	= '';
			$data['imgs']		= '';
		}
		if ($shortcutURL) {
			$data['disabled']	= 'readonly';
		}else{
			$data['disabled']	= '';
		}
		$data['getAllTemplate']	= $this->Config_Model->getAllTemplate();
		$this->template->load('frontend','mgt_contents_view',$data);
	}
	function getGambarByIdDeskriptor($shortcutURL)
	{
		$this->Config_Model->getImages($shortcutURL);
	}
}
