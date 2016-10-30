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
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">     
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/projeto/">UNIFUNDING</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/projeto/">Home</a></li>
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
        </nav> <!-- Fim da barra de navehação superior -->
        <div class="wrapper" role="main">
            <div class="container">
                <div class="row">
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
                                    <p><b>Valor previsto:</b> <?php echo $projeto->valor ?></p>
                                    <p><b>Status:</b> <?php echo $projeto->status ?></p>
                                </div>
                                <div id="actions" class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="<?php echo base_url("/projeto/alterar/").$projeto->codigo; ?>" class="btn btn-primary">Editar projeto</a>
                                        <a href="<?php echo base_url("/projeto/remover/").$projeto->codigo; ?>"  class="btn btn-danger" data-toggle="modal">Excluir projeto</a>
                                        <a href="<?php echo base_url('/projeto/consultar'); ?>" class="btn btn-default">Retornar</a>
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
        <footer>	
            <div class="container">
                <div class="row">                       
                    <div id="linksImportantes" class="col-xs-12 col-sm-3 col-md-3">		
                        <h4> Para novas ideias de projetos e/ou sugestões:</h4>
                        <ul>                                                   
                            <li><a href="#">facebook.com/gsilvaborges</a></li>
                        </ul>
                    </div> <!-- Aqui em cima CRUD de links que podem ser armazenados e retirados -->
                    <div id="redesSociais" class="col-xs-12 col-sm-3 col-md-3">
                        <h4> Contate-nos</h4>
                        <ul>
                            <li> <a href="#">unifei.edu.br</a></li>
                            <li><a href="#">UNIFEI/Google+</a></li>
                        </ul>
                    </div> <!-- Redes Sociais -->
                    <div id="logoFooter" class="col-xs-12 col-sm-3 col-md-3 col-sm-offset-3 col-md-offset-3"> 
                        <h2>Crowdfunding UNIFEI</h2>
                    </div> <!-- Logo abaixo foi feito o rodapé da Outlet -->
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
