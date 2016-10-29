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
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">     
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a class="navbar-brand" href="<?php echo base_url('/usuario/'); ?>">UNIFUNDING</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url('/usuario/'); ?>">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Módulos de Usuário<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Administrativo</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Usuário Público</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Gestor de Programas</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Avaliador de Projetos</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Financiador Acadêmico</a></li>
                        </ul>
                    </li>
                    <li class="active"><a href="<?php echo base_url('/usuario/consultar'); ?>">Listar usuários</a></li>
                    <li><a href="#">Usuários Online</a></li>
                    <li><a href="#">Usuários Excluídos</a></li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Digite um usuário a ser buscado">
                    </div>
                    <button type="submit" class="btn btn-default">Procurar Usuário</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Fim da barra de navehação superior-->
    <!-- Inicio de um CRUD -->
    <div id="main" class="container-fluid">
        <h3 class="page-header">Atualizar Usuário</h3>
        <?php
            if(isset($usuario)){
                foreach ($usuario->result() as $user) {
        ?>
            <form action="/usuario/alterar/<?php echo $user->login;?>" method="POST">
                <!-- area de campos do form -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="exampleInputEmail1">Login</label>
                            <input name="login" class="form-control" id="exampleInputEmail1" placeholder="text" type="Login" value='<?php echo $user->login; ?>'>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputPassword1">Email:</label>
                            <input name="email" class="form-control" type="email" id="exampleInputPassword1" placeholder="Senha" value='<?php echo $user->email; ?>'>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Senha:&nbsp;</label>
                            <input name="senha" class="form-control" type="password" value='<?php echo $user->senha; ?>'>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Confirmar senha:</label>
                            <input class="form-control" type="password" value='<?php echo $user->senha; ?>'>
                        </div>
                    </div>

                    <div class="col-md-3">

                        <div class="form-group">
                            <label class="control-label">Categoria do usuário</label>
                            <select name="categoria" class="form-control">
                                    <option></option>
                                    <option <?php  if($user->categoria=='Pesquisa') select ?>>Pesquisa</option>
                                    <option <?php  if($user->categoria=='Competição Tecnológica') select ?>>Competição Tecnológica</option>
                                    <option <?php  if($user->categoria=='Inovação no Ensino') select ?>>Inovação no Ensino</option>
                                    <option <?php  if($user->categoria=='Manutenção e Reforma') select ?>>Manutenção e Reforma</option>
                                    <option <?php  if($user->categoria=='Pequenas Obras') select ?>>Pequenas Obras</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">País</label>
                            <select name="pais" class="form-control">
                          <option><?php echo $user->pais; ?></option>
                          <option>2</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Estado</label>
                            <select name="estado" class="form-control">
                          <option><?php echo $user->estado; ?></option>
                          <option>2</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Cidade</label>
                            <select name="cidade" class="form-control">
                      <option><?php echo $user->cidade; ?></option>
                      <option>2</option>
                    </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Endereço</label>
                            <select name="endereco" class="form-control">
                              <option><?php echo $user->endereco; ?></option>
                              <option>2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="" class="btn btn-primary">Atualizar</button>
                        <button type="" class="btn btn-default">Cancelar</button>
                    </div>
                    <?php
                }
            }
            ?>
                </div>
            </form>

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
