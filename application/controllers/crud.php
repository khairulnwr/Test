<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('m_data');
	}


	function tambah(){
        $this->load->view('v_input');
    }

    
    function tambah_aksi(){
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');

        $data = array(
            'nama' =>  $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan

        );

        $this->m_data->input_data($data,'user');
        redirect('web/about');
    }


}
