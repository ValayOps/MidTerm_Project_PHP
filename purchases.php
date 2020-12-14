<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

include 'PHP/commonFunctions.php';
include 'PHP/PHPFUNCTIONS.php';
include 'Objects/products.php';
include 'Objects/customer.php';
include 'Objects/purchase.php';
#calling the headers and the current session user 
$primarykey="";
createPageHeader("Purchases", "");
displayLogo();
displayNavigationMenu(); 
loginClass::getFooterName();
HomeSection();
?>
    <form>
        <table>
            <tr>
                <td><label><b>Show Purchases Made<br>on this date or later:</b></label></td>
                <td><input type="number" id="searchQuery" value="<?php echo isset($_POST["quantity"]) ? $_POST["quantity"] : ''; ?>" placeholder="2020-03-15" name="search"/></td>
                <td><span style="color:red;"></span></td>
            </tr>

        </table>

        <input type="button" onclick="searchCustomer()"  class="btn btnSave" value="Search" name="search" style="align:center;margin-left:200px;"/>
    
    </form>
    <div id="searchResult"></div>   


<?php
    createPageFooter();
}
else{
        header('location: login.php');
}
?>