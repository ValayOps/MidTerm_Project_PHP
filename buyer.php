

<?php

include 'PHP/PHPFUNCTIONS.php';

createPageHeader("Book");
//---------- Variables -----------------------------------
$CodeError = "";
$fnameError = "";
$lnameError="";
$cityError="";
$commentsError="";
$priceError="";
$quantityError="";					
$productInput = "";
$fnameInput = "";
$lnameInput="";
$cityInput="";
$commentInput="";
$priceInput="";
$quantityInput="";

$fieldInput = 0;
define('CHAR_SIZE',10);
						
//---------- Data Validation -----------------------------				
if(isset($_POST['submit'])){
    if(strlen(htmlspecialchars($_POST["inputproduct"]))>CHAR_SIZE+2){
        $CodeError= "<br>The product code contains more than 10 ";
    }
    else{
        if(strlen(htmlspecialchars($_POST["inputproduct"]))==0){
        $CodeError= "<br>The product code cannot be empty ";
        }
    }
    if(strlen(htmlspecialchars($_POST["firstname"]))>CHAR_SIZE+10){
        $fnameError= "<br>The first name contains more than 20 ";
    }
    else{
        if(strlen(htmlspecialchars($_POST["firstname"]))==0){
        $fnameError= "<br>The first name cannot be empty ";
        }
    }
    if(strlen(htmlspecialchars($_POST["lastname"]))>CHAR_SIZE+10){
        $lnameError= "<br>The last name contains more than 20 ";
    }
    else{
        if(strlen(htmlspecialchars($_POST["lastname"]))==0){
        $lnameError= "<br>The last name cannot be empty ";
        }
    }
    if(strlen(htmlspecialchars($_POST["city"]))>CHAR_SIZE-2){
        $cityError= "<br>The city contains more than 8 characters ";
    }
    else{
        if(strlen(htmlspecialchars($_POST["city"]))==0){
        $cityError= "<br>The city cannot be empty ";
        }
    }
    if(strlen(htmlspecialchars($_POST["comments"]))>CHAR_SIZE*20){
        $commentsError= "<br>The comments contains more than 200 ";
    }
    else{
        if(strlen(htmlspecialchars($_POST["comments"]))==0){
        $commentsError= "<br>The comments cannot be empty ";
        }
    }
    if(($_POST["price"]>0) && ($_POST["price"]<10000)){
        $priceError= "<br>The product price cannot be more than 10000 and cannot be less than 0 ";
    }
    else{
        if(strlen(htmlspecialchars($_POST["price"]))==0){
        $priceError= "<br>The product price cannot be empty ";
        }
    }
    $sendData=Array($_POST["inputproduct"],$_POST["firstname"],$_POST["lastname"],$_POST["city"],$_POST["comments"],$_POST["price"]);
if(!empty($sendData)){
    echo "<ol>";
for($i=0;$i<count($sendData);$i++){
    if(!empty($sendData[i])){
    echo "<li>".$sendData[$i]."</li>";
    }
    else{
        echo"loading..".i;
    }

}
}
  echo "</ol>";
}
?>    
<br>       
<form action="buyer.php"  align="center" method="POST">
			
Product no: 
<input type="text" name='inputproduct' value="<?php echo $productInput;?>"  size="12" style="font-size:13pt;font-weight:bold;"> 
<strong><font color=#CC0000>*<?php echo $CodeError;?>
</font></strong>
   <br /><br />
   
First name :
<input type='text' name='firstname' value="<?php echo $fnameInput; ?>" size="12" style="font-size:13pt;font-weight:bold;"> 
<strong><font color=#CC0000>*<?php echo $fnameError;?></font></strong>
<br /><br />
Last name :
<input type='text' name='lastname' value="<?php echo $lnameInput; ?>" size="12" style="font-size:13pt;font-weight:bold;"> 
<strong><font color=#CC0000>*<?php echo $lnameError;?></font></strong>
<br /><br />
City :
<input type='text' name='city' value="<?php echo $cityInput; ?>" size="12" style="font-size:13pt;font-weight:bold;"> 
<strong><font color=#CC0000>*<?php echo $cityError;?></font></strong>
<br /><br />
Comments :
<input type='text' name='comments' value="<?php echo $commentInput; ?>" size="12" style="font-size:13pt;font-weight:bold;"> 
<strong><font color=#CC0000>*<?php echo $commentsError;?></font></strong>
<br /><br />
Price :
<input type='text' name='price' value="<?php echo $priceInput; ?>" size="12" style="font-size:13pt;font-weight:bold;"> 
<strong><font color=#CC0000>*<?php echo $priceError;?></font></strong>
<br /><br />
Quantity :
<input type='text' name='quantity' value="<?php echo $quantityInput; ?>" size="12" style="font-size:13pt;font-weight:bold;"> 
<strong><font color=#CC0000>*<?php echo $quantityError;?></font></strong>
<br /><br />




<input  type="submit" name="submit" value='Submit' style="font-size:16pt;font-weight:bold;float:center; color:black;" > 						
<br>
<br>
</form> 

<?php

createPageFooter();
?>