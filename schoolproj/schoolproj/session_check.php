<?php 
 	
	if(!isset($_SESSION)){session_start();}
	if(!isset($_SESSION['Pno']))
	{header("Location: login.html");}
?>