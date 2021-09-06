<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class notfound extends CI_Controller {
   
    public function index(){
        $this->load->view('error404.php');
    }
}