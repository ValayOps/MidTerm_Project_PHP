

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
$sendArray=array();
$sendData=array();
$fieldInput = 0; 
define('CHAR_SIZE',10);
						
//---------- Data Validation -----------------------------				
if(isset($_POST['submit'])){
    if((strlen(htmlspecialchars($_POST["inputproduct"]))>CHAR_SIZE+2)){
        $CodeError= "<br>The product code contains more than 10 ";
        $productInput="";
        $productInput=null;
    }
    else if(strlen(htmlspecialchars($_POST["inputproduct"]))==0){

        $CodeError= "<br>The product code cannot be empty ";
        $productInput="";
        $productInput=null;
        }
        elseif ((!preg_match("/^p/",($_POST["inputproduct"])))&& (!preg_match("/^P/",($_POST["inputproduct"])))) {
                $CodeError= "<br>The should start with P or p ";
                $productInput="";
                  $productInput=null;
    }
    else{
        $productInput=($_POST["inputproduct"]);
    
    }
    if(strlen(htmlspecialchars($_POST["firstname"]))>CHAR_SIZE+10){
        $fnameError= "<br>The first name contains more than 20 ";
        $fnameInput="";
        $fnameInput=null;
    }
    else if(strlen(htmlspecialchars($_POST["firstname"]))==0){
        $fnameError= "<br>The first name cannot be empty ";
        $fnameInput="";
        $fnameInput=null;
        }
    else{
        $fnameInput=($_POST["firstname"]);

    }
    if(strlen(htmlspecialchars($_POST["lastname"]))>CHAR_SIZE+10){
        $lnameError= "<br>The last name contains more than 20 ";
        $lnameInput="";
        $lnameInput=null;
    }
    else if(strlen(htmlspecialchars($_POST["lastname"]))==0){
        $lnameError= "<br>The last name cannot be empty ";
        $lnameInput="";
        $lnameInput=null;
    }
    else{
        $lnameInput=($_POST["lastname"]);

    }
    if(strlen(htmlspecialchars($_POST["city"]))>CHAR_SIZE-2){
        $cityError= "<br>The city contains more than 8 characters ";
        $cityInput="";
        $cityInput=null;
    }
    else if(strlen(htmlspecialchars($_POST["city"]))==0){
        $cityError= "<br>The city cannot be empty ";
      $cityInput="";
        $cityInput=null;
        }
    else{
        $cityInput=($_POST["city"]);
  
    }
    
    if(strlen(htmlspecialchars($_POST["comments"]))>CHAR_SIZE*20){
        $commentsError= "<br>The comments contains more than 200 ";
        $commentInput="";
        $commentInput=null;
    }
    else if(strlen(htmlspecialchars($_POST["comments"]))==0){
        $commentsError= "<br>The comments cannot be empty ";
        $commentInput="";
        $commentInput=null;
        }
    else{
        $commentInput=($_POST["city"]);

    }
    if((($_POST["price"])>0) && (($_POST["price"])<10000)){
        $priceInput=($_POST["price"]);
   
    }
    else if(strlen(htmlspecialchars($_POST["price"]))==0){
        $priceError= "<br>The product price cannot be empty ";
        $priceInput="";
        $priceInput=null;
        }
    else{
               $priceError= "<br>The product price cannot be more than 10000 and cannot be less than 0 ";
        $priceInput="";
        $priceInput=null;  
 
    }
    if((($_POST["quantity"])>0) && (($_POST["quantity"])<99) && (!is_float($_POST["quantity"])) ){
          $quantityInput=($_POST["quantity"]);
  
    }
    else if(strlen(htmlspecialchars($_POST["quantity"]))==0){
        $quantityError= "<br>The product quantity cannot be empty ";
        $quantityInput="";
        $quantityInput=null;
        }
    else{
              $quantityError= "<br>The product quantity cannot be more than 99 and cannot be less than 0 ";
        $quantityInput="";
        $quantityInput=null;  

    }
    $sendData=Array("code"=>$productInput,"fname"=>$fnameInput,"lname"=>$lnameInput,"city"=>$cityInput,"comments"=>$commentInput,"price"=>$priceInput,"quantity"=>$quantityInput);
  
       if(in_array(null,$sendData)){
           
           echo "No Data";
       }
       else{
           array_push($sendArray,$sendData);
               $jsonfile=json_encode($sendArray);
    $file=fopen("saved.txt", "a");
    fwrite($file, json_encode($sendData,true));
    fclose($file);
    resetValues();
       }
   

}
?>    
<br>  
<div>
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



<input name='reset' type='reset' value='Reset' style="font-size:16pt;font-weight:bold;float:center; color:black;" /> 	
<input  type="submit" name="submit" value='Submit' style="font-size:16pt;font-weight:bold;float:center; color:black;" > 	
					


</form>
    <br>
    <br>
    <br>
    <br/>
    <br/>
</div>

<?php
function resetValues(){
    
    $productInput="";
    $fnameInput="";
    $lnameInput="";
    $cityInput="";
    $commentInput="";
    $priceInput="";
    $quantityInput="";
    
}
createPageFooter();
?>