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
        <h3 class="page-header">Todos os projetos</h3>
        <div class="row">
<div id="list" class="row">
	
	<div class="table-responsive col-md-12">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>Código do Projeto</th>
                    <th>Nome do Projeto</th>
                    <th>Status</th>
                    <th>Categoria do Projeto</th>
                    <th>Duração do Projeto</th>
                    <th>Valor do Projeto</th>
                    <th class="actions">Ação</th>
				</tr>
			</thead>
			<tbody>
				 <!-- Percorre o objeto de consulta enviado do controller-->
                    <?php
                		if(isset($projetos)){
                          foreach ($projetos->result() as $projeto) {
                            echo '<tr>';
                            echo '<td>'.$projeto->codigo.'</td>';
                            if($projeto->status=='candidato'){
                                echo '<td><a href="'.base_url("/projeto/ver_projeto/$projeto->codigo").'">'.$projeto->nome.'</a></td>';
                            }else{
                                echo '<td><a href="'.base_url("/projeto/projeto_aprovado/$projeto->codigo").'">'.$projeto->nome.'</a></td>';
                            }
                            if($projeto->status=='aprovado'){ 
                                echo '<td class="text-center alert success">';  
                            }else if($projeto->status=='reprovado'){ 
                               echo '<td class="text-center alert danger">';
                            }else{
                               echo '<td class="text-center alert warning">'; 
                            } 
                            echo $projeto->status.'</td>';
                            echo '<td>'.$projeto->categoria.'</td>';
                            echo '<td>'.$projeto->duracao.'</td>';
                            echo '<td>'.'R$ '.number_format($projeto->valor).'</td>';
                            if(($_SESSION['tipo']=='Gestor de Projetos')){
                               $str= '<td>
                        			    <a href='.base_url("/projeto/alterar/").$projeto->codigo.' class="btn btn-sm btn-primary">Editar</a>
                                        <a href='.base_url("/projeto/remover/").$projeto->codigo.' class="btn btn-sm btn-danger" data-toggle="modal">Excluir</a>
                        			 </td>';
                            }else if(($_SESSION['tipo']=='Avaliador de Projetos')){
                                $str= '<td>
                                        <a href='.base_url("/avaliacao/cadastrar/").$projeto->codigo.' class="btn btn-sm btn-warning" data-toggle="modal">Avaliar</a>
                                       </td>';
                            
                            }else if ($_SESSION['tipo']=='Administrativo'){   
                                 $str= '<td>
                        			    <a href='.base_url("/avaliacao/cadastrar/").$projeto->codigo.' class="btn btn-sm btn-warning" data-toggle="modal">Avaliar</a>
                        			    <a href='.base_url("/projeto/alterar/").$projeto->codigo.' class="btn btn-sm btn-primary">Editar</a>
                                        <a href='.base_url("/projeto/remover/").$projeto->codigo.' class="btn btn-sm btn-danger" data-toggle="modal">Excluir</a>
                        			 </td>';
                            }else 
                                $str= '<td></td>';
                            echo $str;
                			echo '</tr>';
                           }
                        }
                	?>
                    <!-- Percorre o objeto de consulta enviado do controller-->
			</tbody>
		</table>
	</div>
	
	</div> <!-- /#list -->

	<hr/>
    <!--Footer-->
    <?php $this->load->view("footer");?>
    <!--Footer-->
</body>

</html>