<?php

require_once 'smarty/config.ini.php';

$pagina =   new stdClass();

$acao=isset($_GET['acao'])?$_GET['acao']:'ativas';


/*

  

$configuracoes =   new stdClass();

    $configuracoes->multa  =   '12,34';
    $configuracoes->prazo_entrega  =   "3 dias";
    $configuracoes->empresa_nome  =   "Projeto Locadora"; 

    $smarty->assign('configuracoes',$configuracoes);
*/

         
$pagina->titulo =   "Agenda";
$smarty->assign('pagina',$pagina);

switch($acao){
    case 'historico':        
            $smarty->display('agenda/historico.tpl');
            break;
    case 'ativas':        
            $smarty->display('agenda/lista.tpl');
            break;
}

            