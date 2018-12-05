<?php include 'schoolclass.php';
if(!isset($_SESSION)){session_start();}
$ref='on';
include_once("db_classes/class.db.php");
	
if($_REQUEST['act']=="searchdtls")
{
    $obj=new db_connect;
    $strSql = " SELECT ts_roll, ts_name	 ,ts_email ,IFNULL((SELECT tm_value FROM t_mas_dtls WHERE tm_id = ts_session ),'') AS ts_session ,IFNULL(ts_contact1,'') as ts_contact1,IFNULL(tm_value,'') as currstatus ,ts_act_flg  ,IFNULL (tmd_gender,'') as tmd_gender ,IFNULL (tmd_blood_grp,'') as tmd_blood_grp
           FROM t_student INNER JOIN t_mas_dtls ON ts_currstatus  = tm_id LEFT OUTER JOIN t_med_dtls  ON ts_roll = tmd_roll WHERE 1 = 1 ";
    
    if($_REQUEST['fltName']!=''){
        $strSql .=" AND UPPER(ts_name)  LIKE '%".$_REQUEST['fltName']."%' ";
    }
    if($_REQUEST['rollno']!=''){
        $strSql .=" AND  ts_roll =  '".$_REQUEST['rollno']."'  ";
    }
    if($_REQUEST['fltsession']!='0'){
        $strSql .=" AND  ts_session =  '".$_REQUEST['fltsession']."'  ";
    }
    if($_REQUEST['fltbldgrp']!=''){
        $strSql .=" AND  tmd_blood_grp =  '".$_REQUEST['fltbldgrp']."'  ";
    }
    if($_REQUEST['fltstudgender']!=''){
        $strSql .=" AND  tmd_gender =  '".$_REQUEST['fltstudgender']."'  ";
    }
    
    if($_REQUEST['fltstatus']!='0'){
        $strSql .=" AND  ts_currstatus =  '".$_REQUEST['fltstatus']."'  ";
    }
   
    $result = $obj->db_query($strSql);
    $resdata = array();
    if(mysqli_num_rows($result) > 0 ){
        //var_dump($result);
        while($row = mysqli_fetch_array($result)) 
        {
             
            $data = array(
                            'rollno' 		=> $row['ts_roll'],
                            'name' 		=> $row['ts_name'],
                            'email'             => $row['ts_email'],
                            'session'      	=> $row['ts_session'],
                            'currstatus'           => $row['currstatus'],
                            'gender'               => $row['tmd_gender'],
                            'contact1'          => $row['ts_contact1'],
                            'blood_grp'          => $row['tmd_blood_grp']
            );
             array_push($resdata,$data);
        }
    }
   
    echo json_encode($resdata);
}

if($_REQUEST['act']=="fillgendtls")
{
    
    $obj=new db_connect;
    $strSql = "SELECT ts_name	 ,ts_email ,ts_gtpas_no ,ts_uniq_id ,DATE_FORMAT(ts_DOB,'%Y-%m-%d') dob,ts_maritial_sts "
            . ",ts_contact1 ,ts_contact2 ,ts_fathernm ,ts_ocup_fath ,ts_cont_fath ,ts_mom_nm ,ts_ocup_mom	 "
            . ",ts_cont_mom ,ts_currstatus ,ts_act_flg ,ts_med_flg	 ,ts_relt_flg	 ,ts_deploy_flg "
            . ",ts_acadmy_flg ,ts_bank_flg,ts_app_flg, ts_session "
            . " FROM t_student WHERE ts_roll =  '".$_REQUEST['rollno']."'  ";
    $result = $obj->db_query($strSql);
    $data = array();
    if(mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_array($result)) 
        {
        //    var_dump($row);
            $data = array(
                            'name' 		=> $row['ts_name'],
                            'email'             => $row['ts_email'],
                            'gtpas_no'      	=> $row['ts_gtpas_no'],
                            'uniq_id'           => $row['ts_uniq_id'],
                            'dob'               => $row['dob'],
                            'contact1'          => $row['ts_contact1'],
                            'contact2'          => $row['ts_contact2'],
                            'maritial_sts' 	=> $row['ts_maritial_sts'],
                            'bank_flg'          => $row['ts_bank_flg'],
                            'app_flg'          => $row['ts_app_flg'],
                            'acadmy_flg' 	=> $row['ts_acadmy_flg'],
                            'deploy_flg' 	=> $row['ts_deploy_flg'],
                            'relt_flg'          => $row['ts_relt_flg'],
                            'med_flg'           => $row['ts_med_flg'],
                            'act_flg'           => $row['ts_act_flg'],
                            'currstatus' 	=> $row['ts_currstatus'],
                            'sessionstatus' 	=> $row['ts_session'],
                            'fathernm'          => $row['ts_fathernm'],
                            'ocup_fath'         => $row['ts_ocup_fath'],
                            'cont_fath'         => $row['ts_cont_fath'],
                            'mom_nm'            => $row['ts_mom_nm'],
                            'ocup_mom'          => $row['ts_ocup_mom'],
                            'cont_mom'          => $row['ts_cont_mom']
            );
        }
    }
    
    echo json_encode($data);
}
 
if($_REQUEST['act']=="fillMeddtls")
{
    array() ;
    $obj=new db_connect;
    $strSql = "SELECT tmd_gender ,tmd_height ,tmd_weight ,tmd_blood_grp ,tmd_prsnt_add ,tmd_pin_code ,tmd_nationality "
            . ",tmd_prmnt_add FROM t_med_dtls WHERE tmd_roll =  '".$_REQUEST['rollno']."' AND tmd_act_flg = '1' ";
    $result = $obj->db_query($strSql);
    $data = array();
    if(mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_array($result)) 
        {
        
            $data = array(
                            'gender' 		=> $row['tmd_gender'],
                            'height'            => $row['tmd_height'],
                            'weight'      	=> $row['tmd_weight'],
                            'blood_grp'         => $row['tmd_blood_grp'],
                            'prsnt_add'         => $row['tmd_prsnt_add'],
                            'pin_code'          => $row['tmd_pin_code'],
                            'nationality'       => $row['tmd_nationality'],
                            'prmnt_add' 	=> $row['tmd_prmnt_add'],
                            
            );
        }
    }
    
    echo json_encode($data);
}

if($_REQUEST['act']=="fillReldtls")
{
    
    $obj=new db_connect;
    $strSql = "SELECT tr_relt_nm ,tr_relt_desg ,tr_relt_dept ,tr_workarea ,tr_contact_no FROM t_relative WHERE tr_roll =  '".$_REQUEST['rollno']."' AND tr_act_flg = '1' ";
    $result = $obj->db_query($strSql);
    $resdata = array();
    if(mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_array($result)) 
        {
        
            $data = array(
                            'relt_nm' 		=> $row['tr_relt_nm'],
                            'relt_desg'            => $row['tr_relt_desg'],
                            'relt_dept'      	=> $row['tr_relt_dept'],
                            'workarea'         => $row['tr_workarea'],
                            'contact_no'         => $row['tr_contact_no'],
                            
                            
            );
            array_push($resdata,$data);
        }
    }
    
    echo json_encode($resdata);
}

if($_REQUEST['act']=="fillacdmydtls")
{
    
    $obj=new db_connect;
    $strSql = "SELECT tpa_std ,	tpa_board,tpa_school ,tpa_dvsn ,tpa_percnt ,tpa_certf_id FROM t_prev_academy WHERE tpa_roll =  '".$_REQUEST['rollno']."' AND tpa_act_flg = '1' ";
    $result = $obj->db_query($strSql);
    $resdata = array();
    if(mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_array($result)) 
        {
        
            $data = array(
                            'discp'     => $row['tpa_std'],
                            'board'     => $row['tpa_board'],
                            'school'     => $row['tpa_school'],
                            'division'  => $row['tpa_dvsn'],
                            'per'       => $row['tpa_percnt'],
                            'certNo'    => $row['tpa_certf_id'],
                          );
            array_push($resdata,$data);
        }
    }
    
    echo json_encode($resdata);
}




if($_REQUEST['act'] == "acdmdltsupd")
{
$res="";
   $data= array();

   $data = $_REQUEST['acdmarr'];
   
            $strSql = " UPDATE t_student SET  ts_upd_by ='".$_SESSION['Pno']."', ts_upd_ts=SYSDATE(),ts_acadmy_flg = 1 WHERE  ts_roll = '".$_REQUEST['rollno']."' ";
            $obj1=new db_connect;
            $res1= $obj1->db_insert($strSql);
            
          
            $strSql = "DELETE From  t_prev_academy  WHERE tpa_roll = '".$_REQUEST['rollno']."'  ";
            $objdel=new db_connect;
            $resdel= $objdel->db_insert($strSql);

            $strSql = "INSERT INTO t_prev_academy ( 	tpa_roll ,	tpa_slno ,	tpa_std ,	tpa_board ,	tpa_dvsn 
                        ,	tpa_percnt ,	tpa_certf_id ,	tpa_act_flg ,tpa_school
                        ,	tpa_crt_by , 	tpa_crt_ts , 	tpa_upd_by , 	tpa_upd_ts) VALUES ";
            $i=1;
            foreach($data as $key => $value){
            $strSql .= " ( '".$_REQUEST['rollno']."'  ,'".$i++."'  
                    ,'".$value['discp']."' ,'".$value['board']."' 
                    ,'".$value['division']."' ,'".$value['per']."' 

                    , '".$value['certNo']."' ,  '1' ,'".$value['school']."' 
                    ,'".$_SESSION['Pno']."' , SYSDATE() , '".$_SESSION['Pno']."' , SYSDATE() ),";
            }
            $strSql .= "#";
            $strSql = str_replace(",#",";" ,$strSql);
            
            $obj2 = new db_connect;
            $res= $obj2->db_insert($strSql);
    
    die($res);
}

if($_REQUEST['act'] == "relativedltsupd")
{
    $res="";
   
    $data = $_REQUEST['membersvalues'];
   
            $strSql = " UPDATE t_student SET  ts_upd_by ='".$_SESSION['Pno']."', ts_upd_ts=SYSDATE(),ts_relt_flg = 1 WHERE  ts_roll = '".$_REQUEST['rollno']."' ";
            $obj1=new db_connect;
            $res1= $obj1->db_insert($strSql);
            
           
            $strSql = "DELETE From  t_relative  WHERE tr_roll = '".$_REQUEST['rollno']."'  ";
            $objdel=new db_connect;
            $resdel= $objdel->db_insert($strSql);

            $strSql = "INSERT INTO t_relative ( 	tr_roll ,	tr_slno ,	tr_relt_nm ,	tr_relt_desg ,	tr_relt_dept 
                        ,	tr_workarea	 ,	tr_contact_no ,	tr_act_flg 
                        ,	tr_crt_by	 , 	tr_crt_ts , 	tr_upd_by	 , 	tr_upd_ts )VALUES";
            $i=1;
            foreach($data as $key => $value){
            $strSql .= "( 
                    '".$_REQUEST['rollno']."'  ,'".$i++."'  
                    ,'".$value['relNM']."' ,'".$value['desg']."' 
                    ,'".$value['dept']."' ,'".$value['workArea']."' 

                    , '".$value['contNo']."' ,  '1' 
                    ,'".$_SESSION['Pno']."' , SYSDATE() , '".$_SESSION['Pno']."' , SYSDATE() 
                    ),";
            }
            $strSql .= "#";
            $strSql = str_replace(",#",";" ,$strSql);
            
            $obj2 = new db_connect;
            $res= $obj2->db_insert($strSql);
    
    die($res);
}


if($_REQUEST['act']=="filldeployhist")
{
    
    $obj=new db_connect;
    $strSql = "SELECT td_dep_area , td_dep_code  , td_dep_line ,IFNULL(DATE_FORMAT(td_dep_date,'%d-%M-%Y'),'')  td_dep_date , IFNULL(DATE_FORMAT(td_dep_upto,'%d-%M-%Y'),'') td_dep_upto 
                        , td_supv_name , td_mgm_name  
                        FROM t_deployment WHERE td_roll =  '".$_REQUEST['rollno']."' AND td_act_flg = '0' ";
    $result = $obj->db_query($strSql);
    $resdata = array();
    if(mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_array($result)) 
        {
        
            $data = array(
                            'Area' 		=> $row['td_dep_area'],
                            'Code'            => $row['td_dep_code'],
                            'Deployment_Date'      	=> $row['td_dep_date'],
                            'Deployment_Upto'         => $row['td_dep_upto'],
                            'Supervisor_Name'         => $row['td_supv_name'],
                            'Managers_Name'         => $row['td_mgm_name'],
                            
                            
            );
            array_push($resdata,$data);
        }
    }
    
    echo json_encode($resdata);
}
if($_REQUEST['act']=="filldeployDtls")
{
    array() ;
    $obj=new db_connect;
    $strSql = "SELECT td_dep_area , td_dep_code , td_dep_type , td_dep_line ,DATE_FORMAT(td_dep_date,'%Y-%m-%d')  td_dep_date , DATE_FORMAT(td_dep_upto,'%Y-%m-%d') td_dep_upto 
                        , td_supv_name , td_sup_cont , td_sup_email , td_mgm_name , td_mgm_cont , td_mgm_email 
                        FROM t_deployment WHERE td_roll =  '".$_REQUEST['rollno']."' AND td_act_flg = '1' ";
    $result = $obj->db_query($strSql);
    $data = array();
    if(mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_array($result)) 
        {
        
            $data = array(
                            'dep_area' 		=> $row['td_dep_area'],
                            'dep_code'            => $row['td_dep_code'],
                            'dep_type'      	=> $row['td_dep_type'],
                            'dep_line'         => $row['td_dep_line'],
                            'dep_date'         => $row['td_dep_date'],
                            'dep_upto'          => $row['td_dep_upto'],
                            'supv_name'       => $row['td_supv_name'],
                            'sup_cont' 	=> $row['td_sup_cont'],
                            'sup_email'         => $row['td_sup_email'],
                            'mgm_name'          => $row['td_mgm_name'],
                            'mgm_cont'       => $row['td_mgm_cont'],
                            'mgm_email' 	=> $row['td_mgm_email'],
                            
            );
        }
    }
    
    echo json_encode($data);
}

if($_REQUEST['act']=='setPhoto'){
    echo $scl->setPhoto($_REQUEST['rollno']);
}


if($_REQUEST['act'] == "deploydltsupd")
{
$res="";
    $obj=new db_connect;
    $strSql = "Select  ifnull( Max( td_slno ) , 0 ) as maxVal From  t_deployment  WHERE td_roll = '".$_REQUEST['rollno']."'  ";
    $result = $obj->db_query($strSql);
    if(mysqli_num_rows($result) > 0 ){
        
        while($row = mysqli_fetch_array($result)) 
        {
            $strSql = " UPDATE t_student SET  ts_upd_by ='".$_SESSION['Pno']."', ts_upd_ts=SYSDATE(),ts_deploy_flg = 1 WHERE  ts_roll = '".$_REQUEST['rollno']."' ";
            $obj1=new db_connect;
            $res1= $obj1->db_insert($strSql);
            
            $slno = 1;
            if($row[0]>0)
            {
            
                $strSql = " Update t_deployment SET td_upd_by ='".$_SESSION['Pno']."',td_upd_ts= SYSDATE() 
                         ,td_act_flg = '0'  WHERE td_roll ='".$_REQUEST['rollno']."' AND td_slno='".$row[0]."' ";
                $slno =++$row[0];
                $objupd=new db_connect;
                $res= $objupd->db_insert($strSql);  

            }
            
            $strSql = "INSERT INTO t_deployment(td_roll,td_slno , td_dep_area , td_dep_code , td_dep_type , td_dep_line , td_dep_date , td_dep_upto 
                        , td_supv_name , td_sup_cont , td_sup_email , td_mgm_name , td_mgm_cont , td_mgm_email , td_act_flg
                        , td_crt_by , td_crt_ts , td_upd_by , td_upd_ts
                        ) VALUES ( 
                        '".$_REQUEST['rollno']."',$slno  ,'".$_REQUEST['deplArea']."'  
                            ,'".$_REQUEST['deplCode']."' ,'".$_REQUEST['deplType']."' 
                            ,'".$_REQUEST['deplLine']."' , STR_TO_DATE('".$_REQUEST['deptlDate']."', '%Y-%m-%d')
                            , STR_TO_DATE('".$_REQUEST['deptlUpto']."', '%Y-%m-%d') ,'".$_REQUEST['deplSupNM']."'
                            , '".$_REQUEST['deplcontSup']."' , '".$_REQUEST['deplemailSup']."' , '".$_REQUEST['deplMgmNM']."' 
                             , '".$_REQUEST['deplcontMgm']."' , '".$_REQUEST['deplemailMgm']."' , '1' 
                            ,'".$_SESSION['Pno']."' , SYSDATE() , '".$_SESSION['Pno']."' , SYSDATE() ) ";
            
            $obj2=new db_connect;
            $res= $obj2->db_insert($strSql);
        }
    }

    die($res);
}

if($_REQUEST['act'] == "medcaldltsupd")
{
$res="";
    $obj=new db_connect;
    $strSql = "Select count(tmd_roll) From  t_med_dtls  WHERE tmd_roll = '".$_REQUEST['rollno']."'  ";
    $result = $obj->db_query($strSql);
    if(mysqli_num_rows($result) > 0 ){
        
        while($row = mysqli_fetch_array($result)) 
        {
            $strSql = " UPDATE t_student SET  ts_upd_by ='".$_SESSION['Pno']."', ts_upd_ts=SYSDATE(),ts_med_flg = 1 WHERE  ts_roll = '".$_REQUEST['rollno']."' ";
            $obj1=new db_connect;
            $res1= $obj1->db_insert($strSql);
            
            $objhgt=new db_connect;
            $heigth = $objhgt->specialchar($_REQUEST['heigth']);
            
            if($row[0]>0)
            {
                    $strSql = "Update t_med_dtls SET tmd_upd_by ='".$_SESSION['Pno']."',tmd_upd_ts= SYSDATE() ,tmd_gender='".$_REQUEST['gender']."' "
                            . ",tmd_height='".$heigth."' ,tmd_weight= '".$_REQUEST['Weight']."',tmd_blood_grp='".$_REQUEST['bldGrp']."' 
                        ,tmd_prsnt_add='".$_REQUEST['prsntAdd']."' ,tmd_pin_code='".$_REQUEST['pin']."' ,tmd_nationality= '".$_REQUEST['nationality']."'"
                            . ",tmd_prmnt_add='".$_REQUEST['prmtAdd']."' WHERE tmd_roll ='".$_REQUEST['rollno']."' ";
            }
            else
            {
                    $strSql = "INSERT INTO t_med_dtls ( tmd_roll ,tmd_gender ,tmd_height ,tmd_weight ,tmd_blood_grp 
                        ,tmd_prsnt_add ,tmd_pin_code ,tmd_nationality ,tmd_prmnt_add ,tmd_act_flg 
                        ,tmd_crt_by ,tmd_crt_ts ,tmd_upd_by ,tmd_upd_ts 
                        ) VALUES ( 
                        '".$_REQUEST['rollno']."'  ,'".$_REQUEST['gender']."' ,'".$heigth."' 
                            ,'".$_REQUEST['Weight']."' ,'".$_REQUEST['bldGrp']."' 
                            ,'".$_REQUEST['prsntAdd']."' ,'".$_REQUEST['pin']."' 
                            
                            , '".$_REQUEST['nationality']."' , '".$_REQUEST['prmtAdd']."' , '1' 
                            ,'".$_SESSION['Pno']."' , SYSDATE() , '".$_SESSION['Pno']."' , SYSDATE() 
                            ) ";
                   
                   
            }
             //$res=$strSql;
            $obj2=new db_connect;
            $res= $obj2->db_insert($strSql);
        }
    }

    die($res);
}


if($_REQUEST['act'] == "prntdltsupd")
{
  $res="";
    
  $strSql = " UPDATE t_student SET  ts_upd_by ='".$_SESSION['Pno']."', ts_upd_ts=SYSDATE() "
            . ",  ts_fathernm ='".$_REQUEST['fthNm']."', ts_ocup_fath ='".$_REQUEST['fthOcp']."'
                ,ts_cont_fath = '".$_REQUEST['fthContNo']."' ,ts_mom_nm= '".$_REQUEST['mthNm']."' 
                , ts_ocup_mom ='".$_REQUEST['mthOcp']."' ,ts_cont_mom='".$_REQUEST['mthContNo']."' WHERE  ts_roll = '".$_REQUEST['rollno']."' ";
     //exit();
     $obj1=new db_connect;
     $res= $obj1->db_insert($strSql);
     if(error_get_last())
     {
         $res="Error Occured While updating!";
     }
     else
     {
         $res="Record Updataed successfully.";
     }
    echo $res;
}


if($_REQUEST['act'] == "editGenDtls")
{
    $res="Record Updataed successfully.";
    
                    $strSql = " UPDATE t_student SET ts_upd_by ='".$_SESSION['Pno']."', ts_upd_ts=SYSDATE(),  ts_gtpas_no ='".$_REQUEST['gpNo']."' ,ts_uniq_id ='".$_REQUEST['uniqueid']."'
                            ,ts_DOB = STR_TO_DATE('".$_REQUEST['dob']."', '%Y-%m-%d') ,ts_name = '".$_REQUEST['stuName']."',ts_email ='".$_REQUEST['stuemail']."'
                            ,  ts_session = '".$_REQUEST['stusesssion']."',ts_contact1='".$_REQUEST['cont1']."' ,ts_contact2 = '".$_REQUEST['cont2']."' , ts_maritial_sts = '".$_REQUEST['martsts']."' "
                            
                            . "WHERE  ts_roll = '".$_REQUEST['rollno']."' ";
                    
                    $obj1=new db_connect;
                    $res= $obj1->db_insert($strSql);
                    if(error_get_last())
                    {
                        $res="Error Occured While updating!";
                    }
                   
          

    echo $res;
}
                
	
if($_REQUEST['act']=="fillBankDtls")
{
    array() ;
    $obj=new db_connect;
    $strSql = "SELECT tb_bankNm	, tb_ac_no	, tb_branch , tb_stu_name	, tb_ifsc_code 
                        FROM t_bank WHERE tb_roll =  '".$_REQUEST['rollno']."'  ";
    $result = $obj->db_query($strSql);
    $data = array();
    if(mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_array($result)) 
        {
        
            $data = array(
                            'bankNM' 		=> $row['tb_bankNm'],
                            'aCNo'            => $row['tb_ac_no'],
                            'branch'      	=> $row['tb_branch'],
                            'bankStuNM'         => $row['tb_stu_name'],
                            'ifsc'         => $row['tb_ifsc_code'],
                            
                            
            );
        }
    }
    
    echo json_encode($data);
}


if($_REQUEST['act'] == "bankdltsupd")
{
$res="";
    $obj=new db_connect;
    $strSql = "Select count(tb_roll) From  t_bank  WHERE tb_roll = '".$_REQUEST['rollno']."'  ";
    $result = $obj->db_query($strSql);
    if(mysqli_num_rows($result) > 0 ){
        
        while($row = mysqli_fetch_array($result)) 
        {
            $strSql = " UPDATE t_student SET  ts_upd_by ='".$_SESSION['Pno']."', ts_upd_ts=SYSDATE(),ts_bank_flg = 1 WHERE  ts_roll = '".$_REQUEST['rollno']."' ";
            $obj1=new db_connect;
            $res1= $obj1->db_insert($strSql);
            
            
            if($row[0]>0)
            {
                    $strSql = " Update t_bank SET td_upd_by ='".$_SESSION['Pno']."',td_upd_ts= SYSDATE() 
                        ,tb_bankNm='".$_REQUEST['bankNM']."'	, tb_ac_no='".$_REQUEST['aCNo']."'
                        , tb_branch='".$_REQUEST['branch']."'	
                        , tb_stu_name='".$_REQUEST['bankStuNM']."'	, tb_ifsc_code='".$_REQUEST['ifsc']."'
                        WHERE tb_roll ='".$_REQUEST['rollno']."' ";
                    
            }
            else
            {
                    $strSql = "INSERT INTO t_bank(	tb_roll	, tb_bankNm	, tb_ac_no	, tb_branch	
                        , tb_stu_name	, tb_ifsc_code	
                        , tb_crt_by	, tb_crt_ts	, tb_upd_by	, tb_upd_ts
                        ) VALUES ( 
                        '".$_REQUEST['rollno']."'  ,'".$_REQUEST['bankNM']."'  
                            ,'".$_REQUEST['aCNo']."' ,'".$_REQUEST['branch']."' 
                            ,'".$_REQUEST['bankStuNM']."'  , '".$_REQUEST['ifsc']."' 
                            ,'".$_SESSION['Pno']."' , SYSDATE() , '".$_SESSION['Pno']."' , SYSDATE() ) ";
            }
            $obj2=new db_connect;
            $res= $obj2->db_insert($strSql);
        }
    }

    die($res);
}

if($_REQUEST['act'] == "appdltsupd")
{
$res="";
    $obj=new db_connect;
    $strSql = "Select count(tad_roll) From  t_application_dtls  WHERE tad_roll = '".$_REQUEST['rollno']."'  ";
    $result = $obj->db_query($strSql);
    if(mysqli_num_rows($result) > 0 ){
        
        while($row = mysqli_fetch_array($result)) 
        {
            $strSql = " UPDATE t_student SET  ts_upd_by ='".$_SESSION['Pno']."', ts_upd_ts=SYSDATE(),ts_app_flg = 1 WHERE  ts_roll = '".$_REQUEST['rollno']."' ";
            $obj1=new db_connect;
            $res1= $obj1->db_insert($strSql);
            
            
            if($row[0]>0)
            {
                    $strSql = " Update t_application_dtls SET tad_upd_by ='".$_SESSION['Pno']."',tad_upd_ts= SYSDATE() 
                        ,tad_Application='".$_REQUEST['application']."'	, tad_med_refno='".$_REQUEST['medref']."'
                        , tad_med_date=STR_TO_DATE('".$_REQUEST['medDate']."','%Y-%m-%d')	
                        , tad_batch_no='".$_REQUEST['batch']."'	, tad_religion='".$_REQUEST['relgion']."',
                        tad_category='".$_REQUEST['category']."',tad_med_sts = '".$_REQUEST['med_sts']."'
                        ,tad_high_quali='".$_REQUEST['Hqualification']."', tad_DOJ=STR_TO_DATE('".$_REQUEST['doj']."', '%Y-%m-%d') 
                        WHERE tad_roll ='".$_REQUEST['rollno']."' ";
                    
            }
            else
            {
                    $strSql = "INSERT INTO t_application_dtls(
                                    tad_roll
                                ,	tad_Application
                                ,	tad_med_refno
                                ,	tad_med_date
                                ,	tad_batch_no
                                ,	tad_religion
                                ,	tad_category
                                ,	tad_high_quali
                                ,	tad_DOJ
                                ,   tad_med_sts
                                ,	tad_act_flg
                                ,	tad_crt_by
                                , 	tad_crt_ts
                                , 	tad_upd_by
                                , 	tad_upd_ts)
                                VALUES ( 
                                '".$_REQUEST['rollno']."'  
                                ,'".$_REQUEST['application']."'  
                                ,'".$_REQUEST['medref']."' 
                                , STR_TO_DATE('".$_REQUEST['medDate']."', '%Y-%m-%d') 
                                ,'".$_REQUEST['batch']."'  
                                , '".$_REQUEST['relgion']."' 
                                , '".$_REQUEST['category']."' 
                                , '".$_REQUEST['Hqualification']."' 
                                , STR_TO_DATE('".$_REQUEST['doj']."', '%Y-%m-%d')
                                , '".$_REQUEST['med_sts']."' 
                                , '1' 
                                ,'".$_SESSION['Pno']."' 
                                , SYSDATE() 
                                , '".$_SESSION['Pno']."' 
                                , SYSDATE() ) ";
            }
            
            $obj2=new db_connect;
            $res= $obj2->db_insert($strSql);
        }
    }

    die($res);
}


if($_REQUEST['act']=="fillAppdtls")
{
    array() ;
    $obj=new db_connect;
    $strSql = "SELECT 	tad_Application
                                ,	tad_med_refno
                                ,	DATE_FORMAT(tad_med_date,'%Y-%m-%d') tad_med_date
                                ,	tad_batch_no
                                ,	tad_religion
                                ,	tad_category
                                ,	tad_high_quali
                                ,	DATE_FORMAT(tad_DOJ,'%Y-%m-%d') tad_DOJ , tad_med_sts
                        FROM t_application_dtls WHERE tad_roll =  '".$_REQUEST['rollno']."'  ";
    $result = $obj->db_query($strSql);
    $data = array();
    if(mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_array($result)) 
        {

            $data = array(
                            'Application' => $row['tad_Application'],
                            'med_refno'   => $row['tad_med_refno'],
                            'med_date'    => $row['tad_med_date'],
                            'batch_no'    => $row['tad_batch_no'],
                            'religion'    => $row['tad_religion'],
                            'category'    => $row['tad_category'],
                            'high_quali'  => $row['tad_high_quali'],
                            'DOJ'         => $row['tad_DOJ'],
                            'med_sts'     => $row['tad_med_sts']
            );
        }
    }
    
    echo json_encode($data);
}



if($_REQUEST['act']=="statusReport")
{
    $obj=new db_connect;

    $strSql = " SELECT ts_roll, ts_name	 ,IFNULL(ts_email,'') ts_email ,IFNULL((SELECT tm_value FROM t_mas_dtls WHERE tm_id = ts_session ),'') AS ts_session ,IFNULL(ts_contact1,'') as ts_contact1 ,IFNULL(tm_value,'') as currstatus ,ts_act_flg  ,IFNULL (tmd_gender,'') as tmd_gender ,IFNULL (tmd_blood_grp,'') as tmd_blood_grp,
                    IFNULL(DATE_FORMAT(tad_DOJ, '%Y-%m-%d'),'') as tad_DOJ,  IFNULL(IF(ts_maritial_sts = '1', 'Yes', 'No'),'')  as maritial_sts,IFNULL( UPPER(tad_religion),'') as religion ,IFNULL((SELECT tm_value FROM t_mas_dtls WHERE tm_id = tad_category ),'') as category
                FROM t_student INNER JOIN t_mas_dtls ON ts_currstatus  = tm_id LEFT OUTER JOIN t_med_dtls  ON ts_roll = tmd_roll 
                    LEFT OUTER JOIN t_application_dtls  ON ts_roll = tad_roll AND tad_act_flg = '1'
                WHERE 1 = 1 ";
    
    if($_REQUEST['fltreligion']!=''){
        $strSql .=" AND UPPER(tad_religion)  LIKE '%".$_REQUEST['fltreligion']."%' ";
    }
    if($_REQUEST['fltcat']!='0'){
        $strSql .=" AND  tad_category =  '".$_REQUEST['fltcat']."'  ";
    }
    if($_REQUEST['fltsession']!='0'){
        $strSql .=" AND  ts_session =  '".$_REQUEST['fltsession']."'  ";
    }
    if($_REQUEST['fltbldgrp']!=''){
        $strSql .=" AND  tmd_blood_grp =  '".$_REQUEST['fltbldgrp']."'  ";
    }
    if($_REQUEST['fltstudgender']!=''){
        $strSql .=" AND  tmd_gender =  '".$_REQUEST['fltstudgender']."'  ";
    }
    
    if($_REQUEST['fltstatus']!='0'){
        $strSql .=" AND  ts_currstatus =  '".$_REQUEST['fltstatus']."'  ";
    }
    if($_REQUEST['fltstudmariage']!=''){
        $strSql .=" AND  ts_maritial_sts =  '".$_REQUEST['fltstudmariage']."'  ";
    }

    if($_REQUEST['fltAdminFrom']!=''){
        $strSql .=" AND  date(tad_DOJ) >=  '".$_REQUEST['fltAdminFrom']."'  ";
    }
    if($_REQUEST['fltAdminTo']!=''){
        $strSql .=" AND  date(tad_DOJ) <=  '".$_REQUEST['fltAdminTo']."'  ";
    }

    //print($strSql); exit;
    $result = $obj->db_query($strSql);
    $resdata = array();
    if(mysqli_num_rows($result) > 0 ){
       // var_dump($result);exit;
        while($row = mysqli_fetch_array($result)) 
        {
             
            $data = array(
                    'rollno' 		=> $row['ts_roll'],
                    'name' 		    => $row['ts_name'],
                    
                    'session'      	=> $row['ts_session'],
                    'currstatus'    => $row['currstatus'],
                    'gender'        => $row['tmd_gender'],
                    
                    'blood_grp'     => $row['tmd_blood_grp'],
                    'Category'      => $row['category'],
                    'JoiningDate'   => $row['tad_DOJ'],
                    'Religion'      => $row['religion'],
                    'Marital'       => $row['maritial_sts']
            );
            array_push($resdata,$data);
        }
    }
   
    echo json_encode($resdata);
}

?>