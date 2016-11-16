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
                                <li><a href="<?php echo base_url('/projeto/?categoria=Pesquisa') ?>">Pesquisa</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url('/projeto/?categoria=Competição Tecnológica') ?>">Competição Tecnológica</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url('/projeto/?categoria=Inovação no Ensino') ?>">Inovação no Ensino</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url('/projeto/?categoria=Manutenção e Reforma') ?>">Manutenção e Reforma</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url('/projeto/?categoria=Pequenas Obras') ?>">Pequenas Obras</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url('/projeto/'); ?>">Projetos</a></li>
                        <form action="<?php echo base_url('/projeto/'); ?>" class="navbar-form navbar-right" role="search" method="GET">
                            <div class="form-group">
                                <input name="nome" type="text" class="form-control" placeholder="Escreva o nome do projeto a ser buscado">
                            </div>
                            <inpu type="submit" class="btn btn-default">Buscar Projeto</button>
                        </form>
                    </ul>
                    <!--Navegação a direita-->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url('/usuario/registrar'); ?>">Registrar</a></li>
                        <!--Login-->
                        <li class="dropdown"> <a href="login.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Entrar<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <!-- Formulario do login-->
                                    <form name="form_login" method="POST" class="navbar-form navbar-header" action="<?php echo base_url('/usuario/login'); ?>">
                                        <label>Email</label>
                                        <input type="text" name="login" class="form-control" placeholder="Login">
                                        <label>Senha</label>
                                        <input type="password" name="senha" class="form-control" placeholder="Senha">
                                        <hr>
                                        <input type="submit" class="btn btn-primary center-block" value="Entrar">
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