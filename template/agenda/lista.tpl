<html>
<head>

<title>Projeto Locadora</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<head>


<body>


{include file="topo.tpl"}
<br><br>
			<h5 class="text-primary" style="margin-left: 33px;">{$pagina->titulo}</h5>
<br>
<ul class="nav nav-tabs" style="width:94%;margin-left: 3%;">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="agenda.php?acao=ativas">Ativas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="agenda.php?acao=historico">Historico</a>
  </li>
</ul>
<table class="table border" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
		<td>			
				<br>
				<div style="display:flex;">
					<div style="margin-right:5px;"><a rel="modal:open" href="#locacao-nova"><button  class="btn btn-success btn-novo-locacao"><i class="large material-icons">shopping_cart</i>Nova locação</button></a></div>
					<div style="margin-right:5px;"><button  class="btn btn-info btn-clientes"><i class="large material-icons">person_add</i>Clientes</button></div>
					<div style="margin-right:5px;"><button  class="btn btn-secondary btn-titulos"><i class="large material-icons">local_movies</i>Titulos</button></div>
				</div>
				<br>
				<br>
					<div class="table-responsive-sm">
					<table class="table table-bordered" style="width: 90%;margin-left:5%">
					  <thead>
						<tr class="table-active">
						  <th scope="col">Código</th>
						  <th scope="col">Nome</th>
						  <th scope="col">Data de locação</th>
						  <th scope="col">Previsão de devolução</th>
						  <th scope="col">Ações</th>
						</tr>
					  </thead>
					  <tbody>
					  
					  
					  {foreach $array_locacao item=$locacao}
						<tr>
						  <th scope="row">{$locacao.id}</th>						 
						  <td>{$locacao.nome}</td>						  
						  <td>{$locacao.data_retirada}</td>
						  <td>{$locacao.data_previsao}</td>
						  <td>
                            <a rel="modal:open" href="#locacao-visualizar" class="resetaFomulario" ><button  class="btn btn-dark" ><i class="medium material-icons" style="font-size: 16px;">visibility</i></button></a>
						</tr>
						{/foreach}					  
								
					  </tbody>
					</table>
					</div>
	
	</td>
    </tr>
</table>
				
<div id="locacao-nova" class="modal" style="height: 498px;max-width: 58%;margin-left: 20%;margin-top: 5%;">

{include file="agenda/cadastrar.tpl"}
	
</div>

<div id="locacao-visualizar" class="modal" style="height: 498px;max-width: 58%;margin-left: 20%;margin-top: 5%;overflow:auto;overflow-x: clip;">
{include file="agenda/visualizar.tpl"}

</div>

<script type="text/javascript" src="js/formulario/agenda.js"> </script>
</body>
</html>





