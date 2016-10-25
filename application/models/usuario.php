<?php
class usuario extends CI_Model{
 
  private $login;
  private $senha;
  private $nome;
  private $cpf;
  private $pais;
  private $cidade;
  private $estado;
  private $endereco;
  private $data_nascimento;
  private $email;
  private $tipo;
  private $categoria;
  private $del;

 
  #constroi o objeto
  public function __construct($login='', $senha='', $nome='',  $cpf='', $pais='',  $cidade='',  $estado='', $endereco='',  $data_nascimento='',  $email='', $tipo='', $categoria='',$del=''){
     if(isset($login)) $this->login=$login;
     if(isset($senha)) $this->senha=$senha;
     if(isset($nome)) $this->nome=$nome;
     if(isset($cpf)) $this->cpf=$cpf;
     if(isset($pais)) $this->pais=$pais;
     if(isset($cidade)) $this->cidade=$cidade;
     if(isset($data_nascimento)) $this->data_nascimento=$data_nascimento;
     if(isset($email)) $this->email=$email;
     if(isset($tipo)) $this->tipo=$tipo;
     if(isset($categoria)) $this->categoria=$categoria;
     if(isset($del)) $this->del=$del;
  }
  
  #insere um novo registro no banco
  public function insert(){
   return $this->db->insert('usuario',$this);
 }
  
  #Remove um objeto de acordo com o nome
  public function remove($login) {
    $objeto['login']=$login;
    //$this->db->update(nome da tabela,valores de atualização,referência)
    return $this->db->update('usuario',$this,$objeto);
  }
 
 #Atualiza o objeto a partir da chave primaria
 public function update ($login='') {
     $objeto['login']=$login;
     //$this->db->update(nome da tabela,valores de atualização,referência)
     return $this->db->update('usuario',$this,$objeto);
  }
  
 #Retorna o objeto
 public function select($login='',$nome='',$del='') {
   //Adiciona clausula where
   if(!empty($filtro)) $this->db->where('login', $login);
   if(!empty($filtro)) $this->db->where('cpf', $cpf);
   if(!empty($filtro)) $this->db->where('nome', $nome);
   if(!empty($filtro)) $this->db->where('email', $email);
   if(!empty($filtro)) $this->db->where('categoria', $categoria);
   if(!empty($filtro)) $this->db->where('tipo', $tipo);
   if(!empty($filtro)) $this->db->where('nome', $del);
   return $this->db->get('usuario');
  }
}
