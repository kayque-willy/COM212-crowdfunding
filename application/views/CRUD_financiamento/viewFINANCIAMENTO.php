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
            <h3 class="page-header">Meus financiamentos</h3>
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
            <form action="<?php echo base_url('/financiamento/consultar'); ?>" class="form-inline pull-left" method="GET">
                <div class="form-group">
                    <input name="nome" type="text" class="form-control" placeholder="Filtrar nome do projeto">
                </div>
                <div class="form-group">
                    <input name="data" type="date" class="form-control" placeholder="Filtrar data">
                </div>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>
            <!--filtro-->
            <div class="row">
               
                <div class="col-md-10">
                    <ul class="media-list">
                        <br>
                        <table class="table">
                         <thead>
                            <tr>
                                <th>Projeto</th>
                                <th>Categoria</th>
                                <th>Data</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <?php 
                        if(!empty($financiamentos)){
                            foreach($financiamentos->result() as $financiamento){
                        ?>
                            <tr>
                                <td><?php echo $financiamento->nome ?></td>
                                <td><?php echo $financiamento->categoria ?></td>
                                <td><?php echo $financiamento->data ?></td>
                                <td><?php echo 'R$ '.number_format($financiamento->valor) ?></td>
                            </tr>
                        <?php 
                            }
                        }
                        ?>
                        </table>
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
