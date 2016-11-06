<!DOCTYPE html>
<html>

<head>
    <title>UNIFUNDING</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/estilo.css">
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">Excluir projeto</h4>
                </div>
                <div class="modal-body">
                    Deseja realmente excluir este projeto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->
    <!--Header-->
    <?php $this->load->view("CRUD_projeto/headerPROJETO");?>
    <!--Header-->
    <!-- Inicio de um CRUD -->
    <div id="main" class="container-fluid">
        <h3 class="page-header text-center">Projetos candidatos</h3>
        <!-- Mensagem -->
        <?php if (isset($sucesso)){  ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Operação realizada com sucesso!</strong>
            <p>
                <?php echo $msg; ?>
            </p>
        </div>
        <?php } ?>
        <?php if (isset($falha)){ ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Falha ao realizar operação!</strong>
            <p>
                <?php echo $msg; ?>
            </p>
        </div>
        <?php } ?>
        <!-- Mensagem -->
        <!--Filtro -->
        <form action="<?php echo base_url('/projeto/consultar'); ?>" class="form-inline pull-right" method="GET">
            <div class="form-group">
                <input name="codigo" type="text" class="form-control" placeholder="Filtrar por codigo">
            </div>
            <div class="form-group">
                <input name="nome" type="text" class="form-control" placeholder="Filtrar por nome">
            </div>
            <div class="form-group">
                <select name="categoria" type="text" class="form-control" placeholder="Filtrar por categoria">
                        <option value="" disabled selected>Categoria</option>
                        <option>Pesquisa</option>
                        <option>Competição Tecnológica</option>
                        <option>Inovação no Ensino</option>
                        <option>Manutenção e Reforma</option>
                        <option>Pequenas Obras</option>
                     </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>
        <!--Filtro -->
        
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-primary">
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item ">
                                    <a href="<?php echo base_url('/projeto/cadastrar'); ?>">Cadastrar novo projeto</a>
                                </li>
                                </a>
                                <a href="<?php echo base_url('/projeto/consultar'); ?>">
                                    <li class="list-group-item list-group-item-info">Listar Projetos candidatos</li>
                                </a>
                            </ul>
                        </div>
                    </div>
            </div>
            <div class="col-md-9">
                 <div class="center-block">
            <table class="table">
                <thead>
                    <tr>
                        <th>Código do Projeto</th>
                        <th>Nome do Projeto</th>
                        <th>Categoria do Projeto</th>
                        <th>Duração do Projeto</th>
                        <th>Valor do Projeto</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Percorre o objeto de consulta enviado do controller-->
                    <?php
                		if(isset($projetos)){
                          foreach ($projetos->result() as $projeto) {
                            echo '<tr>';
                            echo '<td>'.$projeto->codigo.'</td>';
                            echo '<td><a href="'.base_url("/projeto/ver_projeto/$projeto->codigo").'">'.$projeto->nome.'</a></td>';
                            echo '<td>'.$projeto->categoria.'</td>';
                            echo '<td>'.$projeto->duracao.'</td>';
                            echo '<td>'.$projeto->valor.'</td>';
                            echo '<td>
                			 <a href='.base_url("/projeto/alterar/").$projeto->codigo.' class="btn btn-sm btn-primary">Editar</a>
                                <a href='.base_url("/projeto/remover/").$projeto->codigo.' class="btn btn-sm btn-danger" data-toggle="modal">Excluir</a>
                			 </td>';
                			echo '</tr>';
                           }
                        }
                	?>
                        <!-- Percorre o objeto de consulta enviado do controller-->
                </tbody>
            </table>
        </div>
                
            </div>
        </div>
        
       
    </div>
    <!--Footer-->
    <?php $this->load->view("footer");?>
    <!--Footer-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!-- Latest compiled and minified JavaScript -->
    <!--<<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
</body>
</html>
