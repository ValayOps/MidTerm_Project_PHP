
<?php
session_start();
include 'Objects/customer.php';


   #calling php functions file 
    include 'PHP/PHPFUNCTIONS.php';
    #calling header functions
    createPageHeader("Avengers Shopping","change");   
    #calling logo method for displaying logo with text
            displayLogo();
            displayNavigationMenuWithout(); 
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
    
   
   ?>