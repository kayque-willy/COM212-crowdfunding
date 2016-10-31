<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$this->load->model('Avaliacao_projeto_model');
		$avaliacao = new Avaliacao_projeto_model();
		
		$filtro['categoria_projeto']="Pesquisa";
		
		$avaliacao->select($filtro);
		//Carrega a index do site
		//$this->load->view('home.php');
	}
}
