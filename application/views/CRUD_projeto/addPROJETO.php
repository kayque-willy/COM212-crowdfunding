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
                <a class="navbar-brand" href="<?php echo base_url('/projeto/'); ?>">UNIFUNDING</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url('/projeto/'); ?>">Home</a></li>
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
                    <li><a href="#">Projetos Cadastrados</a></li>
                    <li><a href="<?php echo base_url('/projeto/consultar'); ?>">Lista de Projetos Candidatos</a></li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Escreva o nome do projeto a ser buscado">
                    </div>
                    <button type="submit" class="btn btn-default">Buscar Projeto</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Fim da barra de navehação superior-->
    <!-- Inicio de um CRUD -->
    <div id="main" class="container-fluid">
        <h3 class="page-header">Adicionar novo Projeto Candidato</h3>
        <div class="row">
            <?php echo form_open_multipart('projeto/cadastrar');?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Nome do rpojeto</label>
                        <input name="nome" class="form-control" type="text" placeholder="Nome do projeto">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Duração prevista</label>
                        <input type="number" class="form-control" id="campo2" name="duracao" placeholder="Duração prevista do projeto">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Valor previsto</label>
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="valor" placeholder="Valor previsto do projeto">
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Categoria</label>
                        <select name="categoria" class="form-control">
                          <option>Pesquisa</option>
                            <option>Competição Tecnológica</option>
                            <option>Inovação no Ensino</option>
                            <option>Manutenção e Reforma</option>
                            <option>Pequenas Obras</option>
                        </select>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Imagem</label>
                        <input name="imagem" type="file">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputEmail1">Link de video descritivo</label>
                        <input name="video" class="form-control" id="exampleInputEmail1" placeholder="URL do video" type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Descrição</label>
                        <textarea name="descricao" class="form-control" placeholder="Descrição de até 250 caracteres" rows="5" style="resize:none;"  maxlength="250"></textarea>
                    </div>
                </div>
                <div id="actions" class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Adicionar projeto</button>
                        <a href="<?php echo base_url('/projeto/'); ?>" class="btn btn-default">Cancelar</a>
                    </div>
                </div>
            <?php echo form_close();?>
        </div>
        <hr/>
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
