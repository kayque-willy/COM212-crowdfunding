<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto extends CI_Controller {

	#Index do controller
	public function index() {
	   	
	   	//Recebe o filtro
		$filtro['codigo'] = (empty($_GET['codigo'])) ? '' : $_GET['codigo'];
		$filtro['nome'] = (empty($_GET['nome'])) ? '' : $_GET['nome'];
		$filtro['categoria'] = (empty($_GET['categoria'])) ? '' : $_GET['categoria'];
		$filtro['status'] = 'aprovado';
	   	
		//Carrega a model
		$this->load->model('projeto_model');
			
		//Cria um novo objeto projeto
		$projeto = new Projeto_model();
		
		//$consulta o projeto
		$data['projetos']=$projeto->select($filtro);
		
	   //Carrega a view da index do projeto
	   $this->load->view('CRUD_projeto/indexPROJETO',$data); 
	 }
	
	#Cria um novo projeto
	public function cadastrar(){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Gestor de Projetos')) redirect('/projeto/', 'refresh');
		
		if(!empty($_POST)){
			
			//Recebe os dados do formulario
			$nome = (empty($_POST['nome'])) ? '' : $_POST['nome'];
			$descricao = (empty($_POST['descricao'])) ? '' : $_POST['descricao'];
			$categoria = (empty($_POST['categoria'])) ? '' : $_POST['categoria'];
			$duracao = (empty($_POST['duracao'])) ? '' : $_POST['duracao'];
			$valor = (empty($_POST['valor'])) ? '' : $_POST['valor'];
			$video = (empty($_POST['video'])) ? '' : $_POST['video'];
			$status = 'candidato';
			$valorMaximo=$valor;
			$valorMinimo='10';
			
			//Tratamento para salvar a imagem
			$imagem=null;
			//Se tiver imagem, realiza o upload
			if(!empty($_FILES["imagem"]['tmp_name'])) { 
				$config['upload_path'] = './temp/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['overwrite']=TRUE;
				$config['max_size']  = '10048000';
				$config['max_width'] = '10000';
				$config['max_height'] = '10000';
				$this->load->library('upload', $config);
				$this->upload->do_upload('imagem');
				$imagem=$this->upload->data();
			} 
			
			//Carrega a model
			$this->load->model('projeto_model');
		
			//Cria um novo projeto com os dados do POST
			$projeto = new Projeto_model(null,$nome,$categoria,$duracao,$valor,$status,$descricao,$video,$imagem,null,$valorMaximo,$valorMinimo);
			
			//Insere o projeto no banco
			if($projeto->insert()){
				//Limpa a imagem temporaria
				if(!empty($imagem)) unlink($imagem['full_path']);
				
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				redirect('/projeto/consultar/cad_sucesso', 'refresh');
			}else{
				//Limpa a imagem temporaria
				if(!empty($imagem)) unlink($imagem['full_path']);
				
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/projeto/consultar/cad_falha', 'refresh');
			}
		}
		
		//Carrega a view 
		$this->load->view('CRUD_projeto/addPROJETO'); 	
	}
	
	#Lista os projetos candidatos
	public function consultar($result=''){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Gestor de Projetos') and ($_SESSION['tipo']!='Avaliador de Projetos')) redirect('/projeto/', 'refresh');
		
		//Mensagem de resultado de alguma operação
		if(isset($result)){
			switch ($result){
				case 'cad_sucesso': 
					$data['sucesso']=true;
					$data['msg'] = 'Projeto cadastrado com sucesso!';
					break;
				case 'cad_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao cadastrar o projeto!';
					break;
				case 'alt_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'Projeto atualizado com sucesso!';
					break;
				case 'alt_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao atualizar o projeto!';
					break;
				case 'des_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'Projeto desativado com sucesso!';
					break;
				case 'des_falha':
					$data['falha']=true;
					$data['msg'] = 'Falha ao remover o projeto!';
					break;
			}
		}
		
		//Recebe o filtro
		$filtro['codigo'] = (empty($_GET['codigo'])) ? '' : $_GET['codigo'];
		$filtro['nome'] = (empty($_GET['nome'])) ? '' : $_GET['nome'];
		$filtro['categoria'] = (empty($_GET['categoria'])) ? '' : $_GET['categoria'];
		$filtro['status'] = 'candidato';
				
		//Carrega a model
		$this->load->model('projeto_model');
			
		//Cria um novo objeto projeto
		$projeto = new Projeto_model();
		
		//$consulta o projeto
		$data['projetos']=$projeto->select($filtro);
		
		//Carrega a view 
		$this->load->view('CRUD_projeto/viewPROJETO',$data); 
	}
	
	#Lista todos os projetos
	public function todosProjetos($result=''){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Gestor de Projetos') and ($_SESSION['tipo']!='Avaliador de Projetos')) redirect('/projeto/', 'refresh');
		
		//Mensagem de resultado de alguma operação
		if(isset($result)){
			switch ($result){
				case 'cad_sucesso': 
					$data['sucesso']=true;
					$data['msg'] = 'Projeto cadastrado com sucesso!';
					break;
				case 'cad_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao cadastrar o projeto!';
					break;
				case 'alt_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'Projeto atualizado com sucesso!';
					break;
				case 'alt_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao atualizar o projeto!';
					break;
				case 'des_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'Projeto desativado com sucesso!';
					break;
				case 'des_falha':
					$data['falha']=true;
					$data['msg'] = 'Falha ao remover o projeto!';
					break;
			}
		}
		
		//Recebe o filtro
		$filtro['codigo'] = (empty($_GET['codigo'])) ? '' : $_GET['codigo'];
		$filtro['nome'] = (empty($_GET['nome'])) ? '' : $_GET['nome'];
		$filtro['categoria'] = (empty($_GET['categoria'])) ? '' : $_GET['categoria'];
		$filtro['status'] = (empty($_GET['status'])) ? '' : $_GET['status'];
				
		//Carrega a model
		$this->load->model('projeto_model');
			
		//Cria um novo objeto projeto
		$projeto = new Projeto_model();
		
		//$consulta o projeto
		$data['projetos']=$projeto->select($filtro);
		
		//Carrega a view 
		$this->load->view('CRUD_projeto/listPROJETO',$data); 
	}
	
	#Altera o projeto
	public function alterar($cod=''){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Gestor de Projetos')) redirect('/projeto/', 'refresh');
		
		//Recebe os dados do formulario para atualização
		if(!empty($_POST)){
			$codigo = (empty($_POST['codigo'])) ? '' : $_POST['codigo'];
			$nome = (empty($_POST['nome'])) ? '' : $_POST['nome'];
			$descricao = (empty($_POST['descricao'])) ? '' : $_POST['descricao'];
			$categoria = (empty($_POST['categoria'])) ? '' : $_POST['categoria'];
			$duracao = (empty($_POST['duracao'])) ? '' : $_POST['duracao'];
			$valor = (empty($_POST['valor'])) ? '' : $_POST['valor'];
			$video = (empty($_POST['video'])) ? '' : $_POST['video'];
			$status = (empty($_POST['status'])) ? null : $_POST['status'];
			
			//Tratamento para salvar a imagem
			$imagem=null;
			//Se tiver imagem, realiza o upload
			if(!empty($_FILES["imagem"]['tmp_name'])) { 
				$config['upload_path'] = './temp/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['overwrite']=TRUE;
				$config['max_size']  = '10048000';
				//$config['max_width'] = '1024';
				//$config['max_height'] = '768';
				$this->load->library('upload', $config);
				$this->upload->do_upload('imagem');
				$imagem=$this->upload->data();
			} 
			
			//Carrega a model
			$this->load->model('projeto_model');
				
			//Cria um novo projeto com os dados do POST
			$projeto = new Projeto_model(NULL,$nome,$categoria,$duracao,$valor,$status,$descricao,$video,$imagem);
			
			//Atualiza o projeto no banco
			if($projeto->update($codigo)){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				redirect('/projeto/consultar/alt_sucesso', 'refresh');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/projeto/consultar/alt_falha', 'refresh');
			}
		}
		
		//Recupera os dados
		if(!empty($cod)){
			$filtro['codigo']=$cod;
			
			//Carrega a model
			$this->load->model('projeto_model');
				
			//Cria um novo objeto projeto
			$projeto = new Projeto_model();
			
			//consulta o projeto pelo codigo
			$data['projeto']=$projeto->select($filtro);
			
			//Carrega a view 
			$this->load->view('CRUD_projeto/editPROJETO',$data); 
		}else{
			//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
			redirect('/projeto/consultar/alt_falha', 'refresh');
		}
	}
	
	#Deleta o projeto 
	public function remover($cod=''){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Gestor de Projetos')) redirect('/projeto/', 'refresh');
		
		//Recebe os dados do formulario
		$codigo = (empty($cod)) ? '' : $cod;
		
		//Carrega a model
		$this->load->model('projeto_model');
			
		//Cria um novo objeto projeto
		$projeto = new Projeto_model($codigo);
		
		//Remove o projeto do banco
		if($projeto->remove($codigo)){
			//Se a operação for bem sucedida, redireciona com mensagem de sucesso
			redirect('/projeto/consultar/des_sucesso', 'refresh');
		}else{
			//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
			redirect('/projeto/consultar/des_falha', 'refresh');
		}
	}

	#Visualiza o projeto individudal
	public function ver_projeto($codigo=''){
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Gestor de Projetos') and ($_SESSION['tipo']!='Avaliador de Projetos')) redirect('/projeto/', 'refresh');
		
		//Recebe o código
		$filtro['codigo']=$codigo;
		
		//Carrega a model
		$this->load->model('projeto_model');
			
		//Cria um novo objeto projeto
		$projeto = new Projeto_model();
		
		//$consulta o projeto
		$data['projetos']=$projeto->select($filtro);
		
		//Carrega a view 
		$this->load->view('CRUD_projeto/readPROJETO',$data); 
	}
	
	#Visualiza o projeto aprovado
	public function projeto_aprovado($codigo='',$result=''){
		
		//Mensagem de resultado de alguma operação
		if(isset($result)){
			switch ($result){
				case 'alt_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'Projeto finalizado com sucesso!';
					break;
				case 'alt_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao finalizar o projeto!';
					break;
			}
		}
		
		//Recebe o código
		$filtro['codigo']=$codigo;
		
		//Carrega a model
		$this->load->model('projeto_model');
			
		//Cria um novo objeto projeto
		$projeto = new Projeto_model();
		
		//$consulta o projeto
		$data['projetos']=$projeto->select($filtro);
		
		//Carrega a view 
		$this->load->view('CRUD_projeto/read_aprovPROJETO',$data); 
	}
	
	#Finaliza o projeto
	public function finalizar($cod=''){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Gestor de Projetos')) redirect('/projeto/', 'refresh');
		
		//Recebe o status de finalizado
		$status = 'finalizado';
			
		//Carrega a model
		$this->load->model('projeto_model');
				
		//Cria um novo projeto com os dados do POST
		$projeto = new Projeto_model(NULL,NULL,NULL,NULL,NULL,$status,NULL,NULL,NULL);
			
		//Atualiza o projeto no banco
		if($projeto->update($cod)){
			//Se a operação for bem sucedida, redireciona com mensagem de sucesso
			redirect('/projeto/projeto_aprovado/'.$cod.'/alt_sucesso', 'refresh');
		}else{
			//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
			redirect('/projeto/projeto_aprovado/'.$cod.'/alt_falha', 'refresh');
		}
	}
	
	#Atualiza critérios de restrição de financiamento de projeto
	public function restricao($cod=''){
		
		//Restrição de acesso
		if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Gestor de Projetos')) redirect('/projeto/', 'refresh');
		
		//Recebe os dados do formulario para atualização
		if(!empty($_POST)){
			$codigo = (empty($_POST['codigo'])) ? '' : $_POST['codigo'];
			$prazoMaximo = (empty($_POST['prazoMaximo'])) ? '' : $_POST['prazoMaximo'];
			$valorMaximo = (empty($_POST['valorMaximo'])) ? '' : $_POST['valorMaximo'];
			$valorMinimo = (empty($_POST['valorMinimo'])) ? '' : $_POST['valorMinimo'];
			
			//Carrega a model
			$this->load->model('projeto_model');
				
			//Cria um novo projeto com os dados do POST
			$projeto = new Projeto_model(null,null,null,null,null,null,null,null,null,$prazoMaximo,$valorMaximo,$valorMinimo);
			
			//Atualiza o projeto no banco
			if($projeto->update($codigo)){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				redirect('/projeto/consultar/alt_sucesso', 'refresh');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				redirect('/projeto/consultar/alt_falha', 'refresh');
			}
		}
		
		//Recupera os dados
		if(!empty($cod)){
			$filtro['codigo']=$cod;
			
			//Carrega a model
			$this->load->model('projeto_model');
				
			//Cria um novo objeto projeto
			$projeto = new Projeto_model();
			
			//consulta o projeto pelo codigo
			$data['projeto']=$projeto->select($filtro);
			
			//Carrega a view 
			$this->load->view('CRUD_projeto/restricaoPROJETO',$data); 
		}else{
			//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
			redirect('/projeto/consultar/alt_falha', 'refresh');
		}
	}
}