<?php 
 session_start();
// remove all the variables in the session, but not the session itself 
 session_unset(); 
 // destroy the session variables 
 session_destroy(); 
session_start();
 $_SESSION['Logout']="yes";
 header("Location: login.html");
?>