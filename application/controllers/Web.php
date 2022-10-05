<?php  

defined('BASEPATH') or exit ('no redirect script access allowed');

class Web extends CI_Controller{

    function __construct()
    {
        // $this->load->helper('url');
        parent::__construct();
    }

    public function index(){
        $data['judul'] = "Halaman depan";
        $this->load->view('v_header',$data);
        $this->load->view('v_index',$data);
        $this->load->view('v_footer',$data);
    }
    public function about(){
        $data['judul'] = "Halaman About";
        $this->load->view('v_header', $data);
        $this->load->view('v_about', $data);
        $this->load->view('v_footer', $data);
    }
}

?>