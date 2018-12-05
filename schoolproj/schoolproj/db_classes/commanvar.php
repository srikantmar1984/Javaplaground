<?php

if(!isset($_SESSION)){ @session_start();}

// Database Setup
$HOST="localhost";//"172.27.128.148"; 
$PORT="3306"; // Default is 1521
$USER_NAME="root";
$PASSWORD="";
$SERVICE_NAME="wsr"; 

define("ORCL_HOST",$HOST);
define("ORCL_USER_NAME",$USER_NAME);
define("ORCL_PASSWORD",$PASSWORD);
define("ORCL_SERVICE_NAME",$SERVICE_NAME);


$hostpath='http://'.$_SERVER['SERVER_NAME'].'/schoolproj/';
define("HOST_PATH",$hostpath);

/*
The Below Code is used to avoid the user to access the direct page
for eg. if you set $ref=on in your page then the page must have to referer from another other wise it comes error 
suppose the page name is abc.php you set $ref=on for this page then it will not direct access it must have to be referer from another page 

*/
$referer=@$_SERVER['HTTP_REFERER'];
if($ref=="on") 
{
	if(empty($referer)) 
	{
		//die("Sorry You come the Wrong Place");
	}
}

if(isset($_SESSION['Logout']))
{
	unset($_SESSION['Logout']);
	//echo "<script>document.location.href='../workshopportal/index.php'</script>";
        echo "<script>document.location.href='login.php'</script>";
}
// Error On 
error_reporting(E_ALL);
@ini_set('display_errors', '1');
// End of Error
?>