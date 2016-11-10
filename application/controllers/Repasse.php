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
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Gestor de Projetos')) redirect('/projeto/', 'refresh');
		
		if(!empty($_POST)){
			
			//Recebe os dados do formulario
			$codProjeto = (empty($_POST['codProjeto'])) ? '' : $_POST['codProjeto'];
			$necessidade = (empty($_POST['necessidade'])) ? '' : $_POST['necessidade'];
			$data_repasse = (empty($_POST['data'])) ? '' : $_POST['data'];
			$valorParcela = (empty($_POST['valorParcela'])) ? '' : $_POST['valorParcela'];
			$status = (empty($_POST['status'])) ? '' : $_POST['status'];
		
			//Carrega a model
			$this->load->model('repasse_model');
		
			//Cria um novo repasse com os dados do POST
			$repasse = new Repasse_model($codProjeto,$necessidade,$data_repasse,$valorParcela,$status);
			
			//Insere o repasse no banco
			if($repasse->insert()){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				redirect('/repasse/consultar/cad_sucesso', 'refresh');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/repasse/consultar/cad_falha', 'refresh');
			}
		}
		//Consulta o codigo dos projetos
		$this->load->model('projeto_model');
		$projeto = new Projeto_model();
		$data['projetos'] = $projeto->select();

		//Carrega a view 
		$this->load->view('CRUD_repasse/addREPASSE',$data); 	
	}
	
	#Lista os repasses
	public function consultar($result=''){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Gestor de Projetos')) redirect('/projeto/', 'refresh');
		
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
		
		//Consulta o repasse total 
		$total=$repasse->total($filtro);
	
		//Consulta os repasses por projeto
		$repasses=[];
		foreach($total->result() as $row){
			//Consulta os repasses pelo codigo do projeto
			$consulta = new Repasse_model();
			$temp['codProjeto']=$row->codProjeto;
			$consulta=$consulta->select($temp);
			
			//Cria um novo vetor com o os reapasses e o valor total
			$rep['codProjeto']=$row->codProjeto;
			$rep['nomeProjeto']= $row->nomeProjeto;
			$rep['total']= $row->total;
			$rep['repasses']=$consulta->result();
			
			//Adiciona o vetor ao resultado final
			$repasses[]=$rep;
		}
		
		//Reultado final da consulta
		$data['repasses']=$repasses;
		
		//Carrega a view 
		$this->load->view('CRUD_repasse/viewREPASSE',$data); 
	}
	
	#Altera o repasse
	public function alterar($codProjeto='',$necessidade=''){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Gestor de Projetos')) redirect('/projeto/', 'refresh');
		
		//Recebe os dados do formulario para atualização
		if(!empty($_POST)){
			$codProjeto = (empty($_POST['codProjeto'])) ? '' : $_POST['codProjeto'];
			$necessidade = (empty($_POST['necessidade'])) ? '' : $_POST['necessidade'];
			$valorParcela = (empty($_POST['valorParcela'])) ? '' : $_POST['valorParcela'];
			$status =  (empty($_POST['status'])) ? NULL : $_POST['status'];
			$data = date("Y-m-d"); 
			
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
		if(!empty($codProjeto) and !empty($necessidade)){
			$filtro['codProjeto']=$codProjeto;
			$filtro['necessidade']=urldecode($necessidade);
			
			//Carrega a model
			$this->load->model('repasse_model');
				
			//Cria um novo repasse com os dados do POST
			$repasse = new Repasse_model();

			//consulta o projeto pelo codigo
			$data['repasse']=$repasse->select($filtro);
			
			var_dump($data['repasse']->result());
			
			//Carrega a view 
			$this->load->view('CRUD_repasse/editREPASSE',$data); 
		}else{
			//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
			redirect('/repasse/consultar/alt_falha', 'refresh');
		}
	}

}