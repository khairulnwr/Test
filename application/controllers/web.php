<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('m_data');
	}


	public function index(){
		$data['judul'] = "Halaman depan";
        $this->load->view('v_header', $data);
        $this->load->view('v_index', $data);
	}

    public function about(){
        $data['judul'] = "Halaman about";
        $this->load->view('v_header', $data);
        $this->load->view('v_index', $data);
        $data['user'] = $this->m_data->tampil_data()->result();
        //$this->load->view('v_input');
        $this->load->view('v_tampil.php', $data);
        $this->load->view('v_footer', $data);
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

   function hapus($id){
        $where = array('id' => $id);
        $this->m_data->hapus_data($where,'user');
        redirect('web/about');
   }


   function edit($id){
        $where = array('id' => $id);
        $data['user'] = $this->m_data->edit_data($where,'user')->result();
        $this->load->view('v_edit',$data);
   }

   
   function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
	    $pekerjaan = $this->input->post('pekerjaan');

        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );

        $where = array(
            'id' => $id
        );

        $this->m_data->update_data($where,$data,'user');
        redirect('web/about');
   }


}
 