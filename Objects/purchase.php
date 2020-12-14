<?php
/*
 *The class purchase manages all the data related to one purchases at a time and
 * that is why we named the class in a singular form
 */
class purchase
{
    private $firstname = "";
    private $lastname = "";
    private $productCode = "";
    private $quantity = 0;
    private $price = 0.0;
    private $subtotal = 0.0;
    private $taxes = 0.0;
    private $grandtotal = 0.0;
    private $comment = "";
    private $product_uuid = "";
    private $customer_uuid = "";
    private $purchase_uuid = "";
    private $city = "";

    #the constructor loads all the data in to the variables declared
    public function __construct(
        $purchase_uuid = "",
        $product_uuid = "",
        $quantity = "",
        $comment = "",
        $price = "",
        $subtotal = "",
        $taxes = "",
        $grand_total = "",
        $firstname = "",
        $lastname = "",
        $city = ""
    ) {
        if ($purchase_uuid != "") {
            #fill all the object properties
            $this->purchase_uuid = $purchase_uuid;
            $this->product_uuid = $product_uuid;
            $this->quantity = $quantity;
            $this->comment = $comment;
            $this->price = $price;
            $this->subtotal = $subtotal;
            $this->taxes = $taxes;
            $this->grandtotal = $grand_total;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->city = $city;
        }
    }
#getter for purchase id
    function getpurchaseuuid()
    {
        return $this->purchase_uuid;
    }

#getter for product code
    function getProductCode()
    {
        return $this->productCode;
    }

#getter for Quantity
    function getQuantity()
    {
        return $this->quantity;
    }

#getter for Price
    function getPrice()
    {
        return $this->price;
    }

#getter for Subtotal
    function getSubtotal()
    {
        return $this->subtotal;
    }

#getter for Taxes
    function getTaxes()
    {
        return $this->taxes;
    }

#getter for grand total    
    function getGrandtotal()
    {
        return $this->grandtotal;
    }

#getter for Comments
    function getComment()
    {
        return $this->comment;
    }
    
#getter for First name
    function getFirstname()
    {
        return $this->firstname;
    }
    
#getter for last nme
    function getLastname()
    {
        return $this->lastname;
    }

#getter for city
    function getCity()
    {
        return $this->city;
    }

#setter set the product code in the variables
    function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }

#setter set the product Quantity in the variables
    function setQuantity($quantity)
    {
        if (mb_strlen($quantity) == 0) {
            return "Product quantity could not be NULL or Empty";
        } elseif ((int) $quantity < 1 || (int) $quantity > 99) {
            return 'The quantity cannot conatin more than 100 and less than 1';
        } else {
            $this->quantity = $quantity;
            return " ";
        }
    }

#setter set the price in the variables
    function setPrice($price)
    {
        $this->price = $price;
    }
#setter set the subtotal price in the variables
    function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
    }

#setter set the final taxes in the variables
    function setTaxes($taxes)
    {
        $this->taxes = $taxes;
    }

#setter set the grand total in the variables
    function setGrandtotal($grandtotal)
    {
        $this->grandtotal = $grandtotal;
    }
#setter set the comment value in the variables
    function setComment($comment)
    {
        $this->comment = $comment;
    }
#setter set the product unique id in the variables
    function setProductuuid($product_uuid)
    {
        $this->product_uuid = $product_uuid;
    }
#setter set the customer id in the variables
    function setCustomeruuid($customer_uuid)
    {
        $this->customer_uuid = $customer_uuid;
    }
#setter set the product uuid in the variables
    function getProductuuid()
    {
        return $this->product_uuid;
    }
#setter set the customer uuid in the variables
    function getCustomeruuid()
    {
        return $this->customer_uuid;
    }
    # save method calls a store procedure from database and insert a new purchase through
    #If not it will update the record
    public function save()
    {
        try {
            global $connection;
            if ($this->purchase_uuid == "") {
                $sqlQuery =
                    "CALL purchase_insert(:p_product_uuid,:p_customer_uuid,:p_quantity, :p_comments, :p_price, :p_subtotal, :p_taxes, :p_grandtotal)";

                $PDOStatement = $connection->prepare($sqlQuery);

                $PDOStatement->bindParam(
                    ':p_product_uuid',
                    $this->product_uuid
                );
                $PDOStatement->bindParam(
                    ':p_customer_uuid',
                    $this->customer_uuid
                );
                $PDOStatement->bindParam(':p_quantity', $this->quantity);
                $PDOStatement->bindParam(':p_comments', $this->comment);
                $PDOStatement->bindParam(':p_price', $this->price);
                $PDOStatement->bindParam(':p_subtotal', $this->subtotal);
                $PDOStatement->bindParam(':p_taxes', $this->taxes);
                $PDOStatement->bindParam(':p_grandtotal', $this->grandtotal);

                $PDOStatement->execute();
                return true;
            }
        } catch (Exception $E) {
            echo $E->getMessage();
            return false;
        }
    }
}
