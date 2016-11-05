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
            <h3 class="page-header text-center">Repasses financeiros de projeto</h3>
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
            <form action="<?php echo base_url('/repasse/consultar'); ?>" class="form-inline pull-right" method="GET">
                <div class="form-group">
                    <input name="codProjeto" type="text" class="form-control" placeholder="Filtrar código do projeto">
                </div>
                <div class="form-group">
                    <input name="data" type="date" class="form-control" placeholder="Filtrar data">
                </div>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>
            <!--filtro-->
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <ul class="list-group">
                                <a href="<?php echo base_url('/repasse/cadastrar'); ?>">
                                    <li class="list-group-item">Cadastrar repasse financeiro</li>
                                </a>
                                <a href="<?php echo base_url('/repasse/consultar'); ?>">
                                    <li class="list-group-item list-group-item-info">Listar repasse financeiro</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <ul class="media-list">
                        <?php 
                        if(!empty($repasses)){
                            foreach($repasses as $repasse){
                        ?>
                        <li class="media">
                            <div class="media-body">
                                <h4 class="page-header"><?php echo $repasse['repasse']->projetoNome ?></h4>
                                <span><b>Valor total do repasse</b> <?php echo $repasse['repasse']->projetoCategoria ?></span><br>
                            </div>
                            <!--Repasses do projeto-->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nome da necessidade</th>
                                        <th>Valor atribuido a necessidade</th>
                                        <th>Data</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                 if(isset($repasse['notas'])){
                                    foreach ($repasse['notas'] as $nota){
                                 ?>
                                    <tr>
                                        <td><?php echo $nota->criterio ?></td>
                                        <td><?php echo $nota->peso ?></td>
                                        <td><?php echo $nota->nota ?></td>
                                        <td><?php echo $nota->nota ?></td>
                                       <td>
                                          <a href='<?php echo base_url("/projeto/alterar/").$projeto->codigo ?>' class="btn btn-sm btn-primary">Editar</a>
                                       </td>
                                    </tr>
                                <?php
                                    }
                                 }
                                ?>
                               </tbody>
                            </table>
                            <!--Repasses do projeto-->
                        </li>
                         <hr>
                        <?php 
                            }
                        }
                        ?>
                    </ul>
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
