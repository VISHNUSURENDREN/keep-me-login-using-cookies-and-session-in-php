<?php 
session_start(); 

if (isset($_COOKIE['user_login']) && isset($_COOKIE['user_password'])) {
    $_SESSION["name"]=$_COOKIE['user_login'];
    header('Location: home.php');
} 
$connect = mysqli_connect("localhost", "root", "", "testing"); 
if ($_SERVER['REQUEST_METHOD']=='POST') 
{ 
    if (!empty($_POST["user_name"]) && !empty($_POST["user_password"])) 
    { 
        $name="hari";
        $password="baccha";
        // $name = mysqli_real_escape_string($connect, $_POST["user_name"]); 
        // $password = md5(mysqli_real_escape_string($connect, 
        //                                        $_POST["user_password"])); 
        // $sql = "Select * from login where name = '" . $name . " 
        //                            ' and password = '" . $password . "'"; 
        // $result = mysqli_query($connect, $sql); 

        if ($_POST["user_name"]== $name && $_POST["user_password"] == $password) 
        { 
            // Saving the username and password as cookies 
            if (!empty($_POST["rememberme"])) 
            { 

                // Username is stored as cookie for 10 years as 
                // 10years * 365days * 24hrs * 60mins * 60secs 
                setcookie("user_login", $name, time() + 
                                    (10 * 365 * 24 * 60 * 60)); 
  
                // Password is stored as cookie for 10 years as  
                // 10years * 365days * 24hrs * 60mins * 60secs 
                setcookie("user_password", $password, time() + 
                                    (10 * 365 * 24 * 60 * 60)); 
  
                // After setting cookies the session variable will be set 
                 
            } 
            else
            { 
                if (isset($_COOKIE["user_login"])) 
                { 
                    setcookie("user_login", ""); 
                } 
                if (isset($_COOKIE["user_password"])) 
                { 
                    setcookie("user_password", ""); 
                } 
            } 
            $_SESSION["name"] = $name; 
 
            header('Location: home.php'); 
        } 
        else
        { 
            $message = "Invalid Login Credentials"; 
        } 
    } 
    else
    { 
        $message = "Both are Required Fields. Please fill both the fields"; 
    } 
} 
?> 

<html>
    <body>
        <form method="POST" action="">
            <input type="text" id="user_name" name="user_name"/>
            <input type="password" id="user_password" name="user_password"/>
            <input type="checkbox" id="rememberme" name="rememberme" value="rememberme"/>
            <button type="submit" id="login" name="login" formaction="">LOgin</button>
        </form>
    </body>
</html>
