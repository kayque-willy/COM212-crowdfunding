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
    <!--Header-->
    <?php $this->load->view("CRUD_projeto/headerPROJETO");?>
    <!--Header-->
    <!-- Fim da barra de navehação superior -->
    <div class="wrapper" role="main">
        <div class="container">
            <h3 class="page-header">Projetos aprovados</h3>
            <!--Filtro -->
            <div class="row">
               <form action="<?php echo base_url('/projeto/'); ?>" class="form-inline pull-left" method="GET">
                    <div class="form-group">
                        <input name="codigo" type="text" class="form-control" placeholder="Filtrar por codigo">
                    </div>
                    <div class="form-group">
                        <input name="nome" type="text" class="form-control" placeholder="Filtrar por nome">
                    </div>
                    <div class="form-group">
                        <select name="categoria" type="text" class="form-control" placeholder="Filtrar por categoria">
                                    <option value="" disabled selected>Categoria</option>
                                    <option>Pesquisa</option>
                                    <option>Competição Tecnológica</option>
                                    <option>Inovação no Ensino</option>
                                    <option>Manutenção e Reforma</option>
                                    <option>Pequenas Obras</option>
                                 </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>
            </div>
            <!--Filtro -->
            <br>
            <div class="row">
                <!--Projetos aprovados -->
                <div id="conteudo" class="col-xs-12 col-sm-8 col-md-9">
                    <?php    
                    if(isset($projetos)){
                          foreach ($projetos->result() as $projeto) {
                        
                    ?>
                    <div class="artigo" role="article">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div href="#" class="thumbnail col-md-12">
                                    <img src='<?php echo "data:;base64,".base64_encode($projeto->imagem); ?>' height="500" width="500" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-8">
                                <h2><a href="<?php echo base_url("/projeto/projeto_aprovado/").$projeto->codigo ?>"><?php echo $projeto->codigo.' - '.$projeto->nome ?></a></h2>
                                <a href="<?php echo base_url("/financiamento/financiar/").$projeto->codigo ?>" class="btn btn-md btn-success">Financiar</a>
                                <h3>
                                    <?php echo $projeto->categoria ?>
                                </h3>
                                <p>
                                    <?php echo $projeto->descricao ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                          }
                    }
                    ?>
                </div>
                <!--Projetos aprovados -->
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
                <!-- CRUD e-mail de noticias, Barra Lateral -->
            </div>
        </div>
    </div>
    <!--Footer-->
    <?php $this->load->view("footer");?>
    <!--Footer-->
</body>

</html>
