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
            <h3 class="page-header text-center">Meus financiamentos</h3>
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
            <form action="<?php echo base_url('/finaciamento/consultar'); ?>" class="form-inline pull-right" method="GET">
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
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <ul class="list-group">
                                <a href="<?php echo base_url('/finaciamento/consultar'); ?>">
                                    <li class="list-group-item list-group-item-info">Meus financiamentos</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <ul class="media-list">
                        <?php 
                        if(!empty($finaciamento)){
                            foreach($finaciamento as $finaciamento){
                        ?>
                        <li class="media">
                                <a class="pull-left" href="#"><img class="media-object" src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" height="64" width="64"></a>
                                <div class="media-body">
                                    <h4 class="media-heading">Nome</h4><p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                        ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at,
                                        tempus viverra turpis.</p><h4 class="media-heading">Data: dd/mm/aaaa</h4><h4 class="media-heading">Valor:</h4>
                                </div>
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
