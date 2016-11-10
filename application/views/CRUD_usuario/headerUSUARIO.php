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
                <li><a href="<?php echo base_url('/usuario/consultar'); ?>">Listar usuários</a></li>
                <li><a href="#">Usuários Online</a></li>
                <li>
                    <form class="navbar-form " role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Digite um usuário a ser buscado">
                        </div>
                        <button type="submit" class="btn btn-default">Procurar Usuário</button>
                    </form>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!--Login-->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php echo $_SESSION['login'] ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php if($_SESSION['tipo']=='Administrativo') {?>
                            <li><a class="btn" href="<?php echo base_url("/usuario/cadastrar ") ?>">Adicionar usuario</a></li>
                        <?php } ?>
                        <?php if($_SESSION['tipo']!='Usuário Público') {?>
                            <li><a class="btn" href="<?php echo base_url("/usuario/consultar ") ?>">Ver usuarios</a></li>
                            <li class="divider"></li>
                        <?php } ?>
                        <li><a class="btn" href='<?php echo base_url("/usuario/alterar/".$_SESSION["login"]) ?>'>Atualizar perfil</a></li>
                        <li><a class="btn" href="<?php echo base_url("/usuario/logoff ") ?>">Sair</a></li>
                    </ul>
                    <!-- Formulario do login-->
                </li>
                <!--Login-->
            </ul>
        </div>
    </div>
</nav>
<!-- Fim da barra de navehação superior-->
  