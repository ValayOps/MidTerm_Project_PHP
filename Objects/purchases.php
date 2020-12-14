<?php
require_once 'Data/database-connection.php';
include_once 'purchase.php';
require_once 'objects/collection.php';

class purchases extends collection
{
#the constructor calls a stored procedure and than fills the data in the collection passing the parameter
#of customer UUID which is stored in purchase table
    function __construct($customer_uuid)
    {
        global $connection;

        $sqlQuery = "CALL purchase_search(:p_customer_uuid)";
        $PDOStatement = $connection->prepare($sqlQuery);
        $PDOStatement->bindParam(':p_customer_uuid', $customer_uuid);

        $PDOStatement->execute();

        while ($row = $PDOStatement->fetch(PDO::FETCH_ASSOC)) {
            $purchases = new purchase(
                $row["purchase_uuid"],
                $row["product__uuid"],
                $row["quantity"],
                $row["comments"],
                $row["price"],
                $row["subtotal"],
                $row["taxes"],
                $row["grand_total"],
                $row["firstname"],
                $row["lastname"],
                $row["city"]
            );
            $this->add($row["purchase_uuid"], $purchases);
        }
    }
}
