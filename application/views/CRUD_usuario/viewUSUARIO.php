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
    <!-- Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">Excluir usuário</h4>
                </div>
                <div class="modal-body">
                    Exclusão de usuário deleta >>PROJETO
                    << ligado a ele,deseja realizar a operação? </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Sim</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                        </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->

        <!--Header-->
        <?php $this->load->view("CRUD_usuario/headerUSUARIO");?>
        <!--Header-->
        <!-- Inicio de um CRUD -->


        <div class="wrapper" role="main">
            <div class="container">
                <div class="row">
                    <h3 class="page-header">Todos os usuarios</h3>
                    <?php 
                if (isset($sucesso)){ 
            ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Operação realizada com sucesso!</strong>
                        <p>
                            <?php echo $msg; ?>
                        </p>
                    </div>
                    <?php } ?>
                    <?php 
                
            if (isset($falha)){ 
            ?>
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Falha ao realizar operação!</strong>
                        <p>
                            <?php echo $msg; ?>
                        </p>
                    </div>
                    <?php } ?>
                    <!--Fitro-->
                    <form action="<?php echo base_url('/usuario/consultar'); ?>" class="form-inline" method="GET">
                        <div class="form-group">
                            <input name="nome" type="text" class="form-control" placeholder="Filtrar por nome">
                        </div>
                        <div class="form-group">
                            <input name="login" type="text" class="form-control" placeholder="Filtrar por login">
                        </div>

                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </form>
                    <!--Fitro-->
                    <hr>
                    <div id="conteudo" class="col-xs-12 col-sm-8 col-md-9">
                        <?php
                            if(isset($usuarios)){
                                foreach ($usuarios->result() as $usuario) {
                            ?>
                            <div class="artigo" role="article">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <a href="#" title="">
                                            <img src="http://st2.depositphotos.com/1104517/9917/v/450/depositphotos_99176964-Vector-user-icon-of-man.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8">
                                        <h2><a href="<?php echo base_url("/usuario/ver_usuario/$usuario->login") ?>"><?php echo $usuario->login ?></a></h2>
                                        <h4>
                                            <?php echo $usuario->nome ?>
                                        </h4>
                                        <span><b>Status:</b>
                                            <?php
                                                if($usuario->del=='0') echo '<span class="alert-success text-center"><b>ATIVO</b></span>'; if($usuario->del=='1') echo '<span class="alert-danger text-center"><b>INATIVO</b></span>';
                                        ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            }
                            ?>
                    </div>
                    <!-- CRUD e-mail de noticias, Barra Lateral -->
                    <div id="sidebar" class="col-xs-12 col-sm-4 col-md-3">
                        <div class="widget">
                            <h3>Receba as novidades no E-mail</h3>
                            <form class="form" role="form">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail2">Entre com seu email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Entre com seu email">
                                </div>
                                <button type="submit" class="btn btn-success">Cadastrar </button>
                            </form>
                        </div>
                        <div class="widget">
                            <h3>Financiadores e Apoio</h3>
                            <ul>
                                <li><a href="">UNIFEI: unifei.edu.br</a></li>
                                <li><a href="">CATS: familiacats.com.br</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <hr>
        <!--Footer-->
        <?php $this->load->view("footer");?>
        <!--Footer-->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->

        <!-- Latest compiled and minified JavaScript -->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->

</body>

</html>
