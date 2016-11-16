<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		
		$filtro['status'] = 'aprovado';
				
		//Carrega a model
		$this->load->model('projeto_model');
			
		//Cria um novo objeto projeto
		$projeto = new Projeto_model();
		
		//$consulta o projeto
		$data['projetos']=$projeto->select($filtro);
				
		//Carrega a index do site
		$this->load->view('home.php',$data);
	}
}
