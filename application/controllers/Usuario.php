<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	#Index do controller
	public function index() {
	   //Sempre adicionar variaveis no vetor de $data
	   // $data['msg']='Este é a mensagem do controller Teste!';
	 }
	
	#Cria um novo usuario no banco
	public function cadastrar(){
	
		if(!empty($_POST)){
			//Recebe os dados do formulario
			$login= (empty($_POST['login'])) ? '' : $_POST['login'];
			$senha= (empty($_POST['senha'])) ? '' : $_POST['senha'];
			$nome= (empty($_POST['nome'])) ? '' : $_POST['nome'];
			$cpf= (empty($_POST['cpf'])) ? '' : $_POST['cpf'];
			$pais= (empty($_POST['pais'])) ? '' : $_POST['pais'];
			$cidade= (empty($_POST['cidade'])) ? '' : $_POST['cidade'];
			$estado= (empty($_POST['estado'])) ? '' : $_POST['estado'];
			$endereco= (empty($_POST['endereco'])) ? '' : $_POST['endereco'];
			$data_nascimento= (empty($_POST['data_nascimento'])) ? '' : $_POST['data_nascimento'];
			$email= (empty($_POST['email'])) ? '' : $_POST['email'];
			$tipo= (empty($_POST['tipo'])) ? '' : $_POST['tipo'];
			$categoria= (empty($_POST['categoria'])) ? '' : $_POST['categoria'];
			$del= (empty($_POST['del'])) ? '' : $_POST['del'];
					
			//Carrega a model
			$this->load->model('usuario_model');
				
			//Cria um novo usuario com os dados do POST
			$usuario= new Usuario_model($login,$senha,$nome,$cpf,$pais,$cidade,$estado,$endereco,$data_nascimento,$email, $tipo,$categoria,$del);
		
			//Insere o usuario no banco
			$usuario->insert();
			
			//Redireciona para a consulta de projetos
			$this->load->helper('url');
			redirect('/usuario/consultar', 'refresh');
		}
		//Carrega a view 
		$this->load->view('CRUD_usuario/addUSUARIO'); 
	}
	
	#Consultar os usuarios
	public function consultar(){
		
		//Recebe o filtro
		$login = (empty($_POST['login'])) ? '' : $_POST['login'];
		$nome = (empty($_POST['nome'])) ? '' : $_POST['nome'];
		$del = (empty($_POST['del'])) ? '' : $_POST['del'];
				
		//Carrega a model
		$this->load->model('usuario_model');
			
		//Cria um novo objeto usuario
		$usuario = new Usuario_model();
		
		//Consuta os usuarios
		$data['usuarios']=$usuario->select($login,$nome,$del);
			
		//Carrega a view 
		$this->load->view('CRUD_usuario/viewUSUARIO',$data); 

	}
	
	#Atualizar o usuario
	public function alterar(){

		//Recebe os dados do formulario
		$login= (empty($_POST['login'])) ? '' : $_POST['login'];
		$senha= (empty($_POST['senha'])) ? '' : $_POST['senha'];
		$pais= (empty($_POST['pais'])) ? '' : $_POST['pais'];
		$cidade= (empty($_POST['cidade'])) ? '' : $_POST['cidade'];
		$estado= (empty($_POST['estado'])) ? '' : $_POST['estado'];
		$endereco= (empty($_POST['endereco'])) ? '' : $_POST['endereco'];
		$data_nascimento= (empty($_POST['data_nascimento'])) ? '2016-10-02' : $_POST['data_nascimento'];
		$email= (empty($_POST['email'])) ? '' : $_POST['email'];
		$categoria= (empty($_POST['categoria'])) ? '' : $_POST['categoria'];
		$del= (empty($_POST['del'])) ? NULL : $_POST['del'];
				
		//Carrega a model
		$this->load->model('usuario_model');
			
		//Cria um objeto usuario com os dados para serem atualizados
		//Os espaços com as aspas simples em branco estão aí para obedecer a ordem de parametro
		$usuario = new Usuario_model(NULL,$senha,NULL,NULL,$pais,$cidade,$estado,$endereco,NULL,$email,$categoria,$del);
	
		//Atualiza o usuario no banco
		$usuario->update($login);
		
		//Carrega a view 
		//$this->load->view('CRUD_usuario/usuario',$data); 
	}
	
	#Desativar o usuario
	public function desativar($log=''){
		
		//Recebe os dados do formulario
		$login= (empty($log) ? '' : $log;
		
		//Carrega a model
		$this->load->model('usuario_model');
		
		//Cria um novo usuario 
		$usuario = new usuario();
		
		//Remove o usuario do banco
		$usuario->remove($login);
		
		//Carrega a view 
		//$this->load->view('CRUD_usuario/usuario',$data); 
	}

}
