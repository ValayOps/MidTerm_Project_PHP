<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'DATA/database-connection.php';
class loginClass{
public static function get_Password($username,$password){
     
        global $connection;
    try{
      $sqlQuery="CALL login(:username);";

        #execute query
        $PDOStatement=$connection->prepare($sqlQuery);  
        
        $PDOStatement->bindParam(':username',$username);
        $passwordHash= password_hash($password,PASSWORD_DEFAULT);
       
        
        
        $PDOStatement->execute();
        echo $PDOStatement->rowCount();
        # var_dump($PDOStatement->fetch());
        $row=$PDOStatement->fetch();
    if($row!=null){
            $recPassword=$row["c_password"];
            $primarykey=$row["customer_uuid"];
        }
        else{
            return null;
        }
    if(password_verify($recPassword, $passwordHash)){
        return $primarykey;
    }
        
    }
    catch(PDOException $E){
        echo $E->getMessage();
        
    }
 }
public static function getFooterName($primaryKey){
             $customer = new customer();
            $customer->load($primaryKey);
           $firstname=$customer->getFirstname();
    echo'<div>';
    echo '<h3>Welcome '.$firstname.'</h3>';
    echo '<input type="button" value="LOGOUT">';
    echo'<div><br>';
  }
}
 ?>
     