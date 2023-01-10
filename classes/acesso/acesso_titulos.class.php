<?php


class acesso_titulos extends titulos{
   
    
    public function cadastraDados( $pdo, titulos $objeto){
       try{ 
           $verifica    =   $this->verificaDados($pdo, 'nome', $objeto->getNome());
            if($verifica==false){
                        $sql    =" INSERT INTO mod_titulos(
                                            tit_nome
                                    ,       tit_valor
                                    ,       tit_quantidade
                                    ,       tit_status
							)VALUES(                
                                            :nome
                                   ,        :valor
                                   ,        :quantidade
                                   ,        :status

                                )";
                        $p_sql  =   $pdo->prepare($sql);

                        $p_sql->bindValue(":nome",$objeto->getNome(),PDO::PARAM_STR);
                        $p_sql->bindValue(":valor",$objeto->getValor(),PDO::PARAM_STR);
                        $p_sql->bindValue(":quantidade",$objeto->getQuantidade(),PDO::PARAM_STR);
                        $p_sql->bindValue(":status","a",PDO::PARAM_STR);

                        $p_sql->execute();
                            if($p_sql->rowCount()>0){
                                return $this->verificaDados($pdo, 'nome', $objeto->getNome());
                            }else{
                                return false;
                            }
            }else{
                return false;
            }         
       }catch(Exception $e){
           die("Erro: ".$e->getMessage());           
       }
    }
public function atualizaDados( $pdo, titulos $objeto){
       try{ 
            $sql    =" UPDATE mod_titulos SET
                                                    tit_nome                     =   :nome
                                    ,               tit_valor                    =   :valor
                                    ,               tit_quantidade               =   :quantidade
                                        WHERE tit_id=:id   ";
            $p_sql  =   $pdo->prepare($sql);

            $p_sql->bindValue(":nome",$objeto->getNome(),PDO::PARAM_STR);
            $p_sql->bindValue(":valor",$objeto->getValor(),PDO::PARAM_STR);
            $p_sql->bindValue(":quantidade",$objeto->getQuantidade(),PDO::PARAM_STR);
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
                $sql    =" SELECT * FROM mod_titulos 
                           WHERE ";
                
                switch($tipo){
                    
                    case    'id':
                                  $sql  .=  " tit_id = :id"; 
                                  $p_sql  =   $pdo->prepare($sql);
                                  $p_sql->bindValue(":id", $valor, PDO::PARAM_INT);
                                  break;                            
                }               
                $p_sql->execute();
                $result = $p_sql->fetch(PDO::FETCH_ASSOC);

                    $objeto =   new titulos();
                    $objeto->setId($result["tit_id"]);                
                    $objeto->setNome($result["tit_nome"]);                
                    $objeto->setValor($result["tit_valor"]);                                           
                    $objeto->setQuantidade($result["tit_quantidade"]); 
                    $objeto->setStatus($result["tit_status"]);  
                
                return $objeto;                
                
       }catch(Exception $e){
           die("Erro: ".$e->getMessage());           
       }
    }   
     
    public function listarDados($pdo, $tipo='', $valor=''){
        try{
           
           $sql  =      " SELECT tit_id FROM mod_titulos "; 
      
           switch ($tipo){
               case 'ativos':
                   $sql .=      " WHERE tit_status=:ativo "; 
                   $p_sql  =   $pdo->prepare($sql);
                   $p_sql->bindValue(":ativo", 'a', PDO::PARAM_STR);
                   break;
               case 'todos':
                   $sql     .=      " WHERE tit_status<>:excluido ORDER BY tit_dt_cadastro ASC"; 
                   $p_sql    =   $pdo->prepare($sql);
                   $p_sql->bindValue(":excluido", 'e', PDO::PARAM_STR);
                   break;
           }
                    
           $p_sql->execute(); 
            $row=0;
            $objeto = Array();
          
                while($result = $p_sql->fetch(PDO::FETCH_ASSOC)){   
                    $objeto[$row]  = $this->retornaDados($pdo, 'id', $result["tit_id"]);
                    $row++;
                }
               return $objeto;
            
        } catch (Exception $e) {
            die("Erro: ".$e->getMessage()); 
        }
    }
    public function verificaDados($pdo, $tipo='', $valor=''){
        try{
           
           $sql  =      " SELECT tit_id FROM mod_titulos "; 
           $sql .=      " WHERE "; 
      
           switch ($tipo){
               case 'nome':
                   $sql .=      " tit_nome=:nome AND tit_status=:ativo"; 
                   $p_sql  =   $pdo->prepare($sql);
                   $p_sql->bindValue(":nome", $valor, PDO::PARAM_STR);
                   $p_sql->bindValue(":ativo", 'a', PDO::PARAM_STR);
                   break;
           }
                    
           $p_sql->execute(); 
            $resultado    =   false;         
                while($result = $p_sql->fetch(PDO::FETCH_ASSOC)){   
                        $resultado    =   $result['tit_id'];
                }
               return $resultado;
            
        } catch (Exception $e) {
            die("Erro: ".$e->getMessage()); 
        }
    }
    public function Deletar($pdo, $tipo='', $valor=''){
        try{
           
           $sql  =      " UPDATE mod_titulos SET tit_status=:status"; 
           $sql .=      " WHERE tit_id=:id "; 
      
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
