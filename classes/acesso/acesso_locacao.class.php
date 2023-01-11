<?php


class acesso_locacao extends locacao{
   
    
    public function cadastraDados( $pdo, locacao $objeto){
       try{ 
            $sql    =" INSERT INTO mod_locacao(
                                loc_dt_retirada
                        ,       loc_status
                        ,       loc_dt_entrega_prevista
                        ,       id_cli_fk
                                            )VALUES(                
                                :retirada
                       ,        :status    
                       ,        :prevista    
                       ,        :cliente    )";

            $p_sql  =   $pdo->prepare($sql);
            $p_sql->bindValue(":retirada",$objeto->getDt_retirada(),PDO::PARAM_STR);
            $p_sql->bindValue(":prevista",$objeto->getDt_prevista(),PDO::PARAM_STR);
            $p_sql->bindValue(":status",'a',PDO::PARAM_STR);
            $p_sql->bindValue(":cliente",$objeto->getCliente(),PDO::PARAM_STR);
            $p_sql->execute();
                if($p_sql->rowCount()>0){
                    return $pdo->lastInsertId();
                }else{
                    return false;
                }        
       }catch(Exception $e){
           die("Erro: ".$e->getMessage());           
       }
    }
public function atualizaDados( $pdo, locacao $objeto){
       try{ 
            $sql    =" UPDATE mod_locacao SET

                                                    loc_dt_entrega_prevista             =   :prevista
                                    ,               loc_valor_total                     =   :total
                                    ,               loc_valor_subtotal                  =   :subtotal
                                        WHERE loc_id=:id   ";
            $p_sql  =   $pdo->prepare($sql);

            $p_sql->bindValue(":prevista",$objeto->getDt_prevista(),PDO::PARAM_STR);
            $p_sql->bindValue(":total",$objeto->getValorTotal(),PDO::PARAM_STR);
            $p_sql->bindValue(":subtotal",$objeto->getValorSubTotal(),PDO::PARAM_STR);
            $p_sql->bindValue(":id",$objeto->getId(),PDO::PARAM_INT);

            $p_sql->execute();
                if($p_sql->rowCount()>0){
                    return true;
                }else{
                    return false;
                }        
       }catch(Exception $e){
           die("Erro: ".$e->getMessage());           
       }
    } 
public function FinalizaLocacao( $pdo, locacao $objeto){
       try{ 
            $sql    =" UPDATE mod_locacao SET

                                                    loc_dt_entrega         =   :entrega
                                    ,               loc_valor_multa        =   :multa
                                    ,               loc_valor_total        =   :total
                                    ,               loc_forma_pgto         =   :pgto
                                                                                        WHERE loc_id=:id   ";
            $p_sql  =   $pdo->prepare($sql);

            $p_sql->bindValue(":entrega",$objeto->getDt_entrega(),PDO::PARAM_STR);
            $p_sql->bindValue(":status",'f',PDO::PARAM_STR);
            $p_sql->bindValue(":total",$objeto->getValorTotal(),PDO::PARAM_STR);
            $p_sql->bindValue(":multa",$objeto->getValorMulta(),PDO::PARAM_STR);
            $p_sql->bindValue(":subtotal",$objeto->getValorSubTotal(),PDO::PARAM_STR);
            $p_sql->bindValue(":id",$objeto->getId(),PDO::PARAM_INT);

            $p_sql->execute();
                if($p_sql->rowCount()>0){
                    return true;
                }else{
                    return false;
                }        
       }catch(Exception $e){
           die("Erro: ".$e->getMessage());           
       }
    }     
    public function retornaDados( $pdo, $tipo='', $valor=''){
       try{ 
                $sql    =" SELECT * FROM mod_locacao 
                           WHERE ";
                
                switch($tipo){
                    
                    case    'id':
                                  $sql  .=  " loc_id = :id"; 
                                  $p_sql  =   $pdo->prepare($sql);
                                  $p_sql->bindValue(":id", $valor, PDO::PARAM_INT);
                                  break;                            
                }               
                $p_sql->execute();
                $result = $p_sql->fetch(PDO::FETCH_ASSOC);

                    $objeto =   new locacao();
                    $objeto->setId($result["loc_id"]);                
                    $objeto->setDt_retirada($result["loc_dt_retirada"]);                
                    $objeto->setDt_entrega($result["loc_dt_entrega"]);                                           
                    $objeto->setDt_prevista($result["loc_dt_entrega_prevista"]); 
                    $objeto->setStatus($result["loc_status"]);  
                    $objeto->setValorTotal($result["loc_valor_total"]);  
                    $objeto->setValorMulta($result["loc_valor_multa"]);  
                    $objeto->setValorSubTotal($result["loc_valor_subtotal"]);  
                    $objeto->setFormaPgto($result["loc_forma_pgto"]);  
                    $objeto->setCliente($result["id_cli_fk"]);  
                
                return $objeto;                
                
       }catch(Exception $e){
           die("Erro: ".$e->getMessage());           
       }
    }   
     
    public function listarDados($pdo, $tipo='', $valor=''){
        try{
           
           $sql  =      " SELECT loc_id FROM mod_locacao "; 
      
           switch ($tipo){
               case 'ativas':
                   $sql .=      " WHERE loc_status=:ativo "; 
                   $p_sql  =   $pdo->prepare($sql);
                   $p_sql->bindValue(":ativo", 'a', PDO::PARAM_STR);
                   break;
               case 'historico':
                   $sql     .=      " WHERE loc_status=:finalizado ORDER BY loc_dt_retirada ASC"; 
                   $p_sql    =   $pdo->prepare($sql);
                   $p_sql->bindValue(":finalizado", 'f', PDO::PARAM_STR);
                   break;
           }
                    
           $p_sql->execute(); 
            $row=0;
            $objeto = Array();
          
                while($result = $p_sql->fetch(PDO::FETCH_ASSOC)){   
                    $objeto[$row]  = $this->retornaDados($pdo, 'id', $result["loc_id"]);
                    $row++;
                }
               return $objeto;
            
        } catch (Exception $e) {
            die("Erro: ".$e->getMessage()); 
        }
    }

    public function Deletar($pdo, $tipo='', $valor=''){
        try{
           
           $sql  =      " UPDATE mod_locacao SET loc_status=:status"; 
           $sql .=      " WHERE loc_id=:id "; 
      
           switch ($tipo){
               case 'id':
                   $p_sql  =   $pdo->prepare($sql);
                   $p_sql->bindValue(":status", 'e', PDO::PARAM_STR);
                   $p_sql->bindValue(":id", $valor, PDO::PARAM_STR);
                   break;
           }
                    
           $p_sql->execute(); 
           if($p_sql->rowCount()>0){
              return true; 
           }else{
            return false;
           } 
        } catch (Exception $e) {
            die("Erro: ".$e->getMessage()); 
        }
    }    
}
