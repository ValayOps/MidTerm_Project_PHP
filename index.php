<?php
    
    include 'PHP/PHPFUNCTIONS.php';
    
    createPageHeader("Avengers Shopping");
    HomeSection();
    shuffle($advertisingDrinks);
    echo '<br><br><img class="advertising" src="'.$advertisingDrinks[0].'">';
    createPageFooter();
    
   ?>