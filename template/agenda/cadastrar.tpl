		<div>
			<label for="loc_cli_nome">Nome</label>
			<select class="form-select" id="loc_cli_nome">
			  <option selected>Selecione um cliente</option>
			  <option value="1">cliente 01</option>
			  <option value="2">cliente 01</option>
			  <option value="3">cliente 01</option>
			</select>
		</div>
		<div>
			<label for="loc_cli_nome">Filme</label>
			<div style="display:flex;">	
				<select class="form-select" id="loc_cli_nome" style="width:77%;margin-right:10px;">
				  <option selected>Selecione um filme</option>
				  <option value="1">Filme 01</option>
				  <option value="2">Filme 01</option>
				  <option value="3">Filme 01</option>
				</select>
				<button type="submit" name="submit"  id="submit" value="adicionar" class="btn btn-secondary">Adicionar</button>
			</div>
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
					<!-- ITENS -->
			
					<div>
						<i class="large material-icons" style="font-size: 15px;color: red;cursor:pointer;">highlight_off</i>
						<label style="margin-right: 15px;">0001</label>
						<label style="">filme 01</label>
						<label style="float:right;">12,50</label>
					</div>
					<div>
					
						<i class="large material-icons" style="font-size: 15px;color: red;cursor:pointer;">highlight_off</i>
						<label style="margin-right: 15px;">0002</label>
						<label style="">filme 01</label>
						<label style="float:right;">12,50</label>
					</div>
					<div>
						<i class="large material-icons" style="font-size: 15px;color: red;cursor:pointer;">highlight_off</i>
						<label style="margin-right: 15px;">0003</label>
						<label style="">filme 01</label>
						<label style="float:right;">12,50</label>
					</div>
					<div>
						<i class="large material-icons" style="font-size: 15px;color: red;cursor:pointer;">highlight_off</i>
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
		<hr>		
		<div>
			<button type="submit" name="submit"  id="submit" value="adicionar" class="btn btn-warning">Cancelar</button>
			<button type="submit" name="submit"  id="submit" value="adicionar" class="btn btn-primary" style="float: right;">Cadastrar</button>
		</div>		
