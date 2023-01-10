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

<table class="table border" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
		<td>	
			<div>{$mensagem|default:''}</div>		
				<br>
					<div class="table-responsive-sm">
					<form name="form" method="POST">
						<table class="table table-bordered" style="width: 75%;margin-left:5%">
						  <thead>
							<tr class="table-active">
							  <th scope="col" colspan="2">Configurações</th>
							</tr>
						  </thead>
						  <tbody>
				
							<tr>
							  <td>Valor da Multa(por dia)<span class="obrigatorio">*<span></td>
							  <td>
								<input type="text" class="form-control" id="con_multa" name="con_multa" value="{$configuracoes->multa|default:'2,00'}">
							  </td>
							</tr>
							<tr>
							  <td>Prazo de entrega(por dia)<span class="obrigatorio">*<span></td>
							  <td>
							  
									<input type="text" class="form-control" id="con_prazo" name="con_prazo" value="{$configuracoes->prazo_entrega|default:'2'}" >						  
							  
							  </td>
							</tr>							
							<tr>
							  <td>Nome da empresa<span class="obrigatorio">*<span></td>
							  <td>
							  
									<input type="text" class="form-control" id="con_nome" name="con_nome" value="{$configuracoes->empresa_nome|default:'Projeto Locadora'}" >						  
							  
							  </td>
							</tr>							
													
							<tr>
								<td scope="col"  colspan="2">
									<span style="float:right;"><button type="submit" name="submit" id="submit" value="alterar" class="btn btn-success">Alterar</button></span>
								</td>
							</tr>

						  </tbody>
						</table>
					</form>
					</div>	
	</td>
    </tr>
</table>

<script type="text/javascript" src="js/formulario/configuracoes.js"> </script>
</body>
</html>





