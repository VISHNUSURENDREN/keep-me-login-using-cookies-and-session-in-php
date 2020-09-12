<?php 
session_start(); 
if (isset($_SESSION["name"])) 
{ 
header('Location: home.php');
} 
elseif (isset($_COOKIE['user_login']) && isset($_COOKIE['user_password'])) {
    header('Location: home.php');
}
else
{

?> 

<html>
    <body>
        <form method="POST" action="login.php">
            <input type="text" id="user_name" name="user_name"/>
            <input type="password" id="user_password" name="user_password"/>
            <input type="checkbox" id="rememberme" name="rememberme" value="rememberme"/>
            <button type="submit" id="login" name="login" formaction="login.php">LOgin</button>
        </form>
    </body>
</html>
<?php
}
?>