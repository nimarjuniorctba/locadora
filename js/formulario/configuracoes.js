$(document).ready(function(){

var form					=	$("#form");
var multa					=	$("#con_multa");
var prazo					=	$("#con_prazo");
var empresa					=	$("#con_nome");



	multa.blur(validaMulta);
	prazo.blur(validaPrazo);
	empresa.blur(validaEmpresa);


	$("#submit").click(function(){
		
		if(validaMulta() & validaPrazo() & validaEmpresa()){			
			return true;
		}else{
			return false;
		}			
		
			
	});	
	
	function validaMulta(){		
		 if(multa.val().length>0){
			multa.removeClass("errado").addClass("certo"); 
			return true;	 
		 }else{
			multa.removeClass("certo").addClass("errado"); 
			return false;
		 }		 	
	}	
	
	function validaPrazo(){		
		 if(prazo.val().length>0){
			prazo.removeClass("errado").addClass("certo"); 
			return true;	 
		 }else{
			prazo.removeClass("certo").addClass("errado"); 
			return false;
		 }		 	
	}	
	
	function validaEmpresa(){		
		 if(empresa.val().length>2){
			empresa.removeClass("errado").addClass("certo"); 
			return true;	 
		 }else{
			empresa.removeClass("certo").addClass("errado"); 
			return false;
		 }		 	
	}
	





});

