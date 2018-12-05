<?php
if(!isset($_SESSION)){session_start();}
$ref='on';
include 'schoolclass.php'; 
	
if($_REQUEST['act']=="filluserdtls")
{
    $obj=new db_connect;
    $strSql = " SELECT `tus_pno` ,`tus_name`,`tus_dept_id`,tm_value as dept_id,`tus_email_id`,`tus_mobile_no`,if(tus_act_flg='1','Active','InActive') as act_flg, tus_act_flg
                FROM `t_users`, t_mas_dtls 
                WHERE tm_mas_id = 6 AND tm_id = tus_dept_id ";
    if(!empty($_REQUEST['strUserID'])){
        $strSql .= "AND tus_pno = '".$_REQUEST['strUserID']."' ";
    }
    if(!empty($_REQUEST['userNM'])){
        $strSql .= "AND tus_name = '".$_REQUEST['userNM']."' ";
    }
    if(!empty($_REQUEST['email'])){
        $strSql .= "AND tus_email_id = '".$_REQUEST['email']."' ";
    }
    if(!empty($_REQUEST['dept'])){
        $strSql .= "AND tus_dept_id = '".$_REQUEST['dept']."' ";
    }
    if(!empty($_REQUEST['mobile'])){
        $strSql .= "AND tus_mobile_no = '".$_REQUEST['mobile']."' ";
    }
    if(!empty($_REQUEST['sts'])){
        $strSql .= "AND tus_act_flg = '".$_REQUEST['sts']."' ";
    }
    $strSql .= "            ORDER BY tm_slno ASC ";
    $result = $obj->db_query($strSql);
    $resdata = array();
    if(mysqli_num_rows($result) > 0 ){
       
        while($row = mysqli_fetch_array($result)) 
        {
            $data = array(
                            'userID' 		=> $row['tus_pno'],
                            'UserNM' 		=> $row['tus_name'],
                            'Email'            => $row['tus_email_id'],
                            'Dept'      	=> $row['dept_id'],
                            'mobile'      	=> $row['tus_mobile_no'],
                            'status'      	=> $row['act_flg'],
                            'statusID'      	=> $row['tus_act_flg'],
                            'deptID'      	=> $row['tus_dept_id'],
                            
            );
             array_push($resdata,$data);
        }
        echo json_encode($resdata);
    }
   else
   {
       echo "0";
   }
   
    
}

if($_REQUEST['act']=="itemdltsupd")
{
    $res="";
    $i=1;    
    $data = $_REQUEST['itemarr'];
   
           
        $strSql = "INSERT INTO t_mas_dtls (tm_id,tm_mas_id ,tm_slno,tm_value ,tm_dataType 
                ,tm_act_flg ,tm_crt_by ,tm_crt_ts ,tm_upd_by ,tm_upd_ts
                ,tm_locn_id,tm_org_id,tm_unit_id ) values  ";

        foreach($data as $key => $value){
            if($value['id']!='0')
            {
                $sql = "UPDATE t_mas_dtls SET tm_value  = '".$value['item']."',tm_slno ='".$value['slno']."' "
                        . ",tm_act_flg ='".$value['sts']."' , tm_upd_by ='".$_SESSION['Pno']."' "
                        . ",tm_upd_ts=SYSDATE() WHERE tm_mas_id ='".$_REQUEST['masitemID']."'  ";
                $obj3 = new db_connect;
                $res= $obj3->db_insert($sql);
            }
            else
            {
                //$scl = new school;
                $strID = $scl->getnextID("t_mas_dtls","tm_id");
                $strSql .= " ( '".$strID."','".$_REQUEST['masitemID']."'  ,'".$value['slno']."'  
                        ,'".$value['item']."' ,NULL 
                        ,'".$value['sts']."' 
                        ,'".$_SESSION['Pno']."' , SYSDATE() , '".$_SESSION['Pno']."' , SYSDATE(),1,1,1 ),";
            }
        }
        $strSql .= "#";
        $strSql = str_replace(",#",";" ,$strSql);

        $obj2 = new db_connect;
        $res= $obj2->db_insert($strSql);
    
    die($res);
}