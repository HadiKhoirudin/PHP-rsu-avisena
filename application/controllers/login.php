<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller{
	public function index(){
		$d['title'] = 'Login Multiuser Codeigniter dengan MySql &minus; AneIqbalcom';
		$d['judul'] = 'Login Multiuser Codeigniter dengan Mysql';
		$this->load->view('halaman/login', $d);
	}

	function masuk()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->model_login->cek($username, $password);
		if($cek->num_rows() == 1)
		{
			foreach($cek->result() as $data){
				$sess_data['id_user'] = $data->id;
				$sess_data['username'] = $data->username;
				$sess_data['id_jenis_user'] = $data->akses;
				$sess_data['nama_login'] = $data->nama;
				$this->session->set_userdata($sess_data);
			}

			if($this->session->userdata('id_jenis_user') == 'Admin')
			{
				redirect('./?d=active');
			}
			elseif($this->session->userdata('id_jenis_user') == 'User')
			{
				redirect('./?d=active');
			}
		}
		else
		{
			$this->session->set_flashdata('pesan', 'Maaf, kombinasi username dengan password Anda salah!');
			redirect('login');
		}
	}
}