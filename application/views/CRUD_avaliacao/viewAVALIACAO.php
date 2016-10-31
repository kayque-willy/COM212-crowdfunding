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
                    <input name="nome" type="number" class="form-control" placeholder="Filtrar por nome">
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
                            if(!empty($categoria)){
                        ?>
                            <h3 class="page-header"><?php echo $categoria ?></h3>
                        <?php 
                            }
                        ?>
                        <?php 
                        if(!empty($criterios)){
                            foreach($criterios->result() as $criterio){
                        ?>
                       
                        <li class="media">
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $criterio->criterio ?></h4>
                                <span><b>Categoria:</b> <?php echo $criterio->categoriaProjeto ?></span><br>
                                <span><b>Peso:</b> <?php echo $criterio->peso ?></span>
                                <?php
                                    if($criterio->status=='1'){
                                ?> 
                                    <a class="btn btn-block btn-success btn-xs disabled" data-toggle="button">Ativo</a><br>
                                <?php
                                    }else{
                                ?> 
                                     <a class="btn btn-block btn-danger btn-xs disabled" data-toggle="button">Desativado</a><br>
                                <?php
                                    }
                                ?> 
                                <div class="text-center">
                                    <a href="<?php echo base_url('/criterio/alterar/'.$criterio->id); ?>" class="active btn btn-primary hidden-xs">
                                        Alterar
                                        <br>
                                    </a>
                                    <a href="<?php echo base_url('/criterio/ativar/'.$criterio->id); ?>" class="btn btn-primary">Ativar</a>
                                    <a href="<?php echo base_url('/criterio/desativar/'.$criterio->id); ?>" class="btn btn-default">Desativar</a> 
                                </div>
                            </div>
                        </li>
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
