<?php
class Criterio_avaliacao_model extends CI_Model{
 
  public $id;
  public $criterio;
  public $status;
  public $peso;
  public $categoriaProjeto;
    
  #constroi o objeto
  public function __construct($id='', $criterio='',$status='',$peso='',$categoriaProjeto=''){
     if(isset($id)) $this->id=$id;
     if(isset($criterio)) $this->criterio=$criterio;
     if(isset($status)) $this->status=$status;
     if(isset($peso)) $this->peso=$peso;
     if(isset($categoriaProjeto)) $this->categoriaProjeto=$categoriaProjeto;
  }
  
 #insere um novo registro no banco
  public function insert(){
     //Cria um vetor de valores para atualização
     $data = []; 
     if(isset($this->criterio)) $data['criterio'] = $this->criterio;
     if(isset($this->status)) $data['status'] = $this->status;
     if(isset($this->peso)) $data['peso'] = $this->peso;
     if(isset($this->categoriaProjeto)) $data['categoriaProjeto'] = $this->categoriaProjeto;
     return $this->db->insert('criterio',$data);
  }
  
  #Remove um objeto de acordo com o nome
  public function remove () {
    $data = [];
    if(isset($this->id)) $data['id'] = $this->id;
    return $this->db->delete('criterio',$data);
  }
 
  #Atualiza o objeto a partir da chave primaria
  public function update ($id='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->criterio)) $data['criterio'] = $this->criterio;
     if(isset($this->peso)) $data['peso'] = $this->peso;
  
     //Cria um vetor com a chave primária 
     $where['id']=$id;
     //$this->db->update(nome da tabela,valores de atualização,referência)
     return $this->db->update('criterio',$data,$where);
  }
  
  #Retorna o objeto
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['status'])) $this->db->where('status', $filtro['status']);
   if(!empty($filtro['id'])) $this->db->where('id', $filtro['id']);
   if(!empty($filtro['criterio'])) $this->db->where('criterio', $filtro['criterio']);
   if(!empty($filtro['categoria_projeto'])) $this->db->where('categoriaProjeto', $filtro['categoria_projeto']);
   return $this->db->get('criterio');
  }
  
  #Desativa o critério de acord com a chave primaria
  public function desativar() {
    //Cria um vetor de valores para atualização
    $data = [];
    $data['status'] = '0';
    
    //Cria um vetor com a chave primaria
    if(isset($this->id)) $where['id'] = $this->id;   
   
    //$this->db->update(nome da tabela,valores de atualização,referência)
    return $this->db->update('criterio',$data,$where);
  }
  
  #Ativa o critério de acord com a chave primaria
  public function ativar(){
    //Cria um vetor de valores para atualização
    $data = [];
    $data['status'] = '1';
    
    //Cria um vetor com a chave primaria
    if(isset($this->id)) $where['id'] = $this->id;   
   
    //$this->db->update(nome da tabela,valores de atualização,referência)
    return $this->db->update('criterio',$data,$where);
  }
}
