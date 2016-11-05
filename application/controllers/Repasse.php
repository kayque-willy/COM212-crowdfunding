<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repasse extends CI_Controller {

	#Index do controller
	public function index() {
	   //Redirenciona para a consulta
	   redirect('/repasse/consultar','refresh');
	 }
	
	#Cria um novo repasse
	public function cadastrar(){
		
		if(!empty($_POST)){
			
			//Recebe os dados do formulario
			$repasse = (empty($_POST['repasse'])) ? '' : $_POST['repasse'];
			$status = (empty($_POST['status'])) ? '' : $_POST['status'];
			$peso = (empty($_POST['peso'])) ? '' : $_POST['peso'];
			$categoriaProjeto = (empty($_POST['categoria'])) ? '' : $_POST['categoria'];
		
			//Carrega a model
			$this->load->model('repasse_model');
		
			//Cria um novo repasse com os dados do POST
			$repasse = new Repasse_model(null,$repasse,$status,$peso,$categoriaProjeto);
			
			//Insere o repasse no banco
			if($repasse->insert()){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				redirect('/repasse/consultar/cad_sucesso', 'refresh');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/repasse/consultar/cad_falha', 'refresh');
			}
		}
		//Carrega a view 
		$this->load->view('CRUD_repasse/addREPASSE'); 	
	}
	
	#Lista os repasses
	public function consultar($result=''){
		
		//Mensagem de resultado de alguma operação
		if(isset($result)){
			switch ($result){
				case 'cad_sucesso': 
					$data['sucesso']=true;
					$data['msg'] = 'repasse cadastrado com sucesso!';
					break;
				case 'cad_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao cadastrar o repasse!';
					break;
				case 'alt_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'repasse atualizado com sucesso!';
					break;
				case 'alt_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao atualizar o repasse!';
					break;
				case 'des_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'repasse desativado com sucesso!';
					break;
				case 'des_falha':
					$data['falha']=true;
					$data['msg'] = 'Falha ao remover o repasse!';
					break;
				case 'ativ_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'repasse ativado com sucesso!';
					break;
				case 'ativ_falha':
					$data['falha']=true;
					$data['msg'] = 'Falha ao ativar o repasse!';
					break;
			}
		}
		
		//Recebe o filtro
		$filtro['repasse'] = (empty($_GET['repasse'])) ? '' : $_GET['repasse'];
		$filtro['categoria_projeto'] = (empty($_GET['categoria'])) ? '' : $_GET['categoria'];

		//Carrega a model
		$this->load->model('repasse_model');
			
		//Cria um novo objeto repasse
		$repasse = new Repasse_model();
		
		//$consulta o repasse
		$data['repasses']=$repasse->select($filtro);
		
		//Adiciona a categoria selecionada na view
		$data['categoria'] = $filtro['categoria_projeto'];
		
		//Carrega a view 
		$this->load->view('CRUD_repasse/viewREPASSE',$data); 
	}
	
	#Altera o repasse
	public function alterar($id=''){
		//Recebe os dados do formulario para atualização
		if(!empty($_POST)){
			$id = (empty($_POST['id'])) ? '' : $_POST['id'];
			$repasse = (empty($_POST['repasse'])) ? '' : $_POST['repasse'];
			$peso = (empty($_POST['peso'])) ? '' : $_POST['peso'];
		
			//Carrega a model
			$this->load->model('repasse_model');
				
			//Cria um novo repasse com os dados do POST
			$repasse = new Repasse_model(null,$repasse,null,$peso,null);

			//Atualiza o repasse no banco
			if($repasse->update($id)){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				redirect('/repasse/consultar/alt_sucesso', 'refresh');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/repasse/consultar/alt_falha', 'refresh');
			}
		}
		
		//Recupera os dados
		if(!empty($id)){
			$filtro['id']=$id;
			
			//Carrega a model
			$this->load->model('repasse_model');
				
			//Cria um novo repasse com os dados do POST
			$repasse = new repasse_model();

			//consulta o projeto pelo codigo
			$data['repasse']=$repasse->select($filtro);
			
			//Carrega a view 
			$this->load->view('CRUD_repasse/editREPASSE',$data); 
		}else{
			//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
			redirect('/repasse/consultar/alt_falha', 'refresh');
		}
	}

}