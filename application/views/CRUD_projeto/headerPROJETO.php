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
                <li><a href="/projeto/">Home</a></li>
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
                <li>
                    <form class="navbar-form " role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Escreva o nome do projeto a ser buscado">
                        </div>
                        <button type="submit" class="btn btn-default">Buscar Projeto</button>
                    </form>
                    <!--Navegação a direita-->
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!--Administração Projetos candidatos-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrar projetos<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('/projeto/consultar'); ?>">Projetos Candidatos</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('/criterio/consultar'); ?>">Critérios de avaliação</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('/avaliacao/consultar'); ?>">Avaliações</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('/repasse/consultar'); ?>">Repasses financeiros</a></li>
                    </ul>
                </li>
                <!--Administração Projetos candidatos-->
                <!--Login-->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php echo $_SESSION['login'] ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="btn" href="<?php echo base_url("/usuario/cadastrar ") ?>">Adicionar usuario</a></li>
                        <li><a class="btn" href="<?php echo base_url("/usuario/consultar ") ?>">Ver usuarios</a></li>
                        <li class="divider"></li>
                        <li><a class="btn" href='<?php echo base_url("/usuario/alterar/".$_SESSION["login"]) ?>'>Atualizar perfil</a></li>
                        <li><a class="btn" href="<?php echo base_url("/usuario/logoff ") ?>">Sair</a></li>
                    </ul>
                    <!-- Formulario do login-->
                </li>
                <!--Login-->
            </ul>
            <!--Navegação a direita-->
        </div>
    </div>
</nav>
