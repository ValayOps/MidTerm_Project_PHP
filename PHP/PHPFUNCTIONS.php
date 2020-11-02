<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//creating array for the drinks by declaring global variable
define('FOLDER_IMAGES', 'images/');
define('FILE_CSS', 'css/style.css');

define('FOLDER_LOGO', FOLDER_IMAGES."logo.png");
define('FOLDER_CAPTAIN', FOLDER_IMAGES."captshirt.jpg");
define('FOLDER_THOR', FOLDER_IMAGES."thortshirt.jpg");
define('FOLDER_SPIDER', FOLDER_IMAGES."spidertshirt.jpg");
define('FOLDER_HULK', FOLDER_IMAGES."hulktshirt.jpg");
define('FOLDER_PANTHER', FOLDER_IMAGES."panthertshirt.jpg");

define('PAGE_INDEX', 'index.php');
define('PAGE_PICTURES', 'pictures.php');
define('PAGE_BUYER', 'buyer.php');
define('PAGE_ORDER', 'orders.php');

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
$final_data=array();
//creating array for the drinks by declaring global variable
$advertisingTshirts = array(FOLDER_CAPTAIN,FOLDER_THOR,FOLDER_SPIDER,FOLDER_HULK,FOLDER_PANTHER);
#creating header functions
    function createPageHeader($Title,$change){
        
        ?><html>
            <head>
             <meta charset=\"UTF-8\">
                <title><?php echo $Title; ?></title>
                <link rel="stylesheet" href="<?php echo FILE_CSS?>"   >
            </head>
            <body class="<?php echo $change;?>">
                <?php
                #calling logo method for displaying logo with text
                displayLogo();
                 #callin navigation menu for the menu
                displayNavigationMenu();
                
    }
    #creating  functions for the shopping page(catlog)
    function gallery(){
       ?> 
        <div class="gallery">
        <a target="_blank" href="<?php echo FOLDER_CAPTAIN ?>">
          <img src="<?php echo FOLDER_CAPTAIN ?>" alt="captain" width="600" height="400">
        </a>
        <div class="desc">Captain Tshirt<br>Price - 400$</div>
      </div>

      <div class="gallery">
        <a target="_blank" href="<?php echo FOLDER_THOR ?>">
          <img src="<?php echo FOLDER_THOR ?>" alt="thor" width="600" height="400">
        </a>
          <div class="desc">Thor Tshirt<br>Price - 100$</div>
      </div>

        <div class="gallery">
          <a target="_blank" href="<?php echo FOLDER_SPIDER ?>">
            <img src="<?php echo FOLDER_SPIDER ?>" alt="Sipder" width="600" height="400">
          </a>
          <div class="desc">Spider Tshirt<br>Price - 200$</div>
        </div>
        <div class="gallery">
          <a target="_blank" href="<?php echo FOLDER_HULK ?>">
            <img src="<?php echo FOLDER_HULK ?>" alt="Sipder" width="600" height="400">
          </a>
          <div class="desc">Hulk Tshirt<br>Price - 150$</div>
        </div>
        <div class="gallery">
          <a target="_blank" href="<?php echo FOLDER_PANTHER ?>">
            <img src="<?php echo FOLDER_PANTHER ?>" alt="Sipder" width="600" height="400">
          </a>
          <div class="desc">Panther Tshirt<br>Price - 200$</div>
        </div>
<?php
    }
    #creating page footer for the footer data
    function createPageFooter(){
       ?>
                <div class="footer">
                    <?php displayCopyright()?>
                </div>
            </body>
        </html>
        <?php
    }
    #creating logo with title
    function displayLogo(){
        echo'<div class="header">';
        echo'<a href="#default" class="logo"><img src="'.FOLDER_LOGO.'"></a>';
        echo '&nbsp;<a href=""><h1>Avengers Shopping<h1></a>';

        
    }
    #create display copy right function
    function displayCopyright(){
        echo'<br><br><div id="copyright"><h3>&copy; Valay Shah Web Project -'.date("Y").'</h3></div>';
    }
    #creating navigation
    function displayNavigationMenu(){
                        

        echo '<div class="header-right">';
        echo '&nbsp;<a href="'.PAGE_INDEX.'">HOME</a>';
        echo '&nbsp;<a href="'.PAGE_PICTURES.'">SHOPPING</a>';
        echo '&nbsp;<a href="'.PAGE_BUYER.'">BUYER</a>';
        echo '&nbsp;<a href="'.PAGE_ORDER.'">ORDER</a>';
        echo '</div>';
        echo '</div>';
        }
   #creating Home function      
    function HomeSection(){
        echo '<div>';
        echo '<h1>Avengers Shopping provides wide range of avengers tshirt</h1>';
        echo '</div>';
    }
       #creating table th headers functioon for further refrence
 function table_header(){
            echo'<h3>Order Summary</h3>';
           echo "<table border='1'>";
        echo "<tr> <th> Product-Code </th>";
        echo "<th>First-name</th>";
        echo "<th>Last-name</th>";
        echo "<th>City</th>";
        echo "<th>Comments</th>";
        echo "<th>Price</th>";
        echo "<th>Quantity</th>";
        echo "<th>Subtotal</th>";
         echo "<th>Taxes</th>";
         echo "<th>Grand-total</th>";
 }
        #creating table end
 function table_footer(){
     
     echo '</table>';
 }