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
    <a class="nav-link active" aria-current="page" href="clientes.php?acao=listar">Listar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="clientes.php?acao=cadastrar">Cadastrar</a>
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
						  <th scope="col">Codigo</th>
						  <th scope="col">Nome</th>
						  <th scope="col">Email</th>
						  <th scope="col">Ações</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <th scope="row">1</th>
						  <td>cliente 01</td>
						  <td>Otto</td>
						  <td><img src="imagens/icones/lupa.png" style="width:15x;height:15px" ></td>
						</tr>
						<tr>
						  <th scope="row">2</th>
						  <td>cliente 02</td>
						  <td>cliente2@gmail.com</td>
						  <td></td>
						</tr>
						<tr>
						  <th scope="row">3</th>
						  <td>cliente 03</td>
						  <td>cliente3@gmail.com</td>
						  <td></td>
						</tr>
					  </tbody>
					</table>
					</div>
	
	</td>
    </tr>
</table>


</body>
</html>





