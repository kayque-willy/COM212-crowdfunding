<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avaliacao extends CI_Controller {

	#Index do controller
	public function index() {
	   //Redirenciona para a consulta
	   redirect('/avaliacao/consultar','refresh');
	 }
	
	#Cria um novo avaliacao
	public function cadastrar(){
	
		if(!empty($_POST)){
			
			//Recebe os dados do formulario
			$codProjeto = (empty($_POST['codProjeto'])) ? '' : $_POST['codProjeto'];
			$codAvaliador = (empty($_POST['codAvaliador'])) ? '' : $_POST['codAvaliador'];
			$nomeAvaliador = (empty($_POST['nomeAvaliador'])) ? '' : $_POST['nomeAvaliador'];
			$data_avaliacao = (empty($_POST['data'])) ? '' : $_POST['data'];
		
			//Carrega a model
			$this->load->model('avaliacao_model');
		
			//Cria um novo avaliacao com os dados do POST
			$avaliacao = new Avaliacao_model(null,$codAvaliador,$codProjeto,$nomeAvaliador,$data_avaliacao);
		
			//Insere o avaliacao no banco
			if($avaliacao->insert()){
				//Se a operação for bem sucedida, consulta o ID da avaliação conforme o codigo do projeto
				$filtro['codigo_projeto']=$codProjeto;
				$avaliacao=$avaliacao->select($filtro);
				
				//Organiza o resultado
				$temp=$avaliacao->result();
				$data['avaliacao']=$temp[0];
				
				//Seleciona os critérios da categoria do projeto
				$this->load->model('criterio_avaliacao_model');
				$criterio = new Criterio_avaliacao_model();
				
				//Filtra pela categoria
				$filtro['categoria_projeto'] =$data['avaliacao']->projetoCategoria;
				
				//Filtra os critérios ativos
				$filtro['status'] ='1';
				
				//Realiza a consulta
				$criterios = $criterio->select($filtro);
				
				var_dump($data['avaliacao'],$criterios->result());
				
				//Carrega a view das notas
				//$this->load->view('CRUD_nota/addNOTA',$data); 
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/avaliacao/consultar/cad_falha', 'refresh');
			}
		}
		//Carrega a view 
		$this->load->view('CRUD_avaliacao/addAVALIACAO'); 	
	}
	
	#Lista os avaliacaos
	public function consultar($result=''){
		
		//Mensagem de resultado de alguma operação
		if(isset($result)){
			switch ($result){
				case 'cad_sucesso': 
					$data['sucesso']=true;
					$data['msg'] = 'avaliacao cadastrado com sucesso!';
					break;
				case 'cad_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao cadastrar o avaliacao!';
					break;
				case 'alt_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'avaliacao atualizado com sucesso!';
					break;
				case 'alt_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao atualizar o avaliacao!';
					break;
				case 'des_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'avaliacao desativado com sucesso!';
					break;
				case 'des_falha':
					$data['falha']=true;
					$data['msg'] = 'Falha ao remover o avaliacao!';
					break;
				case 'ativ_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'avaliacao ativado com sucesso!';
					break;
				case 'ativ_falha':
					$data['falha']=true;
					$data['msg'] = 'Falha ao ativar o avaliacao!';
					break;
			}
		}
		
		//Recebe o filtro
		$filtro['avaliacao'] = (empty($_GET['avaliacao'])) ? '' : $_GET['avaliacao'];
		$filtro['categoria_projeto'] = (empty($_GET['categoria'])) ? '' : $_GET['categoria'];

		//Carrega a model
		$this->load->model('avaliacao_avaliacao_model');
			
		//Cria um novo objeto avaliacao
		$avaliacao = new avaliacao_avaliacao_model();
		
		//$consulta o avaliacao
		$data['avaliacaos']=$avaliacao->select($filtro);
		
		//Adiciona a categoria selecionada na view
		$data['categoria'] = $filtro['categoria_projeto'];
		
		//Carrega a view 
		$this->load->view('CRUD_avaliacao/viewavaliacao',$data); 
	}
	
	#Altera o avaliacao
	public function alterar($id=''){
		//Recebe os dados do formulario para atualização
		if(!empty($_POST)){
			$id = (empty($_POST['id'])) ? '' : $_POST['id'];
			$avaliacao = (empty($_POST['avaliacao'])) ? '' : $_POST['avaliacao'];
			$peso = (empty($_POST['peso'])) ? '' : $_POST['peso'];
		
			//Carrega a model
			$this->load->model('avaliacao_avaliacao_model');
				
			//Cria um novo avaliacao com os dados do POST
			$avaliacao = new avaliacao_avaliacao_model(null,$avaliacao,null,$peso,null);

			//Atualiza o avaliacao no banco
			if($avaliacao->update($id)){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				redirect('/avaliacao/consultar/alt_sucesso', 'refresh');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/avaliacao/consultar/alt_falha', 'refresh');
			}
		}
		
		//Recupera os dados
		if(!empty($id)){
			$filtro['id']=$id;
			
			//Carrega a model
			$this->load->model('avaliacao_avaliacao_model');
				
			//Cria um novo avaliacao com os dados do POST
			$avaliacao = new avaliacao_avaliacao_model();

			//consulta o projeto pelo codigo
			$data['avaliacao']=$avaliacao->select($filtro);
			
			//Carrega a view 
			$this->load->view('CRUD_avaliacao/editavaliacao',$data); 
		}else{
			//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
			redirect('/avaliacao/consultar/alt_falha', 'refresh');
		}
	}
	
}