<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financiamento extends CI_Controller {

	#Index do controller
	public function index() {
	   //Redirenciona para a consulta
	   redirect('/financiamento/consultar','refresh');
	 }
	
	#Cria um novo financiamento
	public function financiar(){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Financiador Acadêmico')  and ($_SESSION['tipo']!='Usuário Público')) redirect('/financiamento/', 'refresh');
		
		if(!empty($_POST)){
			
			//Recebe os dados do formulario
			$tipo = (empty($_POST['nome'])) ? '' : $_POST['nome'];
			$quantidadeModulos = (empty($_POST['descricao'])) ? '' : $_POST['descricao'];
			$valor = (empty($_POST['categoria'])) ? '' : $_POST['categoria'];
			$formaPagamento = (empty($_POST['duracao'])) ? '' : $_POST['duracao'];
			$codfinanciamento = (empty($_POST['valor'])) ? '' : $_POST['valor'];
			$data = date('Y-m-d');
			$login = (empty($_SESSION['login'])) ? '' : $_SESSION['login'];
			
			//Carrega a model
			$this->load->model('financiamento_model');
		
			//Cria um novo financiamento com os dados do POST
			$financiamento = new Financiamento_model(null,$nome,$categoria,$duracao,$valor,$status,$descricao,$video,$imagem,null,$valorMaximo,$valorMinimo);
			
			//Insere o financiamento no banco
			if($financiamento->insert()){
			
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				redirect('/financiamento/consultar/cad_sucesso', 'refresh');
			}else{
			
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/financiamento/consultar/cad_falha', 'refresh');
			}
		}
		
		//Carrega a view 
		$this->load->view('CRUD_financiamento/addFINANCIAMENTO'); 	
	}
	
	#Lista os financiamentos candidatos
	public function consultar($result=''){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Financiador Acadêmico')  and ($_SESSION['tipo']!='Usuário Público')) redirect('/financiamento/', 'refresh');
		
		//Mensagem de resultado de alguma operação
		if(isset($result)){
			switch ($result){
				case 'cad_sucesso': 
					$data['sucesso']=true;
					$data['msg'] = 'financiamento cadastrado com sucesso!';
					break;
				case 'cad_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao cadastrar o financiamento!';
					break;
				case 'alt_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'financiamento atualizado com sucesso!';
					break;
				case 'alt_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao atualizar o financiamento!';
					break;
				case 'des_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'financiamento desativado com sucesso!';
					break;
				case 'des_falha':
					$data['falha']=true;
					$data['msg'] = 'Falha ao remover o financiamento!';
					break;
			}
		}
		
		//Recebe o filtro
		$filtro['nome'] = (empty($_GET['nome'])) ? '' : $_GET['nome'];
		$filtro['data'] = (empty($_GET['data'])) ? '' : $_GET['data'];
	
				
		//Carrega a model
		$this->load->model('financiamento_model');
			
		//Cria um novo objeto financiamento
		$financiamento = new Financiamento_model();
		
		//$consulta o financiamento
		$data['financiamentos']=$financiamento->select($filtro);
		
		//Carrega a view 
		$this->load->view('CRUD_financiamento/viewFINANCIAMENTO',$data); 
	}

	#Relatório de financiamento de projeto por categoria
	public funciont relatorioCategoria(){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Financiador Acadêmico')  and ($_SESSION['tipo']!='Usuário Público')) redirect('/financiamento/', 'refresh');
	
		//Recebe o filtro
		$filtro['nome'] = (empty($_GET['nome'])) ? '' : $_GET['nome'];
		$filtro['data'] = (empty($_GET['data'])) ? '' : $_GET['data'];
		
		//Carrega a model
		$this->load->model('financiamento_model');
			
		//Cria um novo objeto financiamento
		$financiamento = new Financiamento_model();
		
		########TERMINAR A IMPLEMENTAÇÃO DO RELATÓRIO AQUI#######
		
		//Carrega a view 
		$this->load->view('CRUD_financiamento/relCatFINANCIAMENTO',$data); 
	}
	
	#Relatório de financiamento de projetos
	public funciont relatorio(){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Financiador Acadêmico')  and ($_SESSION['tipo']!='Usuário Público')) redirect('/financiamento/', 'refresh');
	
		//Recebe o filtro
		$filtro['data_inicial'] = (empty($_GET['data_inicial'])) ? '' : $_GET['data_inicial'];
		$filtro['data_final'] = (empty($_GET['data_final'])) ? '' : $_GET['data_final'];
		$filtro['codigo_projeto'] = (empty($_GET['codigo_projeto'])) ? '' : $_GET['codigo_projeto'];
		
		//Carrega a model
		$this->load->model('financiamento_model');
			
		//Cria um novo objeto financiamento
		$financiamento = new Financiamento_model();
		
		//Realiza a consulta do relatório
		$data['relatorio_projeto'] = $financiamento->relatorio($filtro);
		
		//Carrega a view 
		$this->load->view('CRUD_financiamento/relFINANCIAMENTO',$data); 
	}
}