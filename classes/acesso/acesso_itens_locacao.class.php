<?php


class acesso_itens_locacao extends itens_locacao{
   
    
    public function cadastraDados( $pdo, itens_locacao $objeto){
       try{ 
            $sql    =" INSERT INTO mod_itens_locacao(
                                tit_id_fk
                        ,       loc_id_fk
                                            )VALUES(                
                                :titulo
                       ,        :locacao   )";

            $p_sql  =   $pdo->prepare($sql);
            $p_sql->bindValue(":titulo",$objeto->getTitulo(),PDO::PARAM_STR);
            $p_sql->bindValue(":locacao",$objeto->getLocacao(),PDO::PARAM_STR);
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
  
 public function retornaDados( $pdo, $tipo='', $valor=''){
       try{ 
                $sql    =" SELECT * FROM mod_itens_locacao 
                           WHERE ";
                
                switch($tipo){
                    
                    case    'id':
                                  $sql  .=  " itl_id = :id"; 
                                  $p_sql  =   $pdo->prepare($sql);
                                  $p_sql->bindValue(":id", $valor, PDO::PARAM_INT);
                                  break;                            
                }               
                $p_sql->execute();
                $result = $p_sql->fetch(PDO::FETCH_ASSOC);

                    $objeto =   new itens_locacao();
                    $objeto->setId($result["itl_id"]);                
                    $objeto->setTitulo($result["tit_id_fk"]);                
                    $objeto->setLocacao($result["loc_id_fk"]);                                                           
                return $objeto;                
                
       }catch(Exception $e){
           die("Erro: ".$e->getMessage());           
       }
    } 
     
    public function listarDados($pdo, $tipo='', $valor=''){
        try{
           
           $sql  =      " SELECT itl_id FROM mod_itens_locacao "; 
      
           switch ($tipo){
               case 'pedido':
                   $sql .=      " WHERE itl_id_fk=:pedido "; 
                   $p_sql  =   $pdo->prepare($sql);
                   $p_sql->bindValue(":pedido", $valor, PDO::PARAM_STR);
                   break;
           }
                    
           $p_sql->execute(); 
            $row=0;
            $objeto = Array();
          
                while($result = $p_sql->fetch(PDO::FETCH_ASSOC)){   
                    $objeto[$row]  = $this->retornaDados($pdo, 'id', $result["itl_id"]);
                    $row++;
                }
               return $objeto;
            
        } catch (Exception $e) {
            die("Erro: ".$e->getMessage()); 
        }
    }

      
}
