<?php
class Nota_avaliacao_model extends CI_Model{
 
  public $id_criterio;
  public $id_avaliacao;
  public $nota;
  public $sugestoes;
  
  #constroi o objeto
  public function __construct($id_criterio='', $id_avaliacao='',$nota='',$sugestoes=''){
     if(isset($id_criterio)) $this->id_criterio=$id_criterio;
     if(isset($id_avaliacao)) $this->id_avaliacao=$id_avaliacao;
     if(isset($nota)) $this->nota=$nota;
     if(isset($sugestoes)) $this->sugestoes=$sugestoes;
  }
  
 #insere um novo registro no banco
  public function insert(){
    //Cria um vetor de valores para atualização
     $data = []; 
     if(isset($this->id_criterio)) $data['id_criterio'] = $this->id_criterio;
     if(isset($this->id_avaliacao)) $data['id_avaliacao'] = $this->id_avaliacao;
     if(isset($this->nota)) $data['nota'] = $this->nota;
     if(isset($this->sugestoes)) $data['sugestoes'] = $this->sugestoes;
     return $this->db->insert('nota',$data);
  }
  
  #Remove um objeto de acordo com o nome
  public function remove () {
    $data = [];
    if(isset($this->id_criterio)) $data['id_criterio'] = $this->id_criterio;
    if(isset($this->id_avaliacao)) $data['id_avaliacao'] = $this->id_avaliacao;
    return $this->db->delete('nota',$data);
  }
 
  #Atualiza o objeto a partir da chave primaria
  public function update ($id_criterio='',$id_avaliacao='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->nota)) $data['nota'] = $this->nota;
     if(isset($this->sugestoes)) $data['sugestoes'] = $this->sugestoes;
    
     //Cria um vetor com a chave primária 
     $where['id_criterio']=$id_criterio;
     $where['id_avaliacao']=$id_avaliacao;
     //$this->db->update(nome da tabela,valores de atualização,referência)
     return $this->db->update('nota',$data,$where);
  }
  
  #Retorna o objeto
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['categoria'])) $this->db->where('codigo', $filtro['codigo']);
   if(!empty($filtro['criterio'])) $this->db->where('nome', $filtro['nome']);
   return $this->db->get('projeto');
  }
}
