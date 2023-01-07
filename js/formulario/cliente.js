$(document).ready(function(){

var form					=	$("#form");
var nome					=	$("#cli_nome");
var email					=	$("#cli_email");



	nome.blur(validaNome);
	email.blur(validaEmail);

	$('.btn-editar').click(function(){
		window.location.href = "clientes.php?acao=alterar&id="+$(this).attr("data-iduser");
	});		
	
	
	$('.btn-excluir').click(function(){

		if(confirm("Deseja realmente excluir ?")){
			
			alert("excluindo");
		}

	});	

	$("#submit").click(function(){
		
		if(validaNome() & validaEmail()){			
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
	
	function validaEmail(){		
		 if(email.val().length>2 && email.val().indexOf("@")!=-1){
			email.removeClass("errado").addClass("certo"); 
			return true;	 
		 }else{
			email.removeClass("certo").addClass("errado"); 
			return false;
		 }		 	
	}	




});

