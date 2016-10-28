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
                        <li><a href="/projeto/consultar">Lista de Projetos Candidatos</a></li>
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
                        <div class="artigo" role="article">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <a href="#" title="">
                                        <img src="http://speaking.com.br/img/sponsored/sponsored_uairrior.png" alt="">
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <h2><a href="#">Projeto equipe Uairrior 24hrs</a></h2>
                                    <p>
                                        O intuito do projeto é desenvolver máquinas para competições de combate de robôs, em várias modalidades. 
                                        Os robôs são desenvolvidos a partir de projetos totalmente elaborados pelos estudantes e supervisionados
                                        pelo professor, utilizando toda a infra-estrutura cedida pela Universidade e pelas empresas que apoiam o projeto.
                                    </p>
                                    <a href="#">http://www.uairrior.com.br/</a>
                                </div>
                            </div>
                        </div>
                        <div class="artigo" role="article">
                            <div class="row">                                                 
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <a href="#" title="">  
                                        <img src="https://hubstaff-talent.s3.amazonaws.com/avatars/8bbf3a48d010aad1169795acb8e41aa6" alt="">
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <h2><a href="#">Projeto programando com a Epic Coders</a></h2>
                                    <p>
                                        Este projeto de programação visa a prática e a competitividade elevando o nome da faculdade e também
                                        guia você durante sua trajetória universitária. Nossos horários de aula e Simulados Oficiais acontecem: 
                                        Terças-Feiras às 19:00 (LASER I) com Prof. João Paulo Leite
                                        Monitoria: Segundas-Feiras às 17:00 no IMC.
                                        Qualquer aluno pode ir em qualquer dos dias. Não é necessária matrícula.
                                    </p>
                                    <a href="#">https://sites.google.com/site/unifeimaratona/</a>
                                </div>
                            </div>
                        </div>
                        <div class="artigo" role="article"> 
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <a href="#" title="">
                                        <img src="http://www.droneshowla.com/wp-content/uploads/LOGO-BLACK-BEE-2016-400x400.png" alt="" >
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8" >
                                    <h2><a href="#">Black Bee Drones</a></h2>
                                    <p>
                                        A equipe hoje projeta e desenvolve seus drones para participar de competições internacionais. 
                                        A competição a qual a equipe compete é denominada IMAV (International Micro Air Vehicle Conference and Competition). 
                                        O IMAV é um evento anual que combina conferência científica com uma competição tecnológica envolvendo Micro Veículos Aéreos(MAVs).
                                        Essa combinação permite que grupos de pesquisa de todo o mundo partilhe seus conhecimentos, e os estimula a se concentrarem em 
                                        pesquisas que podem ser aplicadas em cenários da vida real. 
                                    </p>
                                    <a href="#">http://blackbee.unifei.edu.br/</a>
                                </div>
                            </div> 
                        </div>
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
