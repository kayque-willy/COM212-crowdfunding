<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!DOCTYPE html>
    <html lang="en">

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
        <link href="//pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <!--Header-->
        <?php 
        if(empty($_SESSION['login'])) $this->load->view("header");
        else  $this->load->view("CRUD_projeto/headerPROJETO");
        ?>
        <!--Header-->
        <!--Conteudo-->
        <div class="cover">
            <div class="cover-image" style="background-image : url('http://www.ongsnobrasil.com.br/wp-content/uploads/2015/12/crowdfunding-2.jpg')"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="text-inverse">Crowdfunding
                            <br>UNIFEI</h1>
                        <p class="text-inverse">Projeto desenvolvido para a disciplina de Gerencia de Projetos (COM212)</p>
                        <br>
                        <br>
                        <a class="btn btn-lg btn-primary">Projetos</a>
                    </div>
                </div>
            </div>
        </div>
       <?php 
       if(!empty($projetos)){
           foreach($projetos->result() as $projeto){
       ?>
       <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src='<?php echo "data:;base64,".base64_encode($projeto->imagem); ?>' height="400" width="300" >
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo base_url("/projeto/projeto_aprovado/").$projeto->codigo ?>"><h1 class="text-primary"><?php echo $projeto->nome ?></h1></a>
                        <h3><?php echo $projeto->categoria ?></h3>
                        <a href="<?php echo base_url("/financiamento/financiar/").$projeto->codigo ?>" class="btn btn-md btn-success">Financiar</a>
                        <hr>
                        <p><?php echo $projeto->descricao ?></p>
                    </div>
                </div>
            </div>
        </div>
       <?php 
           }
       }
       ?>
        <!--Conteudo-->
        <!--Footer-->
        <?php $this->load->view("footer");?>
        <!--Footer-->
    </body>
</html>
