<?php
 defined('BASEPATH') or exit('No direct script access allowed');
class M_Siswa extends CI_Model {
    var $table = 'tbl_student';
    var $column_order = array(null,'reg_number','name','class','major');
    var $column_search = array ('reg_number','name','class','major');
    var $order = array('Id' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function update_student($data,$where){
        $this->db->where('Id',$where);
        $success = $this->db->update('tbl_student',$data);
        if ($success) {
            return '1';
        } else {
            return '0';
        }
    }
   public function show_data(){
    return $this->db->get('tbl_student');
   }

   public function delete($where){
    $this->db->where('Id',$where);       
    if ($this->db->delete('tbl_student')) {
        $where1 = $this->input->post('nim');
        $this->db->where('reg_number',$where1);
       if ( $this->db->delete('tbl_users')) {
           return '1';
       } else {
           return '0';
       }
    } else {
        return '0';
    }
   }

   public function add($data){
    if( $this->db->insert('tbl_student',$data)){
          return '1';
      }
      else{
          return '0';
      }
   }

   public function pass_reset($data,$where){
    $this->db->where('reg_number',$where);
    if(  $this->db->update('tbl_users',$data)){
        echo '1';
    }else{
        echo '2';
    }
   }
 
}