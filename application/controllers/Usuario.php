<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	#Index do controller
	public function index() {
	   //Carrega a view da index do projeto
	   $this->load->view('CRUD_usuario/indexUSUARIO_fim'); 
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
			if($usuario->insert()){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				redirect('/usuario/consultar/cad_sucesso', 'refresh');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/usuario/consultar/cad_falha', 'refresh');
			}
		}
		//Carrega a view 
		$this->load->view('CRUD_usuario/addUSUARIO'); 
	}
	
	#Consultar os usuarios
	public function consultar($result=''){
		
		//Mensagem de resultado de alguma operação
		if(isset($result)){
			switch ($result){
				case 'cad_sucesso': 
					$data['sucesso']=true;
					$data['msg'] = 'Usuario cadastrado com sucesso!';
					break;
				case 'cad_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao cadastrar o usuário!';
					break;
				case 'alt_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'Usuario atualizado com sucesso!';
					break;
				case 'alt_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao atualizar o usuário!';
					break;
				case 'des_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'Usuario desativado com sucesso!';
					break;
				case 'des_falha':
					$data['falha']=true;
					$data['msg'] = 'Falha ao desativar o usuário!';
					break;
			}
		}
		
		//Recebe o filtro
		$filtro['login'] = (empty($_GET['login'])) ? '' : $_GET['login'];
		$filtro['nome'] = (empty($_GET['nome'])) ? '' : $_GET['nome'];
		$filtro['del'] = (empty($_GET['del'])) ? '' : $_GET['del'];
				
		//Carrega a model
		$this->load->model('usuario_model');
			
		//Cria um novo objeto usuario
		$usuario = new Usuario_model();
		
		//Consuta os usuarios
		$data['usuarios']=$usuario->select($filtro);
			
		//Carrega a view 
		$this->load->view('CRUD_usuario/viewUSUARIO',$data); 
	}
	
	#Atualizar o usuario
	public function alterar($log=''){

		if(!empty($_POST)){
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
			$usuario = new Usuario_model($login,$senha,NULL,NULL,$pais,$cidade,$estado,$endereco,NULL,$email,$categoria,$del);
		
			//Atualiza o usuario no banco
			if($usuario->update($log)){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				redirect('/usuario/consultar/alt_sucesso', 'refresh');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/usuario/consultar/alt_falha', 'refresh');
			}
		}
		
		//Carrega a model
		$this->load->model('usuario_model');
			
		//Cria um novo objeto projeto
		$usuario = new Usuario_model();
		
		//$consulta o projeto pelo codigo
		$filtro['login']=$log;
		$data['usuario']=$usuario->select($filtro);
		
		//Carrega a view 
		$this->load->view('CRUD_usuario/editUSUARIO',$data); 
	}
	
	#Desativar o usuario
	public function desativar($log=''){
		
		//Recebe os dados do formulario
		$login= (empty($log)) ? '' : $log;
		
		//Carrega a model
		$this->load->model('usuario_model');
		
		//Cria um novo usuario 
		$usuario = new usuario_model();
		
		//Remove o usuario no banco
		if($usuario->remove($login)){
			//Se a operação for bem sucedida, redireciona com mensagem de sucesso
			redirect('/usuario/consultar/des_sucesso', 'refresh');
		}else{
			//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
			redirect('/usuario/consultar/des_falha', 'refresh');
		}
	}

	/*----MÉTODOS DE LOGIN E REGISTRO DE FINANCIADOR EXTERNO----*/
	
	#Realiza login do usuario
	public function login(){
	
		if(!empty($_POST['login']) and !empty($_POST['senha'])){
			//Recebe os dados do formulario
			$filtro['login'] =  $_POST['login'];
			$filtro['senha'] =  $_POST['senha'];
			$filtro['del'] = "0";		
			
			//Carrega a model
			$this->load->model('usuario_model');
				
			//Cria um novo usuario com os dados do POST
			$usuario= new Usuario_model();
		
			//Consulta o usuario no banco
			$login=$usuario->select($filtro);
			
			if(empty($login->result())){
				//Mensagem de falha do login
				$data['msg']="Usuario ou senha inválidos!";
				
				//Carrega a view com a mensagem
				$this->load->view('CRUD_usuario/loginUSUARIO.php',$data); 
			}else{
				//Apenas organiza o resultado
				$login=$login->result();
				$login=$login[0];
				
				//Cria a sessão
				$_SESSION['login']=$login->login;
				$_SESSION['tipo']=$login->tipo;
				
				//Redireciona para a consulta de projetos
				redirect('/projeto/', 'refresh');
			}
		}else{
			//Carrega a view 
			$this->load->view('CRUD_usuario/loginUSUARIO.php'); 
		}
	}	
	
	#Realiza logoff do usuario
	public function logoff(){
		//Limpa a sessão
		unset($_SESSION['login']);
		unset($_SESSION['tipo']);
					
		//Redireciona para a pagina inicial home
		$url = base_url();
		redirect($url,'refresh');
	}	

	#Registra um financiador externo
	public function registrar(){
	
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
					
			//Carrega a model
			$this->load->model('usuario_model');
				
			//Cria um novo usuario com os dados do POST
			$usuario= new Usuario_model($login,$senha,$nome,$cpf,$pais,$cidade,$estado,$endereco,$data_nascimento,$email, $tipo);
		
			//Insere o usuario no banco
			if($usuario->insert()){
				//Mensagem de  sucesso de cadastro
				$data['msg_sucesso']="Entre com seu login e senha!";
				
				//Carrega a view com a mensagem
				$this->load->view('CRUD_usuario/loginUSUARIO.php',$data); 
			}else{
				//Mensagem de falha do cadastro
				$data['msg']="Erro ao inserir o usuário!";
		
				//Carrega a view com a mensagem
				$this->load->view('CRUD_usuario/regUSUARIO.php',$data);  
			}
		}else{
			//Carrega a view 
			$this->load->view('CRUD_usuario/regUSUARIO.php'); 
		}
	}
}