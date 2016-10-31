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
            <h3 class="page-header">Avaliar projeto</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <ul class="list-group">
                                <a href="<?php echo base_url('/criterio/cadastrar'); ?>">
                                    <li class="list-group-item list-group-item-info">Avaliar projeto</li>
                                </a>
                                <a href="<?php echo base_url('/criterio/consultar'); ?>">
                                    <li class="list-group-item">Consultar avaliações</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="col-md-12">
                        <!--Formulario de cadastro-->
                        <form action="<?php echo base_url('/avaliacao/cadastrar'); ?>" method="POST" class="form-horizontal" role="form">
                            <legend>Ficha de avaliação</legend>
                            <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <label>Codigo do projeto</label>
                                    <input required name="codProjeto" type="text" class="form-control" id="criterio" placeholder="Código do projeto">
                                </div>
                            </div>
                            <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <label>Codigo do avaliador</label>
                                    <input required name="codAvaliador" type="text" class="form-control" id="criterio" placeholder="Código do avaliador">
                                </div>
                            </div>
                            <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <label>Nome do avaliador</label>
                                    <input required name="nomeAvaliador" type="text" class="form-control" id="criterio" placeholder="Nome do avaliador">
                                </div>
                            </div>
                           <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <label>Data da avaliação</label>
                                    <input required name="data" type="date" class="form-control" id="criterio">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Avaliar projeto</button>
                        </form>
                        <!--Formulario de cadastro-->
                    </div>
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
