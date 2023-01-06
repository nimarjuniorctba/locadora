<?php

require_once 'smarty/config.ini.php';

$pagina =   new stdClass();

$acao=isset($_GET['acao'])?$_GET['acao']:'';





$smarty->assign('pagina',$pagina);

switch($acao){
    case'cadastrar':            
            $pagina->titulo =   "Cadastrar cliente";
            $smarty->display('cliente/formulario.tpl');
            break;
    case'listar':            
            $pagina->titulo =   "Lista de Clientes";
            $smarty->display('cliente/lista.tpl');
            break;
 
 
}