<?php

require_once 'Data/database-connection.php';
require_once 'objects/collection.php';
require_once 'objects/product.php';
#the constructor calls a stored procedure and than fills the data in the collection
class products extends collection
{
#the constructor calls a stored procedure pf constructors and than fills the data in the collection
    function __construct()
    {
        global $connection;

        $sqlQuery = "CALL product_select()";
        $PDOStatement = $connection->prepare($sqlQuery);

        $PDOStatement->execute();

        while ($row = $PDOStatement->fetch(PDO::FETCH_ASSOC)) {
            $product = new product(
                $row["product_uuid"],
                $row["product_code"],
                $row["description"],
                $row["price"]
            );
            $this->add($row["product_uuid"], $product);
        }
    }
}
