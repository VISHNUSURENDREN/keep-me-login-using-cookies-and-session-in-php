<?php 

 

if ($_SERVER['REQUEST_METHOD']=='POST') 
{ 
    session_start(); 
    
    if (!empty($_POST["user_name"]) && !empty($_POST["user_password"])) 
    { 
        $name="hari";
        $password="baccha";
        //$connect = mysqli_connect("localhost", "root", "", "testing");
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
                $_SESSION["name"] = $name; 
                header('Location: home.php'); 
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
                $_SESSION["name"] = $name; 
                header('Location: home.php'); 
            } 
            
 
            
        } 
        else
        { 
            echo"<script>alert('invalid detail');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        } 
    } 
    else
    { 
        $message = "Both are Required Fields. Please fill both the fields"; 
    } 
}
?>