<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		//Carrega a index do site
		$this->load->helper('url');
		$this->load->view('home.php');
	}
}