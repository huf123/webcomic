<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function login()
	{
		$data['role'] = 1;
		if($this->session->userdata('fullname')){
			redirect(base_url('dashboard'),'refresh');
		}else{
			$this->load->view('signin',$data);
		}
	}
	public function logging()
	{
		$data = array(
			"uname" => $this->input->post('uname'),
			"upwd" => md5($this->input->post('upwd')),
			"role" => 1);
		$row = $this->db->get_where('ta_user',$data,1)->row();
		if($row){
			$this->session->set_userdata('fullname',$row->fullname);
			$this->session->set_userdata('uid',$row->uid);
			redirect(base_url('dashboard'),'refresh');
			// var_dump($row);
		}else{
			redirect(base_url('auth/login'),'refresh');
			// var_dump($row);
		}
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */