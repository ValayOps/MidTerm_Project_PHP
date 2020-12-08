
<?php
session_start();
include 'DATA/database-connection.php';
include 'PHP/PHPFUNCTIONS.php';
include 'PHP/commonFunctions.php';
require_once "DATA/database-connection.php";

if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $password=$_POST['password'];

  $primaryKey=loginClass::get_Password($username,$password);
  if($primaryKey!=null){
      $_SESSION['loggedin']=true;
      $_SESSION['loggedUser']=$primaryKey;
      
      header('location: Home.php');
  }
  else{
      echo "";
  }
 
}     
           #calling logo method for displaying logo with text
    createPageHeader('Avengers Login','');
    displayLogo();
    displayNavigationMenuWithout(); 
    HomeSection();  
?>

        <div>
            <h2>Login</h2>
            <p>Please fill in your credentials to login.</p>
        <form action="#" method="post">
           <div class="form-group"> 
               Username:<br>
                <input name="username" type="text"/><br/>
           </div>
            
           <div class="form-group"> 
            Password:<br><input name="password" type="text"/><br/>
           </div> 
           <div class="form-group">
            <input name="submit" type="submit" value="login"/><br/>
           </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
        </div>    

<?php
createPageFooter();

?>