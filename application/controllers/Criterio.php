<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Criterio extends CI_Controller {

	#Index do controller
	public function index() {
	   //Redirenciona para a consulta
	   redirect('/criterio/consultar','refresh');
	 }
	
	#Cria um novo criterio
	public function cadastrar(){
		
		if(!empty($_POST)){
			
			//Recebe os dados do formulario
			$criterio = (empty($_POST['criterio'])) ? '' : $_POST['criterio'];
			$status = (empty($_POST['status'])) ? '' : $_POST['status'];
			$peso = (empty($_POST['peso'])) ? '' : $_POST['peso'];
			$categoriaProjeto = (empty($_POST['categoria'])) ? '' : $_POST['categoria'];
		
			//Carrega a model
			$this->load->model('criterio_avaliacao_model');
		
			//Cria um novo criterio com os dados do POST
			$criterio = new Criterio_avaliacao_model(null,$criterio,$status,$peso,$categoriaProjeto);
			
			//Insere o criterio no banco
			if($criterio->insert()){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				redirect('/criterio/consultar/cad_sucesso', 'refresh');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/criterio/consultar/cad_falha', 'refresh');
			}
		}
		//Carrega a view 
		$this->load->view('CRUD_criterio/addCRITERIO'); 	
	}
	
	#Lista os criterios
	public function consultar($result=''){
		
		//Mensagem de resultado de alguma operação
		if(isset($result)){
			switch ($result){
				case 'cad_sucesso': 
					$data['sucesso']=true;
					$data['msg'] = 'Criterio cadastrado com sucesso!';
					break;
				case 'cad_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao cadastrar o criterio!';
					break;
				case 'alt_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'Criterio atualizado com sucesso!';
					break;
				case 'alt_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao atualizar o criterio!';
					break;
				case 'des_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'Criterio desativado com sucesso!';
					break;
				case 'des_falha':
					$data['falha']=true;
					$data['msg'] = 'Falha ao remover o criterio!';
					break;
				case 'ativ_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'Criterio ativado com sucesso!';
					break;
				case 'ativ_falha':
					$data['falha']=true;
					$data['msg'] = 'Falha ao ativar o criterio!';
					break;
			}
		}
		
		//Recebe o filtro
		$filtro['criterio'] = (empty($_GET['criterio'])) ? '' : $_GET['criterio'];
		$filtro['categoria_projeto'] = (empty($_GET['categoria'])) ? '' : $_GET['categoria'];

		//Carrega a model
		$this->load->model('criterio_avaliacao_model');
			
		//Cria um novo objeto criterio
		$criterio = new Criterio_avaliacao_model();
		
		//$consulta o criterio
		$data['criterios']=$criterio->select($filtro);
		
		//Adiciona a categoria selecionada na view
		$data['categoria'] = $filtro['categoria_projeto'];
		
		//Carrega a view 
		$this->load->view('CRUD_criterio/viewCRITERIO',$data); 
	}
	
	#Altera o criterio
	public function alterar($id=''){
		//Recebe os dados do formulario para atualização
		if(!empty($_POST)){
			$id = (empty($_POST['id'])) ? '' : $_POST['id'];
			$criterio = (empty($_POST['criterio'])) ? '' : $_POST['criterio'];
			$peso = (empty($_POST['peso'])) ? '' : $_POST['peso'];
		
			//Carrega a model
			$this->load->model('criterio_avaliacao_model');
				
			//Cria um novo criterio com os dados do POST
			$criterio = new Criterio_avaliacao_model(null,$criterio,null,$peso,null);

			//Atualiza o criterio no banco
			if($criterio->update($id)){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				redirect('/criterio/consultar/alt_sucesso', 'refresh');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/criterio/consultar/alt_falha', 'refresh');
			}
		}
		
		//Recupera os dados
		if(!empty($id)){
			$filtro['id']=$id;
			
			//Carrega a model
			$this->load->model('criterio_avaliacao_model');
				
			//Cria um novo criterio com os dados do POST
			$criterio = new Criterio_avaliacao_model();

			//consulta o projeto pelo codigo
			$data['criterio']=$criterio->select($filtro);
			
			//Carrega a view 
			$this->load->view('CRUD_criterio/editCRITERIO',$data); 
		}else{
			//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
			redirect('/criterio/consultar/alt_falha', 'refresh');
		}
	}
	
	#Desativar o criterio 
	public function desativar($id=''){
		
		//Carrega a model
		$this->load->model('criterio_avaliacao_model');
			
		//Cria um novo criterio com os dados do POST
		$criterio = new Criterio_avaliacao_model($id);
		
		//Desativa o criterio
		if($criterio->desativar()){
			//Se a operação for bem sucedida, redireciona com mensagem de sucesso
			redirect('/criterio/consultar/des_sucesso', 'refresh');
		}else{
			//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
			redirect('/criterio/consultar/des_falha', 'refresh');
		}
	}
	
	#Ativar o criterio 
	public function ativar($id=''){
		
		//Carrega a model
		$this->load->model('criterio_avaliacao_model');
			
		//Cria um novo criterio com os dados do POST
		$criterio = new Criterio_avaliacao_model($id);
		
		//Desativa o criterio
		if($criterio->ativar()){
			//Se a operação for bem sucedida, redireciona com mensagem de sucesso
			redirect('/criterio/consultar/ativ_sucesso', 'refresh');
		}else{
			//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
			redirect('/criterio/consultar/ativ_falha', 'refresh');
		}
	}
}