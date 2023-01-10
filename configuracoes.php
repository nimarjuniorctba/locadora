<?php

require_once 'smarty/config.ini.php';
require_once 'classes/autoload.class.php';


$aconfiguracoes          =   new acesso_configuracoes();

$pagina =   new stdClass();

$pdo = MySQL_PDO::conexao();

//var_dump($_REQUEST);
//exit();
  
if(isset($_POST['submit'])&&$_POST['submit']=='alterar'){
    
    $configuracoes = new configuracoes();
    $configuracoes->setMulta(str_replace(",",".",$_POST['con_multa']));
    $configuracoes->setPrazo($_POST['con_prazo']);
    $configuracoes->setEmpresa($_POST['con_nome']);
    $configuracoes->setEmpresa_id(1);
    
    $altera = $aconfiguracoes->atualizaDados($pdo, $configuracoes);
        if(!$altera==false){
           $smarty->assign('mensagem','<div class="certo">Configurações atualizado com sucesso!</div>');
        }else{
           $smarty->assign('mensagem','<div class="errado">Não foi possivel atualizar.</div>');         
        }        
}


    $retorna_configuracoes = $aconfiguracoes->retornaDados($pdo, 'id', 1);
    if(is_object($retorna_configuracoes)){
        
        $configuracoes =   new stdClass();
 
        $configuracoes->multa  =   $retorna_configuracoes->getMulta();
        $configuracoes->prazo_entrega  =   $retorna_configuracoes->getPrazo();
        $configuracoes->empresa_nome  =   $retorna_configuracoes->getEmpresa();        
                
        $smarty->assign('configuracoes',$configuracoes);
    }


         
    
    
$pagina->titulo =   "Configurações";
$smarty->assign('pagina',$pagina);
$smarty->display('configuracoes.tpl');
            