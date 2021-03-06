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
        <h3 class="page-header">Inserir Usuário</h3>
        <div class="row">
                <!--FORMULARIO DO USUARIO-->
                <form action="/usuario/cadastrar/" method="POST">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="exampleInputEmail1">Login</label>
                            <input required name="login" class="form-control" id="exampleInputEmail1" placeholder="Login (Nickname)" type="Login">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputPassword1">Email:</label>
                            <input required name="email" class="form-control" type="email" id="exampleInputPassword1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Senha:&nbsp;</label>
                            <input required name="senha" class="form-control" type="password"  placeholder="Senha">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Confirmar senha:</label>
                            <input required class="form-control" type="password" placeholder="Confirmar senha">
                        </div>  
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">CPF:</label>
                            <input required name="cpf" class="form-control" type="text" onkeypress="formatar('###.###.###-##', this);" placeholder="CPF">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nome completo:</label>
                            <input required name="nome" class="form-control" type="text" placeholder="Nome completo">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Data de nascimento:</label>
                            <input required name="data" class="form-control" type="date" placeholder="Data de nascimento">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Tipo de usuario</label>
                            <select required name="tipo" class="form-control">
                               <option value="" disabled selected>Selecione</option>
                               <option>Administrativo</option>
                                <option>Usuário Público</option>
                                <option>Gestor de Projetos</option>
                                <option>Avaliador de Projetos</option>
                                <option>Financiador Acadêmico</option>
                            </select>
                        </div>
                            <div class="form-group">
                                <label class="control-label">Categoria do usuário</label>
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">País</label>
                        <input required name="pais" class="form-control" type="text">
                        <!--<select name="pais" class="form-control">
                          <option>1</option>
                          <option>2</option>
                        </select>-->
                    </div>
                    <div class="form-group">
                        <label class="control-label">Estado</label>
                        <input required name="estado" class="form-control" type="text">
                        <!--<select  name="estado" class="form-control">
                          <option>1</option>
                          <option>2</option>
                        </select>-->
                   </div>
                   <div class="form-group">
                    <label class="control-label">Cidade</label>
                    <input required name="cidade" class="form-control" type="text">
                    <!--<select  name="cidade" class="form-control">
                      <option>1</option>
                      <option>2</option>
                    </select>-->
                   </div>
                   <div class="form-group">
                    <label class="control-label">Endereço</label>
                    <input required name="endereco" class="form-control" type="text">
                    <!--<select  name="endereco" class="form-control">
                      <option>1</option>
                      <option>2</option>
                    </select>-->
                 </div>
                </div>
               <div class="form-group text-center">
                   <button type="submit" class="btn btn-success">Cadastrar</button>
                   <a href="<?php echo base_url('/usuario/') ?>" type="" class="btn btn-default">Cancelar</a>
               </div>
            </form>
            <!--FORMULARIO DO USUARIO-->
           
        </div>

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
</body>

</html>
