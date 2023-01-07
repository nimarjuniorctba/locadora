<?php

require_once 'smarty/config.ini.php';

$pagina =   new stdClass();

$acao=isset($_GET['acao'])?$_GET['acao']:'listar';


$pagina->acao   =   $acao;


//var_dump($_REQUEST);
//exit;

if($acao=='alterar'){
    
    $id=isset($_GET['id'])?$_GET['id']:'';    
    
    $titulo =   new stdClass();
    
    $titulo->id  =   $id;
    $titulo->nome  =   "Titulo teste 01";
    $titulo->quantidade  =   2;
    $titulo->valor  =   "12,56";
    $titulo->status  =   "Sem estoque";  
    
    $smarty->assign('cliente',$titulo);
    
}

if($acao=='listar'){
    

    $array_titulos[0]["iduser"]  =   "01";
    $array_titulos[0]["nome"]  =   "titulo teste 01";
    $array_titulos[0]["email"]  =   "cliente@teste.com.br";
    $array_titulos[0]["quantidade"]  =   "2";
    $array_titulos[0]["valor"]  =   "R$ 56,56";
    $array_titulos[0]["status"]  =   "Ativo";
    
    
    $array_titulos[1]["iduser"]  =   "02";
    $array_titulos[1]["nome"]  =   "titulo teste 02";
    $array_titulos[1]["email"]  =   "cliente1@teste.com.br";
    $array_titulos[1]["quantidade"]  =   "0";
    $array_titulos[1]["valor"]  =   "R$ 12,02";
    $array_titulos[1]["status"]  =   "Sem estoque";
    
    $array_titulos[2]["iduser"]  =   "03";
    $array_titulos[2]["nome"]  =   " titulo teste 03";
    $array_titulos[2]["email"]  =   "cliente03@teste.com.br";    
    $array_titulos[2]["quantidade"]  =   "2";    
    $array_titulos[2]["valor"]  =   "R$ 12,25";    
    $array_titulos[2]["status"]  =   "Ativo";    
    
    
    $smarty->assign('array_titulos',$array_titulos);
    
}

$smarty->assign('pagina',$pagina);

switch($acao){
    case'alterar':            
    case'cadastrar':                          
            $pagina->titulo =   $acao=='cadastrar'?"Cadastrar titulos":"Alterar titulos";
            $smarty->display('titulos/formulario.tpl');
            break;
    case'listar':            
            $pagina->titulo =   "Lista de titulos";
            $smarty->display('titulos/lista.tpl');
            break;

}