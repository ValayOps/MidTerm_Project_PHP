
<?php
session_start();
include 'DATA/database-connection.php';
include 'PHP/PHPFUNCTIONS.php';
include 'PHP/commonFunctions.php';
require_once "DATA/database-connection.php";
#the php file will shave the login information regarding the login and logout of user
$LoginError = "";
#Performing operation on the post button of login
if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

#validating the username and password with the function present    
    $primaryKey = loginClass::get_Password($username, $password);
    if ($primaryKey != "") {

        $LoginError = $primaryKey;
    } else {
        
    }
}
#calling logo method for displaying logo with text
createPageHeader('Avengers Login', '');
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
            Password:<br><input name="password" type="password"/><br/>
        </div> 
        <div class="form-group">
            <input name="submit" type="submit" value="login"/><br/>
        </div>
        <strong><font color=#CC0000>*<?php echo $LoginError; ?></font></strong>           
        <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
    </form>
</div>    

<?php
createPageFooter();
?>