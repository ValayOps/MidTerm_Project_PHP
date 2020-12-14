
<?php
session_start();

// Check if the user is already logged or redirect user to Login page

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    #calling php functions file
    include 'PHP/commonFunctions.php';

    include 'PHP/PHPFUNCTIONS.php';
    include 'Objects/customer.php';
    #calling header functions
    createPageHeader("Avengers Shopping", "change");
    #setting the value of current customer uuid in the variable
    $primarykey = $_SESSION['loggedUser'];
    #calling the display logo method
    displayLogo();                                                                                                                                                                                                                                                                                          
    displayNavigationMenu();
    loginClass::getFooterName();
    HomeSection();

    #calling the array of image and shuffling it randomly thorugh the refresh
    shuffle($advertisingTshirts);
    echo '<div>';
    #displaying random image
    echo '<a href="https://www.newegg.ca/"><img class="pop" src="' .
        FOLDER_CAPTAIN .
        '"></a>';
    echo '<a href="https://www.newegg.ca/"><img class="advertising" src="' .
        $advertisingTshirts[0] .
        '"></a><br><br>';
    echo '</div>';
    #displaying page footer

    createPageFooter();
} else {
    #redirecting non authorized user to login page
    header('location: login.php');
}

?>
