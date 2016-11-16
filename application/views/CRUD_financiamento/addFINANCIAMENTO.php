<!DOCTYPE html>
<html>
<head>
    <title>UNIFUNDING</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/estilo.css">
</head>

<body>
    <!--Header-->
    <?php $this->load->view("CRUD_projeto/headerPROJETO");?>
    <!--Header-->
    <div class="section">
        <div class="container">
            <?php 
            foreach ($projeto->result() as $proj){
            ?>
                <h3 class="page-header">Financiar projeto: <?php echo $proj->nome ?></h3>
            <?php 
            }
            ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <ul class="list-group">
                                <a href="<?php echo base_url('/financiamento/consultar'); ?>">
                                    <li class="list-group-item">Meus financiamentos</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="col-md-12">
                        <!--Formulario de cadastro-->
                        <form action="<?php echo base_url('/financiamento/financiar'); ?>" method="POST" class="form-horizontal" role="form">
                            <input required name="codProjeto" type="hidden" class="form-control" id="codProjeto" value="<?php echo $codProjeto ?>">
                            <label>Tipo de financiamento</label>
                            <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                   <select required name="tipo" class="form-control">
                                        <option value="" disabled selected>Selecione</option>
                                        <option>Modulo</option>
                                        <option>Integral</option>
                                    </select>  
                                </div>
                            </div>
                             <label>Quantidade de módulos</label>
                            <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <input required name="quantidadeModulos" type="number" class="form-control" placeholder="Quantidade de modulos">
                                </div>
                            </div>
                             <label>Valor financiado</label>
                            <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <input required name="valor" type="number" class="form-control" placeholder="Valor da parcela" step=0.01>
                                </div>
                            </div>
                             <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <i class="fa fa-3x fa-fw fa-cc-mastercard"></i>
							        <i class="fa fa-3x fa-fw fa-cc-visa"></i>
							        <i class="fa fa-3x fa-fw fa-cc-paypal"></i>
                                    <div class="radio">
                                        <label>
                                              <input type="radio" name="formaPagamento" id="status1" value=" Boleto Bancário" checked="">
                                               Boleto Bancário
                                        </div>
                                        <div class="radio">
                                            <label>
                                              <input type="radio" name="formaPagamento" id="status2" value="Cartão de Crédito" checked="">
                                              Cartão de Crédito</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                              <input type="radio" name="formaPagamento" id="status2" value="Cartão de Débito" checked="">
                                               Cartão de Débito</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                              <input type="radio" name="formaPagamento" id="status2" value="Cheque" checked="">
                                               Cheque</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                              <input type="radio" name="formaPagamento" id="status2" value="Transferência Bancária" checked="">
                                               Transferência Bancária</label>
                                        </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Financiar projeto</button>
                            <a href="<?php echo base_url('/projeto/'); ?>" class="btn btn-default">Cancelar</a>
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
