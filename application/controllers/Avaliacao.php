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
				$data['criterios'] = $criterio->select($filtro);
				
				//Carrega a view das notas
				$this->load->view('CRUD_nota/addNOTA',$data); 
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/avaliacao/consultar/cad_falha', 'refresh');
			}
		}
		//Carrega a view 
		$this->load->view('CRUD_avaliacao/addAVALIACAO'); 
		//$this->load->view('CRUD_nota/addNOTA');
	}
	
	#Cadastra as notas de avaliação do projeto
	public function avaliar(){
		if(!empty($_POST['id_criterio']) and !empty($_POST['nota_criterio']) and !empty($_POST['id_avaliacao'])){
			
			//Recebe os dados do formulario
			$id_avaliacao = (empty($_POST['id_avaliacao'])) ? '' : $_POST['id_avaliacao'];
			$id_criterio = (empty($_POST['id_criterio'])) ? '' : $_POST['id_criterio'];
			$nota_criterio = (empty($_POST['nota_criterio'])) ? '' : $_POST['nota_criterio'];
			$sugestoes = (empty($_POST['sugestoes'])) ? '' : $_POST['sugestoes'];
			
			//Carrega a model
			$this->load->model('nota_avaliacao_model');
			
			for ($i = 0; $i < sizeof($id_criterio); $i++) {
				$nota = new Nota_avaliacao_model($id_criterio[$i], $id_avaliacao,$nota_criterio[$i],$sugestoes);
				$nota->insert();
			}
			
			//Se a operação for bem sucedida, redireciona a consulta com mensagem de sucesso
			redirect('/avaliacao/consultar/cad_sucesso', 'refresh');
		}else{
			//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
			redirect('/avaliacao/consultar/cad_falha', 'refresh');
		}
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
		$filtro['codigo_projeto'] = (empty($_GET['codigo'])) ? '' : $_GET['codigo'];
		$filtro['nome_projeto'] = (empty($_GET['nome'])) ? '' : $_GET['nome'];
		$filtro['categoria_projeto'] = (empty($_GET['categoria'])) ? '' : $_GET['categoria'];

		//Carrega a model
		$this->load->model('avaliacao_model');
		$this->load->model('nota_avaliacao_model');
			
		//Cria um novo objeto avaliacao
		$avaliacao = new Avaliacao_model();
		
		//consulta avaliacao e notas
		$result=$avaliacao->select($filtro);
		$avaliacoes=[];
		foreach ($result->result() as $avaliacao){
			$filtro['id_avaliacao']=$avaliacao->id;
			$notas = new Nota_avaliacao_model();
			$avaliacoes['avaliacao'] = $avaliacao;
			$avaliacoes['notas'] = $notas->select($filtro);
			$avaliacoes['notas'] = $avaliacoes['notas']->result();
			$data['avaliacoes'][]=$avaliacoes;
		}
		
		//Carrega a view 
		$this->load->view('CRUD_avaliacao/viewAVALIACAO',$data); 
	}
	
	#Altera o avaliacao
	public function alterar($codProjeto=''){
			
		if(!empty($_POST)){
			if(!empty($_POST['id_criterio']) and !empty($_POST['nota_criterio']) and !empty($_POST['id_avaliacao'])){
				//Recebe os dados do formulario
				$id_avaliacao = (empty($_POST['id_avaliacao'])) ? '' : $_POST['id_avaliacao'];
				$id_criterio = (empty($_POST['id_criterio'])) ? '' : $_POST['id_criterio'];
				$nota_criterio = (empty($_POST['nota_criterio'])) ? '' : $_POST['nota_criterio'];
				$sugestoes = (empty($_POST['sugestoes'])) ? '' : $_POST['sugestoes'];
				
				//Carrega a model
				$this->load->model('nota_avaliacao_model');
				
				for ($i = 0; $i < sizeof($id_criterio); $i++) {
					$nota = new Nota_avaliacao_model(null,null,$nota_criterio[$i]);
					$nota->update($id_criterio[$i],$id_avaliacao);
				}
				
				//Se a operação for bem sucedida, redireciona a consulta com mensagem de sucesso
				redirect('/avaliacao/consultar/edit_sucesso', 'refresh');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/avaliacao/consultar/edit_falha', 'refresh');
			}
			
		}
		
		//Insere o avaliacao no banco
		if(!empty($codProjeto)){
			//Se a operação for bem sucedida, consulta o ID da avaliação conforme o codigo do projeto
			$filtro['codigo_projeto']=$codProjeto;
				
			//Carrega a model
			$this->load->model('avaliacao_model');
			$this->load->model('nota_avaliacao_model');
				
			//Cria um novo objeto avaliacao
			$avaliacao = new Avaliacao_model();
			
			//consulta avaliacao e notas
			$result=$avaliacao->select($filtro);
			$avaliacoes=[];
			foreach ($result->result() as $avaliacao){
				$filtro['id_avaliacao']=$avaliacao->id;
				$notas = new Nota_avaliacao_model();
				$avaliacoes['avaliacao'] = $avaliacao;
				$avaliacoes['notas'] = $notas->select($filtro);
				$avaliacoes['notas'] = $avaliacoes['notas']->result();
				$data['avaliacao'][]=$avaliacoes;
			}
				
			//Organiza os resultados
			$data['avaliacao']=$data['avaliacao'][0];
				
			//Carrega a view das notas
			$this->load->view('CRUD_nota/editNOTA',$data); 
		}else{
			//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
			redirect('/avaliacao/consultar/cad_falha', 'refresh');
		}
	}
}