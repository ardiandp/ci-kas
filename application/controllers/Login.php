<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/*public function __construct(){
		parent::__construct();
		$this->load->model('hitung');
		date_default_timezone_set("Asia/Jakarta");
	}*/

	public function index()
	{
		$data['title'] = 'Login Admin';
		$this->load->view('login', $data);
	}

	public function cek_login()
	{
		
		$username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

            if($user['level'] == 'admin' OR 'user') {
                if($password == $user['password']) {
                    $data = [
                        'username' => $user['username'],
                        'level' => $user['level']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['level'] == 'admin') {
                        redirect('admin');
                    } if ($user['level'] == 'user') {
                        redirect('admin');
                    } else {      
                        redirect('login');
                    }
                } else {      
                    redirect('login');
                }
            } else {      
                redirect('login');
         	}
	}

	public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        redirect('login');
    }

}
