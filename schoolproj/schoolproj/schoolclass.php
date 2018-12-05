<?php
if(!isset($_SESSION)){session_start();}

$ref='on';

include("db_classes/class.db.php");
class school{
    
    function getcode($masterID)
    {
        $res="<option value='0'>--Select--</option>";
        $strSql = "SELECT tm_id ,tm_value FROM t_mas_dtls WHERE tm_mas_id= '".$masterID."' ";
        $obj = new db_connect;
        $result = $obj->db_query($strSql);
        if(mysqli_num_rows($result) > 0 )
        {
            while($row = mysqli_fetch_array($result)) 
            {
                $res.="<option value=".$row[0].">".$row[1]."</option>";
            }
        }
        echo $res;
    }
    function getDept()
    {
        $res="<option value='0'>--Select--</option>";
        $strSql = "SELECT tm_id ,tm_value FROM t_mas_dtls WHERE tm_mas_id= '6' ";
        $obj = new db_connect;
        $result = $obj->db_query($strSql);
        if(mysqli_num_rows($result) > 0 )
        {
            while($row = mysqli_fetch_array($result)) 
            {
                $res.="<option value=".$row[0].">".$row[1]."</option>";
            }
        }
        echo $res;
    }
    function getTotstud()
    {
        $res="0";
        $strSql = "SELECT COUNT( * ) TOTSTUD FROM t_student ";
        $obj = new db_connect;
        $res = $obj->db_reader($strSql);
        
        return $res;
        
    }
    function getstudrollno()
    {
        
        $strSql = "SELECT ts_roll FROM t_student ";
        $res="<option value='0'>--Select--</option>";
        $obj = new db_connect;
        $result = $obj->db_query($strSql);
        if(mysqli_num_rows($result) > 0 )
        {
            while($row = mysqli_fetch_array($result)) 
            {
                $res.="<option value=".$row[0].">".$row[0]."</option>";
            }
        }
        echo $res;
        
    }
    
    function getnextID($tblNM,$colnm,$cond=NUll)
    {
        $resid="1";
        $strSql = "Select IFNULL(MAX(".$colnm.")+1,1) FROM ". $tblNM.$cond;
        $objid = new db_connect;
        $resid = $objid->db_reader($strSql);
        
        return $resid;
     }
     
     function getmasItem($masID)
     {
         $strSql = "SELECT tm_value, tm_id FROM t_mas_dtls WHERE ISNULL(  `tm_mas_id` ) ";
        $res="<option value='0'>--Select--</option>";
        $obj = new db_connect;
        $result = $obj->db_query($strSql);
        if(mysqli_num_rows($result) > 0 )
        {
            while($row = mysqli_fetch_array($result)) 
            {
                $res.="<option value=".$row[1].">".$row[0]."</option>";
            }
        }
        echo $res;
     }

     function setPhoto($rollno)
     {
        $res="";
        $strSql = "Select td_file_path FROM t_doc WHERE td_roll = '".$rollno."' AND td_act_flg = '1' ";
        $obj = new db_connect;
        $result = $obj->db_query($strSql);
        if(mysqli_num_rows($result) > 0 )
        {
            while($row = mysqli_fetch_array($result)) 
            {
                $res=$row[0];
            }
        }
        
        return $res;

     }
	
}
$scl = new school();
?>
