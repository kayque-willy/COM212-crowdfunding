<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$this->load->model('financiamento_model');
		$financiamento = new Financiamento_model();
		$financiamento->relatorio();
		
		//Carrega a index do site
		$this->load->view('home.php');
	}
}
