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
                        <button type="submit" class="btn btn-default">Buscar Projeto</button>
                    </form>
                </ul>
                <!--Navegação a direita-->
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="<?php echo base_url('/usuario/registrar'); ?>">Registrar</a></li>
                    <!--Login-->
                    <li class="dropdown"> <a href="login.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Entrar<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- Formulario do login-->
                                <form name="form_login" method="POST" class="navbar-form navbar-header" action="<?php echo base_url('/usuario/login'); ?>">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" required/>
                                    <label>Senha</label>
                                    <input type="password" name="senha" class="form-control" placeholder="Senha" required/>
                                    <hr>
                                    <input type="submit" class="btn btn-primary center-block" value="Entrar" />
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
    <!-- Inicio de um CRUD -->
    <div id="main" class="container-fluid">
        <h3 class="page-header text-center">Cadastrar perfil</h3>

        <div class="row">
            <?php if (isset($msg)){ ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Não foi possível cadastrar o usuario!</strong>
                <p>
                    <?php echo $msg; ?>
                </p>
            </div>
            <?php } ?>
            <!--FORMULARIO DO USUARIO-->
            <form action="/usuario/registrar/" method="POST">
                <div class="col-md-4">
                    <input type="hidden" name="tipo" value="Financiador Acadêmico">
                    <legend>Dados do usuário</legend>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputEmail1">Login</label>
                        <input name="login" class="form-control" id="exampleInputEmail1" placeholder="text" type="Login">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputPassword1">Email:</label>
                        <input name="email" class="form-control" type="email" id="exampleInputPassword1" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Senha:&nbsp;</label>
                        <input name="senha" class="form-control" type="password">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirmar senha:</label>
                        <input class="form-control" type="password">
                    </div>
                </div>
                <div class="col-md-4">
                    <legend>Dados pessoais</legend>
                    <div class="form-group">
                        <label class="control-label">CPF:</label>
                        <input name="cpf" class="form-control" type="text" onkeypress="formatar('###.###.###-##', this);">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nome completo:</label>
                        <input name="nome" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Data de nascimento:</label>
                        <input name="data" class="form-control" type="date">
                    </div>
                </div>
                <div class="col-md-4">
                    <legend>Localização</legend>
                    <div class="form-group">
                        <label class="control-label">País</label>
                        <select name="pais" class="form-control">
                          <option>1</option>
                          <option>2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Estado</label>
                        <select name="estado" class="form-control">
                          <option>1</option>
                          <option>2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Cidade</label>
                        <select name="cidade" class="form-control">
                      <option>1</option>
                      <option>2</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Endereço</label>
                        <select name="endereco" class="form-control">
                      <option>1</option>
                      <option>2</option>
                    </select>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="" class="btn btn-success">Cadastrar</button>
                    <button type="" class="btn btn-default">Cancelar</button>
                </div>
            </form>
            <!--FORMULARIO DO USUARIO-->

        </div>

        <div class="form-group col-md-4">
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#bairro').multiselect({
                        maxHeight: 10000
                    });
                });
            </script>

        </div>

        <!-- Aqui está a criação da parte de baixo do site, footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div id="linksImportantes" class="col-xs-12 col-sm-3 col-md-3">
                        <h4> Para novas ideias de projetos e/ou sugestões:</h4>
                        <ul>
                            <li><a href="#">facebook.com/gsilvaborges</a></li>
                        </ul>
                    </div>
                    <!-- Aqui em cima CRUD de links que podem ser armazenados e retirados -->
                    <div id="redesSociais" class="col-xs-12 col-sm-3 col-md-3">
                        <h4> Contate-nos</h4>
                        <ul>
                            <li> <a href="#">unifei.edu.br</a></li>
                            <li><a href="#">UNIFEI/Google+</a></li>
                        </ul>
                    </div>
                    <!-- Redes Sociais -->
                    <div id="logoFooter" class="col-xs-12 col-sm-3 col-md-3 col-sm-offset-3 col-md-offset-3">
                        <h2>Crowdfunding UNIFEI</h2>
                    </div>
                    <!-- Logo abaixo foi feito o rodapé da Outlet -->
                </div>
            </div>
        </footer>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>&copy; Desenvolvedor Guilherme Borges.</p>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
