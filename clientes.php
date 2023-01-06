<?php


require_once 'smarty/config.ini.php';

$acao=isset($_GET['acao'])?$_GET['acao']:'';


$pagina =   new stdClass();


$pagina->titulo =   "Cadastrar cliente";



$smarty->assign('pagina',$pagina);


 $smarty->display('cliente/lista.tpl');