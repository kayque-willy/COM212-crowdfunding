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
    <!-- Inicio de um CRUD -->
    <div id="main" class="container-fluid">
        <h3 class="page-header">Editar Projeto</h3>

            <?php echo form_open_multipart('projeto/alterar');?>
            <?php
                if(isset($projeto)){
                        foreach ($projeto->result() as $proj) {
                    ?>
            <input type="hidden" name="codigo" value='<?php echo $proj->codigo; ?>'>
            <div href="#" class="thumbnail col-md-3">
                <div class="form-group">
                    <label class="control-label text-center">Imagem do projeto</label>
                    <img src='<?php echo "data:;base64,".base64_encode($proj->imagem); ?>' height="230" width="50" />
                </div>

            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Nome do projeto</label>
                    <input required name="nome" class="form-control" type="text" placeholder="Nome do projeto" value='<?php echo $proj->nome; ?>'>
                </div>
                <div class="form-group">
                    <label class="control-label">Duração prevista</label>
                    <input required type="number" class="form-control" id="campo2" name="duracao" placeholder="Duração prevista do projeto" value='<?php echo $proj->duracao; ?>'>
                </div>
                <div class="form-group">
                    <label class="control-label">Valor previsto</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input required type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="valor" placeholder="Valor previsto do projeto" value='<?php echo $proj->valor; ?>'>
                        <span class="input-group-addon">.00</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Categoria</label>
                    <select required name="categoria" class="form-control">
                                <option <?php if($proj->categoria=='Pesquisa') echo 'select'; ?>>Pesquisa</option>
                                <option <?php if($proj->categoria=='Competição Tecnológica') echo 'select'; ?>>Competição Tecnológica</option>
                                <option <?php if($proj->categoria=='Inovação no Ensino') echo 'select'; ?>>Inovação no Ensino</option>
                                <option <?php if($proj->categoria=='Manutenção e Reforma')  echo 'select'; ?>>Manutenção e Reforma</option>
                                <option <?php if($proj->categoria=='Pequenas Obras') echo 'select'; ?>>Pequenas Obras</option>
                            </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label class="control-label">Imagem</label>
                    <input name="imagem" type="file">
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">Link de video descritivo</label>
                    <input name="video" class="form-control" id="exampleInputEmail1" placeholder="URL do video" type="text" value='<?php echo $proj->video; ?>'>
                </div>
                <div class="form-group">
                    <label class="control-label">Descrição</label>
                    <textarea required name="descricao" class="form-control" placeholder="Descrição de até 250 caracteres" rows="5" style="resize:none;" maxlength="250"><?php echo $proj->descricao; ?></textarea>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="campo2">STATUS:</label>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: 35%">
                        <span class="sr-only">65% Complete (success)</span>
                    </div>
                    <div class="progress-bar progress-bar-danger" style="width: 10%">
                        <span class="sr-only">35% Complete (danger)</span>
                    </div>
                </div>
            </div>
            <!-- Status -->

            <div id="actions" class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Salvar alterações no projeto</button>
                    <a href="<?php echo base_url('/projeto/'); ?>" class="btn btn-default">Cancelar</a>
                </div>
            </div>
            <?php
                    }
                }
                ?>
                <?php echo form_close();?>
                <!-- Status -->

    </div>
    <hr/>
    <!--Footer-->
    <?php $this->load->view("footer");?>
    <!--Footer-->
</body>

</html>
Contact GitHub API Training Shop Blog About © 2016 GitHub, Inc. Terms Privac
