<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('FOLDER_IMAGES', 'images/');
define('FILE_CSS', 'css/style.css');

define('FOLDER_LOGO', FOLDER_IMAGES."logo.png");
define('FOLDER_CAPTAIN', FOLDER_IMAGES."captain.png");
define('FOLDER_THOR', FOLDER_IMAGES."thor.png");
define('FOLDER_SPIDER', FOLDER_IMAGES."spiderman.png");
define('PAGE_INDEX', 'index.php');
define('PAGE_PICTURES', 'pictures.php');
define('PAGE_CONTACT', 'contact-us.php');

    function createPageHeader($Title){
        
        ?><html>
            <head>
             <meta charset=\"UTF-8\">
                <title><?php echo $Title; ?></title>
                <link rel="stylesheet" href="<?php echo FILE_CSS?>"   >
            </head>
            <body>
                <?php
                displayLogo();
                displayNavigationMenu();
                
    }
    function gallery(){
       ?> 
        <div class="gallery">
        <a target="_blank" href="<?php echo FOLDER_CAPTAIN ?>">
          <img src="<?php echo FOLDER_CAPTAIN ?>" alt="Cinque Terre" width="600" height="400">
        </a>
        <div class="desc">Captain</div>
      </div>

      <div class="gallery">
        <a target="_blank" href="<?php echo FOLDER_THOR ?>">
          <img src="<?php echo FOLDER_THOR ?>" alt="Forest" width="600" height="400">
        </a>
        <div class="desc">Hammer</div>
      </div>

      <div class="gallery">
        <a target="_blank" href="<?php echo FOLDER_SPIDER ?>">
          <img src="<?php echo FOLDER_SPIDER ?>" alt="Northern Lights" width="600" height="400">
        </a>
        <div class="desc">Makdi</div>
      </div>
<?php
    }
    function createPageFooter(){
       ?>
                <div class="footer">
                    <?php displayCopyright()?>
                </div>
            </body>
        </html>
        <?php
    }
    function displayLogo(){
        echo'<div class="header">';
        echo'<a href="#default" class="logo"><img src="'.FOLDER_LOGO.'"></a>';
        
    }
    function displayCopyright(){
        echo'<br><br><div id="copyright"><h3>&copy; Valay'.date("Y").'</h3></div>';
    }
    function displayNavigationMenu(){
                        

        echo '<div class="header-right">';
        echo '&nbsp;<a href="'.PAGE_INDEX.'">HOME</a>';
        echo '&nbsp;<a href="'.PAGE_PICTURES.'">PICTURES</a>';
        echo '&nbsp;<a href="'.PAGE_CONTACT.'">CONTACT US</a>';
        echo '</div>';
        echo '</div>';
        }
        
    function HomeSection(){
        echo '<div style="padding-left:20px">';
        echo '<h1>Avengers Body</h1>';
        echo '<p>Infinity War</p>';
        echo '<p></p>';
        echo '</div>';
    }
    