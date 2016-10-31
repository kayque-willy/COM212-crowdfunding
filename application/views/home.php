<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!DOCTYPE html>
    <html lang="en">

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
        <link href="//pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <!--Menu superior-->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">     
                      <span class ="sr-only">Toggle navigation</span>
                      <span class ="icon-bar"></span>
                      <span class ="icon-bar"></span>
                      <span class ="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">UNIFUNDING</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tipos de projetos<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Pesquisa</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Competição Tecnológica</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Inovação no Ensino</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Manutenção e Reforma</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Pequenas Obras</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Projetos</a></li>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Escreva o nome do projeto a ser buscado">
                            </div>
                            <inpu type="submit" class="btn btn-default">Buscar Projeto</button>
                        </form>
                    </ul>
                    <!--Navegação a direita-->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url('/usuario/registrar'); ?>">Registrar</a></li>
                        <!--Login-->
                        <li class="dropdown"> <a href="login.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Entrar<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <!-- Formulario do login-->
                                    <form name="form_login" method="POST" class="navbar-form navbar-header" action="<?php echo base_url('/usuario/login'); ?>">
                                        <label>Email</label>
                                        <input type="text" name="login" class="form-control" placeholder="Login">
                                        <label>Senha</label>
                                        <input type="password" name="senha" class="form-control" placeholder="Senha">
                                        <hr>
                                        <input type="submit" class="btn btn-primary center-block" value="Entrar">
                                    </form>
                                </li>
                            </ul>
                            <!-- Formulario do login-->
                        </li>
                        <!--Login-->
                    </ul>
                    <!--Navegação a direita-->
                </div>
            </div>
        </nav>
        <!--Menu superior-->
        <!--Conteudo-->
        <div class="cover">
            <div class="cover-image" style="background-image : url('http://www.ongsnobrasil.com.br/wp-content/uploads/2015/12/crowdfunding-2.jpg')"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="text-inverse">Crowdfunding
                            <br>UNIFEI</h1>
                        <p class="text-inverse">Projeto desenvolvido para a disciplina de Gerencia de Projetos (COM212)</p>
                        <br>
                        <br>
                        <a class="btn btn-lg btn-primary">Projetos</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="https://www.unifei.edu.br/files/imagens_site/prceu/Logo%20Cheetah%20E-Racing.png" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-primary">Projeto</h1>
                        <h3>A subtitle</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque
                            eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis
                            pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-responsive" src="https://yt3.ggpht.com/-lVQum5ud-ZI/AAAAAAAAAAI/AAAAAAAAAAA/wfFo2xNrMxA/s900-c-k-no-mo-rj-c0xffffff/photo.jpg">
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-primary">A title</h1>
                        <h3>A subtitle</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque
                            eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis
                            pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--Conteudo-->
        <!--Footer-->
        <?php $this->load->view("footer");?>
        <!--Footer-->
    </body>
</html>
