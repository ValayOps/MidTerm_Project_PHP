<?php
require_once 'Data/database-connection.php';
include_once 'purchase.php';
require_once 'objects/collection.php';
#plural class is used to get multiple data which is stored in the collection class
class customers extends collection
{
                                                                    #the constructor calls a stored procedure and than fills the data in the collection
    function __construct($customer_uuid)
    {
        global $connection;

        $sqlQuery = "CALL customer_select()";
        $PDOStatement = $connection->prepare($sqlQuery);
        $PDOStatement->bindParam(':p_customer_uuid', $customer_uuid);

        $PDOStatement->execute();

        while ($row = $PDOStatement->fetch(PDO::FETCH_ASSOC)) {
            $customers = new customer(
                $row["customer_uuid"],
                $row["firstname"],
                $row["lastname"],
                $row["address"],
                $row["city"],
                $row["province"],
                $row["taxes"],
                $row["postalcode"],
                $row["username"],
            );
            $this->add($row["customer_uuid"], $customers);
        }
    }
}
