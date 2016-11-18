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
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!--Header-->
    <?php $this->load->view("CRUD_projeto/headerPROJETO");?>
    <!--Header-->

    <div id="main" class="container-fluid">
        <h3 class="page-header text-center">Relatório de investimentos financeiros</h3>
        <div class="row">
            <!--Filtro -->
            <form action="<?php echo base_url('/financiamento/relatorio'); ?>" class="form-inline text-center" method="GET">
                <div class="form-group">
                    <input name="data_inicial" type="date" class="form-control" placeholder="Data inicial">
                </div>
                <div class="form-group">
                    <input name="data_final" type="date" class="form-control" placeholder="Data final">
                </div>
                <div class="form-group">
                    <input name="codigo_projeto" type="text" class="form-control" placeholder="Código do projeto">
                </div>
                <button type="submit" class="btn btn-primary">Gerar relatório</button>
                <?php
                if(!empty($pdf)){
                ?>
                    <a class="btn btn-md fa fa-3x fa-fw fa-file-pdf-o"></a>
                <?php
                }
                ?>
                <hr>
            </form>
            <!--Filtro -->
        </div>
        <div class="section">
            <div class="container-fluid">
                <div class="row">
                    <dvi class="col-md-1"></dvi>
                    <div class="col-md-10">
                        <table class="table table-striped" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <?php
                                    if(isset($relatorio_projeto)){
                                      foreach ($relatorio_projeto->result() as $relatorio) {
                                    ?>
                                        <th><?php echo $relatorio->nome ?></th>
                                    <?php
                                        break;
                                      }
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Financiador</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($relatorio_projeto)){
                                  foreach ($relatorio_projeto->result() as $relatorio) {
                                ?>
                                <tr>
                                    <td><?php echo $relatorio->financiador ?></td>
                                    <td><?php echo $relatorio->data ?></td>
                                    <td>R$ <?php echo $relatorio->valor ?></td>
                                </tr>
                                <?php
                                  }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>

</div>
</div>

<!--Footer-->
<?php $this->load->view("footer");?>
<!--Footer-->
</body>

</html>
