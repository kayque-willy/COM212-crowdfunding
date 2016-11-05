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
			$codProjeto = (empty($_POST['codProjeto'])) ? '' : $_POST['codProjeto'];
			$necessidade = (empty($_POST['necessidade'])) ? '' : $_POST['necessidade'];
			$data = (empty($_POST['data'])) ? '' : $_POST['data'];
			$valorParcela = (empty($_POST['valorParcela'])) ? '' : $_POST['valorParcela'];
			$status = "Não Quitado";
		
			//Carrega a model
			$this->load->model('repasse_model');
		
			//Cria um novo repasse com os dados do POST
			$repasse = new Repasse_model($codProjeto,$necessidade,$data,$valorParcela,$status);
			
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
		$filtro['codProjeto'] = (empty($_GET['codProjeto'])) ? '' : $_GET['codProjeto'];
		$filtro['data'] = (empty($_GET['data'])) ? '' : $_GET['data'];

		//Carrega a model
		$this->load->model('repasse_model');
			
		//Cria um novo objeto repasse
		$repasse = new Repasse_model();
		
		//$consulta o repasse
		$data['repasses']=$repasse->select($filtro);
		
		//Carrega a view 
		$this->load->view('CRUD_repasse/viewREPASSE',$data); 
	}
	
	#Altera o repasse
	public function alterar($codProjeto='',$necessidade=''){
		//Recebe os dados do formulario para atualização
		if(!empty($_POST)){
			$codProjeto = (empty($_POST['codProjeto'])) ? '' : $_POST['codProjeto'];
			$necessidade = (empty($_POST['necessidade'])) ? '' : $_POST['necessidade'];
			$valorParcela = (empty($_POST['valorParcela'])) ? '' : $_POST['valorParcela'];
			$status =  (empty($_POST['status'])) ? NULL : $_POST['status'];
			$data = now();
			
			//Carrega a model
			$this->load->model('repasse_model');
				
			//Cria um novo repasse com os dados do POST
			$repasse = new Repasse_model(null,null,$data,$valorParcela,$status);
			
			//Atualiza o repasse no banco
			if($repasse->update($codProjeto,$necessidade)){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				redirect('/repasse/consultar/alt_sucesso', 'refresh');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/repasse/consultar/alt_falha', 'refresh');
			}
		}
		
		//Recupera os dados
		if(!empty($id)){
			$filtro['codProjeto']=$codProjeto;
			$filtro['necessidade']=$necessidade;
			
			//Carrega a model
			$this->load->model('repasse_model');
				
			//Cria um novo repasse com os dados do POST
			$repasse = new Repasse_model();

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