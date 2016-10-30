<?php
class Usuario_model extends CI_Model{
 
  public $login;
  public $senha;
  public $nome;
  public $cpf;
  public $pais;
  public $cidade;
  public $estado;
  public $endereco;
  public $data_nascimento;
  public $email;
  public $tipo;
  public $categoria;
  public $del;
 
  #constroi o objeto
  public function __construct($login='',$senha='',$nome='',$cpf='',$pais='',$cidade='', $estado='',$endereco='',$data_nascimento='',$email='',$tipo='',$categoria='',$del=''){
     if(isset($login)) $this->login=$login;
     if(isset($senha)) $this->senha=$senha;
     if(isset($nome)) $this->nome=$nome;
     if(isset($cpf)) $this->cpf=$cpf;
     if(isset($pais)) $this->pais=$pais;
     if(isset($cidade)) $this->cidade=$cidade;
     if(isset($estado)) $this->estado=$estado;
     if(isset($endereco)) $this->endereco=$endereco;
     if(isset($data_nascimento)) $this->data_nascimento=$data_nascimento;
     if(isset($email)) $this->email=$email;
     if(isset($tipo)) $this->tipo=$tipo;
     if(isset($categoria)) $this->categoria=$categoria;
     if(isset($del)) $this->del=$del;
  }
  
  #insere um novo usuario
  public function insert(){
     //Cria um vetor de valores para inserção
     $data = [];
     if(isset($this->login)) $data['login'] = $this->login;
     if(isset($this->senha)) $data['senha'] = $this->senha;
     if(isset($this->nome)) $data['nome'] = $this->nome;
     if(isset($this->cpf)) $data['cpf'] = $this->cpf;
     if(isset($this->pais)) $data['pais'] = $this->pais;
     if(isset($this->cidade)) $data['cidade'] = $this->cidade;
     if(isset($this->estado)) $data['estado'] = $this->estado;
     if(isset($this->endereco)) $data['endereco'] = $this->endereco;
     if(isset($this->data_nascimento)) $data['data_nascimento'] = $this->data_nascimento;
     if(isset($this->email)) $data['email'] = $this->email;
     if(isset($this->tipo)) $data['tipo'] = $this->tipo;
     if(isset($this->categoria)) $data['categoria'] = $this->categoria;
     if(isset($this->del)) $data['del'] = $this->del;
     return $this->db->insert('usuario',$data);
  }
  
  #Desativa um usuario de acordo com a chave primária
  public function remove($login) {
    //Cria um vetor de valores para atualização
    $data = [];
    $data['del'] = '1';
    
    //Cria um vetor com a chave primaria
    $where['login']=$login;

    //$this->db->update(nome da tabela,valores de atualização,referência)
    return $this->db->update('usuario',$data,$where);
  }
 
  #Atualiza o objeto a partir da chave primaria
  public function update ($login='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->login)) $data['login'] = $this->login;
     if(isset($this->senha)) $data['senha'] = $this->senha;
     if(isset($this->pais)) $data['pais'] = $this->pais;
     if(isset($this->cidade)) $data['cidade'] = $this->cidade;
     if(isset($this->estado)) $data['estado'] = $this->estado;
     if(isset($this->endereco)) $data['endereco'] = $this->endereco;
     if(isset($this->email)) $data['email'] = $this->email;
     if(isset($this->categoria)) $data['categoria'] = $this->categoria;
     if(isset($this->del)) $data['del'] = $this->del;
     
     //Cria um vetor com a chave primaria
     $where['login']=$login;
     
     //$this->db->update(nome da tabela,valores de atualização,referência)
     return $this->db->update('usuario',$data,$where);
  }
  
  #Retorna o usuario
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['login'])) $this->db->where('login', $filtro['login']);
   if(!empty($filtro['nome'])) $this->db->where('nome', $filtro['nome']);
   if(!empty($filtro['del'])) $this->db->where('del', $filtro['del']);
   return $this->db->get('usuario');
  }
  
}
