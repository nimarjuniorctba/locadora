<?php

require_once 'smarty/config.ini.php';

$pagina =   new stdClass();

$acao=isset($_GET['acao'])?$_GET['acao']:'ativas';


$pagina->dataHoje   =   date('09/01/2023');
$pagina->dataPrevista   =  "15/01/2023";
$pagina->valorMulta   =   "R$ 22,15";


if($acao=='ativas'){
    
    
    ##CARREGA CLIENTES


        $array_cliente[0]["id"]  =   "01";
        $array_cliente[0]["nome"]  =   "Cliente teste js1";

        $array_cliente[1]["id"]  =   "02";
        $array_cliente[1]["nome"]  =   "Cliente teste122";

        $array_cliente[2]["id"]  =   "03";
        $array_cliente[2]["nome"]  =   "Cliente teste0333";

        $smarty->assign('array_cliente',$array_cliente);

    ##   
        
    ##CARREGA Filmes


        $array_filmes[0]["id"]  =   "01";
        $array_filmes[0]["nome"]  =   "Filme 0001";
        $array_filmes[0]["valor"]  =   "13,23";

        $array_filmes[1]["id"]     =   "02";
        $array_filmes[1]["nome"]   =   "Filme 0002";
        $array_filmes[1]["valor"]   =   "33,23";

        $array_filmes[2]["id"]     =   "03";
        $array_filmes[2]["nome"]   =   "Filme 0003";
        $array_filmes[2]["valor"]  =   "23,23";

        $smarty->assign('array_filmes',$array_filmes);

    ##         

    $array_locacao[0]["id"]  =   "01";
    $array_locacao[0]["nome"]  =   "Cliente teste js";
    $array_locacao[0]["data_retirada"]  =   "05/01/2023";
    $array_locacao[0]["data_previsao"]  =   "10/01/2023";
    
    
    $array_locacao[1]["id"]  =   "02";
    $array_locacao[1]["nome"]  =   "Cliente teste1";
    $array_locacao[1]["data_retirada"]  =   "05/01/2023";
    $array_locacao[1]["data_previsao"]  =   "10/01/2023";
    
    $array_locacao[2]["id"]  =   "03";
    $array_locacao[2]["nome"]  =   "Cliente teste03";
    $array_locacao[2]["data_retirada"]  =   "05/01/2023";
    $array_locacao[2]["data_previsao"]  =   "10/01/2023";  
    
    
    $smarty->assign('array_locacao',$array_locacao);
    
}


if($acao=='historico'){

    $array_historico[0]["id"]  =   "01";
    $array_historico[0]["nome"]  =   "Cliente teste js";
    $array_historico[0]["data_retirada"]  =   "05/01/2023";
    $array_historico[0]["data_devolucao"]  =   "15/01/2023";
    
    
    $array_historico[1]["id"]  =   "02";
    $array_historico[1]["nome"]  =   "Cliente teste1";
    $array_historico[1]["data_retirada"]  =   "05/01/2023";
    $array_historico[1]["data_devolucao"]  =   "28/01/2023";
    
    $array_historico[2]["id"]  =   "03";
    $array_historico[2]["nome"]  =   "Cliente teste03";
    $array_historico[2]["data_retirada"]  =   "05/01/2023";
    $array_historico[2]["data_devolucao"]  =   "31/01/2023";  
    
    
    $smarty->assign('array_historico',$array_historico);
    
}

         
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

            