<?php
class Projeto_model extends CI_Model{
 
  public $codigo;
  public $nome;
  public $imagem;
  public $video;
  public $descricao;
  public $categoria;
  public $duracao;
  public $valor;
  public $status;
  public $prazoMaximo;
  public $valorMaximo;
  public $valorMinimo;
    
  #constroi o objeto
  public function __construct($codigo='', $nome='',$categoria='',$duracao='',$valor='',$status='',$descricao='',$video='',$imagem='',$prazoMaximo='',$valorMaximo='',$valorMinimo=''){
     if(isset($codigo)) $this->codigo=$codigo;
     if(isset($nome)) $this->nome=$nome;
     if(isset($categoria)) $this->categoria=$categoria;
     if(isset($duracao)) $this->duracao=$duracao;
     if(isset($valor)) $this->valor=$valor;
     if(isset($status)) $this->status=$status;
     if(isset($descricao)) $this->descricao=$descricao;
     if(isset($video)) $this->video=$video;
     if(isset($imagem['full_path'])) $this->imagem = file_get_contents($imagem['full_path']);
     if(isset($prazoMaximo)) $this->prazoMaximo=$prazoMaximo;
     if(isset($valorMaximo)) $this->valorMaximo=$valorMaximo;
     if(isset($valorMinimo)) $this->valorMinimo=$valorMinimo;
  }
  
  #insere um novo registro no banco
  public function insert(){
    //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->codigo)) $data['codigo'] = $this->codigo;
     if(isset($this->nome)) $data['nome'] = $this->nome;
     if(isset($this->categoria)) $data['categoria'] = $this->categoria;
     if(isset($this->duracao)) $data['duracao'] = $this->duracao;
     if(isset($this->valor)) $data['valor'] = $this->valor;
     if(isset($this->status)) $data['status'] = $this->status;
     if(isset($this->descricao)) $data['descricao'] = $this->descricao;
     if(isset($this->video)) $data['video'] = $this->video;
     if(isset($this->imagem)) $data['imagem'] = $this->imagem;
     if(isset($prazoMaximo)) $data['prazoMaximo']=$this->prazoMaximo;
     if(isset($valorMaximo)) $data['valorMaximo']=$this->valorMaximo;
     if(isset($valorMinimo)) $data['valorMinimo']=$this->valorMinimo;
     return $this->db->insert('projeto',$data);
 }
  
  #Remove um objeto de acordo com o nome
  public function remove () {
    $data = [];
    if(isset($this->codigo)) $data['codigo'] = $this->codigo;
    return $this->db->delete('projeto',$data);
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
     if(isset($this->descricao)) $data['descricao'] = $this->descricao;
     if(isset($this->video)) $data['video'] = $this->video;
     if(isset($this->imagem)) $data['imagem'] = $this->imagem;
     if(isset($prazoMaximo)) $data['prazoMaximo']=$this->prazoMaximo;
     if(isset($valorMaximo)) $data['valorMaximo']=$this->valorMaximo;
     if(isset($valorMinimo)) $data['valorMinimo']=$this->valorMinimo;
     
     //Cria um vetor com a chave primária 
     $where['codigo']=$codigo;
     
     //$this->db->update(nome da tabela,valores de atualização,referência)
     return $this->db->update('projeto',$data,$where);
  }
  
  #Retorna o objeto
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['codigo'])) $this->db->where('codigo', $filtro['codigo']);
   if(!empty($filtro['nome'])) $this->db->where('nome', $filtro['nome']);
   if(!empty($filtro['categoria'])) $this->db->where('categoria', $filtro['categoria']);
   if(!empty($filtro['status'])) $this->db->where('status', $filtro['status']);
   if(!empty($filtro['prazoMaximo'])) $this->db->where('prazoMaximo', $filtro['prazoMaximo']);
   if(!empty($filtro['valorMaximo'])) $this->db->where('valorMaximo', $filtro['valorMaximo']);
   if(!empty($filtro['valorMinimo'])) $this->db->where('valorMinimo', $filtro['valorMinimo']);
   return $this->db->get('projeto');
  }
  
}