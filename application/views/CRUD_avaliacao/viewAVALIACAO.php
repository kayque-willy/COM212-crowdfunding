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
            <form action="<?php echo base_url('/avaliacao/consultar'); ?>" class="form-inline pull-right" method="GET">
                <div class="form-group">
                    <input name="codigo" type="number" class="form-control" placeholder="Filtrar por codigo">
                </div>
                <div class="form-group">
                    <input name="nome" type="text" class="form-control" placeholder="Filtrar por nome">
                </div>
                <div class="form-group">
                    <select name="categoria" type="text" class="form-control" placeholder="Filtrar por categoria">
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
                                 <a href="<?php echo base_url('/avaliacao/cadastrar'); ?>">
                                    <li class="list-group-item ">Avaliar projeto</li>
                                </a>
                                <a href="<?php echo base_url('/avaliacao/consultar'); ?>">
                                    <li class="list-group-item list-group-item-info">Consultar avaliações</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <br>
                    <ul class="media-list">
                        <?php 
                        if(!empty($avaliacoes)){
                            foreach($avaliacoes as $avaliacao){
                        ?>
                        <li class="media">
                            <div class="media-body">
                                <h4 class="page-header"><?php echo $avaliacao['avaliacao']->projetoNome ?></h4>
                                <span><b>Codigo:</b> <?php echo $avaliacao['avaliacao']->codProjeto ?></span><br>
                                <span><b>Categoria:</b> <?php echo $avaliacao['avaliacao']->projetoCategoria ?></span><br>
                                <span><b>ID da avaliação:</b> <?php echo $avaliacao['avaliacao']->id ?></span><br>
                                <span><b>Avaliador:</b> <?php echo $avaliacao['avaliacao']->codAvaliador ?> - <?php echo $avaliacao['avaliacao']->nomeAvaliador ?></span>
                                
                            </div>
                            <!--Critérios-->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Criterio</th>
                                        <th>Peso</th>
                                        <th>Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                 if(isset($avaliacao['notas'])){
                                    foreach ($avaliacao['notas'] as $nota){
                                 ?>
                                    <tr>
                                        <td><?php echo $nota->criterio ?></td>
                                        <td><?php echo $nota->peso ?></td>
                                        <td class="text-center"><?php echo $nota->nota ?></td>
                                    </tr>
                                <?php
                                    }
                                 }
                                ?>
                                <tr class="active">
                                    <td></td>
                                    <td><b>Avaliação final</b></td>
                                    <?php if($avaliacao['avaliacao']->nota>=6){ ?>
                                        <td class="text-center success">  
                                    <?php }else{ ?>
                                        <td class="text-center danger">  
                                    <?php } ?>
                                        <b><?php echo $avaliacao['avaliacao']->nota ?> </b>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="text-right">
                                    <a href="<?php echo base_url('/avaliacao/alterar/'.$avaliacao['avaliacao']->codProjeto); ?>" class="active btn btn-primary hidden-xs">
                                        Alterar
                                    </a>
                                </div>
                            <!--Critérios-->
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
