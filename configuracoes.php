<?php

require_once 'smarty/config.ini.php';

$pagina =   new stdClass();


  

$configuracoes =   new stdClass();

    $configuracoes->multa  =   '12,34';
    $configuracoes->prazo_entrega  =   "3 dias";
    $configuracoes->empresa_nome  =   "Projeto Locadora"; 

    $smarty->assign('configuracoes',$configuracoes);


         
$pagina->titulo =   "Configurações";
$smarty->assign('pagina',$pagina);
$smarty->display('configuracoes.tpl');
            