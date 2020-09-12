<?php 

session_start();      
unset($_SESSION["name"]);
session_destroy();
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
    
?>