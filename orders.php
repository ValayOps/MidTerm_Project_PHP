    <?php
    
    include 'PHP/PHPFUNCTIONS.php';
   
    createPageHeader("Avengers Shopping","");
    HomeSection();
    ?>
    <?php 
    #delcaring tax data
    $Quebectax=0.15;
    #extracting file data and decoding json data in an array.
    $InvokeData= file_get_contents("saved.txt");
    $InvokeData = json_decode($InvokeData, true);

  
#echo count($InvokeData);
#var_dump($InvokeData);
    
    #calling table header columns
    table_header();
    
    #iterating json array data thorugh foreach and index
        foreach ($InvokeData as $InvokeDatas) {
            
            echo "<tr>";
            echo "<td>".$InvokeDatas[0]["code"]."</td>";
            echo "<td>".$InvokeDatas[0]["fname"]."</td>";
            echo "<td>".$InvokeDatas[0]["lname"]."</td>";
            echo "<td>".$InvokeDatas[0]["city"]."</td>";
             
            echo "<td>".$InvokeDatas[0]["comments"]."</td>";
            echo "<td>".$InvokeDatas[0]["price"]."</td>";
            echo "<td>".$InvokeDatas[0]["quantity"]."</td>";

            echo "<td>".$subTotal=$InvokeDatas[0]["price"]*$InvokeDatas[0]["quantity"]."$</td>";
            echo "<td>".$taxAmount=$InvokeDatas[0]["price"]*$InvokeDatas[0]["quantity"]*($Quebectax)."$</td>";
            echo "<td>".(($InvokeDatas[0]["price"]*$InvokeDatas[0]["quantity"])+($InvokeDatas[0]["price"]*$InvokeDatas[0]["quantity"]*($Quebectax)))."$</td>";
            echo "</tr>";
        } 
       #calling the table footer
		table_footer();	
    ?>    
    <?php
    #calling the page footer
    createPageFooter();
    
   ?>