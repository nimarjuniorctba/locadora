<?php

require_once 'classes/autoload.class.php';


$aclientes          =   new acesso_clientes();
$atitulos           =   new acesso_titulos();

$pdo = MySQL_PDO::conexao();

$opcao=isset($_POST['opcao'])?$_POST['opcao']:'';
$id=isset($_POST['id'])?$_POST['id']:'';



 switch($opcao){
        
    case 'cliente' :
        $aclientes->Deletar($pdo,'id',$id);
        $dados['status'] = true;
        break;                
    case 'titulos' :
        $atitulos->Deletar($pdo,'id',$id);
        $dados['status'] = true;
        break;                
                       
                
}


echo json_encode($dados);