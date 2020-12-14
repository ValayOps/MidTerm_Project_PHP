<?php

define("PRODUCTCODE_MAX_LENGTH", 12);
define("DESCRIPTION_MAX_LENGTH", 100);

class product
{
   #***Private variables which will be filled by setters or constructors
    private $product_uuid = "";
    private $productCode = "";
    private $description = "";
    private $price = 0.0;
    private $cost = 0.0;
    private $customer_uuid = "";
#constructors fill the data in the variables************************************
    public function __construct(
        $product_uuid = "",
        $productcode = "",
        $description = "",
        $price = 0.0,
        $cost = 0.0,
        $customer_uuid = ""
    ) {
        if ($product_uuid != "") {
            $this->product_uuid = $product_uuid;
            $this->productCode = $productcode;
            $this->description = $description;
            $this->price = $price;
            $this->cost = $cost;
            $this->customer_uuid = $customer_uuid;
        }
    }

    #getter for product unique id
    function getProduct_uuid()
    {
        return $this->product_uuid;
    }
    #getter for product code
    function getProductCode()
    {
        return $this->productCode;
    }

    #getter for product Description
    function getDescription()
    {
        return $this->description;
    }

    #getter for product Description
    function getPrice()
    {
        return $this->price;
    }

    #getter for cost
    function getCost()
    {
        return $this->cost;
    }
    
    #getter for customer uuid
    function getCustomer_uuid()
    {
        return $this->$customer_uuid;
    }

    #setter method for product code and Validation regarding product code
    function setProductCode($newProductCode)
    {
        if (mb_strlen($newProductCode) == 0) {
            return "Product Code could not be NULL or Empty";
        } elseif (mb_strlen($newProductCode) > PRODUCTCODE_MAX_LENGTH) {
            return 'The lasttname cannot conatin more than ' .
                PRODUCTCODE_MAX_LENGTH .
                ' characters ';
        } else {
            if (strpos(strtolower($newProductCode), "p") !== 0) {
                return "Product code must start with P ";
            } else {
                $this->productCode($newProductCode);
                return "";
            }
        }
    }

    #setter method for product description and Validation
    function setDescription($newDescription)
    {
        if (mb_strlen($newDescription) > DESCRIPTION_MAX_LENGTH) {
            return 'The firstname cannot conatin more than ' .
                DESCRIPTION_MAX_LENGTH .
                ' characters ';
        } else {
            $this->description = $newDescription;
            return "";
        }
    }


    #setter method for product cost and Validation regarding product code
    function setCost($newCost)
    {
        if (empty($newCost)) {
            return "The Price cannot be empty";
        } elseif (is_double($newCost) == false) {
            return "Price cannot be numeric value";
        } else {
            if (
                $newCost != max(min($newCost, 10000), 1) &&
                is_double($newCost)
            ) {
                return "The Price $newCost should be less than 10,000$ range";
            } else {
                $this->cost($newCost);
                return "";
            }
        }
    }

    #setter method for product id 
    function setProduct_uuid($product_uuid)
    {
        $this->product_uuid = $product_uuid;
    }
    
    #The load function loads the data  into the variables using stored procedure product_load
    public function load($product_uuid)
    {
        try {
            global $connection;

            $sqlQuery = "CALL product_load(:product_uuid)";

            $PDOStatement = $connection->prepare($sqlQuery);

            $PDOStatement->bindParam(':product_uuid', $product_uuid);

            $PDOStatement->execute();

            if ($row = $PDOStatement->fetch(PDO::FETCH_ASSOC)) {
                $this->person_uuid = $row['product_uuid'];
                $this->productCode = $row['product_code'];
                $this->description = $row['description'];
                $this->price = $row['price'];

                return true;
            }
        } catch (Exception $E) {
            echo $E->getMessage();
        }
    }

    #The function inserts and updates product data in product tables using the stored procedure
    public function save()
    {
        try {
            global $connection;

            if ($this->person_uuid == "") {
                $sqlQuery =
                    "CALL product_insert(:product_code, :description, :price, :cost,:customer_uuid)";

                $PDOStatement = $connection->prepare($sqlQuery);

                $PDOStatement->bindParam(':product_code', $this->productCode);
                $PDOStatement->bindParam(':description', $this->description);
                $PDOStatement->bindParam(':price', $this->price);
                $PDOStatement->bindParam(':cost', $this->cost);
                $PDOStatement->bindParam(
                    ':customer_uuid',
                    $this->customer_uuid
                );

                $PDOStatement->execute();

                return true;
            } else {
                $sqlQuery =
                    "CALL product_update(:product_uuid,product_code, :description, :price)";

                $PDOStatement = $connection->prepare($sqlQuery);

                $PDOStatement->bindParam(':product_code', $this->productCode);
                $PDOStatement->bindParam(':description', $this->description);
                $PDOStatement->bindParam(':price', $this->price);
                $PDOStatement->bindParam(':product_uuid', $this->product_uuid);

                $PDOStatement->execute();

                return true;
            }
        } catch (Exception $E) {
            $E->getMessage();
        }
    }
#The function delete deletes the product related data from the table product using stored Routine.
    public function delete()
    {
        try {
            global $connection;

            $sqlQuery = "CALL product_delete(:product_uuid)";

            $PDOStatement = $connection->prepare($sqlQuery);

            $PDOStatement->bindParam(':product_uuid', $this->product_uuid);

            $affectedRows = $PDOStatement->execute();

            return $affectedRows;
        } catch (Exception $E) {
            $E->getMessage();
        }
    }
}
