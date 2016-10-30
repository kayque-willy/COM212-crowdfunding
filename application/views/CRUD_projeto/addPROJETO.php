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
    <!-- Fim da barra de navehação superior-->
    <!-- Inicio de um CRUD -->
    <div id="main" class="container-fluid">
        <h3 class="page-header">Adicionar novo Projeto Candidato</h3>
        <div class="row">
            <?php echo form_open_multipart('projeto/cadastrar');?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label required class="control-label">Nome do rpojeto</label>
                        <input name="nome" class="form-control" type="text" placeholder="Nome do projeto">
                    </div>
                    <div class="form-group">
                        <label required class="control-label">Duração prevista</label>
                        <input type="number" class="form-control" id="campo2" name="duracao" placeholder="Duração prevista do projeto">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Valor previsto</label>
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input required type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="valor" placeholder="Valor previsto do projeto">
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Categoria</label>
                        <select required name="categoria" class="form-control">
                            <option value="" disabled selected>Selecione</option>
                            <option>Pesquisa</option>
                            <option>Competição Tecnológica</option>
                            <option>Inovação no Ensino</option>
                            <option>Manutenção e Reforma</option>
                            <option>Pequenas Obras</option>
                        </select>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Imagem</label>
                        <input required name="imagem" type="file">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputEmail1">Link de video descritivo</label>
                        <input name="video" class="form-control" id="exampleInputEmail1" placeholder="URL do video" type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Descrição</label>
                        <textarea required name="descricao" class="form-control" placeholder="Descrição de até 250 caracteres" rows="5" style="resize:none;"  maxlength="250"></textarea>
                    </div>
                </div>
                <div id="actions" class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Adicionar projeto</button>
                        <a href="<?php echo base_url('/projeto/'); ?>" class="btn btn-default">Cancelar</a>
                    </div>
                </div>
            <?php echo form_close();?>
        </div>
        <hr/>
        <!--Footer-->
        <?php $this->load->view("footer");?>
        <!--Footer-->
</body>

</html>
