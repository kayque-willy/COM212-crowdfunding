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
                        <!--Formulario de cadastro-->
                        <form action="<?php echo base_url('/repasse/cadastrar'); ?>" method="POST" class="form-horizontal" role="form">
                            <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <label>Critério</label>
                                    <select required name="codProjeto" type="text" class="form-control" id="codProjeto">
                                        <option value="" disabled selected>Código do projeto</option>
                                        <?php
                                        if(!empty($projetos)){
                                            foreach($projetos->result() as $projeto){
                                        ?>
                                            <option><?php echo $projeto->codigo ?></option>  
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <label>Necessidade</label>
                            <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <input required name="necessidade" type="text" class="form-control" placeholder="Necessidade do repasse">
                                </div>
                            </div>
                             <label>Data</label>
                            <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <input required name="data" type="date" class="form-control" placeholder="Data">
                                </div>
                            </div>
                             <label>Valor da parcela</label>
                            <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <input required name="valorParcela" type="number" class="form-control" placeholder="Valor da parcela" step=0.01>
                                </div>
                            </div>
                             <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <div class="radio">
                                        <label>
                                              <input type="radio" name="status" id="status1" value="Quitado" checked="">
                                              Quitado
                                        </div>
                                        <div class="radio">
                                            <label>
                                              <input type="radio" name="status" id="status2" value="Não quitado" checked="">
                                              Não quitado</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
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
