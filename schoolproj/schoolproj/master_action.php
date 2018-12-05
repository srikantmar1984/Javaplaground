<?php
if(!isset($_SESSION)){session_start();}
$ref='on';
include 'schoolclass.php'; 
	
if($_REQUEST['act']=="fillitemdtls")
{
    $obj=new db_connect;
    $strSql = " SELECT tm_id, tm_slno, tm_value,  IF( tm_act_flg =  '1',  'Active',  'InActive' ) AS tm_act,tm_act_flg FROM t_mas_dtls WHERE tm_mas_id =  '".$_REQUEST['masitemID']."' ORDER BY tm_slno ASC ";
    
   //echo $strSql;exit();
    $result = $obj->db_query($strSql);
    $resdata = array();
    if(mysqli_num_rows($result) > 0 ){
       
        while($row = mysqli_fetch_array($result)) 
        {
             
            $data = array(
                            'id' 		=> $row['tm_id'],
                            'Slno' 		=> $row['tm_slno'],
                            'ItemNM'            => $row['tm_value'],
                            'status'      	=> $row['tm_act'],
                            'statusID'      	=> $row['tm_act_flg'],
                            
            );
             array_push($resdata,$data);
        }
    }
   
    echo json_encode($resdata);
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