

<?php

include 'PHP/PHPFUNCTIONS.php';
#**************************Calling Header Section*********************************

createPageHeader("Avengers Shopping","");

#************************Declaring size variables***********************************

define('Code_CHAR_SIZE',12);
define('fname_CHAR_SIZE',20);
define('lname_CHAR_SIZE',20);
define('city_CHAR_SIZE',8);
define('comments_CHAR_SIZE',200);

#**************************Hanldling form Validation*********************************
if(isset($_POST['submit'])){
    #checking product code characters less than 12
    if((strlen(htmlspecialchars($_POST["inputproduct"]))>Code_CHAR_SIZE)){
        $CodeError= "<br>The product code contains more than 10 ";
        $productInput="";
        $productInput=null;
    }
    #checking product code not null
    else if(strlen(htmlspecialchars($_POST["inputproduct"]))==0){

        $CodeError= "<br>The product code cannot be empty ";
        $productInput="";
        $productInput=null;
        }
    #checking product code starting with p/P with my Regex function
        elseif ((!preg_match("/^p/",($_POST["inputproduct"])))&& (!preg_match("/^P/",($_POST["inputproduct"])))) {
                $CodeError= "<br>The product code should start with P or p ";
                $productInput="";
                  $productInput=null;
    }
    else{
        #assigning actual product value to the varuiable
        $productInput=($_POST["inputproduct"]);
    
    }
    #checking product first name characters less than 20
    if(strlen(htmlspecialchars($_POST["firstname"]))>fname_CHAR_SIZE){
        $fnameError= "<br>The first name contains more than 20 ";
        $fnameInput="";
        $fnameInput=null;
    }
        #checking first name not null
    else if(strlen(htmlspecialchars($_POST["firstname"]))==0){
        $fnameError= "<br>The first name cannot be empty ";
        $fnameInput="";
        $fnameInput=null;
        }
    else{
        #assigning actual product first name to the variable
        $fnameInput=($_POST["firstname"]);

    }
        #checking product last name characters less than 20
    if(strlen(htmlspecialchars($_POST["lastname"]))>lname_CHAR_SIZE){
        $lnameError= "<br>The last name contains more than 20 ";
        $lnameInput="";
        $lnameInput=null;
    }
            #checking last name not null
    else if(strlen(htmlspecialchars($_POST["lastname"]))==0){
        $lnameError= "<br>The last name cannot be empty ";
        $lnameInput="";
        $lnameInput=null;
    }
    else{
         #assigning actual product last name to the varuiable
        $lnameInput=($_POST["lastname"]);

    }
            #checking city characters less than 8
    if(strlen(htmlspecialchars($_POST["city"]))>city_CHAR_SIZE){
        $cityError= "<br>The city contains more than 8 characters ";
        $cityInput="";
        $cityInput=null;
    }
            #checking city name not null
    else if(strlen(htmlspecialchars($_POST["city"]))==0){
        $cityError= "<br>The city cannot be empty ";
      $cityInput="";
        $cityInput=null;
        }
    else{
    #assigning city to variable
        $cityInput=($_POST["city"]);
  
    }
    #chekcing comments size and not null value
    if(strlen(htmlspecialchars($_POST["comments"]))>comments_CHAR_SIZE){
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
        #assigning comments to variable
        $commentInput=($_POST["comments"]);

    }
    #Validation for price less than 0 and more tha 10000
    if((($_POST["price"])>0) && (($_POST["price"])<10000)){
        $priceInput=($_POST["price"]);
   
    }
    #valuiidating the not null validation
    else if(strlen(htmlspecialchars($_POST["price"]))==0){
        $priceError= "<br>The product price cannot be empty ";
        $priceInput="";
        $priceInput=null;
        }
    else{
               $priceError= "<br>The product price should be between 0 to 10000 ";
        $priceInput="";
        $priceInput=null;  
 
    }
    #Assigning quantity input
    if((($_POST["quantity"])>0) && (($_POST["quantity"])<99) && (!is_float($_POST["quantity"])) ){
          $quantityInput=($_POST["quantity"]);
  
    }
    #Validation Quantity not null
    else if(strlen(htmlspecialchars($_POST["quantity"]))==0){
        $quantityError= "<br>The product quantity cannot be empty ";
        $quantityInput="";
        $quantityInput=null;
        }
    else{
        #Quantity between 0 to 99
              $quantityError= "<br>Quantity between 0 to 99";
        $quantityInput="";
        $quantityInput=null;  

    }
    
    #Adding variables data in an temporary array
    $sendData=Array("code"=>$productInput,
                    "fname"=>$fnameInput,
                    "lname"=>$lnameInput,
                    "city"=>$cityInput,
                    "comments"=>$commentInput,
                    "price"=>$priceInput,
                    "quantity"=>$quantityInput);
    
#checking arrays for the null value
       if(in_array(null,$sendData)){
           
           echo "";
       }
       else{
           #pushing the data of temporary array in the actual array
           array_push($sendArray,$sendData);
         #opening file saved.txt in a read and write at the end mode 
               $file=fopen("saved.txt","r+");
          #getting the contents of the file in an array
               $current_data= file_get_contents('saved.txt');
           #appending the current contents to the existing data
               $array_data= json_decode($current_data,true);
               $array_data[]=$sendArray;
            #saving the file with the written data 
               file_put_contents('saved.txt',json_encode($array_data));
            #closing the file
               fclose($file);
           
       }
   

}
?>    
<br>  
<div>
<form action="buyer.php"  align="center" method="POST">
    <!--Form product name,fname,lname,city,comments,price,quantity-->
    <label>Product no:</label> 
        <input type="text" name='inputproduct' value="<?php echo $productInput;?>"  size="12" > 
        <strong>*<?php echo $CodeError;?></strong>
       <br/><br/>
    <label>First name :</label>
        <input type='text' name='firstname' value="<?php echo $fnameInput; ?>" size="12" > 
        <strong>*<?php echo $fnameError;?></font></strong>
    <br /><br />
    <label>Last name :</label>
        <input type='text' name='lastname' value="<?php echo $lnameInput; ?>" size="12" > 
        <strong>*<?php echo $lnameError;?></font></strong>
    <br /><br />
    <label>City :</label>
        <input type='text' name='city' value="<?php echo $cityInput; ?>" size="12" > 
        <strong>*<?php echo $cityError;?></font></strong>
    <br /><br />
    <label>Comments :</label>
        <input type='text' name='comments' value="<?php echo $commentInput; ?>" size="25" > 
        <strong>*<?php echo $commentsError;?></font></strong>
    <br /><br />
    <label>Price :</label>
        <input type='text' name='price' value="<?php echo $priceInput; ?>" size="12" > 
        <strong>*<?php echo $priceError;?></font></strong>
    <br /><br />
    <label>Quantity :</label>
        <input type='text' name='quantity' value="<?php echo $quantityInput; ?>" size="12" > 
        <strong>*<?php echo $quantityError;?></strong>
    <br /><br />
    <br /><br />
        <input name='reset' type='reset' value='Reset'> 	<br><br>
        <input  type="submit" name="submit" value='Submit'> 	
					


</form>
    <br>
    <br>
    <br>
    <br/>
    <br/>
</div>

<?php
#**************************Calling Footer Section*********************************
createPageFooter();
?>