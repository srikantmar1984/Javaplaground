<?php
if(!isset($_SESSION)){session_start();}

$ref='on';

include("db_classes/class.db.php");

if(trim($_POST['txtreguserid']))
{
    if(trim($_POST['txtreguser'])==""){
         header('Location: '."register.html?BlankName");
        return false;
    }
    if($_POST['txtregpass'] != $_POST['txtregrepass'])
    {
        header('Location: '."register.html?matchpass");
        return false;
    }
    $logRes = registeruser(trim($_POST['txtreguserid']),trim($_POST['txtreguser']),trim($_POST['txtregpass']),trim($_POST['txtregemail']),trim($_POST['txtregphone']));
    header('Location: '."register.html?".$logRes);
    
}
 else {
     header('Location: '."register.html?Blankuser");
}

function registeruser($userid,$userName,$userPass,$userEmail,$userPhone){
    $res = "Error";
    
    $sql = "INSERT INTO t_users ( tus_pno,tus_name,tus_dept_id,tus_email_id,tus_pass,tus_ext_no,tus_mobile_no,tus_act_flg ,tus_crt_by,tus_crt_ts,tus_upd_by,tus_upd_ts,tus_locn_id,tus_org_id,tus_unit_id) 
        VALUES ('".$userid."','".$userName."',1,'".$userEmail."',MD5('".$userPass."') ,0,".$userPhone.",0,NULL,SYSDATE(),NULL,SYSDATE(),1,1,1); ";
    
        $obj=new db_connect;
        $result= $obj->db_query($sql);
        
        return $result;
}


	
	
?>
