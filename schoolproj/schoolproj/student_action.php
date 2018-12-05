<?php
if(!isset($_SESSION)){session_start();}
$ref='on';
include("db_classes/class.db.php");
	
	
                
if($_REQUEST['act'] == "createnew")
{
    $res="";
    $obj=new db_connect;
    $strSql = "Select count(ts_roll) From  t_student  WHERE ts_roll = '".$_REQUEST['rollno']."'  ";
    $result = $obj->db_query($strSql);
    if(mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_array($result)) 
        {
            if($row[0]>0)
            {
                    $res = "Student already exist...!";
            }
            else
            {
                    $strSql = "INSERT INTO t_student ( ts_roll  ,ts_gtpas_no ,ts_uniq_id 
                            ,ts_DOB ,ts_name,ts_email 
                            ,ts_contact1 ,ts_contact2 
                            ,ts_fathernm , ts_ocup_fath ,ts_cont_fath 
                            ,ts_mom_nm , ts_ocup_mom ,ts_cont_mom 
                            ,ts_currstatus , ts_act_flg ,ts_session
                            ,ts_crt_by , ts_crt_ts , ts_upd_by , ts_upd_ts 
                            , ts_locn_id , ts_org_id , ts_unit_id 
                            ,ts_maritial_sts,ts_med_flg , ts_relt_flg 
                            ,ts_deploy_flg ,ts_acadmy_flg ,ts_bank_flg , ts_app_flg
                            ) VALUES (
                            '".$_REQUEST['rollno']."'  ,'".$_REQUEST['gpNo']."' ,'".$_REQUEST['uniqueid']."' , STR_TO_DATE('".$_REQUEST['dob']."', '%Y-%m-%d') 
                             ,'".$_REQUEST['stuName']."' ,'".$_REQUEST['stuemail']."' 
                            ,'".$_REQUEST['cont1']."' ,'".$_REQUEST['cont2']."' 
                            
                            , '".$_REQUEST['fthNm']."' , '".$_REQUEST['fthOcp']."' , '".$_REQUEST['fthContNo']."' 
                            , '".$_REQUEST['mthNm']."' , '".$_REQUEST['mthOcp']."' , '".$_REQUEST['mthContNo']."' 
                            ,'".$_REQUEST['currSts']."' , '1' ,'".$_REQUEST['session']."'
                            ,'".$_SESSION['Pno']."' , SYSDATE() , '".$_SESSION['Pno']."' , SYSDATE() 
                            , '1' , '1' , '1' 
                            ,0,0 , 0 
                            ,0 ,0 ,0 ,0 ) ";
                    //$res=$strSql;
                    $obj1=new db_connect;
                    $res= $obj1->db_insert($strSql);
                   $res= "0";
            }
        }
    }

    die($res);
}
                
if($_REQUEST['act']=='photo')      
{
    
    
    $target_dir = "docs/";
    $source = $_REQUEST["photo"] ;
    $_REQUEST["photo"] = preg_replace('/[^a-zA-Z0-9_.]/', '#', $_REQUEST["photo"]);
    $file = explode('#',$_REQUEST["photo"]);
    
    $fileNM = $file[sizeof($file)-1];
    
    $target_file = $target_dir .$fileNM; 
    
    //if(isset($_FILES['file']['tmp_name'])){
        var_dump($_FILES);
   // }
    if (move_uploaded_file($fileNM, $target_file)) {
        echo "The file  has been uploaded.";
    } else {
        var_dump(error_get_last()) ;
    }
}
		
if($_REQUEST['act']=='photos')      
{
    	

}
?>