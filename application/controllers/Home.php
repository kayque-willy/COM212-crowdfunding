<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$this->load->model('financiamento_model');
		$financiamento = new Financiamento_model();
		
		$filtro['data_inicial']='2016-11-01';
		$filtro['data_final']='2016-11-30';
		$filtro['categoria_projeto']='Pesquisa';
		$filtro['soma_categoria']=true;
		
		$financiamento->relatorioCategoria($filtro);
		
		//Carrega a index do site
		$this->load->view('home.php');
	}
}
