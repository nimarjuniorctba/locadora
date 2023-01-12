<html>
<head>

<title>{$pagina->empresa_nome}</title>
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
						  <th scope="col">Data de devolução</th>
						  <th scope="col">Ações</th>
						</tr>
					  </thead>
					  <tbody>				

						{foreach $array_historico item=$locacao}
						<tr>
						  <th scope="row">{$locacao.id}</th>						 
						  <td>{$locacao.nome}</td>						  
						  <td>{$locacao.data_retirada}</td>
						  <td>{$locacao.data_devolucao}</td>
						  <td>
                            <a rel="modal:open" href="#locacao-visualizar" data-id="{$locacao.id}" class="carregaDadoslocacao" ><button  class="btn btn-dark" ><i class="medium material-icons" style="font-size: 16px;">visibility</i></button></a>
						</tr>
						{/foreach}
						
					  </tbody>
					</table>
					</div>
	
	</td>
    </tr>
</table>
				
<div id="locacao-visualizar" class="modal" style="height: 498px;max-width: 58%;margin-left: 20%;margin-top: 5%;overflow:auto;overflow-x: clip;">

<div>
			<label for="loc_cli_nome">Nome</label>
			<input id="ent_nome" type="text" class="form-control">	
		</div>
		<div>
			<label for="loc_cli_nome">Email</label>
			<input  id="ent_email" type="text" class="form-control">	
		</div>
		<br>
		<hr>		
		<div style="overflow: auto;">
			<label style="font-weight: 600;text-transform:uppercase;width: 100%;text-align: center;">Recibo</label>
			<div>
				<label style="font-weight: 600;margin-right: 15px;">Código</label>
				<label style="font-weight: 600;">Nome</label>
				<label style="font-weight: 600;float:right;">Valor</label>
			</div>
					<!-- ITENS -->
			
					<div id="lista-itens">

					</div>				

					<!-- ITENS -->
		</div>		
		<div id="itens-carrinho">
		</div>
		<br>

		<div style="float: left;width: 100%;">
			<div style="clear:both;"></div>
				<label style="font-weight: 600;width: 100%;">Data de retirada:<span style="float: right;" id="ent_ini_retirada" >00/00/0000</span></label><div style="clear:both;"></div>
				<label style="font-weight: 600;width: 100%;">Data de entrega:<span style="float: right;"  id="ent_ini_entrega">00/00/0000</span></label><div style="clear:both;"></div><div style="clear:both;"></div>
			</div>
<br>

			<div id="receber-pagamento" style="">				
				<div style="float: left;width: 100%;">
					<div style="clear:both;"></div>
					<label style="font-weight: 600;width: 100%;">Subtotal:<span style="float: right;" id="ent_ini_subtotal">R$ 0,00</span></label><div style="clear:both;"></div>
					<label style="font-weight: 600;width: 100%;">Dias em atraso:<span style="float: right;"  id="ent_ini_diasatraso">0 dias</span></label><div style="clear:both;"></div>
					<label style="font-weight: 600;width: 100%;">Multa por atraso:<span class="text-danger" style="float: right;" id="ent_multa">R$ 0,00</span></label><div style="clear:both;"></div>
					<label style="font-weight: 600;width: 100%;">Total a pagar:<span class="text-success" style="float: right;" id="ent_valortotal">R$ 0,00</span></label><div style="clear:both;"></div>
					<label style="font-weight: 600;width: 100%;">Forma de pagamento:<span class="text-success" style="float: right;"  id="loc_cli_his_forma_pgto" ></span></label><div style="clear:both;"></div>
				<br>
				</div>			
			</div>	
	
	

</div>

<script type="text/javascript" src="js/formulario/agenda.js"> </script>
</body>
</html>





