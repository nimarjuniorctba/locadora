<?php

require_once 'classes/autoload.class.php';

$pdo = MySQL_PDO::conexao();

$aconfiguracoes          =   new acesso_configuracoes();
$alocacao                =   new acesso_locacao();
$aitens_locacao          =   new acesso_itens_locacao();
$atitulos                =   new acesso_titulos();
$aclientes          =   new acesso_clientes();
$pagina                  =   new stdClass();

$opcao=isset($_POST['opcao'])?$_POST['opcao']:'';

$retorna_configuracoes = $aconfiguracoes->retornaDados($pdo, 'id', 1);
if(is_object($retorna_configuracoes)){
    $pagina->empresa_nome       =   $retorna_configuracoes->getEmpresa();
    $pagina->dataHoje           =   date('d/m/Y');
    $pagina->valorMulta         =   "R$ ".str_replace(".", ",", $retorna_configuracoes->getMulta());    
}

 switch($opcao){
        
        case 'locacao_cadastrar' :
         $erro_filme          =0 ;
         $locacao  =   new Locacao();
                
          $locacao->setCliente($_POST['cliente']); 
          $locacao->setDt_retirada(implode('-',array_reverse(explode('/', $pagina->dataHoje)))); 
          $locacao->setDt_prevista(date('Y-m-d', strtotime('+'.$retorna_configuracoes->getPrazo().' days'))); 


          $filme = Array();
          foreach($_POST['filmes'] as $tp_filme){              
              array_push($filme,$tp_filme);             
          }
          
          for($r=0;count($filme)>$r;$r++){
          $r=0;
              $retorna_titulo    =   $atitulos->retornaDados($pdo,'id',$filme[$r]);
              if(is_object($retorna_titulo)){
                
                  if($retorna_titulo->getQuantidade()<1){
                      $dados['erro']    =   'O filme '.$retorna_titulo->getNome().'esta indisponivel';
                      $dados['status']    =   false;
                      echo json_encode($dados);
                  }
                  
              }else{
                      $dados['erro']    =   'Filme indisponível';
                      $dados['status']    =   false;
                      echo json_encode($dados);
              }
        }
              //Todos os titulos estão disponiveis
              $cadastra= $alocacao->cadastraDados($pdo,$locacao);
              if($cadastra!=false){
                                    
                  $tp_item_locacao = new itens_locacao();
                  
                    foreach($filme as $item_locacao){         
                                                
                        $tp_item_locacao->setLocacao($cadastra);
                        $tp_item_locacao->setTitulo($item_locacao);
                        $aitens_locacao->cadastraDados($pdo,$tp_item_locacao);
                    }
                    
                    
                    
              }

            $dados['status'] = true;
                 break;
            case 'locacao_finalizar' :
                
                $locacao    =   $_POST['locacao'];
                 $retorna_locacao = $alocacao->retornaDados($pdo, 'id', $locacao);
                if(is_object($retorna_locacao)){
                   
                    $retorna_locacao->setFormaPgto($_POST['formapgto']);
                    $retorna_locacao->setValorTotal($retorna_locacao->getValorSubTotal()+$retorna_locacao->getValorMulta());
                    $retorna_locacao->setDt_entrega(date("Y-m-d"));
                    $retorna_locacao->setStatus("f");
                    
                    $finaliza = $alocacao->FinalizaLocacao($pdo, $retorna_locacao);
                    
                   // var_dump($finaliza);
                    $dados['status'] = true;
                }   
                
                break;
            case 'locacao_carregar' :
                
                
                $locacao    =   $_POST['locacao'];
                $retorna_locacao = $alocacao->retornaDados($pdo, 'id', $locacao);
                if(is_object($retorna_locacao)){
                    
                    $retorna_cliente   =    $aclientes->retornaDados($pdo, 'id', $retorna_locacao->getCliente());
                    if(is_object($retorna_cliente)){                     
                            $dados['status']                    =   true;
                            $dados['nome']                      =  $retorna_cliente->getNome(); 
                            $dados['id_locacao']                =  $locacao; 
                            $dados['email']                     =  $retorna_cliente->getEmail(); 
                            $dados['loc_dt_retirada']            =  implode('/',array_reverse(explode('-', $retorna_locacao->getDt_retirada()))); 
                            $dados['loc_dt_entrega']            =  implode('/',array_reverse(explode('-', $retorna_locacao->getDt_entrega()))); 
                            $dados['loc_dt_entrega_prevista']   =  $retorna_locacao->getDt_prevista(); 
                            $dados['loc_valor_total']           =  str_replace(".", ",", $retorna_locacao->getValorTotal()); 
                            $dados['loc_valor_subtotal']        =  str_replace(".", ",", $retorna_locacao->getValorSubTotal()); 
                            $dados['loc_forma_pgto']            =  $retorna_locacao->getFormaPgto(); 
                            $dados['loc_retirada']              =  implode('/',array_reverse(explode('-', $retorna_locacao->getDt_retirada()))); 
                            
                            if(strtotime($retorna_locacao->getDt_prevista()) < strtotime($retorna_locacao->getDt_entrega())){
                                $dias_atraso =  strtotime($retorna_locacao->getDt_entrega()) - strtotime($retorna_locacao->getDt_prevista());
                                $dias = floor($dias_atraso / (60 * 60 * 24));
                                $dados['diasemana']                 =  $dias." dias"; 
                                $dados['loc_valor_multa']           =  str_replace(".", ",", $dias*$retorna_configuracoes->getMulta());                                 
                            }else{
                                 $dados['diasemana']                 ='0 dias';
                                 $dados['loc_valor_multa']           ='0,00';
                            }   
                            
                            $lista_itens_locacao    =   $aitens_locacao->listarDados($pdo, 'pedido', $locacao);
                            if(is_array($lista_itens_locacao)){
                                 for($tr=0;$tr<count($lista_itens_locacao);$tr++){
                                    
                                    $retorna_titulos   =    $atitulos->retornaDados($pdo, 'id', $lista_itens_locacao[$tr]->getTitulo());
                                    if(is_object($retorna_titulos)){      
                                        $dados['loc_filmes']["nome"][$tr]           =   $retorna_titulos->getNome();   
                                        $dados['loc_filmes']["valor"][$tr]           =   str_replace(".",",",$retorna_titulos->getValor());    
                                    }                                      
                                 }                                    
                            }
                    }
                }

                break;
                
                
}


echo json_encode($dados);