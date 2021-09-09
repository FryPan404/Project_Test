<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('M_Siswa');
    }

    public function index(){
        if ($this->session->userdata('level')=='admin') {
            
        $this->load->view('template/header');  
        // $this->load->view('template/sidebar');  
        $this->load->view('admin/index');
        // $this->load->view('template/footer');
        }else{
            $this->load->view('error');   
        }
    }

    public function password_reset(){
        if ($this->session->userdata('level')=='admin') {
            
            $this->load->view('template/header');  
            // $this->load->view('template/sidebar');  
            $this->load->view('admin/password_reset');
            // $this->load->view('template/footer');
            }else{
                $this->load->view('error');   
            }
    }

    public function siswa(){
        if ($this->session->userdata('level')=='admin') {
            
            $this->load->view('template/header');  
            // $this->load->view('template/sidebar');  
            $this->load->view('admin/data_siswa');
            // $this->load->view('template/footer');
            }else{
                $this->load->view('error');   
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
            $row[] = '<Button class="btn btn-secondary btn-edit" data-id="'.$customer->Id.'" data-reg_number="'.$customer->reg_number.'" data-name="'.$customer->name.'" data-class="'.$customer->class.'" data-major="'.$customer->major.'">Edit</Button> '.'<Button class="btn btn-danger btn-delete" data-reg_number="'.$customer->reg_number.'" data-id="'.$customer->Id.'" >Delete</Button>' ;
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

    public function edit(){
            $data = [
                'reg_number' => $this->input->post('reg_number'),
                'name'    => $this->input->post('name'),
                'class'    => $this->input->post('class'),
                'major'    => $this->input->post('major'),
            ];
            $data1 = [
                'reg_number' => $this->input->post('reg_number'),
                'name'    => $this->input->post('name')
            ];
            $where = $this->input->post('id');
            $this->db->where('Id',$where);
            $success = $this->db->update('tbl_student',$data);
            if ($success) {
                echo '1';
            } else {
                echo '0';
            }
            
            
            // $where1 = $this->input->post('reg_number');
            // $this->db->where('reg_number',$where1);
            // $this->db->update('tbl_users',$data1);
            
    
    }

    public function add(){
        // $this->form_validation->set_rules('reg_number','No Induk','required|trim|is_unique[tbl_users.reg_number]',[
		// 	'is_unique' => 'This No Induk has already registered!'
		// ]);
        // $this->form_validation->set_rules('reg_number','No Induk','required|trim|is_unique[tbl_student.reg_number]',[
		// 	'is_unique' => 'This No Induk has already registered!'
		// ]);
 
        $data = [
            'reg_number' => $this->input->post('reg_number'),
            'name' => $this->input->post('name'),
            'class' => $this->input->post('class'),
            'major' => $this->input->post('major')
        ];
        $data1 = [
            'name' =>$this->input->post('name'),
            'reg_number'=>$this->input->post('reg_number')
        ];
      if( $this->db->insert('tbl_student',$data)){
        $this->db->insert('tbl_users',$data1);
          echo '1';
      }
      else{
          echo '0';
      }
        
        
    }

    public function delete(){
     
        $where = $this->input->post('id_mhs');
        $this->db->where('Id',$where);       
        if ($this->db->delete('tbl_student')) {
            $where1 = $this->input->post('nim');
            $this->db->where('reg_number',$where1);
           if ( $this->db->delete('tbl_users')) {
               echo '1';
           } else {
               echo '0';
           }
        } else {
            echo '0';
        }
        
        
    }
    
    public function excel(){
        $data['student'] = $this->M_Siswa->show_data('tbl_student')->result();
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
        $object = new PHPExcel();
		$object->getProperties()->setCreator("Frypan");
		$object->getProperties()->setLastModifiedBy("Frypan");
		$object->getProperties()->setTitle("Daftar Mahasiswa");
		$object->setActiveSheetIndex(0);
		$object->getActiveSheet()->setCellValue('A1','NO');
		$object->getActiveSheet()->setCellValue('B1','Nim');
		$object->getActiveSheet()->setCellValue('C1','Nama');
		$object->getActiveSheet()->setCellValue('D1','Kelas');
		$object->getActiveSheet()->setCellValue('E1','Jurusan');
        $baris = 2;
		$no = 1;
        foreach($data['student'] as $student)
		{
			$object->getActiveSheet()->setCellValue('A'.$baris,$no++);
			$object->getActiveSheet()->setCellValue('B'.$baris,$student->reg_number);
			$object->getActiveSheet()->setCellValue('C'.$baris,$student->name);
			$object->getActiveSheet()->setCellValue('D'.$baris,$student->class);
			$object->getActiveSheet()->setCellValue('E'.$baris,$student->major);
			$baris++;
		}
        $filename = "Data Mahasiswa".'.xlsx';
		$object->getActiveSheet()->SetTitle("Data Mahasiswa");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$writer=PHPExcel_IOFactory::createWriter($object,'Excel2007');
		$writer->save('php://output');
		exit;
    }
    public function pdf()
	{
		$this->load->library('dompdf_gen');
		$data['student'] = $this->M_Siswa->show_data('tbl_student')->result();
		$this->load->view('laporan_pdf',$data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size,$orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan.pdf",array ('attachment'=>0));
	}

    public function reset_pass(){
        $list = $this->M_Siswa->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customer) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customer->reg_number;
            $row[] = $customer->name;
            $row[] = $customer->class;
            $row[] = $customer->major;
            $row[] = '<Button class="btn btn-secondary btn-reset" data-id="'.$customer->Id.'" data-reg_number="'.$customer->reg_number.'" data-name="'.$customer->name.'" data-class="'.$customer->class.'" data-major="'.$customer->major.'">Reset</Button> ' ;
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
    public function reset(){       
        $data = [
            'password' => password_hash($this->input->post('pass'),PASSWORD_DEFAULT)

        ];
        $where = $this->input->post('id');
            $this->db->where('reg_number',$where);
        if(  $this->db->update('tbl_users',$data)){
            echo '1';
        }else{
            echo '2';
        }
    }
 

}