<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        $this->load->view('login');
    }

    public function register(){
        $this->form_validation->set_rules('name','Nama','required|trim');
        $this->form_validation->set_rules('reg_number','No Induk','required|trim|is_unique[tbl_users.reg_number]',[
			'is_unique' => 'This No Induk has already registered!'
		]);
		$this->form_validation->set_rules('password','Password','required|trim|min_length[3]',[
			'min_length' => 'Password to short!'
		]);

        if ($this->form_validation->run() == false) {
            $this->load->view('register');
        } else {
            $data = [
                'name' => ($this->input->post('name',true)),

                'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                
                'reg_number' => ($this->input->post('reg_number',true)),
                
                'level' => ($this->input->post('level'))
                
            ];
            $this->db->insert('tbl_users',$data);
            redirect('auth/index');
        }
        
    }

    public function login()
    {
        $this->form_validation->set_rules('reg_number','No Induk','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run() == false){	
		$this->load->view('login');
        }else{
            $this->_valid();
        }
    }

    public function _valid()
    {
        $reg_number = $this->input->post('reg_number');
        $password = $this->input->post('password');
        $user = $this->db->get_where('tbl_users',['reg_number' => $reg_number])->row_array();
        $level = 'admin';
        

        if ($user) {

            if($user['level'] =='admin'){
            
                if (password_verify($password, $user['password'])) {
                     $data = [
                         'level' =>$user['level']
                     ];
                     $this->session->set_userdata($data);
                     if ($user['level'] == 'admin') {
                         redirect('admin/index');
                     } else {
                         redirect('siswa/index');
                
            }
                
            } else {
                $this->session->set_flashdata('message','<font color="red">Password Salah!</font>');
                redirect('auth/login');
            }
        }else {
            if($user['login_attemp'] > 0){
            if (password_verify($password, $user['password'])) {
                $data = [
                    'level' =>$user['level']
                ];
                $this->session->set_userdata($data);
                if ($user['level'] == 'admin') {
                    redirect('admin/index');
                } else {
                    $attemp = ['login_attemp' =>5];
                    $this->db->where('reg_number',$reg_number);
                   $this->db->update('tbl_users',$attemp);
                    redirect('siswa/index');
                   }
           
             } else {
                $attemp = ['login_attemp' =>$user['login_attemp'] - 1];
                $this->db->where('reg_number',$reg_number);
               $this->db->update('tbl_users',$attemp);
              $this->session->set_flashdata('message','<font color="red">Password  Salah!</font>');
              redirect('auth/login');
              
                 }
                }else{
                    $this->session->set_flashdata('message','<font color="red">User Tidak Aktif!!</font>');
              redirect('auth/login');
                }
        }
            
        } else {
            $this->session->set_flashdata('message','<font color="red">User Tidak Terdaftar!</font>');
			redirect('auth/login');
        }
        
    }
    public function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}

}