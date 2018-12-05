<?php
if(!isset($_SESSION)){session_start();}

$ref='on';

include("db_classes/class.db.php");

if(trim($_POST['txtreguserid']))
{
    if(trim($_POST['txtreguserid'])==""){
         header('Location: '."getpassword.html?BlankName");
        return false;
    }
    if($_POST['txtregemail'] =="")
    {
        header('Location: '."getpassword.html?Blankemail");
        return false;
    }
    $logRes = updpass(trim($_POST['txtreguserid']),trim($_POST['txtregemail']));
    header('Location: '."getpassword.html?".$logRes);
    
}
 else {
     header('Location: '."register.html?Blankuser");
}

function updpass($userid,$userEmail){
        $res = "Error";
        $rndNo = mt_rand();
        $sql = "UPDATE t_users SET tus_pass = MD5('".$userid."') WHERE tus_pno ='".$userid."' ";

        $obj=new db_connect;
        $result= $obj->db_query($sql);
       $resp= "7";
       if($result=="1"){
        $resp= mailpsw($userid,$userEmail);
        }
        return $resp;
}
function mailpsw($userid,$userEmail)
{
$to = "srikant.mar1984@gmail.com";
$subject = "Test mail";
$message = "Hello! This is a test email message.";
$from = "skb283smart@gmail.com";
$headers = "From:" . $from;

mail($to,$subject,$message,$headers);

        /*
        $msg = "<p>Dear Sir/Madam,</p><br><br><h3> Your Edu World password is ". $userid."</h3><br><br><p>Regards,</p><p>Edu World</p>" ;

// use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

// send email
        */

        //$resp= mail($userEmail,"Edu World Password Reset",$msg);
        //return $resp;
}

	
	
?>
