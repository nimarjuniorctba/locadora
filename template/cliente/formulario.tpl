<html>
<head>

<title>Projeto Locadora</title>
<script type="text/javascript" src="js/formulario/home.js"> </script>

<head>
<body>


{include file="topo.tpl"}
<br><br>
			<h5 class="text-primary" style="margin-left: 33px;">{$pagina->titulo}</h5>
<br>
<ul class="nav nav-tabs" style="width:94%;margin-left: 3%;">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="clientes.php?acao=listar">Listar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="clientes.php?acao=cadastrar">Cadastrar</a>
  </li>
</ul>
<table class="table border" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
		<td>			
				<br>
					<div class="table-responsive-sm">
					<table class="table table-bordered" style="width: 75%;margin-left:5%">
					  <thead>
						<tr class="table-active">
						  <th scope="col" colspan="2">Preencha os dados</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td>Nome</td>
						  <td>
							<input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
						  </td>
						</tr>
						<tr>
						  <td>E-mail</td>
						  <td>
						  
								<input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">						  
						  
						  </td>
						</tr>
						<tr>
							<td scope="col"  colspan="2">
								<span style="float:right;"><button type="button" class="btn btn-success">Salvar</button></span>
							</td>
						</tr>

					  </tbody>
					</table>
					</div>
	
	</td>
    </tr>
</table>


</body>
</html>





