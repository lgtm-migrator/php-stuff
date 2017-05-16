<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CNoSeo extends CI_Controller {
	public function index(){
		//Header
		$this->load->view('plantillas/header');
		//Body
		$this->load->view('body');
		//Footer
		$this->load->view('plantillas/footer');
	}
}
?>
