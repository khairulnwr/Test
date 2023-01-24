<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belajar extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('html');
	}


	public function index(){
		echo "ini method index pada control belajar";
	}


	public function halo()
	{
			$data = array (
				'judul' => "Cara Membuat View Pada Codeigniter",
				'tutorial' => "Codeigniter"
			);
		$this->load->view('view_belajar', $data);
	}
	

	public function helper()
	{
		$this->load->view('view_belajar_helper');
	}

}
