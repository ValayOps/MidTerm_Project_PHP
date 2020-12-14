<?php
session_start();
/*
    With the below condition only allowing the user who is login to access the website
 */
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    include 'PHP/commonFunctions.php';
    include 'PHP/PHPFUNCTIONS.php';
    include 'Objects/products.php';
    include 'Objects/customer.php';
    include 'Objects/purchase.php';
    define('TAX_RATE', 0.15);
    $primarykey = "";

    #caling the php functions which has html and header
    createPageHeader("Avengers Shopping", "change");
    $primarykey = $_SESSION['loggedUser'];
    displayLogo();
    displayNavigationMenu();
    loginClass::getFooterName();
    HomeSection();
    #making the instance of the purchase and product to acccess the records
    $purchase = new purchase();
    $product = new product();

    $productError = "";
    $quantityData = 0;
    $commentData = "";
    $ProductErrorMessage = "";
    $QuantityErrorMessage = "";
    $commentErrorMessage = "";
    $price = 0.0;
    $subTotal = 0.0;
    $taxesAmount = 0.0;
    $quantityErrorMessage = "";
    $subtotalErrorMessage = "";
    $taxesErrorMessage = "";
    $grandtotalErrorMessage = "";
    $product_cd = "";
#accessing data with the post method when clicked on Buy Button
    if (isset($_POST["submit"])) {
        $product_code = htmlspecialchars($_POST['DrpProduct']);
        $quantityData = (int) $_POST['quantity'];
        $commentData = htmlspecialchars($_POST['comment']);

        $quantityErrorMessage = $purchase->setQuantity($quantityData);
        #checking if any quantity is not null if not null performing all the logic
     
        if ($quantityErrorMessage == " ") {
            #loading the product load method for the price
            $product->load($product_code);
            $product_cd = $product->getProductCode();
            $price = $product->getPrice();
            #calculating thee subtotal of the price * quantity
            $subTotal = $quantityData * $price;
            #the taxes are calculated as per quebec tax with the 
            $taxesAmount = $subTotal * TAX_RATE;
            #The grand total is been calculated by the sum of subtotal and tax
            $grandTotal = $subTotal + $taxesAmount;
            #Setting the values to the purchase table
            $purchase->setProductuuid($product_code);
            $purchase->setPrice($price);
            $purchase->setSubtotal($subTotal);
            $purchase->setTaxes($taxesAmount);
            $purchase->setGrandtotal($grandTotal);
            $purchase->setCustomeruuid($primarykey);
            $bull = $purchase->save();
            if ($bull == true) {
                 header('location: purchases.php');
            }
        }
    }
    ?>

    <!--dynamic label-->
    <form action="buy.php" method="POST">
        <table>
            <?php
            $products = new products();
            echo '<tr>';
            echo '<td> <label for="DrpProduct"><b>Product Code:</b></label></td>';
            echo "<td> <select name='DrpProduct'>";
            foreach ($products->items as $product) {
                echo "<option value='" .
                    $product->getProduct_uuid() .
                    "'>" .
                    $product->getProductCode() .
                    " - " .
                    $product->getDescription() .
                    "</option>";
            }
            echo "</select><span style='color:red;'>*</span></td>";
            echo "<td></td> ";

            echo '</tr>';
            ?>

            <tr>
                <td> <label for="comment"><b>Comment:</b></label></td>
                <td><input  type="text" class="inputForm" name="comment" placeholder="Comment" value="<?php echo isset(
                    $_POST["comment"]
                )
                    ? $_POST["comment"]
                    : ''; ?>" /></td>
                <td><span><?php echo $commentErrorMessage; ?></span></td>
            </tr>
            <tr>
                <td><label for="quantity"><b>Quantity:</b></label></td>
                <td><input type="number" value="<?php echo isset(
                    $_POST["quantity"]
                )
                    ? $_POST["quantity"]
                    : ''; ?>" class="inputForm" placeholder="Quantity" name="quantity"/></td>
                <td><span style="color:red;"><?php echo $quantityErrorMessage; ?>*</span></td>
            </tr>

        </table>

        <input type="submit"  class="btn btnSave" value="BUY" name="submit"/>
        <input type="reset"  class="btn btnCancel" value="CLEAR INFO"/>

    </form>

<?php createPageFooter();
} else {
    header('location: login.php');
}
?>
