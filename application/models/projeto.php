<?php
class model_teste extends CI_Model{
 
  private $codigo;
  private $nome;
  private $categoria;
  private $duracao;
  private $valor;
  private $status;
 
  #constroi o objeto
  public function __construct($codigo='', $nome='',$categoria='',$duracao='',$valor='',$status=''){
     if(isset($codigo)) $this->codigo=$codigo;
     if(isset($nome)) $this->nome=$nome;
     if(isset($categoria)) $this->categoria=$categoria;
     if(isset($duracao)) $this->duracao=$duracao;
     if(isset($valor)) $this->valor=$valor;
     if(isset($status)) $this->status=$status;
     
     
  }
  
  
  #insere um novo registro no banco
  public function insert(){
   return $this->db->insert('projeto',$this);
 }
  
  #Remove um objeto de acordo com o nome
  public function remove () {
    return $this->db->delete('projeto',array('codigo'=>$this->codigo));
  }
 
 #Atualiza o objeto a partir da chave primaria
 public function update ($codigo='') {
     $objeto['codigo']=$codigo;
     //$this->db->update(nome da tabela,valores de atualização,referência)
     return $this->db->update('projeto',$this,$objeto);
  }
  
 #Retorna o objeto
 public function select($codigo='',$nome='',$categoria='') {
   //Adiciona clausula where
   if(isset($codigo)) $this->db->where('codigo', $codigo);
   if(isset($nome)) $this->db->where('nome', $nome);
   if(isset($categoria)) $this->db->where('categoria', $categoria);
   return $this->db->get('projeto');
  }
}
