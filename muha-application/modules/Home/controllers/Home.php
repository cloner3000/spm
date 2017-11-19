<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Home_Model');
	}
	public function index()
	{
		$this->template->load('frontend','home');
	}
	function login()
	{
		if ($this->session->userdata('logged')) {
			redirect(base_url());
		}else{
			$data['message'] = "";
			if ($this->input->post('submit')) {
				$data['username'] 	= $this->input->post('username');
				$data['password'] 	= $this->input->post('password');
				$q = $this->Home_Model->validate_login($data);
				$data['message']	= $q;
				// exit;
			}
			$this->template->load('frontend','login',$data);
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	function register()
	{
		$out['message'] = "";
		if ($this->input->post('submit')) {

			$data['idUser']		 	= $this->Home_Model->getNewIDuser();
			$data['identityNo'] 	= $this->input->post('identityNo');
			$data['fullname']	 	= $this->input->post('fullname');
			$data['occupation']	 	= $this->input->post('occupation');
			$data['email']		 	= $this->input->post('email');
			$data['address']	 	= $this->input->post('address');
			$data['idGender']	 	= $this->input->post('gender');
			$data['username']	 	= $this->input->post('username');
			$data['password']	 	= $this->input->post('password');


			// Storing submitted values
			$sender_email = "ibnu@psychoseautopsy.com";
			$user_password = "aduh123!@#";
			$subject = "Verifikasi Akun";
			// $message = "<h3>Verifikasi Email untuk akun : ".$data['fullname']."</h3>Klik <a href='".base_url()."/Home/VerifyEmail/".md5($data['idUser'])."'>disini</a> untuk verifikasi Email anda";
			$message = md5($data['idUser']);

			$username = "Psy.A Support";

			// Configure email library
			$config["protocol"] = "smtp";
			$config["smtp_host"] = "mx1.hostinger.co.id";
			// $config["smtp_timeout"] = "7";
			$config["smtp_port"] = 587;
			// $config["charset"]    = "utf-8";
			$config["newline"]    = "\r\n";
			$config["mailtype"] = "text"; // or html
			//$config["validation"] = TRUE; // bool whether to validate email or not
			$config["smtp_user"] = $sender_email;
			$config["smtp_pass"] = $user_password;

			// Load email library and passing configured values to email library
			$this->load->library("email", $config);
			$this->email->set_newline("\r\n");

			// Sender email address
			$this->email->from($sender_email, $username);
			// Receiver email address
			$this->email->to($data['email']);
			// Subject of email
			$this->email->subject($subject);
			// Message in email
			$this->email->message($message);

			$valKTP = $this->Home_Model->validate("master_user","identityNo",$data['identityNo']);
			if ($valKTP > 0) {
				$out['message'] = "Data dengan Nomor Identitas <strong>".$data['identityNo']."</strong> telah ada di dalam sistem.";
			}else{
				$this->Home_Model->register($data);
				if ($this->email->send()) {
					$out['message'] = "Silahkan periksa kontak masuk <strong>".$data['email']."</strong> untuk verifikasi akun anda.";
				} else {
					$out['message'] = "Data anda telah tersimpan dalam sistem. sayangnya Email server tidak dapat diakses untuk saat ini. silahkan hubungi Administrator untuk verifikasi akun.";
				}
			}
		}
		$this->template->load('frontend','register',$out);
	}
	function validate()
	{
		$table = $this->input->post('table');
		$field = $this->input->post('field');
		$value = $this->input->post('value');
		$this->Home_Model->validate($table,$field,$value);
	}
	function getNewIDuser()
	{
		$this->Home_Model->getNewIDuser();
	}
}
