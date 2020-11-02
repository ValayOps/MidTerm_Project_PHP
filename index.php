<?php
   #calling php functions file 
    include 'PHP/PHPFUNCTIONS.php';
    #calling header functions
    createPageHeader("Avengers Shopping","change");              
    #calling the home section
    HomeSection();
    
#clling the array of image and shuffling it randomly thorugh the refresh
  shuffle($advertisingTshirts);
        echo'<div>';
        #displaying random image
              echo '<img class="pop" src="'.FOLDER_CAPTAIN.'">';
        echo '<img class="advertising" src="'.$advertisingTshirts[0].'"><br><br>';
        echo'</div>';
    #displaying page footer
        createPageFooter();
    
   ?>