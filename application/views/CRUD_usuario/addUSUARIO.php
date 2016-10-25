<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
                <title>UNIFUNDING</title>
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <link rel="stylesheet" href="css/estilo.css"> 
                <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
                <script src='js/bootstrap.min.js' type="text/javascript"></script>
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
                                        <a class="navbar-brand" href="#">UNIFUNDING</a>
                                </div>
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                                <li class="active"><a href="#">Home</a></li>
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
 <form action="indexUSUARIO_fim.html">
  <!-- area de campos do form -->
<div class="row">
 <div class="form-group col-md-3">
   <label for="campo1">Login(Nickname):</label>
   <input type="text" class="form-control" id="campo1">
 </div>
 
 <div class="form-group col-md-3">
        <form class="pure-form">
        <fieldset>
            <legend>Confirmação de Senha </legend>
            <input type="password" placeholder="Senha" id="password" required>
            <input type="password" placeholder="Confirme Senha" id="confirm_password" required>
            <button type="submit" class="pure-button pure-button-primary">Confirmar</button>
        </fieldset>
        </form>
 </div>
 
 <div class="form-group col-md-3">
   <label for="campo3">Digite seu nome completo:</label>
   <input type="text" class="form-control" id="campo3">
 </div>
    
<div class="form-group col-md-3">
   <label for="campo4">Digite o tipo de usuário desejado:</label>
   <input type="text" class="form-control" id="campo4">
        <ul class="list-group">
        <li class="list-group-item">Administrativo</li>
        <li class="list-group-item">Usuário Público</li>
        <li class="list-group-item">Gestor de Projetos</li>
        <li class="list-group-item">Avaliador de Projetos</li>
        <li class="list-group-item">Financiador Acadêmico</li>
        </ul>
 </div>      
</div>
  <!-- Nova linha de campos-->
<div class="row">
 <div class="form-group col-md-4">
        <form id="cpf_form" class="form-horizontal">
        <div class="form-group"><div class="col-md-4">
            <label class="control-label" id="campo">CPF</label>
            <input type="text" class="form-control" name="cpf" maxlength="14" onkeypress="formatar('###.###.###-##', this);" />
           </div>
        </div>
        </form>
 </div>
 
 <div class="form-group col-md-4">
        <script type="text/javascript">
        $(document).ready(function() {
        $('#bairro').multiselect({
            maxHeight: 10000
        });
        });
        </script>
            <form action="" method="post">
            <h1>Localizações</h1>
            <label><span>País:</span>
            <select name="pais" id="pais"></select>
            </label>
            <label><span>Estado:</span>
            <select name="estado" id="estado"><option value="0">--Primeiro o País--</option></select>
            </label>
            <label><span>Cidade:</span>
            <select name="cidade" id="cidade"><option value="0">--Primeiro o Estado--</option></select>
            </label>
            <label><span>Bairro:</span>
            <select name="bairro" id="bairro">
            <option multiple="multiple" name="multiselect[]">--Primeiro a Cidade--</option></select>
            </label>
            <br />
            <label><input type="submit" value="Procurar"  />
 </div>
    
    <div class="form-group col-md-4">
      <label for="campo3">Digite a sua data de aniversário:</label>
      <select name="dia" class="form-control">
        <option>Selecione o dia</option>
      </select>
    
      <select name="mes" class="form-control">
        <option>Selecione o mes</option>
      </select>
    
      <select name="ano" class="form-control">
        <option>Selecione o ano</option>
      </select>
    </div>    
</div>
  <!-- Fim de todos os campos do form -->
  <hr/>
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Registrar Usuário</button>
      <a href="indexUSUARIO_fim.html" class="btn btn-default">Cancelar registro</a>
    </div>
  </div>
</form>
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