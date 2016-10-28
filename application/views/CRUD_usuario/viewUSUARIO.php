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
        <!-- Modal -->
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalLabel">Excluir usuário</h4>
                    </div>
                    <div class="modal-body">
                        Exclusão de usuário deleta >>PROJETO<< ligado a ele,deseja realizar a operação?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Sim</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                    </div>
                </div>
            </div>
        </div> 
        <!-- /.modal -->

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
            <h3 class="page-header">Todos os usuarios</h3>
            <a href="/usuario/cadastrar/" class="btn btn-success">Cadastrar novo usuario</a>
            <div class="center-block">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Login</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Percorre o objeto de consulta enviado do controller-->
                        <?php
                        if(isset($usuarios)){
                                foreach ($usuarios->result() as $usuario) {
                                        echo '<tr>';
                                        echo '<td>'.$usuario->nome.'</td>';
                                        echo '<td>'.$usuario->login.'</td>';
                                        if($usuario->del=='0') echo '<td>ativo</td>';
                                        if($usuario->del=='1') echo '<td>inativo</td>';
                                        echo 
                                        '<td>
                                        <a href="/usuario/alterar/'.$usuario->login.'" class="btn btn-primary">Editar usuario</a>
                                        <a href="/usuario/desativar/'.$usuario->login.'" class="btn btn-danger" data-toggle="modal">Desativar usuario</a>
                                        </td>';
                                        echo '</tr>';
                                }
                        }
                        ?>
                        <!-- Percorre o objeto de consulta enviado do controller-->
                    </tbody>
                </table>        
            </div>
            <hr>
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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>