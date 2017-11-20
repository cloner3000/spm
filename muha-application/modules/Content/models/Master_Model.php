<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_Model extends CI_Model {
	function getKategori()
	{
		$q = $this->db->get('master_kategori');
		return $q;
	}
	function getStandar($kategori='')
	{
		$this->db->select('standar');
		$this->db->group_by('standar');
		$this->db->order_by('standar');
		$q = $this->db->get_where('master_elemen',array('idKategori'=>$kategori));
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
	function getDataPengguna($rows, $offset, $sort, $order, $q)
	{
        $this->db->join('master_gender as b','a.idGender=b.idGender');
        $this->db->like('CONCAT(a.idUser, a.fullname, a.occupation, a.address, a.email, b.gender, a.regdate, a.status)', $q);
        
        $this->db->order_by($sort, $order);
        $this->db->limit($rows, $offset);
        $result['rows']   = $this->db->get('master_user as a')->result();
        // echo $this->db->last_query();
        
        $this->db->join('master_gender as b','a.idGender=b.idGender');
        $this->db->like('CONCAT(a.idUser, a.fullname, a.occupation, a.address, a.email, b.gender, a.regdate, a.status)', $q);
        
        $result['total'] =  $this->db->count_all_results('master_user as a');
        
        $this->output->set_output(json_encode($result));
	}
	function getDataElemen($rows, $offset, $sort, $order, $q)
	{
        $this->db->join('master_kategori as b','a.idKategori=b.idKategori');
        $this->db->like('CONCAT(b.kategori)', $q);
        
        $this->db->order_by($sort, $order);
        $this->db->limit($rows, $offset);
        $result['rows']   = $this->db->get('master_elemen as a')->result();
        // echo $this->db->last_query();
        
        $this->db->join('master_kategori as b','a.idKategori=b.idKategori');
        $this->db->like('CONCAT(b.kategori)', $q);
        
        $result['total'] =  $this->db->count_all_results('master_elemen as a');
        
        $this->output->set_output(json_encode($result));
	}
	function getDataDeskriptor($rows, $offset, $sort, $order, $q)
	{
		$this->db->select("*,CONCAT(b.standar,'.',b.noUrut,IF(a.noUrut = 0,'',CONCAT('.',a.noUrut))) AS butir");
        $this->db->join('master_elemen as b','a.idElemen=b.idElemen');
        $this->db->join('master_kategori as c','b.idKategori=c.idKategori');
        $this->db->like('CONCAT(a.deskriptor,b.elemen)', $q);
        
        $this->db->order_by($sort, $order);
        $this->db->limit($rows, $offset);
        $result['rows']   = $this->db->get('master_deskriptor as a')->result();
        // echo $this->db->last_query();
        
        $this->db->join('master_elemen as b','a.idElemen=b.idElemen');
        $this->db->join('master_kategori as c','b.idKategori=c.idKategori');
        $this->db->like('CONCAT(a.deskriptor,b.elemen)', $q);
        
        $result['total'] =  $this->db->count_all_results('master_deskriptor as a');
        
        $this->output->set_output(json_encode($result));
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
		$q = $this->db->get('master_user')->row();
		return $q->idUser+1;
	}
	function register($data)
	{
		$data['idLevel']	= 2;
		$data['regdate']	= date('Y-m-d');
		$data['modifyDate']	= date('Y-m-d');
		$data['statNote']	= md5($data['idUser']);
		$q = $this->db->insert('master_user',$data);
		if ($q) {
			// $this->output->set_output(json_encode(array('success'=>true)));
			redirect(base_url('Master/pengguna'));
		}else{
			// $this->output->set_output(json_encode(array('msg'=>"Data dengan Nomor Identitas <strong>".$data['identityNo']."</strong> telah ada di dalam sistem.")));
		}
	}
}
?>