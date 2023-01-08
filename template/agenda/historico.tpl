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
    <a class="nav-link " aria-current="page" href="agenda.php?acao=ativas">Ativas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="agenda.php?acao=historico">Historico</a>
  </li>
</ul>
<table class="table border" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
		<td>			
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
				
						<tr>
						  <th scope="row">01</th>						 
						  <td>luis felipes miguel santos de limas soares guimaraes</td>						  
						  <td>07/01/2023</td>
						  <td>07/01/2023</td>
						  <td>
                            <a rel="modal:open" href="#locacao-visualizar"><button type="button" class="btn btn-dark" ><i class="medium material-icons" style="font-size: 16px;">visibility</i></button></a>
						</tr>
				
						<tr>
						  <th scope="row">02</th>						 
						  <td>luis felipes miguel santos de limas soares guimaraes</td>						  
						  <td>07/01/2023</td>
						  <td>07/01/2023</td>
						  <td>
                            <a rel="modal:open" href="#locacao-visualizar"><button type="button" class="btn btn-dark" ><i class="medium material-icons" style="font-size: 16px;">visibility</i></button></a>
						</tr>
				
						<tr>
						  <th scope="row">03</th>						 
						  <td>luis felipes miguel santos de limas soares guimaraes</td>						  
						  <td>07/01/2023</td>
						  <td>07/01/2023</td>
						  <td>
                            <a rel="modal:open" href="#locacao-visualizar"><button type="button" class="btn btn-dark" ><i class="medium material-icons" style="font-size: 16px;">visibility</i></button></a>
						</tr>						
					  </tbody>
					</table>
					</div>
	
	</td>
    </tr>
</table>
				
<div id="locacao-nova" class="modal" style="height: 289px;max-width: 58%;margin-left: 20%;margin-top: 5%;">
novo
</div>

<div id="locacao-visualizar" class="modal" style="height: 289px;max-width: 58%;margin-left: 20%;margin-top: 5%;">
ver
</div>

<script type="text/javascript" src="js/formulario/agenda.js"> </script>
</body>
</html>





