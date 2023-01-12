<?php

require_once 'smarty/config.ini.php';
require_once 'classes/autoload.class.php';

$atitulos                =   new acesso_titulos();
$aconfiguracoes          =   new acesso_configuracoes();
$pagina =   new stdClass();

$acao=isset($_GET['acao'])?$_GET['acao']:'listar';

$pagina->acao   =   $acao;

$pdo = MySQL_PDO::conexao();

if(isset($_POST['submit'])&&($_POST['submit']=='cadastrar' || $_POST['submit']=='alterar')){
  
    if($_POST['submit']=='cadastrar'){
        $titulo    =   new Titulos();
        $titulo->setNome($_POST['tit_nome']);
        $titulo->setValor(str_replace(",",".", $_POST['tit_valor']));
        $titulo->setQuantidade($_POST['tit_quantidade']);

        $cadastra = $atitulos->cadastraDados($pdo, $titulo);    
        if(!$cadastra==false){
           $smarty->assign('mensagem','<div class="certo">Titulo cadastrado com sucesso!</div>');
        }else{
           $smarty->assign('mensagem','<div class="errado">Não foi possivel cadastrar nome já cadastrado</div>');         
        }
    }else{
        $titulo    =   new Titulos();
        $titulo->setId($_GET['id']);
        $titulo->setNome($_POST['tit_nome']);
        $titulo->setValor(str_replace(",",".", $_POST['tit_valor']));
        $titulo->setQuantidade($_POST['tit_quantidade']);
        $cadastra = $atitulos->atualizaDados($pdo, $titulo);   
        if(!$cadastra==false){
           $smarty->assign('mensagem','<div class="certo">Titulo atualizado com sucesso!</div>');
        }else{
           $smarty->assign('mensagem','<div class="errado">Não foi possivel atualizar.</div>');         
        }
    }    
}


if($acao=='alterar'){
    
    $id=isset($_GET['id'])?$_GET['id']:'';    
        
    $retorna_titulos   =    $atitulos->retornaDados($pdo, 'id', $id);
    if(is_object($retorna_titulos)){      
        
        $titulo            =   new stdClass();
        
        $titulo->id             =   $retorna_titulos->getId();
        $titulo->nome           =   $retorna_titulos->getNome();
        $titulo->quantidade     =   $retorna_titulos->getQuantidade();    
        $titulo->valor          =   str_replace(".",",",$retorna_titulos->getValor());    
        
        $smarty->assign('cliente',$titulo);
    }
    
}

if($acao=='listar'){
        
    $retorna_titulos = $atitulos->listarDados($pdo,'todos');
    if(is_array($retorna_titulos)){
        $array_titulos = Array();
        for($i=0;$i<count($retorna_titulos);$i++){
            
            $array_titulos[$i]["iduser"]         =   $retorna_titulos[$i]->getId();
            $array_titulos[$i]["nome"]           =   $retorna_titulos[$i]->getNome();
            $array_titulos[$i]["quantidade"]     =   $retorna_titulos[$i]->getQuantidade();            
            $array_titulos[$i]["valor"]          =   "R$ ".str_replace(".",",",$retorna_titulos[$i]->getValor());            
            $array_titulos[$i]["status"]         =   ($retorna_titulos[$i]->getStatus())=='a'?'Ativo':'Inativo';            
            
        }
        
         $smarty->assign('array_titulos',$array_titulos);
        
    }      
        
  //  $smarty->assign('array_titulos',$array_titulos);    
}

    $retorna_configuracoes = $aconfiguracoes->retornaDados($pdo, 'id', 1);
    if(is_object($retorna_configuracoes)){
        $pagina->empresa_nome =   $retorna_configuracoes->getEmpresa();
    }

    switch($acao){
        case'alterar':            
        case'cadastrar':                          
                $pagina->titulo =   $acao=='cadastrar'?"Cadastrar titulos":"Alterar titulos";
                $smarty->assign('pagina',$pagina);
                $smarty->display('titulos/formulario.tpl');
                break;
        case'listar':            
                $pagina->titulo =   "Lista de titulos";
                $smarty->assign('pagina',$pagina);
                $smarty->display('titulos/lista.tpl');
                break;

    }

