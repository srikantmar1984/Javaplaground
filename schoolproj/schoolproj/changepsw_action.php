<?php
if(!isset($_SESSION)){session_start();}
$ref='on';
include("db_classes/class.db.php");

if(isset($_REQUEST)){
    
    if($_REQUEST['act']=="cngPassword")
    {
        $res = "Error";
    
    $sql = " UPDATE t_users SET tus_pass= MD5('".$_REQUEST['newpass'] ."')  WHERE tus_pno ='". $_REQUEST['usrid']."' AND  tus_pass =MD5('".$_REQUEST['oldpassword'] ."')   AND tus_act_flg = 1 ";
    $obj=new db_connect;
    $result= $obj->db_query($sql);
    if($result==1)
       $res = "1"; 
    echo $res; exit(); 
    }
}

?>