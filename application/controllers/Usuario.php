<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	#Index do controller
	public function index() {
	   //Sempre adicionar variaveis no vetor de $data
	   // $data['msg']='Este é a mensagem do controller Teste!';
	   //Carrega a view
	   //$this->load->view('usuario'); 
	 }
	
	#Cria um novo usuario no banco
	public function cadastrar(){
	
		//Recebe os dados do formulario
		if(isset($_POST)){
			$login = $_POST['login'];
			$senha=$_POST['senha'];
			$nome=$_POST['nome'];
			$cpf=$_POST['cpf'];
			$pais= $_POST['pais'];
			$cidade= $_POST['cidade'];
			$estado= $_POST['estado'];
			$endereco=$_POST['endereco'];
			$data_nascimento=$_POST['data_nascimento'];
			$email= $_POST['email'];
			$tipo=$_POST['tipo'];
			$categoria=$_POST['categoria'];
			$del=$_POST['del'];
				
			//Carrega a model
			$this->load->model('usuario');
			
			//Cria um novo usuario com os dados do POST
			$usuario = new usuario($login,$senha,$cpf,$pais,$cidade,$estado,$endereco,$data_nascimento,$email, $tipo,$categoria,$del);
		
			//Insere o usuario no banco
			$usuario->insert();
		}
		
		//Carrega a view 
		$this->load->view('usuario'); 
	}
	
	#Consultar
	public function consultar(){
		
		//Recebe o filtro
		if(isset($_POST)){
			$login = $_POST['login'];
			$nome = $_POST['nome'];
			$del = $_POST['del'];
				
			//Carrega a model
			$this->load->model('usuario');
			
			//Cria um novo objeto usuario
			$usuario = new usuario();
		
			//Insere o usuario no banco
			$data['usuario']=$usuario->select($login,$nome,$del);
			
			//Carrega a view 
			$this->load->view('usuario',$data); 
		}
	}
	
	#Cria um novo usuario no banco
	public function alterar(){
	
		//Recebe os dados do formulario
		if(isset($_POST)){
			$login = $_POST['login'];
			$senha=$_POST['senha'];
			$pais= $_POST['pais'];
			$cidade= $_POST['cidade'];
			$estado= $_POST['estado'];
			$endereco=$_POST['endereco'];
			$email= $_POST['email'];
			$categoria=$_POST['categoria'];
			$del=$_POST['del'];
				
			//Carrega a model
			$this->load->model('usuario');
			
			//Cria um novo usuario com os dados do POST
			$usuario = new usuario($senha,$pais,$cidade,$estado,$endereco,$email,$categoria,$del);
		
			//Atualiza o usuario no banco
			$usuario->update($login);
		}
	}
	
	#Desativar usuario
	public function deletar(){
		
		//Recebe os dados do formulario
		if(isset($_POST)){
			$login = $_POST['login'];
		
			//Carrega a model
			$this->load->model('usuario');
			
			//Cria um novo usuario com os dados do POST
			$usuario = new usuario($del='1');
		
			//Remove o usuario do banco
			$usuario->remove($login);
		}
		
		//Carrega a view 
		$this->load->view('usuario'); 
		
	}

}
