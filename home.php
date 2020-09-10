
<?php
    session_start(); 
    if (!isset($_COOKIE['user_login']) && !isset($_COOKIE['user_password'])) {
        header('Location: index.php');
    } 
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        
        unset($_SESSION["name"]);
        if (isset($_COOKIE["user_login"])) 
        { 
            setcookie("user_login", ""); 
        } 
        if (isset($_COOKIE["user_password"])) 
        { 
            setcookie("user_password", ""); 
        } 
        if (!isset($_SESSION["name"])) 
        { 
        header('Location: index.php');
        } 
          
    }
?>
<html>
    <body>
        <form method="POST" action="">
            <input type = "submit" name="submit" formaction=""/>
        </form>
    </body>
</html>