<?php
    
    include 'PHP/PHPFUNCTIONS.php';
    
    createPageHeader("Avengers Shopping","change");              
    HomeSection();
    

  shuffle($advertisingDrinks);
        echo'<div>';
              echo '<img class="pop" src="'.FOLDER_CAPTAIN.'">';
        echo '<br><br><img class="advertising" src="'.$advertisingDrinks[0].'"><br><br>';
        echo'</div>';
    createPageFooter();
    
   ?>