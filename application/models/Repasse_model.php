<?php
class Repasse_model extends CI_Model{
 
  public $codProjeto;
  public $necessidade;
  public $data;
  public $valorParcela;
  public $status;
    
  #Constroi o objeto
  public function __construct($codProjeto='', $necessidade='',$data='',$valorParcela='',$status=''){
     if(isset($codProjeto)) $this->codProjeto=$codProjeto;
     if(isset($necessidade)) $this->necessidade=$necessidade;
     if(isset($data)) $this->data=$data;
     if(isset($valorParcela)) $this->valorParcela=$valorParcela;
     if(isset($status)) $this->status=$status;
  }
  
  #Insere um novo registro no banco
  public function insert(){
     //Cria um vetor de valores para atualização
     $data = []; 
     if(isset($this->codProjeto)) $data['codProjeto'] = $this->codProjeto;
     if(isset($this->necessidade)) $data['necessidade'] = $this->necessidade;
     if(isset($this->data)) $data['data'] = $this->data;
     if(isset($this->valorParcela)) $data['valorParcela'] = $this->valorParcela;
     if(isset($this->status)) $data['status'] = $this->status;
     return $this->db->insert('repasse',$data);
  }
  
  #Remove um objeto de acordo com o nome
  public function remove () {
    $data = [];
    if(isset($this->codProjeto)) $data['codProjeto'] = $this->codProjeto;
    if(isset($this->necessidade)) $data['necessidade'] = $this->necessidade;
    return $this->db->delete('repasse',$data);
  }
 
  #Atualiza o objeto a partir da chave primaria
  public function update ($codProjeto='',$necessidade='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->data)) $data['data'] = $this->data;
     if(isset($this->valorParcela)) $data['valorParcela'] = $this->valorParcela;
     if(isset($this->status)) $data['status'] = $this->status;
     //Cria um vetor com a chave primária 
     $where['codProjeto']=$codProjeto;
     $where['necessidade']=$necessidade;
     //$this->db->update(nome da tabela,valores de atualização,referência)
     return $this->db->update('repasse',$data,$where);
  }
  
  #Retorna o objeto
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['codProjeto'])) $this->db->where('codProjeto', $filtro['codProjeto']);
   if(!empty($filtro['data'])) $this->db->where('data', $filtro['data']);
   //Consulta
   $this->db->select('*');    
   $this->db->from('repasse');
   return $this->db->get();
  }
  
  #Retorna o total do repasse
  public function total($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['codProjeto'])) $this->db->where('repasse.codProjeto', $filtro['codProjeto']);
   if(!empty($filtro['data'])) $this->db->where('repasse.data', $filtro['data']);
  
   //Consultar inner join
   $this->db->select('repasse.codProjeto as codProjeto, projeto.nome as nomeProjeto, sum(valorParcela) as total');    
   $this->db->from('repasse');
   $this->db->join('projeto', 'repasse.codProjeto = projeto.codigo','inner');
   $this->db->group_by('repasse.codProjeto');
   return $this->db->get();
  }
  
}