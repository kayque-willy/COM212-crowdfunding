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
            <h3 class="page-header">Alterar parcela do repasse financeiro</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <ul class="list-group">
                                <a href="<?php echo base_url('/repasse/cadastrar'); ?>">
                                    <li class="list-group-item list-group-item-info">Cadastrar repasse</li>
                                </a>
                                <a href="<?php echo base_url('/repasse/consultar'); ?>">
                                    <li class="list-group-item">Listar repasses</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="col-md-12">
                        <?php
                        if(isset($repasse)){
                            foreach ($repasse->result() as $rep) {
                        ?>
                        <!--Formulario de cadastro-->
                        <form action="<?php echo base_url('/repasse/alterar'); ?>" method="POST" class="form-horizontal" role="form">
                            <legend>Projeto: <?php echo $rep->codProjeto." - ". $rep->necessidade ?></legend>
                            <input type="hidden" name="codProjeto" value='<?php echo $rep->codProjeto; ?>'>
                            <input type="hidden" name="necessidade" value='<?php echo $rep->necessidade; ?>'>
                            <label>valor da parcela</label>
                            <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <input required name="valorParcela" type="number" class="form-control" placeholder="Valor da parcela" step=0.01 value='<?php echo $rep->valorParcela; ?>'>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar repasse</button>
                            <a href="<?php echo base_url('/repasse/consultar'); ?>" class="btn btn-default">Cancelar</a>
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
