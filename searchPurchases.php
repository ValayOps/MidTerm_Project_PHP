<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    


include 'Objects/purchases.php';
include 'Objects/customer.php';
include 'Objects/product.php';

include 'PHP/PHPFUNCTIONS.php';
#Displaying table on the isset post method of the ajax call of searchQuery
    if(isset($_POST["searchQuery"])){
#getting the current user id and passing it in purchase table     
$primarykey=$_SESSION['loggedUser'];    
$purchases = new purchases($primarykey);
$customer = new customer();

$product = new product();
#calling the table header function to display table
  table_header();
            foreach ($purchases->items as $purchase) {
                
                $product->load($purchase->getProductuuid());
                $customer->load($primarykey);
                echo "<tr>";
                ?><td>
                    <form method="POST" action="purchases.php">
                        <input type="hidden" name="Purchaseuuid" value="<?php echo $purchase->getProductuuid(); ?>">
                        <input type="submit" name="delete" value="Delete" class="button">
                     </form></td>        
                     <?php
                echo "<td>" . $product->getProductCode() . "</td>";
                echo "<td>" . $purchase->getFirstname() . "</td>";
                echo "<td>" . $purchase->getLastname() . "</td>";
                echo "<td>" . $purchase->getCity() . "</td>";

                echo "<td>" . $purchase->getComment() . "</td>";
                echo "<td>" . $purchase->getQuantity() . "</td>";
                echo "<td>" . $purchase->getPrice() . "$</td>";
                echo "<td>" . $purchase->getTaxes() . "</td>";
                echo "<td>" . $purchase->getSubtotal() . "$</td>";

                echo "<td>" . $purchase->getGrandtotal() . "$</td>";


                echo "</tr>";
            }
            echo "</table>";

    }
}