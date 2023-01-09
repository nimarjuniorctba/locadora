$(document).ready(function(){
	
	$('.btn-clientes').click(function(){
		window.location.href = "clientes.php";
	});	

	$('.btn-titulos').click(function(){
		window.location.href = "titulos.php";
	});		
	
	$('.btn-novo-locacao').click(function(){		
		resetaFormNovaLocacao();
	});			
	
	$('#loc_cad_cadastrar').click(function(){
		
		
		var cliente = 		$("#loc_cli_nome").val();
		var filmes 	= 		Array();

		$(".itens-carrinho").each(function(){

			filmes.push($(this).attr("data-id",));
			
		});
		
		
		if(cliente.length==0){
			$("#loc_cli_nome").focus();
			return false;
		}			
		
		if(filmes.length==0){
			$("#loc_filmes").focus();
			return false;
		}	
		

			$.ajax({
					url : 'requisicoes_agenda.php',
					data : { 	opcao			:	'locacao_cadastrar', 
								cliente 		: 	cliente,
								filmes 			: 	filmes

							},
					type : 'POST',
					dataType : 'json',
					success : function(json){
								if(json.status){
									//caso de certo muda telas
									$("#tela_inicial").hide();
									$("#tela_final").show();//tela de sucesso
								}else{
									$("#info").html("<label style='color:red;'>Erro ao fazer cadastro, título indisponível</label>");
								}
							}
			});				
		
		
		
		
		
	});		
	
	$('#loc_cad_finalizar').click(function(){
		window.location.reload(true);
	});		
	
	$('#adicionar-filme').click(function(){
		
		//caso filme vazio 
		if($("#loc_filmes").val()==""){
			$("#loc_filmes").focus();
			return false;
		}	
		
		
		var	nome	=	$("#loc_filmes option[value='"+$("#loc_filmes").val()+"']").attr("data-nome",);
		var	valor	=	$("#loc_filmes option[value='"+$("#loc_filmes").val()+"']").attr("data-valor",);
		
		var html;
		
		
		html	=	'			<div class="itens-carrinho" data-id="'+$("#loc_filmes").val()+'">'
		html	+=	'				<i class="large material-icons excluir-item" style="font-size: 15px;color: red;cursor:pointer;">highlight_off</i>'
		html	+=	'				<label style="margin-right: 15px;">'+$("#loc_filmes").val()+'</label>'
		html	+=	'				<label class="item-nome">'+nome+'</label>'
		html	+=	'				<label class="item-valor" style="float:right;">'+valor+'</label>'
		html	+=	'			</div>'
		
		
		$("#itens_carrinho").append(html);
		
			$('.excluir-item').click(function(){
				$(this).closest(".itens-carrinho").remove();
				calculaTotal();
		
			});
			
		calculaTotal();	
		
	});		
			
	$('.resetaFomulario').click(function(){
		$("#receber-pagamento").hide();
		$("#loc_finalizar").css("opacity", "1");
		$("#loc_finalizar").attr("disabled", false);
		
	});		

	$('#loc_finalizar').click(function(){
		
		$("#receber-pagamento").slideDown('slow');
		$("#loc_cli_forma_pgto").focus();
		$("#loc_finalizar").css("opacity", "0.5");
		$("#loc_finalizar").attr("disabled", "true");
		
	});	
	
	
	

	
});

	function resetaFormNovaLocacao(){
		
		$("#loc_cli_nome").val("");
		$("#loc_filmes").val("");
		$("#itens_carrinho").html("");	
		$("#loc_cad_total").html("R$ 0,00");	
		$("#info").html("");	
		$("#tela_inicial").show();
		$("#tela_final").hide();		
	}	
	
	function calculaTotal(){
		
		var total=0; 

		$(".itens-carrinho").each(function(){

			total += parseFloat($(this).find(".item-valor").text().replace(',','.'));
			
		});

		total = "R$ "+total;

		//console.log(total.replace('.',','));	
		$("#loc_cad_total").html(total.replace('.',','));	
	
	}	