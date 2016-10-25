<?php
class Projeto_model extends CI_Model{
 
  public $codigo;
  public $nome;
  public $categoria;
  public $duracao;
  public $valor;
  public $status;
 
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
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->nome)) $data['nome'] = $this->nome;
     if(isset($this->categoria)) $data['categoria'] = $this->categoria;
     if(isset($this->duracao)) $data['duracao'] = $this->duracao;
     if(isset($this->valor)) $data['valor'] = $this->valor;
     if(isset($this->status)) $data['status'] = $this->status;
     
     //Cria um vetor com a chave primária 
     $where['codigo']=$codigo;
     
     //$this->db->update(nome da tabela,valores de atualização,referência)
     return $this->db->update('projeto',$data,$where);
  }
  
  #Retorna o objeto
  public function select($codigo='',$nome='',$categoria='') {
   //Adiciona clausula where
   if(!empty($codigo)) $this->db->where('codigo', $codigo);
   if(!empty($nome)) $this->db->where('nome', $nome);
   if(!empty($categoria)) $this->db->where('categoria', $categoria);
   return $this->db->get('projeto');
  }
}
