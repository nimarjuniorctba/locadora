<html>
<head>

<title>Projeto Locadora</title>

<head>
<body>


{include file="topo.tpl"}
<br><br>
			<h5 class="text-primary" style="margin-left: 33px;">{$pagina->titulo}</h5>
<br>
<ul class="nav nav-tabs" style="width:94%;margin-left: 3%;">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="titulos.php?acao=listar">Listar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="titulos.php?acao=cadastrar">Cadastrar</a>
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
						  <th scope="col">Quantidade</th>
						  <th scope="col">Valor</th>
						  <th scope="col">Status</th>
						  <th scope="col">Ações</th>
						</tr>
					  </thead>
					  <tbody>
					  {foreach $array_titulos item=$titulo}
						<tr>
						  <th scope="row">{$titulo.iduser}</th>
						  <td>{$titulo.nome}</td>
						  <td>{$titulo.quantidade}</td>
						  <td>{$titulo.valor}</td>
						  <td>{$titulo.status}</td>
						  <td>
                                                      <button  class="btn btn-info btn-editar" data-iduser={$titulo.iduser} ><i class="material-icons" style="font-size: 16px;">create</i></button>
                                                      <button  class="btn btn-danger btn-excluir" data-iduser={$titulo.iduser}><i class="material-icons" style="font-size: 16px;">delete</i></button>                                                                                                          </td>
						</tr>
						{/foreach}
					  </tbody>
					</table>
					</div>
	
	</td>
    </tr>
</table>

<script type="text/javascript" src="js/formulario/titulos.js"> </script>
</body>
</html>





