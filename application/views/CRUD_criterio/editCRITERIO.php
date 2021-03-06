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
            <h3 class="page-header">Cadastrar critério de avaliação de projeto</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <ul class="list-group">
                                <a href="<?php echo base_url('/criterio/cadastrar'); ?>">
                                    <li class="list-group-item list-group-item-info">Cadastrar Criterio</li>
                                </a>
                                <a href="<?php echo base_url('/criterio/consultar'); ?>">
                                    <li class="list-group-item">Listar Criterios</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="col-md-12">
                        <?php
                        if(isset($criterio)){
                            foreach ($criterio->result() as $crit) {
                        ?>
                        <!--Formulario de cadastro-->
                        <form action="<?php echo base_url('/criterio/alterar'); ?>" method="POST" class="form-horizontal" role="form">
                            <input type="hidden" name="id" value='<?php echo $crit->id; ?>'>
                            <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <label>Critério</label>
                                    <input required name="criterio" type="text" class="form-control" id="criterio" placeholder="Critério de avaliação de projeto" value='<?php echo $crit->criterio; ?>'>
                                </div>
                            </div>
                            <label>Peso</label>
                            <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <input required name="peso" type="number" class="form-control" id="peso" placeholder="0 a 10" max="10" min="0" value='<?php echo $crit->peso; ?>'>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar critério</button>
                            <a href="<?php echo base_url('/criterio/consultar'); ?>" class="btn btn-default">Cancelar</a>
                        </form>
                        <!--Formulario de cadastro-->
                         <?php
                            }
                        }
                        ?>
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
