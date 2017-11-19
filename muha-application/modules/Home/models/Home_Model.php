<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Model extends CI_Model {
	function validate_login($data)
	{
		$q = $this->db->get_where('master_user',array('username'=>$data['username'],'password'=>$data['password']));
		// echo $this->db->last_query();
		// exit;
		if ($q->num_rows() == 1 && $q->row()->status == 1) {
			$a = $q->row();
			$sess['logged']			= TRUE;
			$sess['idUser']			= $a->idUser;
			$sess['noKTP']			= $a->noKTP;
			$sess['idLevel']		= $a->idLevel;
			$sess['fullname']		= $a->fullname;
			$this->session->set_userdata($sess);
			// print_r($sess);
			// exit;
			if ($sess['idLevel'] == 3) {
				redirect(base_url('SPME/borang'));
			}else{
				redirect(base_url());
			}
		}else if($q->num_rows() == 1 && $q->row()->status == 0){
			return "Akun <strong>".$q->row()->fullname."</strong> belum diverifikasi.";
		}else{
			return "Kombinasi Username dan Password tidak tepat.";
		}
	}
	function validate($table,$field,$value)
	{
		return $this->db->get_where($table,array($field=>$value))->num_rows();
	}
	function getNewIDuser()
	{
		$this->db->like('idUser',date('Ym'));
		$this->db->order_by('idUser','DESC');
		$this->db->limit(1);
		$q = $this->db->get('master_user');
		if ($q->num_rows() >= 1) {
			return $q->row()->idUser+1;
		}else{
			return date('Ym').'0001';
		}
	}
	function register($data)
	{
		$data['idLevel']	= 4;
		$data['regdate']	= date('Y-m-d');
		$data['modifyDate']	= date('Y-m-d');
		$data['statNote']	= md5($data['idUser']);
		$q = $this->db->insert('master_user',$data);
	}
}
?>