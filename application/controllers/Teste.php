<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {

	#Index do controller
	public function index() {
	   //Sempre adicionar variaveis no vetor de $data
	   $data['msg']='Este é a mensagem do controller Teste!';
	   
	   //Carrega a view
	   $this->load->view('view_teste',$data); 
	 }
	
	#Metodo de teste que recebe parâmetros
	public function adicionar($valor='valor'){
		//https://crowfouding-kayquewilly.c9users.io/teste/adicionar/valor
		echo $valor;	
	}
	
	#Insere valor no banco com a model
	public function insert($nome,$descricao){
	   //Carrega a model
	   $this->load->model('model_teste');
	   
	   //Cria um novo objeto da model
	   $model_teste = new model_teste($nome,$descricao);
	   
	   //Chama o metodo de insersão da model
	   $model_teste->insert();
	   
	   //Sempre adicionar variaveis no vetor de $data
	   $data['msg']='Metodo que utiliza a model!';
	   
	   //Carrega a view
	   $this->load->view('view_teste',$data); 
	} 
	
	//------------------------------METODO DO FORMULARIO DE TESTE-------------------------------
	public function metodoForm(){
	   //Debug do post do form
	   var_dump($_POST);
	  
	   //Carrega a view
	   //$this->load->view('form',$data); 
	   $this->load->view('form'); 
	  
	}
	
}
