<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financiamento extends CI_Controller {

	#Index do controller
	public function index() {
	   //Redirenciona para a consulta
	   redirect('/financiamento/consultar','refresh');
	 }
	
	#Cria um novo financiamento
	public function financiar($codProjeto=''){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Financiador Acadêmico')  and ($_SESSION['tipo']!='Usuário Público')) redirect('/financiamento/', 'refresh');
		
		if(!empty($_POST)){
			
			//Recebe os dados do formulario
			$tipo = (empty($_POST['tipo'])) ? '' : $_POST['tipo'];
			$quantidadeModulos = (empty($_POST['quantidadeModulos'])) ? '' : $_POST['quantidadeModulos'];
			$valor = (empty($_POST['valor'])) ? '' : $_POST['valor'];
			$formaPagamento = (empty($_POST['formaPagamento'])) ? '' : $_POST['formaPagamento'];
			$codProjeto = (empty($_POST['codProjeto'])) ? '' : $_POST['codProjeto'];
			$data = date('Y-m-d');
			$login = (empty($_SESSION['login'])) ? '' : $_SESSION['login'];
			
			//Carrega a model
			$this->load->model('financiamento_model');
		
			//Cria um novo financiamento com os dados do POST
			$financiamento = new Financiamento_model(null,$tipo,$quantidadeModulos,$valor,$formaPagamento,$codProjeto,$data,$login);
			
			//Insere o financiamento no banco
			if($financiamento->insert()){
			
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				redirect('/financiamento/consultar/cad_sucesso', 'refresh');
			}else{
			
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/financiamento/consultar/cad_falha', 'refresh');
			}
		}
		
	    //Carrega a model
	    $this->load->model("projeto_model");
		$projeto= new Projeto_model();
		
		//Consulta o projeto pelo codigo
		$filtro['codigo']=$codProjeto;
		$data['projeto']=$projeto->select($filtro);
		
		$data['codProjeto']=$codProjeto;
		
		//Carrega a view 
		$this->load->view('CRUD_financiamento/addFINANCIAMENTO',$data); 	
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
		$filtro['login'] = $_SESSION['login'];
	
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
	public function relatorioCategoria(){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Financiador Acadêmico')  and ($_SESSION['tipo']!='Usuário Público')) redirect('/financiamento/', 'refresh');
	
			//Recebe o filtro
			$filtro['nome'] = (empty($_GET['nome'])) ? '' : $_GET['nome'];
			$filtro['data'] = (empty($_GET['data'])) ? '' : $_GET['data'];
			
			//Carrega a model
			$this->load->model('financiamento_model');
				
			//Cria um novo objeto financiamento
			$financiamento = new Financiamento_model();
			$categoria=[];
			
			#PESQUISA#
			//Soma categoria
			$filtro['categoria_projeto']='Pesquisa';
			$filtro['soma_categoria']=true;
			$categoria['pesquisa']=$financiamento->relatorioCategoria($filtro);
			$categoria['pesquisa']=$categoria['pesquisa']->result();
			if(isset($categoria['pesquisa'][0])){
				$categoria['pesquisa']['categoria']=$categoria['pesquisa'][0];
				unset($categoria['pesquisa'][0]);
			}
		
			//Soma projeto
			$filtro['soma_categoria']=null;
			$filtro['soma_projeto']=true;
			$categoria['pesquisa']['projeto']=$financiamento->relatorioCategoria($filtro);
			$categoria['pesquisa']['projeto']=$categoria['pesquisa']['projeto']->result();
			if(isset($categoria['pesquisa']['projeto'][0]))
				$categoria['pesquisa']['projeto']=$categoria['pesquisa']['projeto'][0];
			
			#Competição Tecnológica#
			//Soma categoria
			$filtro['categoria_projeto']='Competição Tecnológica';
			$filtro['soma_categoria']=true;
			$categoria['competicaoTecnologica']=$financiamento->relatorioCategoria($filtro);
			$categoria['competicaoTecnologica']=$categoria['competicaoTecnologica']->result();
			if(isset($categoria['competicaoTecnologica'][0])){
				$categoria['competicaoTecnologica']['categoria']=$categoria['competicaoTecnologica'][0];
				unset($categoria['competicaoTecnologica'][0]);
			}
			
			//Soma projeto
			$filtro['soma_categoria']=null;
			$filtro['soma_projeto']=true;
			$categoria['competicaoTecnologica']['projeto']=$financiamento->relatorioCategoria($filtro);
			$categoria['competicaoTecnologica']['projeto']=$categoria['competicaoTecnologica']['projeto']->result();
			if(isset($categoria['competicaoTecnologica']['projeto'][0]))
				$categoria['competicaoTecnologica']['projeto']=$categoria['competicaoTecnologica']['projeto'][0];
			
			#Inovação no Ensino#
			//Soma categoria
			$filtro['categoria_projeto']='Inovação no Ensino';
			$filtro['soma_categoria']=true;
			$categoria['inovacaoEnsino']=$financiamento->relatorioCategoria($filtro);
			$categoria['inovacaoEnsino']=$categoria['inovacaoEnsino']->result();
			if(isset($categoria['inovacaoEnsino'][0])){
				$categoria['inovacaoEnsino']['categoria']=$categoria['inovacaoEnsino'][0];
				unset($categoria['inovacaoEnsino'][0]);
			} 
			
			//Soma projeto
			$filtro['soma_categoria']=null;
			$filtro['soma_projeto']=true;
			$categoria['inovacaoEnsino']['projeto']=$financiamento->relatorioCategoria($filtro);
			$categoria['inovacaoEnsino']['projeto']=$categoria['inovacaoEnsino']['projeto']->result();
			if(isset($categoria['inovacaoEnsino']['projeto'][0]))
				$categoria['inovacaoEnsino']['projeto']=$categoria['inovacaoEnsino']['projeto'][0];
		
			#Manutenção e Reforma#
			//Soma categoria
			$filtro['categoria_projeto']='Manutenção e Reforma';
			$filtro['soma_categoria']=true;
			$categoria['manutencaoReforma']=$financiamento->relatorioCategoria($filtro);
			$categoria['manutencaoReforma']=$categoria['manutencaoReforma']->result();
			if(isset($categoria['inovacaoEnsino'][0])){
				$categoria['manutencaoReforma']['categoria']=$categoria['manutencaoReforma'][0];
				unset($categoria['inovacaoEnsino'][0]);
			} 
			
			//Soma projeto
			$filtro['soma_categoria']=null;
			$filtro['soma_projeto']=true;
			$categoria['manutencaoReforma']['projeto']=$financiamento->relatorioCategoria($filtro);
			$categoria['manutencaoReforma']['projeto']=$categoria['manutencaoReforma']['projeto']->result();
			if(isset($categoria['manutencaoReforma']['projeto'][0]))
				$categoria['manutencaoReforma']['projeto']=$categoria['manutencaoReforma']['projeto'][0];
		
			#Pequenas Obras#
			//Soma categoria
			$filtro['categoria_projeto']='Pequenas Obras';
			$filtro['soma_categoria']=true;
			$categoria['pequenasObras']=$financiamento->relatorioCategoria($filtro);
			$categoria['pequenasObras']=$categoria['pequenasObras']->result();
			if(isset($categoria['pequenasObras'][0])){
				$categoria['pequenasObras']['categoria']=$categoria['pequenasObras'][0];
				unset($categoria['pequenasObras'][0]);
			} 
			
			//Soma projeto
			$filtro['soma_categoria']=null;
			$filtro['soma_projeto']=true;
			$categoria['pequenasObras']['projeto']=$financiamento->relatorioCategoria($filtro);
			$categoria['pequenasObras']['projeto']=$categoria['pequenasObras']['projeto']->result();
			if(isset($categoria['pequenasObras']['projeto'][0]))
				$categoria['pequenasObras']['projeto']=$categoria['pequenasObras']['projeto'][0];
		
			var_dump($categoria);
		
			//Adiciona as somas das categorias
			$data['categorias']=$categoria;
			
		//Carrega a view 
		$this->load->view('CRUD_financiamento/relCatFINANCIAMENTO',$data); 
	}
	
	#Relatório de financiamento de projetos
	public function relatorio(){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Financiador Acadêmico')  and ($_SESSION['tipo']!='Usuário Público')) redirect('/financiamento/', 'refresh');
	
		//Recebe o filtro
		$filtro['data_inicial'] = (empty($_GET['data_inicial'])) ? '' : $_GET['data_inicial'];
		$filtro['data_final'] = (empty($_GET['data_final'])) ? '' : $_GET['data_final'];
		$filtro['codigo_projeto'] = (empty($_GET['codigo_projeto'])) ? '' : $_GET['codigo_projeto'];
		
		if(!empty($filtro['codigo_projeto'])){
			//Carrega a model
			$this->load->model('financiamento_model');
			
			//Cria um novo objeto financiamento
			$financiamento = new Financiamento_model();
		
			//Realiza a consulta do relatório
			$data['pdf']=true;
			$data['relatorio_projeto'] = $financiamento->relatorio($filtro);
		}else {
			$data=null;
		}
		
		//Carrega a view 
		$this->load->view('CRUD_financiamento/relFINANCIAMENTO',$data); 
	}
}