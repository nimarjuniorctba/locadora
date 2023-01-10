<?php


class acesso_configuracoes extends configuracoes{
   
    
    public function cadastraDados( $pdo, configuracoes $objeto){
       try{ 
                        $sql    =" INSERT INTO mod_configuracoes(
                                            conf_multa
                                    ,       conf_prazo
                                    ,       conf_empresa
                                    ,       conf_empresa_id
							)VALUES(                
                                            :multa
                                   ,        :prazo
                                   ,        :empresa
                                   ,        :empresa_id

                                )";
                        $p_sql  =   $pdo->prepare($sql);

                        $p_sql->bindValue(":multa",$objeto->getMulta(),PDO::PARAM_STR);
                        $p_sql->bindValue(":prazo",$objeto->getPrazo(),PDO::PARAM_STR);
                        $p_sql->bindValue(":empresa",$objeto->getEmpresa(),PDO::PARAM_STR);
                        $p_sql->bindValue(":empresa_id",$objeto->getEmpresa_id(),PDO::PARAM_STR);

                        $p_sql->execute();
                            if($p_sql->rowCount()>0){
                                return $this->verificaDados($pdo, 'id', 1);
                            }else{
                                return false;
                            }        
       }catch(Exception $e){
           die("Erro: ".$e->getMessage());           
       }
    }
public function atualizaDados( $pdo, configuracoes $objeto){
    $verifica    =   $this->verificaDados($pdo, 'id', 1);
     if($verifica!=false){    
        try{ 
             $sql    =" UPDATE mod_configuracoes SET
                                                     conf_multa                 =   :multa
                                     ,               conf_prazo                 =   :prazo
                                     ,               conf_empresa               =   :empresa
                                         WHERE conf_empresa_id=:id   ";
             $p_sql  =   $pdo->prepare($sql);

             $p_sql->bindValue(":multa",$objeto->getMulta(),PDO::PARAM_STR);
             $p_sql->bindValue(":prazo",$objeto->getPrazo(),PDO::PARAM_STR);
             $p_sql->bindValue(":empresa",$objeto->getEmpresa(),PDO::PARAM_STR);
             $p_sql->bindValue(":id",1,PDO::PARAM_INT);

             $p_sql->execute();
                 if($p_sql->rowCount()>0){
                     return true;
                 }else{
                     return false;
                 }        
        }catch(Exception $e){
            die("Erro: ".$e->getMessage());           
        }      
      }else{
          return $this->cadastraDados($pdo,$objeto);
      }
    } 
    public function retornaDados( $pdo, $tipo='', $valor=''){
       try{ 
                $sql    =" SELECT * FROM mod_configuracoes 
                           WHERE ";
                
                switch($tipo){
                    
                    case    'id':
                                  $sql  .=  " conf_empresa_id = :id"; 
                                  $p_sql  =   $pdo->prepare($sql);
                                  $p_sql->bindValue(":id", $valor, PDO::PARAM_INT);
                                  break;                            
                }               
                $p_sql->execute();
                $result = $p_sql->fetch(PDO::FETCH_ASSOC);

                    $objeto =   new configuracoes();
                    $objeto->setId($result["conf_id"]);                
                    $objeto->setMulta($result["conf_multa"]);                
                    $objeto->setPrazo($result["conf_prazo"]);                                           
                    $objeto->setEmpresa($result["conf_empresa"]); 
                    $objeto->setEmpresa_id($result["conf_empresa_id"]);  
                
                return $objeto;                
                
       }catch(Exception $e){
           die("Erro: ".$e->getMessage());           
       }
    }   
     
    
    public function verificaDados($pdo, $tipo='', $valor=''){
        try{
           
           $sql  =      " SELECT conf_id FROM mod_configuracoes "; 
           $sql .=      " WHERE "; 
      
           switch ($tipo){
               case 'id':
                   $sql .=      " conf_empresa_id=:id"; 
                   $p_sql  =   $pdo->prepare($sql);
                   $p_sql->bindValue(":id", $valor, PDO::PARAM_STR);
                   break;
           }
                    
           $p_sql->execute(); 
            $resultado    =   false;         
                while($result = $p_sql->fetch(PDO::FETCH_ASSOC)){   
                        $resultado    =   $result['conf_id'];
                }
               return $resultado;
            
        } catch (Exception $e) {
            die("Erro: ".$e->getMessage()); 
        }
    }
       
}
