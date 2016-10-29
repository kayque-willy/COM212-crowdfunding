<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto extends CI_Controller {

	#Index do controller
	public function index() {
	   //Carrega a view da index do projeto
	   $this->load->view('CRUD_projeto/indexPROJETO_fim'); 
	 }
	
	#Cria um novo projeto
	public function cadastrar(){
		
		if(!empty($_POST)){
			
			//Recebe os dados do formulario
			$nome = (empty($_POST['nome'])) ? '' : $_POST['nome'];
			$descricao = (empty($_POST['descricao'])) ? '' : $_POST['descricao'];
			$categoria = (empty($_POST['categoria'])) ? '' : $_POST['categoria'];
			$duracao = (empty($_POST['duracao'])) ? '' : $_POST['duracao'];
			$valor = (empty($_POST['valor'])) ? '' : $_POST['valor'];
			$video = (empty($_POST['video'])) ? '' : $_POST['video'];
			$status = 'candidato';
			
			//Tratamento para salvar a imagem
			$imagem=NULL;
			//Se tiver imagem, realiza o upload
			if(!empty($_FILES["imagem"])) { 
				$config['upload_path'] = './temp/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['overwrite']=TRUE;
				$config['max_size']  = '10048000';
				$config['max_width'] = '1024';
				$config['max_height'] = '768';
				$this->load->library('upload', $config);
				$this->upload->do_upload('imagem');
				$imagem=$this->upload->data();
			} 
			
			//Carrega a model
			$this->load->model('projeto_model');
		
			//Cria um novo projeto com os dados do POST
			$projeto = new Projeto_model(NULL,$nome,$categoria,$duracao,$valor,$status,$descricao,$video,$imagem);
			
			//Insere o projeto no banco
			$projeto->insert();
			
			//Limpa a imagem temporaria
			unlink($imagem['full_path']);
			
			//Redireciona para a consulta de projetos
			redirect('/projeto/consultar', 'refresh');
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
		$data['projetos']=$projeto->select($codigo,$nome,$categoria);
		
		//Carrega a view 
		$this->load->view('CRUD_projeto/viewPROJETO',$data); 
	}
	
	#Altera o projeto
	public function alterar($cod=''){
	
		if(!empty($_POST)){
			//Recebe os dados do formulario
			$codigo = (empty($_POST['codigo'])) ? '' : $_POST['codigo'];
			$nome = (empty($_POST['nome'])) ? '' : $_POST['nome'];
			$categoria = (empty($_POST['categoria'])) ? '' : $_POST['categoria'];
			$duracao = (empty($_POST['duracao'])) ? '' : $_POST['duracao'];
			$valor = (empty($_POST['valor'])) ? '' : $_POST['valor'];
			$status = (empty($_POST['status'])) ? '' : $_POST['status'];
			
			//Carrega a model
			$this->load->model('projeto_model');
				
			//Cria um novo projeto com os dados do POST
			$projeto = new Projeto_model(NULL,$nome,$categoria,$duracao,$valor,$status);
			
			//Atualiza o usuario no banco
			$projeto->update($codigo);	
				
			//Redireciona para a consulta de projetos
			redirect('/projeto/consultar', 'refresh');
		}
		
		//Carrega a model
		$this->load->model('projeto_model');
			
		//Cria um novo objeto projeto
		$projeto = new Projeto_model();
		
		//$consulta o projeto pelo codigo
		$data['projeto']=$projeto->select($cod);
		
		//Carrega a view 
		$this->load->view('CRUD_projeto/editPROJETO',$data); 
	}
	
	#Deletea o projeto 
	public function remover($cod=''){
		
		//Recebe os dados do formulario
		$codigo = (empty($cod)) ? '' : $cod;
		
		//Carrega a model
		$this->load->model('projeto_model');
			
		//Cria um novo objeto projeto
		$projeto = new Projeto_model($codigo);
		
		//Remove o projeto do banco
		$projeto->remove($codigo);
		
	    //Redireciona para a consulta de projetos
		redirect('/projeto/consultar', 'refresh');
	}

}