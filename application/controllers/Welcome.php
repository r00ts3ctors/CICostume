<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data = array(
			'konten' => 'admin/home' , );
		$this->load->view('template', $data);
	}
}
