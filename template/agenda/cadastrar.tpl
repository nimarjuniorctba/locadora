

<div id="tela_inicial">
		<div>
			<label for="loc_cli_nome">Nome</label>
			<select class="form-select" name="loc_cli_nome" id="loc_cli_nome">
			  <option value="" selected>Selecione um cliente</option>
			{foreach $array_cliente item=$cliente}
				<option value="{$cliente.id}">{$cliente.nome}</option>
			{/foreach}
			</select>
		</div>
		<div>
			<label for="loc_cli_nome">Filme</label>
			<div style="display:flex;">	
				<select class="form-select" name="loc_filmes" id="loc_filmes" style="width:77%;margin-right:10px;">
				  <option value="" selected>Selecione um filme</option>
			{foreach $array_filmes item=$filme}
				<option value="{$filme.id}" data-nome="{$filme.nome}" data-valor="{$filme.valor}">{$filme.nome}</option>
			{/foreach}
				</select>
				<button  id="adicionar-filme" class="btn btn-secondary">Adicionar</button>
			</div>
			<div id="info"></div>
		</div>
		<br>
		<hr>		
		<div style="overflow: auto;height: 97px;">
			<label style="font-weight: 600;text-transform:uppercase;width: 100%;text-align: center;">Recibo</label>
			<div>
				<label style="font-weight: 600;margin-right: 15px;">Código</label>
				<label style="font-weight: 600;">Nome</label>
				<label style="font-weight: 600;float:right;">Valor</label>
			</div>
			<div id="itens_carrinho">			
			</div>
		</div>		
		<div id="itens-carrinho">
		</div>
		<br>
		<hr>
		<div>
			<div>
				<label style="font-weight: 600;">Total:   <span id="loc_cad_total"></span></label>
				<label style="font-weight: 600;float: right;">Multa por dia:<span>{$pagina->valorMulta}</span></label>
			</div>			
			<div>			
				<label style="font-weight: 600;">Data de retirada:   <span>{$pagina->dataHoje}</span></label>
				<label style="font-weight: 600;float: right;">Data de entrega:<span>{$pagina->dataPrevista}</span></label>
			</div>
		</div>
		<hr>		
		<div>
			<button name="loc_cad_cadastrar"  id="loc_cad_cadastrar"class="btn btn-primary" style="float: right;">Cadastrar</button>
		</div>		
</div>
<div id="tela_final" style="display:none;">

	<div style="text-align: center;width: 100%;">
		<img src="imagens/icones/positivo.jpg" style="height: 300px;width: 300px;">
	</div>
	<div style="text-align:center;width:100%;">
		<button name="loc_cad_finalizar" id="loc_cad_finalizar"class="btn btn-success close-modal" rel="modal:close" style="width: 41%;"  rel="modal:close">Finalizar</button>
	</div>


</div>

