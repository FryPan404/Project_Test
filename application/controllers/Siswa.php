<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Siswa extends CI_Controller {
    public function index(){
        if ($this->session->userdata('level')=='admin') {
            $this->load->view('error');
        }else{
        $this->load->view('template/header');  
        // $this->load->view('template/sidebar');  
        $this->load->view('siswa/index');
        $this->load->view('template/footer'); 
        }  
    }
    public function datasiswa(){
        if ($this->session->userdata('level')=='admin') {
            
            $this->load->view('error');  
            }else{
               
                $this->load->view('template/header');  
                // $this->load->view('template/sidebar');  
                $this->load->view('siswa/data_siswa');
                // $this->load->view('template/footer');
            }
    }

    public function ajax_list()
    {
        $list = $this->M_Siswa->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customer) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] =  $customer->reg_number;
            $row[] = $customer->name;
            $row[] = $customer->class;
            $row[] = $customer->major;
            $data[] = $row; 
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->M_Siswa->count_all(),
                        "recordsFiltered" => $this->M_Siswa->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
}