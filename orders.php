<?php
    
    include 'PHP/PHPFUNCTIONS.php';
   
    createPageHeader("Avengers Shopping");
    HomeSection();
    ?>
    <?php 
    $retrieveData= file_get_contents("saved.txt");
        $retrieveData = json_decode($retrieveData, true);
  $data=10;
echo count($retrieveData);

		echo "<table border='1'>";

        foreach ($retrieveData[0] as $retrieveDatas) {
            foreach ($retrieveDatas as $key => $value) {
                    echo"<tr>".$key."</tr>";
                    echo"<td>".$value."</td>";
                    echo"</tr>";
            }
        }
		echo"</table>";	
    ?>    
    <?php
    createPageFooter();
    
   ?>