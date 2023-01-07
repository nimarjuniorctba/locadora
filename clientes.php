<?php

require_once 'smarty/config.ini.php';

$pagina =   new stdClass();

$acao=isset($_GET['acao'])?$_GET['acao']:'listar';


$pagina->acao   =   $acao;


//var_dump($_REQUEST);
//exit;

if($acao=='alterar'){
    
    $id=isset($_GET['id'])?$_GET['id']:'';    
    
    $cliente =   new stdClass();
    
    $cliente->id  =   $id;
    $cliente->nome  =   "Cliente teste";
    $cliente->email  =   "cliente@teste.com.br";
    
    
    $smarty->assign('cliente',$cliente);
    
}

if($acao=='listar'){
    

    $array_cliente[0]["iduser"]  =   "01";
    $array_cliente[0]["nome"]  =   "Cliente teste";
    $array_cliente[0]["email"]  =   "cliente@teste.com.br";
    
    
    $array_cliente[1]["iduser"]  =   "02";
    $array_cliente[1]["nome"]  =   "Cliente teste1";
    $array_cliente[1]["email"]  =   "cliente1@teste.com.br";
    
    $array_cliente[2]["iduser"]  =   "03";
    $array_cliente[2]["nome"]  =   "Cliente teste03";
    $array_cliente[2]["email"]  =   "cliente03@teste.com.br";    
    
    
    $smarty->assign('array_cliente',$array_cliente);
    
}

$smarty->assign('pagina',$pagina);

switch($acao){
    case'alterar':            
    case'cadastrar':                          
            $pagina->titulo =   $acao=='cadastrar'?"Cadastrar cliente":"Alterar cliente";
            $smarty->display('cliente/formulario.tpl');
            break;
    case'listar':            
            $pagina->titulo =   "Lista de Clientes";
            $smarty->display('cliente/lista.tpl');
            break;

}