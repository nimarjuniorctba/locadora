<?php


class acesso_clientes extends admin{
   
    
    public function cadastraDados( $pdo, clientes $objeto){
       try{ 
           $verifica    =   $this->verificaDados($pdo, 'email', $objeto->getEmail());
            if($verifica==false){
                        $sql    =" INSERT INTO mod_clientes(
                                            cli_nome
                                    ,       cli_email
                                    ,       cli_status
							)VALUES(                
                                            :nome
                                   ,        :email
                                   ,        :status

                                )";
                        $p_sql  =   $pdo->prepare($sql);

                        $p_sql->bindValue(":nome",$objeto->getNome(),PDO::PARAM_STR);
                        $p_sql->bindValue(":email",$objeto->getEmail(),PDO::PARAM_STR);
                        $p_sql->bindValue(":status","a",PDO::PARAM_STR);

                        $p_sql->execute();
                            if($p_sql->rowCount()>0){
                                return $this->verificaDados($pdo, 'email', $objeto->getEmail());
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
public function atualizaDados( $pdo, clientes $objeto){
       try{ 
           $verifica    =   $this->verificaDados($pdo, 'email', $objeto->getEmail());
            $sql    =" UPDATE mod_clientes SET
                                                    cli_nome                     =   :nome
                                    ,               cli_email                    =   :email
                                        WHERE cli_id=:id   ";
            $p_sql  =   $pdo->prepare($sql);

            $p_sql->bindValue(":nome",$objeto->getNome(),PDO::PARAM_STR);
            $p_sql->bindValue(":email",$objeto->getEmail(),PDO::PARAM_STR);
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
                $sql    =" SELECT * FROM mod_clientes 
                           WHERE ";
                
                switch($tipo){
                    
                    case    'id':
                                  $sql  .=  " cli_id = :cliente"; 
                                  $p_sql  =   $pdo->prepare($sql);
                                  $p_sql->bindValue(":cliente", $valor, PDO::PARAM_INT);
                                  break;                            
                }               
                $p_sql->execute();
                $result = $p_sql->fetch(PDO::FETCH_ASSOC);

                    $objeto =   new clientes();
                    $objeto->setId($result["cli_id"]);                
                    $objeto->setNome($result["cli_nome"]);                
                    $objeto->setEmail($result["cli_email"]);                                           
                    $objeto->setStatus($result["cli_status"]); 
                
                return $objeto;                
                
       }catch(Exception $e){
           die("Erro: ".$e->getMessage());           
       }
    }   
     
    public function listarDados($pdo, $tipo='', $valor=''){
        try{
           
           $sql  =      " SELECT cli_id FROM mod_clientes "; 
      
           switch ($tipo){
               case 'ativos':
                   $sql .=      " WHERE cli_status=:ativo "; 
                   $p_sql  =   $pdo->prepare($sql);
                   $p_sql->bindValue(":ativo", 'a', PDO::PARAM_STR);
                   break;
               case 'todos':
                   $sql     .=      " WHERE cli_status<>:excluido ORDER BY cli_dt_cadastro ASC"; 
                   $p_sql    =   $pdo->prepare($sql);
                   $p_sql->bindValue(":excluido", 'e', PDO::PARAM_STR);
                   break;
           }
                    
           $p_sql->execute(); 
            $row=0;
            $objeto = Array();
          
                while($result = $p_sql->fetch(PDO::FETCH_ASSOC)){   
                    $objeto[$row]  = $this->retornaDados($pdo, 'id', $result["cli_id"]);
                    $row++;
                }
               return $objeto;
            
        } catch (Exception $e) {
            die("Erro: ".$e->getMessage()); 
        }
    }
    public function verificaDados($pdo, $tipo='', $valor=''){
        try{
           
           $sql  =      " SELECT cli_id FROM mod_clientes "; 
           $sql .=      " WHERE "; 
      
           switch ($tipo){
               case 'email':
                   $sql .=      " cli_email=:email AND cli_status=:ativo"; 
                   $p_sql  =   $pdo->prepare($sql);
                   $p_sql->bindValue(":email", $valor, PDO::PARAM_STR);
                   $p_sql->bindValue(":ativo", 'a', PDO::PARAM_STR);
                   break;
           }
                    
           $p_sql->execute(); 
            $resultado    =   false;         
                while($result = $p_sql->fetch(PDO::FETCH_ASSOC)){   
                        $resultado    =   $result['cli_id'];
                }
               return $resultado;
            
        } catch (Exception $e) {
            die("Erro: ".$e->getMessage()); 
        }
    }
    public function Deletar($pdo, $tipo='', $valor=''){
        try{
           
           $sql  =      " UPDATE mod_clientes SET cli_status=:status"; 
           $sql .=      " WHERE cli_id=:id "; 
      
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
