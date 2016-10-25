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
		if(isset($_POST)){
			$codigo = $_POST['codigo'];
			$nome=$_POST['nome'];
			$categoria= $_POST['categoria'];
			$duracao= $_POST['duracao'];
			$valor= $_POST['valor'];
			$status=$_POST['status'];
		
			//Carrega a model
			$this->load->model('projeto');
			
			//Cria um novo usuario com os dados do POST
			$projeto = new projeto($codigo,$nome,$categoria,$duracao,$valor,$status);
		
			//Insere o usuario no banco
			$projeto->insert();
		}
		
		//Carrega a view 
		$this->load->view('projeto'); 
	}
	
	#Lista os projetos
	public function consultar(){
		
		//Recebe o filtro
		if(isset($_POST)){
			$codigo = $_POST['codigo'];
			$nome = $_POST['nome'];
			$categoria = $_POST['categoria'];
				
			//Carrega a model
			$this->load->model('projeto');
			
			//Cria um novo objeto projeto
			$projeto = new projeto();
		
			//Insere o projeto no banco
			$data['projeto']=$projeto->select($codigo,$nome,$categoria);
			
			//Carrega a view 
			$this->load->view('projeto',$data); 
		}
	}
	
	#Altera o projeto
	public function alterar(){
	
		//Recebe os dados do formulario
		if(isset($_POST)){
			
			$codigo = $_POST['codigo'];
			$nome=$_POST['nome'];
			$categoria= $_POST['categoria'];
			$duracao= $_POST['duracao'];
			$valor= $_POST['valor'];
			$status=$_POST['status'];
		
			//Carrega a model
			$this->load->model('projeto');
			
			//Cria um novo projeto com os dados do POST
			$projeto = new projeto($nome,$categoria,$duracao,$valor,$status);
		
			//Atualiza o usuario no banco
			$projeto->update($codigo);
		}
		//Carrega a view 
		$this->load->view('projeto'); 
	}
	
	#Deletea o projeto 
	public function deletar(){
		
		//Recebe os dados do formulario
		if(isset($_POST)){
			$codigo = $_POST['codigo'];
		
			//Carrega a model
			$this->load->model('projeto');
			
			//Cria um novo usuario com os dados do POST
			$projeto = new projeto($codigo);
		
			//Remove o usuario do banco
			$projeto->remove($login);
		}
		
	    //Carrega a view 
		$this->load->view('projeto'); 
	}

}