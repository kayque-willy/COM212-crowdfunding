<!DOCTYPE html>
<html>
    <head>
        <title>UNIFUNDING</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="//pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/estilo.css"> 
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
                    <a class="navbar-brand" href="/usuario/">UNIFUNDING</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li ><a href="/usuario/">Home</a></li>
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
                        <li class="active"><a href="/usuario/consultar">Listar usuários</a></li>
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
        </nav> <!-- Fim da barra de navehação superior-->
        <!-- Inicio de um CRUD --> 
        <div id="main" class="container-fluid">
            <h3 class="page-header">Inserir Usuário</h3>
            
            <form action="/usuario/cadastrar/" method="POST">
                <!-- area de campos do form -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="campo1">Login(Nickname):</label>
                        <input name="login" class="form-control" type="text" class="form-control" id="campo1">
                        <label for="campo1">CPF</label>
                        <input name="cpf" type="text" class="form-control" maxlength="14" onkeypress="formatar('###.###.###-##', this);" />
                        <label for="campo3">Digite seu nome completo:</label>
                        <input name="nome" type="text" class="form-control" id="campo3">
                        <label for="campo3">Digite seu email:</label>
                        <input name="email" type="text" class="form-control" id="campo3">
                        
                    </div>

                    <div class="form-group col-md-3">
                        <fieldset>
                            <legend>Confirmação de Senha </legend>
                            <input name="senha" class="form-control" type="password" placeholder="Senha" id="password" required><br>
                            <input name="senha" class="form-control" type="password" placeholder="Confirme Senha" id="confirm_password" required>
                        </fieldset>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="campo4">Digite o tipo de usuário desejado:</label>
                        <input name="tipo" type="text" class="form-control" id="campo4">
                        <ul class="list-group">
                            <li class="list-group-item">Administrativo</li>
                            <li class="list-group-item">Usuário Público</li>
                            <li class="list-group-item">Gestor de Projetos</li>
                            <li class="list-group-item">Avaliador de Projetos</li>
                            <li class="list-group-item">Financiador Acadêmico</li>
                        </ul>
                        <label for="campo4">Digite a categoria do usuário:</label>
                        <input name="categoria" type="text" class="form-control" id="campo4">
                    </div>
                    <div class="form-group">
                        <h3>Localização</h3>
                            <label><span>País:</span>
                                <input class="form-control" name="pais" id="pais"></input>
                            </label>
                            <label><span>Estado:</span>
                                <input class="form-control" name="estado" id="estado"></input>
                            </label>
                            <label><span>Cidade:</span>
                                <input class="form-control" name="cidade" id="cidade"></input>
                            </label>
                            <label><span>Bairro:</span>
                                <input class="form-control" name="bairro" id="bairro"></input>
                            </label>
                            <label><span>Endereço:</span>
                                <input class="form-control" name="endereco" id="bairro"></input>
                            </label>
                            <br />
                            <label>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="campo3">Digite a sua data de aniversário:</label>
                                    <input name="data" type="date" class="form-control" id="campo3">
                                </div>    
                                </div>
                                <!-- Fim de todos os campos do form -->
                                <hr/>
                                <div id="actions" class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">Registrar Usuário</button>
                                        <a href="/usuario/" class="btn btn-default">Cancelar registro</a>
                                    </div>
                                </div>
                    </div>
                <!-- Nova linha de campos-->
                    
                </div>
                <!-- Nova linha de campos-->
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