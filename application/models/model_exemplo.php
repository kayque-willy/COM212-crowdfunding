<?php
class model_teste extends CI_Model{
 
  private $nome;
  private $descricao;
 
  #constroi o objeto
  public function __construct($nome='', $descricao=''){
     if(isset($nome)) $this->name=$nome;
     if(isset($descricao)) $this->description=$descricao;
  }
  
  #insere um novo registro no banco
  public function insert(){
   return $this->db->insert('tabela_banco',$this);
 }
  
  #Remove um objeto de acordo com o nome
  public function remove () {
    return $this->db->delete('tabela_banco',array('nome'=>$this->nome));
  }
 
 #Atualiza o objeto a partir do nome
 public function update ($nome='') {
     $objeto['nome']=$nome;
     //$this->db->update(nome da tabela,valores de atualização,referência)
     return $this->db->update('tabela_banco',$this,$objeto);
  }
  
 #Retorna o objeto
 public function get($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro)) $this->db->where('nome', $filtro);
   return $this->db->get('tabela_banco');
  }
}
