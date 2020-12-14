<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
#******************Calling different files and declaring constant in the below class********************
require_once 'DATA/database-connection.php';
define("FIRSTNAME_MAX_LENGTH", 20);
define("LASTNAME_MAX_LENGTH", 20);
define("ADDRESS_MAX_LENGTH", 25);
define("CITY_MAX_LENGTH", 8);
define("PROVINCE_MAX_LENGTH", 15);
define("POSTALCODE_MAX_LENGTH", 7);
define("USERNAME_MAX_LENGTH", 12);
define("PASSWORD_MAX_LENGTH", 255);

/*
 *The class customer manages all the data related to one customer at a time and
 * that is why we named the class in a singular form
 */
class customer
{
    private $customer_uuid = "";
    private $firstname = "";
    private $lastname = "";
    private $address = "";
    private $city = "";
    private $province = "";
    private $postalcode = "";
    private $username = "";
    private $password = "";

    #the constructor loads all the data in to the variables declared
    public function __construct(
        $customer_uuid = "",
        $firstname = "",
        $lastname = "",
        $address = "",
        $city = "",
        $province = "",
        $postalcode = "",
        $username = "",
        $password = ""
    ) {
        if ($customer_uuid != "") {
            #fill all the object properties
            $this->username($username);
            $this->password($password);
            $this->firstname($firstname);
            $this->lastname($lastname);
            $this->address($address);
            $this->city($city);
            $this->province($province);
            $this->postalcode($postalcode);
        }
    }
    #getter for firstname
    function getFirstname()
    {
        return $this->firstname;
    }
    #getter for Lastname
    function getLastname()
    {
        return $this->lastname;
    }
    #getter for Username
    function getUsername()
    {
        return $this->username;
    }
    #getter for Address
    function getAddress()
    {
        return $this->address;
    }
    #getter for City
    function getCity()
    {
        return $this->city;
    }
    #getter for Province
    function getProvince()
    {
        return $this->province;
    }
    #getter for PostalCode
    function getPostalcode()
    {
        return $this->postalcode;
    }
    #getter for Password
    function getPassword()
    {
        return $this->password;
    }

    #setter method for firstname and validation
    function setFirstname($newFirstname)
    {
        if (mb_strlen($newFirstname) == 0) {
            return 'The firstname cannot be empty';
        } else {
            if (mb_strlen($newFirstname) >= FIRSTNAME_MAX_LENGTH) {
                return 'The firstname cannot conatin more than ' .
                    FIRSTNAME_MAX_LENGTH .
                    ' characters ';
                //self is constant
            } else {
                $this->firstname = $newFirstname;
                return " ";
            }
        }
    }
    #setter method for lastname and validation
    function setLastname($newLastname)
    {
        if (mb_strlen($newLastname) == 0) {
            return 'The lasttname cannot be empty';
        } else {
            if (mb_strlen($newLastname) >= LASTNAME_MAX_LENGTH) {
                return 'The lasttname cannot conatin more than ' .
                    LASTNAME_MAX_LENGTH .
                    ' characters ';
                //self is constant
            } else {
                $this->lastname = $newLastname;
                return " ";
            }
        }
    }
    #setter method for username and validation
    function setUsername($newUsername)
    {
        if (mb_strlen($newUsername) == 0) {
            return 'The Username cannot be empty';
        } else {
            if (mb_strlen($newUsername) >= USERNAME_MAX_LENGTH) {
                return 'The usename cannot conatin more than ' .
                    USERNAME_MAX_LENGTH .
                    ' characters ';
                //self is constant
            } else {
                $this->username = $newUsername;
                return " ";
            }
        }
    }
    #setter method for address and validation
    function setAddress($newAddress)
    {
        if (mb_strlen($newAddress) == 0) {
            return 'The Address cannot be empty';
        } else {
            if (mb_strlen($newAddress) >= ADDRESS_MAX_LENGTH) {
                return 'The Address cannot conatin more than ' .
                    ADDRESS_MAX_LENGTH .
                    ' characters ';
                //self is constant
            } else {
                $this->address = $newAddress;
                return " ";
            }
        }
    }
    #setter method for city and validation
    function setCity($newCity)
    {
        if (mb_strlen($newCity) == 0) {
            return 'The city cannot be empty';
        } else {
            if (mb_strlen($newCity) >= CITY_MAX_LENGTH) {
                return 'The city cannot conatin more than ' .
                    CITY_MAX_LENGTH .
                    ' characters ';
                //self is constant
            } else {
                $this->city = $newCity;
                return " ";
            }
        }
    }
    #setter method for Province and validation
    function setProvince($newProvince)
    {
        if (mb_strlen($newProvince) == 0) {
            return 'The province cannot be empty';
        } else {
            if (mb_strlen($newProvince) >= PROVINCE_MAX_LENGTH) {
                return 'The province cannot conatin more than ' .
                    PROVINCE_MAX_LENGTH .
                    ' characters ';
                //self is constant
            } else {
                $this->province = $newProvince;
                return " ";
            }
        }
    }
    #setter method for postalcode and validation
    function setPostalcode($newPostalcode)
    {
        if (mb_strlen($newPostalcode) == 0) {
            return 'The postal code cannot be empty';
        } else {
            if (mb_strlen($newPostalcode) >= POSTALCODE_MAX_LENGTH) {
                return 'The postal code cannot conatin more than ' .
                    POSTALCODE_MAX_LENGTH .
                    ' characters ';
                //self is constant
            } else {
                $this->postalcode = $newPostalcode;
                return " ";
            }
        }
    }
    #setter method for password and validation
    function setPassword($newPassword)
    {
        if (mb_strlen($newPassword) == 0) {
            return 'The Password cannot be empty';
        } else {
            if (mb_strlen($newPassword) >= LASTNAME_MAX_LENGTH) {
                return 'The Password cannot conatin more than ' .
                    PASSWORD_MAX_LENGTH .
                    ' characters ';
                //self is constant
            } else {
                $this->password = password_hash($newPassword, PASSWORD_DEFAULT);
                return " ";
            }
        }
    }
        # save method calls a store procedure from database and insert a new customer through registration
        #If not it will update the record
    public function save()
    {
        try {
            global $connection;
            if ($this->customer_uuid == "") {
                $sqlQuery =
                    "CALL customer_insert(:p_firstname, :p_lastname, :p_address, :p_city, :p_province, :p_postalcode, :p_username, :p_password)";

                $PDOStatement = $connection->prepare($sqlQuery);

                $PDOStatement->bindParam(':p_firstname', $this->firstname);
                $PDOStatement->bindParam(':p_lastname', $this->lastname);
                $PDOStatement->bindParam(':p_address', $this->address);
                $PDOStatement->bindParam(':p_city', $this->city);
                $PDOStatement->bindParam(':p_postalcode', $this->postalcode);
                $PDOStatement->bindParam(':p_username', $this->username);
                $PDOStatement->bindParam(':p_password', $this->password);
                $PDOStatement->bindParam(':p_province', $this->province);

                $PDOStatement->execute();
                return 'Login Successful';
            }
        } catch (Exception $E) {
            echo $E->getMessage();
            return 'Login Unsuccessful';
        }
    }
    #Deletes a customer from the database
    public function delete()
    {
        try {
            global $connection;

            $sqlQuery = "CALL customer_delete(:customer_uuid)";

            $PDOStatement = $connection->prepare($sqlQuery);

            $PDOStatement->bindParam(':customer_uuid', $this->customer_uuid);

            $affectRows = $PDOStatement->execute();

            return $affectRows;
        } catch (Exception $E) {
            echo $E->getMessage();
        }
    }
    
    #load methods loads the data from the database to the variables
    public function load($customer_uuid)
    {
        try {
            global $connection;

            $sqlQuery = "CALL customer_load(:customer_uuid);";

            $PDOStatement = $connection->prepare($sqlQuery);

            $PDOStatement->bindParam(':customer_uuid', $customer_uuid);

            $PDOStatement->execute();

            if ($row = $PDOStatement->fetch()) {
                $this->customer_uuid = $row['customer_uuid'];
                $this->firstname = $row['firstname'];
                $this->lastname = $row['lastname'];
                $this->address = $row['address'];
                $this->city = $row['city'];
                $this->province = $row['province'];
                $this->postalcode = $row['postalcode'];

                return true;
            }
        } catch (Exception $E) {
            echo $E->getMessage();
        }
    }
    
    #update method will update the data in the database
    public function update($customer_uuid)
    {
        try {
            global $connection;
            if ($this->customer_uuid == "") {
                $sqlQuery =
                    "CALL customer_update(:customer_uuid,:p_firstname, :p_lastname, :p_address, :p_city, :p_province, :p_postalcode, :p_username, :p_password)";

                $PDOStatement = $connection->prepare($sqlQuery);

                $PDOStatement->bindParam(':p_firstname', $this->firstname);
                $PDOStatement->bindParam(':p_lastname', $this->lastname);
                $PDOStatement->bindParam(':p_address', $this->address);
                $PDOStatement->bindParam(':p_city', $this->city);
                $PDOStatement->bindParam(':p_postalcode', $this->postalcode);
                $PDOStatement->bindParam(':p_username', $this->username);
                $PDOStatement->bindParam(':p_password', $this->password);
                $PDOStatement->bindParam(':p_province', $this->province);
                $PDOStatement->bindParam(':customer_uuid', $customer_uuid);

                $PDOStatement->execute();
                return 'Update Successful';
            }
        } catch (Exception $E) {
            echo $E->getMessage();
            return 'Update Unsuccessful';
        }
    }
}
?>
