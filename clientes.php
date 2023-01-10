<?php

require_once 'smarty/config.ini.php';
require_once 'classes/autoload.class.php';

$aconfiguracoes     =   new acesso_configuracoes();
$aclientes          =   new acesso_clientes();
$pagina             =   new stdClass();

$acao=isset($_GET['acao'])?$_GET['acao']:'listar';
$pagina->acao   =   $acao;

$pdo = MySQL_PDO::conexao();

if(isset($_POST['submit'])&&($_POST['submit']=='cadastrar' || $_POST['submit']=='alterar')){
  
    if($_POST['submit']=='cadastrar'){
        $cliente    =   new Clientes();
        $cliente->setNome($_POST['cli_nome']);
        $cliente->setEmail($_POST['cli_email']);

        $cadastra = $aclientes->cadastraDados($pdo, $cliente);    
        if(!$cadastra==false){
           $smarty->assign('mensagem','<div class="certo">Cliente cadastrado com sucesso!</div>');
        }else{
           $smarty->assign('mensagem','<div class="errado">Não foi possivel cadastrar e-mail ja cadastrado</div>');         
        }
    }else{
        $cliente    =   new Clientes();
        $cliente->setId($_GET['id']);
        $cliente->setNome($_POST['cli_nome']);
        $cliente->setEmail($_POST['cli_email']);
        $cadastra = $aclientes->atualizaDados($pdo, $cliente);   
        if(!$cadastra==false){
           $smarty->assign('mensagem','<div class="certo">Cliente atualizado com sucesso!</div>');
        }else{
           $smarty->assign('mensagem','<div class="errado">Não foi possivel atualizar.</div>');         
        }
    }    
}

if($acao=='alterar'){
    
    $id=isset($_GET['id'])?$_GET['id']:'';    
        
    $retorna_cliente   =    $aclientes->retornaDados($pdo, 'id', $id);
    if(is_object($retorna_cliente)){      
        
        $cliente            =   new stdClass();
        
        $cliente->id        =   $retorna_cliente->getId();
        $cliente->nome      =   $retorna_cliente->getNome();
        $cliente->email     =   $retorna_cliente->getEmail();    
        
        $smarty->assign('cliente',$cliente);
    }
    
}

if($acao=='listar'){
    
    $retorna_clientes = $aclientes->listarDados($pdo,'todos');
    if(is_array($retorna_clientes)){
        
        for($i=0;$i<count($retorna_clientes);$i++){
            
            $array_cliente[$i]["iduser"]  =   $retorna_clientes[$i]->getId();
            $array_cliente[$i]["nome"]  =   $retorna_clientes[$i]->getNome();
            $array_cliente[$i]["email"]  =   $retorna_clientes[$i]->getEmail();            
            
        }
        
         $smarty->assign('array_cliente',$array_cliente);
        
    }
    
}

    $retorna_configuracoes = $aconfiguracoes->retornaDados($pdo, 'id', 1);
    if(is_object($retorna_configuracoes)){
        $pagina->empresa_nome =   $retorna_configuracoes->getEmpresa();
    }

switch($acao){
    case'alterar':            
    case'cadastrar':                          
            $pagina->titulo =   $acao=='cadastrar'?"Cadastrar cliente":"Alterar cliente";
            $smarty->assign('pagina',$pagina);
            $smarty->display('cliente/formulario.tpl');
            break;
    case'listar':            
            $pagina->titulo =   "Lista de Clientes";
            $smarty->assign('pagina',$pagina);
            $smarty->display('cliente/lista.tpl');
            break;

}