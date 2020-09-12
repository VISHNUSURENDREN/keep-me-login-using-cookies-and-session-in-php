
<?php
    session_start();
    
    if (isset($_COOKIE["user_login"]) && isset($_COOKIE["user_password"])) {
            $_SESSION["name"]= $_COOKIE["user_login"];
        }  
    
          
    if (!isset($_SESSION["name"])) 
    { 
        header('Location: index.php');
    } 
    else
    {
?>
<html>
    <body>
        <form method="POST" action="logout.php">
            <input type = "submit" name="LOGOUT" formaction="logout.php"/>
        </form>
    </body>
</html>
<?php
}
?>