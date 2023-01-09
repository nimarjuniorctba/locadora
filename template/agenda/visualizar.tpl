<div>
			<label for="loc_cli_nome">Nome</label>
			<input type="text" class="form-control">	
		</div>
		<div>
			<label for="loc_cli_nome">Email</label>
			<input type="text" class="form-control">	
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
			
					<div>
						<label style="margin-right: 15px;">0001</label>
						<label style="">filme 01</label>
						<label style="float:right;">12,50</label>
					</div>
					<div>
						<label style="margin-right: 15px;">0002</label>
						<label style="">filme 01</label>
						<label style="float:right;">12,50</label>
					</div>
					<div>
						<label style="margin-right: 15px;">0003</label>
						<label style="">filme 01</label>
						<label style="float:right;">12,50</label>
					</div>
					<div>
						<label style="margin-right: 15px;">0004</label>
						<label style="">filme 01</label>
						<label style="float:right;">12,50</label>
					</div>					

					<!-- ITENS -->
		</div>		
		<div id="itens-carrinho">
		</div>
		<br>
		<hr>
		<div>
			<div>
				<label style="font-weight: 600;">Total:<span>R$ 120,25</span></label>
				<label style="font-weight: 600;float: right;">Multa por dia:<span>R$ 120,25</span></label>
			</div>			
			<div>			
				<label style="font-weight: 600;">Data de retirada:<span>05/01/2023</span></label>
				<label style="font-weight: 600;float: right;">Data de entrega:<span>10/01/2023</span></label>
			</div>
		</div>

			<div id="receber-pagamento" style="display:none;">
				<hr>				
				<div style="float: left;">
					<div style="clear:both;"></div>
					<label style="font-weight: 600;width: 100%;">Subtotal:<span style="float: right;">R$ 120,25</span></label><div style="clear:both;"></div>
					<label style="font-weight: 600;width: 100%;">Dias em atraso:<span style="float: right;">2 dias</span></label><div style="clear:both;"></div>
					<label style="font-weight: 600;width: 100%;">Multa por atraso:<span class="text-danger" style="float: right;">R$ 20,25</span></label><div style="clear:both;"></div>
					<label style="font-weight: 600;width: 100%;">Total a pagar:<span class="text-success" style="float: right;">R$ 120,25</span></label><div style="clear:both;"></div>
					<div style="display:flex;margin-top: 7px;width: 100%;">	
						<label style="font-weight: 600;width:250px">Forma de pagamento:</label>
						<select class="form-select" id="loc_cli_forma_pgto" style="width:77%;float: right;">
						  <option selected>Selecione Forma de pagamento</option>
						  <option value="1">Dinheiro</option>
						  <option value="2">Cartão de Crédito</option>
						  <option value="3">Cartão de Debito</option>
						</select>				
					</div>
					<div style="display:flex;margin-top: 7px;width: 100%;">	
						<label style="font-weight: 600;width:250px">Troco:</label>
						<input type="text" class="form-control" id="loc_troco" name="loc_troco" style="float: right;">			
					</div>
					<button  name="loc_receber_pgto"  id="loc_receber_pgto" class="btn btn-success" style="margin-top: 6px;float: right;">Receber pagamento</button>					
				</div>			
			</div>	
		<div style="clear:both;"></div>		
		<hr>	
		<div>
			<button  name="loc_cancelar"  id="loc_cancelar" value="adicionar" class="btn btn-warning">Cancelar</button>
			<button  name="loc_finalizar"  id="loc_finalizar" class="btn btn-primary" style="float: right;">Finalizar Locação</button>
		</div>	
