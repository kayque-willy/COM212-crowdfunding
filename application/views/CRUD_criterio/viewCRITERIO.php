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
    <!--Header-->
    <?php $this->load->view("CRUD_projeto/headerPROJETO");?>
    <!--Header-->
    <div class="section">
        <div class="container">
            <h3 class="page-header">Critérios de avaliação de projeto</h3>
            <!--mensagem-->
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
            <!--mensagem-->
            <!--filtro-->
            <form action="<?php echo base_url('/criterio/consultar'); ?>" class="form-inline pull-right" method="GET">
                <div class="form-group">
                    <input name="criterio" type="text" class="form-control" placeholder="Filtrar por criterio">
                </div>
                <div class="form-group">
                    <select name="categoria" type="text" class="form-control" placeholder="Filtrar por categoria de projeto">
                        <option value="" disabled selected>Filtrar por categoria</option>
                        <option>Pesquisa</option>
                        <option>Competição Tecnológica</option>
                        <option>Inovação no Ensino</option>
                        <option>Manutenção e Reforma</option>
                        <option>Pequenas Obras</option>
                     </select>
                </div>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>
            <!--filtro-->
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <ul class="list-group">
                                <a href="<?php echo base_url('/criterio/cadastrar'); ?>">
                                    <li class="list-group-item">Cadastrar Criterio</li>
                                </a>
                                <a href="<?php echo base_url('/criterio/consultar'); ?>">
                                    <li class="list-group-item list-group-item-info">Listar Criterios</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <br>
                    <table class="table">
                         <?php 
                            if(!empty($categoria)){
                        ?>
                            <caption class="page-header"><?php echo $categoria ?></caption>
                        <?php 
                            }
                        ?>
                        <thead>
                            <tr>
                                <th>Critério</th>
                                <th>Categoria do projeto</th>
                                <th>Peso</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <?php
                        if(!empty($criterios)){
                            foreach($criterios->result() as $criterio){
                        ?>
                           <tr>
                               <td><?php echo $criterio->criterio ?></td>
                               <td><?php echo $criterio->categoriaProjeto ?></td>
                               <td><?php echo $criterio->peso ?></td>
                               <?php
                                    if($criterio->status=='1'){
                               ?> 
                                    <td class="success text-center" data-toggle="button">Ativo</td>
                               <?php
                                    }else{
                               ?> 
                                     <td class="danger text-center" data-toggle="button">Desativado</td>
                               <?php
                                    }
                               ?> 
                                <td class="text-center">
                                   <a href="<?php echo base_url('/criterio/alterar/'.$criterio->id); ?>" class="btn btn-sm btn-primary hidden-xs">
                                        Alterar
                                   </a>
                                   <?php
                                        if($criterio->status=='0'){
                                   ?> 
                                        <a href="<?php echo base_url('/criterio/ativar/'.$criterio->id); ?>" class="btn btn-sm btn-success">Ativar</a>
                                   <?php
                                        }else{
                                   ?> 
                                        <a href="<?php echo base_url('/criterio/desativar/'.$criterio->id); ?>" class="btn btn-sm btn-danger">Desativar</a> 
                                   <?php
                                        }
                                   ?> 
                                </td>
                           </tr>
                        <?php 
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!--Footer-->
    <?php $this->load->view("footer");?>
    <!--Footer-->
</body>

</html>
