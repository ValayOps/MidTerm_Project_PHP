<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'DATA/database-connection.php';
class customer{
private $firstname = "";
private $lastname = "";
private $customer_uuid = "";
private $username = "";
private $password = "";
    public function __construct($customer_uuid = "", $firstname = "",$password="") 
    {
        if($customer_uuid != "")
        {
            #fill all the object properties
            $this->customer_uuid= $customer_uuid;
            $this->firstname = $firstname;
            $this->password = $password;
        }
    }
    function getFirstname()
    {
        return $this->firstname ;
    }
    
    function setFirstname($newFirstname)
    {
        if(mb_strlen($newFirstname) == 0)
        {
            return 'The firstname cannot be empty';
        }
        else
        {
            if(mb_strlen($newFirstname) >= FIRSTNAME_MAX_LENGTH)
            {
                return 'The firstname cannot conatin more than '.
                        FIRSTNAME_MAX_LENGTH.' characters ';
                //self is constant
            }
            else
            {
                $this->firstname = $newFirstname;
                return " ";
            }
        }
    }
    public function load($customer_uuid)
    {
       try{
            global $connection;

            $sqlQuery = "CALL customer_load(:customer_uuid);";
    
              
            $PDOStatement = $connection->prepare($sqlQuery);
           
            $PDOStatement->bindParam(':customer_uuid',$customer_uuid);

            $PDOStatement->execute();

            if($row = $PDOStatement->fetch())
            {
                $this->customer_uuid = $row['customer_uuid'];
                $this->firstname = $row['firstname'];
                $this->lastname = $row['lastname'];

            return true;
            }
       }
    catch(Exception $E){
        echo $E->getMessage();
        
    }
    }
}
?>