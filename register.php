

<?php
include 'PHP/PHPFUNCTIONS.php';
include 'Objects/customer.php';

createPageHeader("Avengers Register","");
displayLogo();
displayNavigationMenuWithout();
HomeSection();
// Check if the user is already logged in, if yes then redirect him to welcome 
// 
$fnameError = "";
$lnameError = "";
$cityError = "";
$provinceError = "";
$usernameError = "";
$passwordError = "";
$postalCodeError="";
$addressError="";

$fnameData = "";
$lnameData = "";
$cityData = "";
$provinceData = "";
$usernameData = "";
$passwordData = "";
$postalCodeData="";
$addressData="";
$Signup="";
#**************************Calling Header Section3*********************************
if (isset($_POST['submit'])){
    
       $customer= new customer();
       
    $fnameData = htmlspecialchars($_POST["fname"]);
    $lnameData = htmlspecialchars($_POST["lname"]);
    $cityData = htmlspecialchars($_POST["city"]);
    $provinceData = htmlspecialchars($_POST["province"]);
    $usernameData = htmlspecialchars($_POST["username"]);
    $passwordData = htmlspecialchars($_POST["password"]);
    $postalCodeData= htmlspecialchars($_POST["postalcode"]);
    $addressData= htmlspecialchars($_POST["address"]);
    
    $fnameError = $customer->setFirstname($fnameData);
    $usernameError=$customer->setUsername($usernameData);
    $lnameError= $customer->setLastname($lnameData);
    $passwordError= $customer->setPassword($passwordData);
    $cityError= $customer->setCity($cityData);
    $addressError = $customer->setAddress($addressData);
    $provinceError= $customer->setprovince($provinceData);
    $postalCodeError = $customer->setPostalcode($postalCodeData);
    
    if ( $fnameError == " " && $lnameError == " " && $addressError == " " && $cityError == " " && $provinceError == " " && $postalCodeError == " " && $usernameError == " " && $passwordError == " ") {
        $Signup=$customer->save();
    }
    
}
    
 
?>    
<br>  

     <div>
<form method="POST">	
<br>
<table>

    <tr>
    <td>First name :</td>
    <td><input type='text' name='fname' value="" size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $fnameError; ?></font></strong></td>
    </tr>

    <tr>
    <td>Last name :</td>
    <td><input type='text' name='lname' value="" size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $lnameError; ?></font></strong></td>
    </tr>

    <tr>
    <td>Address : </td>
    <td><input type="text" name='address' value=""  size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $addressError; ?> </font></strong></td>
    </tr>
    
    <tr>
    <td>City :</td>
    <td><input type='text' name='city' value="" size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $cityError; ?></font></strong></td>
   </tr>

   <tr>
        <td>Province : </td>
    <td><input type="text" name='province' value=""  size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $provinceError; ?> </font></strong></td>
    </tr>
   
   <tr>
        <td>Postal code : </td>
    <td><input type="text" name='postalcode' value=""  size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $postalCodeError; ?> </font></strong></td>
    </tr>
   
    <tr>
   <td> Username :</td>
    <td><input type='text' name='username' value="" size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $usernameError; ?></font></strong></td>
   </tr>

   
   <tr>
   <td> Password :</td>
    <td><input type='password' name='password' value="" size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $passwordError; ?></font></strong></td>
   </tr>
<tr>
<td><input  type="submit" name="submit" value='Submit' style="font-size:16pt;font-weight:bold;float:center; color:black;" > </td>	

<td><input  type="reset" name="Reset" value='Reset' style="font-size:16pt;font-weight:bold;float:center; color:black;" > </td>
</tr>		
  <a href="cheat_sheet.txt" download>Download File cheat sheet</a>
  <strong><font color=#CC0000>*<?php echo $Signup; ?></font></strong>
</table>
    </form> 
</div>

<?php
#**************************Calling Footer Section*********************************
createPageFooter();
?>