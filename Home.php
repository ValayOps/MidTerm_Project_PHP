
<?php
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    

   #calling php functions file 
    include 'PHP/commonFunctions.php';

    include 'PHP/PHPFUNCTIONS.php';
    include 'Objects/customer.php';
    #calling header functions
    createPageHeader("Avengers Shopping","change");   
    #calling logo method for displaying logo with text
    $primarykey=$_SESSION['loggedUser'];
     displayLogo();
     displayNavigationMenu(); 
     loginClass::getFooterName($primarykey);
     HomeSection();  

#clling the array of image and shuffling it randomly thorugh the refresh
  shuffle($advertisingTshirts);
        echo'<div>';
        #displaying random image
        echo '<a href="https://www.newegg.ca/"><img class="pop" src="'.FOLDER_CAPTAIN.'"></a>';
        echo '<a href="https://www.newegg.ca/"><img class="advertising" src="'.$advertisingTshirts[0].'"></a><br><br>';
        echo'</div>';
    #displaying page footer

        createPageFooter();
        

    }
    else{
        
        header('location: login.php');
    }
   ?>