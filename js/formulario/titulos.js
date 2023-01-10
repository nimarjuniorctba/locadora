$(document).ready(function(){

var form					=	$("#form");
var nome					=	$("#tit_nome");
var quantidade				=	$("#tit_quantidade");
var valor					=	$("#tit_valor");



	nome.blur(validaNome);
	quantidade.blur(validaQuantidade);
	valor.blur(validaValor);

	$('.btn-editar').click(function(){
		window.location.href = "titulos.php?acao=alterar&id="+$(this).attr("data-iduser");
	});		
	
	
	$('.btn-excluir').click(function(){

		if(confirm("Deseja realmente excluir o titulo?")){
			
			$.ajax({
					url : 'requisicoes_apagar.php',
					data : { 	opcao			:	'titulos', 
								id 		: 	$(this).attr('data-iduser',)

							},
					type : 'POST',
					dataType : 'json',
					success : function(json){
								if(json.status){
									//caso de certo muda telas
									window.location.reload(true);
								}
							}
			});	


		}

	});	

	$("#submit").click(function(){		
		
		if(validaNome() & validaQuantidade() & validaValor()){			
			return true;
		}else{
			return false;
		}			
		
			
	});	
	
	function validaNome(){		
		 if(nome.val().length>2){
			nome.removeClass("errado").addClass("certo"); 
			return true;	 
		 }else{
			nome.removeClass("certo").addClass("errado"); 
			return false;
		 }		 	
	}	
	
	function validaQuantidade(){		
		 if(quantidade.val().length>0){
			quantidade.removeClass("errado").addClass("certo"); 
			return true;	 
		 }else{
			quantidade.removeClass("certo").addClass("errado"); 
			return false;
		 }		 	
	}	
	
	function validaValor(){		
		 if(valor.val().length>2){
			valor.removeClass("errado").addClass("certo"); 
			return true;	 
		 }else{
			valor.removeClass("certo").addClass("errado"); 
			return false;
		 }		 	
	}
	



});

