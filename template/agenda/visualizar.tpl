<div>
<input type="hidden" name="id_locacao" id="id_locacao" value="">
			<label for="loc_cli_nome">Nome</label>
			<input id="ent_nome" type="text" class="form-control">	
		</div>
		<div>
			<label for="loc_cli_nome">Email</label>
			<input  id="ent_email"  type="text" class="form-control">	
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
		<hr>
		<div>
			<div>
				<label style="font-weight: 600;width: 100%;">Total:<span style="float: right;" id="ent_ini_total"></span></label>
			</div>			
			<div>			
				<label style="font-weight: 600;width: 100%;">Data de retirada:<span style="float: right;" id="ent_ini_retirada"></span></label>			
			</div>
		</div>

			<div id="receber-pagamento" style="display:none;">
				<hr>				
				<div style="float: left;">
					<div style="clear:both;"></div>
					<label style="font-weight: 600;width: 100%;">Subtotal:<span style="float: right;"id="ent_ini_subtotal"></span></label><div style="clear:both;"></div>
					<label style="font-weight: 600;width: 100%;">Dias em atraso:<span style="float: right;" id="ent_ini_diasatraso"></span></label><div style="clear:both;"></div>
					<label style="font-weight: 600;width: 100%;">Multa por atraso:<span class="text-danger" style="float: right;"id="ent_multa"></span></label><div style="clear:both;"></div>
					<label style="font-weight: 600;width: 100%;">Total a pagar:<span class="text-success" style="float: right;"id="ent_valortotal"></span></label><div style="clear:both;"></div>
					<div style="display:flex;margin-top: 7px;width: 100%;">	
						<label style="font-weight: 600;width:250px">Forma de pagamento:</label>
						<select class="form-select" id="loc_cli_forma_pgto" style="width:77%;float: right;">
						  <option selected>Selecione Forma de pagamento</option>
						  <option value="Dinheiro">Dinheiro</option>
						  <option value="Cartão de Credito">Cartão de Credito</option>
						  <option value="Cartao de Debito">Cartao de Debito</option>
						</select>				
					</div>
					<button  name="loc_receber_pgto"  id="loc_receber_pgto" class="btn btn-success" style="margin-top: 6px;float: right;">Receber pagamento</button>					
				</div>			
			</div>	
		<div style="clear:both;"></div>		
		<hr>	
		<div>
			<button  name="loc_finalizar"  id="loc_finalizar" class="btn btn-primary" style="float: right;">Finalizar Locação</button>
		</div>	
