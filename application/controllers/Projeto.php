<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto extends CI_Controller {

	#Index do controller
	public function index() {
	   //Sempre adicionar variaveis no vetor de $data
	   // $data['msg']='Este é a mensagem do controller Teste!';
	   //Carrega a view
	   //$this->load->view('usuario'); 
	 }
	
	#Cria um novo projeto
	public function cadastrar(){
	
		//Recebe os dados do formulario
		$codigo = (empty($_POST['codigo'])) ? '' : $_POST['codigo'];
		$nome = (empty($_POST['nome'])) ? '' : $_POST['nome'];
		$categoria = (empty($_POST['categoria'])) ? '' : $_POST['categoria'];
		$duracao = (empty($_POST['duracao'])) ? '' : $_POST['duracao'];
		$valor = (empty($_POST['valor'])) ? '' : $_POST['valor'];
		$status = (empty($_POST['status'])) ? '' : $_POST['status'];
		
		if(isset($_POST)){
			//Carrega a model
			$this->load->model('projeto_model');
				
			//Cria um novo projeto com os dados do POST
			$projeto = new Projeto_model($codigo,$nome,$categoria,$duracao,$valor,$status);
			
			//Insere o projeto no banco
			$projeto->insert();
		}
		
		//Carrega a view 
		$this->load->view('CRUD_projeto/addPROJETO'); 
	}
	
	#Lista os projetos
	public function consultar(){
		
		//Recebe o filtro
		$codigo = (empty($_POST['codigo'])) ? '' : $_POST['codigo'];
		$nome = (empty($_POST['nome'])) ? '' : $_POST['nome'];
		$categoria = (empty($_POST['categoria'])) ? '' : $_POST['categoria'];
				
		//Carrega a model
		$this->load->model('projeto_model');
			
		//Cria um novo objeto projeto
		$projeto = new Projeto_model();
		
		//$consulta o projeto
		$data['projeto']=$projeto->select($codigo,$nome,$categoria);
		
		var_dump($data['projeto']->result());
			
		//Carrega a view 
		//$this->load->view('CRUD_projeto/projeto',$data); 
	}
	
	#Altera o projeto
	public function alterar(){
	
		//Recebe os dados do formulario
		$codigo = (empty($_POST['codigo'])) ? '2' : $_POST['codigo'];
		$nome = (empty($_POST['nome'])) ? 'c' : $_POST['nome'];
		$categoria = (empty($_POST['categoria'])) ? 'c' : $_POST['categoria'];
		$duracao = (empty($_POST['duracao'])) ? '13' : $_POST['duracao'];
		$valor = (empty($_POST['valor'])) ? 'c' : $_POST['valor'];
		$status = (empty($_POST['status'])) ? 'c' : $_POST['status'];
		
		//Carrega a model
		$this->load->model('projeto_model');
			
		//Cria um novo projeto com os dados do POST
		$projeto = new Projeto_model(NULL,$nome,$categoria,$duracao,$valor,$status);
		
		//Atualiza o usuario no banco
		var_dump($projeto);
		$projeto->update($codigo);
		
		//Carrega a view 
		//$this->load->view('CRUD_projeto/projeto'); 
	}
	
	#Deletea o projeto 
	public function remover(){
		
		//Recebe os dados do formulario
		$codigo = (empty($_POST['codigo'])) ? '' : $_POST['codigo'];
		
		//Carrega a model
		$this->load->model('projeto_model');
			
		//Cria um novo objeto projeto
		$projeto = new Projeto_model($codigo);
		
		//Remove o projeto do banco
		$projeto->remove($codigo);
		
	    //Carrega a view 
		//$this->load->view('CRUD_projeto/projeto'); 
	}

}