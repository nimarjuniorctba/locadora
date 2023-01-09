<?php


$opcao=isset($_POST['opcao'])?$_POST['opcao']:'';



 switch($opcao){
        
        case 'locacao_cadastrar' :
            
            
           //     echo "cadastrar - ".count($_POST['filmes']);
            $dados['status'] = true;
                 break;
                
                
                
}


echo json_encode($dados);