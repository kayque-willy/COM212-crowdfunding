<?php
class Avaliacao_projeto_model extends CI_Model{
 
  public $codigo;
  public $nome;
  public $categoria;
  public $avaliador;
  public $nomeAvaliador;
  public $data;
 
  #constroi o objeto
  public function __construct($codigo='', $nome='',$categoria='',$avaliador='',$nomeAvaliador='',$data=''){
     if(isset($codigo)) $this->codigo=$codigo;
     if(isset($nome)) $this->nome=$nome;
     if(isset($categoria)) $this->categoria=$categoria;
     if(isset($avaliador)) $this->avaliador=$avaliador;
     if(isset($nomeAvaliador)) $this->nomeAvaliador=$nomeAvaliador;
     if(isset($data)) $this->data=$data;
  }
  
  #insere um novo registro no banco
  #cara eu tenho que colocar oque aqui msm
  //$this->db->insert('nome da tabela do banco',$this)
  //cria uma tabela no banco de dados
  //tabela avaliacao?
  
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
