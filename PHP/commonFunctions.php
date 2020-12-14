<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
   
  
class loginClass
{
/*------------------------------------------------------------------------------
 * The method takes an input from the user as his username and password 
 * and sets the sessionid as the current user uuid from he customer table
 *  The method will return error message if any back to the post method.
 * ----------------------------------------------------------------------------
 */
    public static function get_Password($username, $password)
    {
        $primaryKey="";
        global $connection;
        try {
            $sqlQuery = "CALL login(:username);";
            
            #execute query
            $PDOStatement = $connection->prepare($sqlQuery);

            $PDOStatement->bindParam(':username', $username);

            $PDOStatement->execute();
            # var_dump($PDOStatement->fetch());
            $row = $PDOStatement->fetch();
            if ($row != null) {
                $recPassword = $row["c_password"];
                $primaryKey = $row["customer_uuid"];
                
            }
            else{
                return "Invalid ID";
            }
            if((password_verify($password, $recPassword))){
                 $_SESSION['loggedin']=true;
                 $_SESSION['loggedUser']=$primaryKey;
                  header('location: Home.php');
                  return "";
            }
                else {
                return "Invalid Login OR Password";
            }
               
          
        } catch (PDOException $E) {
            echo $E->getMessage();
        }
    }
/*------------------------------------------------------------------------------
 * The method takes an input from the user as his username and password 
 * and sets the sessionid as the current user uuid from he customer table
 *  The method will return error message if any back to the post method.
 * ----------------------------------------------------------------------------
 */
    public static function getFooterName()
    {
        $customer = new customer();
        $customer->load($_SESSION['loggedUser']);
        $firstname = $customer->getFirstname();
        
        if(isset($_POST["LOGOUT"])){
            unset($_SESSION['loggedUser']);
            header('location: login.php');
        }
        echo '<div>';
        echo '<h3>Welcome ' . $firstname . '</h3>';
        echo '<form method="POST">';
        echo '<input type="submit" value="LOGOUT" name="LOGOUT" class="button">';
        echo '</form>';
        echo '<div><br>';
    }
}


     