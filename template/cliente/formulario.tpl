<html>
<head>

<title>Projeto Locadora</title>

<head>
<body>


{include file="topo.tpl"}
<br>
<br>
			<h5 class="text-primary" style="margin-left: 33px;">{$pagina->titulo}</h5>
<br>
<ul class="nav nav-tabs" style="width:94%;margin-left: 3%;">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="clientes.php?acao=listar">Listar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="clientes.php?acao={$pagina->acao}">{if $pagina->acao=='cadastrar'}Cadastrar{else}Alterar{/if}</a>
  </li>
</ul>
<table class="table border" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
		<td>			
				<br>
					<div class="table-responsive-sm">
					<form name="form" method="POST">
						<table class="table table-bordered" style="width: 75%;margin-left:5%">
						  <thead>
							<tr class="table-active">
							  <th scope="col" colspan="2">Preencha os dados</th>
							</tr>
						  </thead>
						  <tbody>
							{if $pagina->acao=='alterar'}
								<tr>
								  <td>Codigo</td>
								  <td>
									<input type="text" class="form-control"disabled{if $pagina->acao=='alterar'} value="{$cliente->id}" {/if}>
								  </td>
								</tr>
							{/if}						
							<tr>
							  <td>Nome<span class="obrigatorio">*<span></td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"{if $pagina->acao=='alterar'} value="{$cliente->nome}" {/if}>
							  </td>
							</tr>
							<tr>
							  <td>E-mail<span class="obrigatorio">*<span></td>
							  <td>
							  
									<input type="text" class="form-control" id="cli_email" name="cli_email"{if $pagina->acao=='alterar'} value="{$cliente->email}" {/if}>						  
							  
							  </td>
							</tr>
							<tr>
								<td scope="col"  colspan="2">
									<span style="float:right;"><button type="submit" name="submit"  id="submit" value="{$pagina->acao}" class="btn btn-success">{if $pagina->acao=='cadastrar'}Cadastrar{else}Alterar{/if}</button></span>
								</td>
							</tr>

						  </tbody>
						</table>
					</form>
					</div>	
	</td>
    </tr>
</table>

<script type="text/javascript" src="js/formulario/cliente.js"> </script>
</body>
</html>





