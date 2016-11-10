<!DOCTYPE html>
<html>
    <head>
       
        <title>UNIFUNDING</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css" >
        <link rel="stylesheet" href="/assets/css/estilo.css">
    </head>
    <body>
        <!--Header-->
        <?php $this->load->view("CRUD_projeto/headerPROJETO");?>
        <!--Header-->
        <div class="wrapper" role="main">
            <div class="container">
                <div class="row">
                    <!-- Mensagem -->
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
                    <!-- Mensagem -->
                    <div id="conteudo" class="col-xs-12 col-sm-8 col-md-9">
                    <?php    
                    if(isset($projetos)){
                          foreach ($projetos->result() as $projeto) {
                        
                    ?>
                        <div class="artigo" role="article">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <?php echo '<td><img src="data:;base64,'.base64_encode($projeto->imagem).'" height="200" width="50" /></td>' ?>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <h4><?php echo $projeto->codigo ?> - <?php echo $projeto->nome ?></h4>
                                    <p><b>Descrição:</b> <?php echo $projeto->descricao ?></p>
                                    <p><b>Categoria:</b> <?php echo $projeto->categoria ?></p>
                                    <p><b>Duração prevista:</b> <?php echo $projeto->duracao ?></p>
                                    <p><b>Valor previsto:</b> <?php echo 'R$ '.number_format( $projeto->valor , 2) ?></p>
                                    <?php
                                        if($projeto->status=='aprovado'){
                                    ?>
                                       <div class="alert alert-success">
                                    <?php
                                        }else if($projeto->status=='reprovado'){
                                    ?> 
                                        <div class="alert alert-danger">
                                    <?php
                                        }else if($projeto->status=='finalizado'){
                                    ?> 
                                        <div class="alert alert-primary">
                                            
                                    <?php
                                        }
                                    ?>
                                    <p><b>Status:</b> <?php echo $projeto->status ?></p>
                                    </div>
                                </div>
                                <div id="actions" class="row">
                                    <div class="col-md-12 text-center">
                                        <?php if(($_SESSION['tipo']=='Administrativo') or ($_SESSION['tipo']=='Gestor de Projetos')){ ?>
                                            <a href="<?php echo base_url("/projeto/finalizar/").$projeto->codigo; ?>" class="btn btn-primary">Finalizar projeto</a>
                                        <?php } ?>
                                        <a href="<?php echo base_url('/projeto/'); ?>" class="btn btn-default">Retornar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                          }
                    }
                    ?>
                    </div>
                </div>	
            </div>			
        </div>
        <!--Footer-->
        <?php $this->load->view("footer");?>
        <!--Footer-->
    </body>
</html>
