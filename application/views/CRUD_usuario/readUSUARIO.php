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
        <?php $this->load->view("CRUD_usuario/headerUSUARIO");?>
        <!--Header-->
        <div class="wrapper" role="main">
            <div class="container">
                <div class="row">
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
                                        <h3>Login: <?php echo $usuario->login ?></h3>
                                        <h4>
                                            Nome: <?php echo $usuario->nome ?>
                                        </h4>
                                        <span><b>Status:</b>
                                            <?php
                                                if($usuario->del=='0') echo '<span class="alert-success text-center"><b>ATIVO</b></span>'; if($usuario->del=='1') echo '<span class="alert-danger text-center"><b>INATIVO</b></span>';
                                        ?>
                                        </span><br>
                                       
                                        <span>
                                            <b>Data de nascimento:</b>
                                             <?php echo $usuario->data_nascimento;?>
                                        </span><br>
                                        <span>
                                            <b>Pais:</b>
                                             <?php echo $usuario->pais;?>
                                        </span><br>
                                        <span>
                                            <b>Cidade:</b>
                                             <?php echo $usuario->cidade;?>
                                        </span><br>
                                        <span>
                                            <b>Cidade:</b>
                                             <?php echo $usuario->estado;?>
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
        <!--Footer-->
        <?php $this->load->view("footer");?>
        <!--Footer-->
    </body>
</html>
