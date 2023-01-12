<?php

require_once 'smarty/config.ini.php';
require_once 'classes/autoload.class.php';

$aconfiguracoes         =   new acesso_configuracoes();
$atitulos                =   new acesso_titulos();
$aclientes              =   new acesso_clientes();
$alocacao               =   new acesso_locacao();
$pagina =   new stdClass();

$pdo = MySQL_PDO::conexao();

$acao=isset($_GET['acao'])?$_GET['acao']:'ativas';

$retorna_configuracoes = $aconfiguracoes->retornaDados($pdo, 'id', 1);
if(is_object($retorna_configuracoes)){
    $pagina->empresa_nome       =  $retorna_configuracoes->getEmpresa();
    $pagina->dataHoje           =  date('d/m/Y');
    $pagina->dataPrevista       =  date('d/m/Y', strtotime('+'.$retorna_configuracoes->getPrazo().' days'));
    $pagina->valorMulta         =   "R$ ".str_replace(".", ",", $retorna_configuracoes->getMulta());    
}


if($acao=='ativas'){
    
    
    ##CARREGA CLIENTES
        $retorna_clientes = $aclientes->listarDados($pdo,'todos');
        if(is_array($retorna_clientes)){
            $array_cliente = Array();
            for($i=0;$i<count($retorna_clientes);$i++){
                $array_cliente[$i]["id"]  =   $retorna_clientes[$i]->getId();
                $array_cliente[$i]["nome"]  =   $retorna_clientes[$i]->getNome();
            }
             $smarty->assign('array_cliente',$array_cliente);
        }

  
        
    ##CARREGA Filmes

    $retorna_titulos = $atitulos->listarDados($pdo,'todos');
    if(is_array($retorna_titulos)){
        $array_titulos = Array();
        for($i=0;$i<count($retorna_titulos);$i++){
            
            $array_titulos[$i]["id"]             =   $retorna_titulos[$i]->getId();
            $array_titulos[$i]["nome"]           =   $retorna_titulos[$i]->getNome();            
            $array_titulos[$i]["valor"]          =   "R$ ".str_replace(".",",",$retorna_titulos[$i]->getValor());                      
            
        }
        
         $smarty->assign('array_filmes',$array_titulos);
        
    } 



    ##         


    
}

if($acao!='historico'){
    $array_locacao = Array();    
    $lista_locacao = $alocacao->listarDados($pdo,'ativas');
    //var_dump($lista_locacao);
    if(is_array($lista_locacao)){
        
        for($i=0;$i<count($lista_locacao);$i++){
            
            $retorna_cliente   =    $aclientes->retornaDados($pdo, 'id', $lista_locacao[$i]->getCliente());
            if(is_object($retorna_cliente)){ 
                $array_locacao[$i]["id"]             =   $lista_locacao[$i]->getId();
                $array_locacao[$i]["nome"]           =   $retorna_cliente->getNome();
                $array_locacao[$i]["data_retirada"]  =   implode('/',array_reverse(explode('-', $lista_locacao[$i]->getDt_retirada())));
                $array_locacao[$i]["data_previsao"]  =   implode('/',array_reverse(explode('-', $lista_locacao[$i]->getDt_prevista())));                          
            }
        }
   
    }      
      $smarty->assign('array_locacao',$array_locacao);     
}

if($acao=='historico'){
        
    $lista_locacao = $alocacao->listarDados($pdo,'historico');
    if(is_array($lista_locacao)){
       $array_historico = Array(); 
        for($i=0;$i<count($lista_locacao);$i++){
            
            $retorna_cliente   =    $aclientes->retornaDados($pdo, 'id', $lista_locacao[$i]->getCliente());
            if(is_object($retorna_cliente)){ 
                $array_historico[$i]["id"]             =   $lista_locacao[$i]->getId();
                $array_historico[$i]["nome"]           =   $retorna_cliente->getNome();
                $array_historico[$i]["data_retirada"]  =   implode('/',array_reverse(explode('-', $lista_locacao[$i]->getDt_retirada())));
                $array_historico[$i]["data_devolucao"]  =   implode('/',array_reverse(explode('-', $lista_locacao[$i]->getDt_entrega())));                          
            }
        }
   
    }      
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

            