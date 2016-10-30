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
    <?php $this->load->view("CRUD_usuario/headerUSUARIO");?>
    <!--Header-->
    <!-- Fim da barra de navehação superior-->
    <!-- Inicio de um CRUD -->
    <div id="main" class="container-fluid">
        <h3 class="page-header">Atualizar Perfil</h3>
        <?php
            if(isset($usuario)){
                foreach ($usuario->result() as $user) {
        ?>
            <form action="/usuario/alterar/<?php echo $user->login;?>" method="POST">
                <!-- area de campos do form -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="exampleInputEmail1">Login</label>
                            <input name="login" class="form-control" id="exampleInputEmail1" placeholder="text" type="Login" value='<?php echo $user->login; ?>'>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputPassword1">Email:</label>
                            <input name="email" class="form-control" type="email" id="exampleInputPassword1" placeholder="Senha" value='<?php echo $user->email; ?>'>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Senha:&nbsp;</label>
                            <input name="senha" class="form-control" type="password" value='<?php echo $user->senha; ?>'>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Confirmar senha:</label>
                            <input class="form-control" type="password" value='<?php echo $user->senha; ?>'>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Categoria do usuário</label>
                            <select name="categoria" class="form-control">
                                <option value="" disabled selected>Selecione</option>
                                <option <?php  if($user->categoria=='Pesquisa') select ?>>Pesquisa</option>
                                <option <?php  if($user->categoria=='Competição Tecnológica') select ?>>Competição Tecnológica</option>
                                <option <?php  if($user->categoria=='Inovação no Ensino') select ?>>Inovação no Ensino</option>
                                <option <?php  if($user->categoria=='Manutenção e Reforma') select ?>>Manutenção e Reforma</option>
                                <option <?php  if($user->categoria=='Pequenas Obras') select ?>>Pequenas Obras</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">País</label>
                            <select name="pais" class="form-control">
                          <option><?php echo $user->pais; ?></option>
                          <option>2</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Estado</label>
                            <select name="estado" class="form-control">
                          <option><?php echo $user->estado; ?></option>
                          <option>2</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Cidade</label>
                            <select name="cidade" class="form-control">
                              <option><?php echo $user->cidade; ?></option>
                              <option>2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Endereço</label>
                            <select name="endereco" class="form-control">
                              <option><?php echo $user->endereco; ?></option>
                              <option>2</option>
                            </select>
                        </div>
                         <a href="<?php echo base_url("/usuario/desativar/".$_SESSION['login']) ?>" type="" class="btn btn-danger">Desativar perfil</a>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                            <a href="<?php echo base_url() ?>" type="" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>
                    <br>
                </div>
                <?php
                    }
                }
                ?>
            </form>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#bairro').multiselect({
                        maxHeight: 10000
                    });
                });
            </script>
            <!--Footer-->
            <?php $this->load->view("footer");?>
            <!--Footer-->
            <div>

</body>

</html>
