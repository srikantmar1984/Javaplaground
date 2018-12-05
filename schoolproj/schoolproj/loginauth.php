<?php
if(!isset($_SESSION)){session_start();}

$ref='on';

include("db_classes/class.db.php");

$userPass="";
if(trim($_POST['txtuser']))
{
    //echo  $_REQUEST['txtuser']."_".$_REQUEST['txtpass'];
    
    $logRes = loginAuth($_REQUEST['txtuser'],$_REQUEST['txtpass']);
    if($logRes == "Login")
    {
        header('Location: '."home.php");
    }
    else 
    {
        //$_post('varname') = $logRes;
        header('Location: '."login.html?".$logRes);
    }
}



function loginAuth($uid,$pwd)
{ 
 
                $res="Error";
               
	        $sql =" SELECT 
                            tus_pno PNo 
                            , tus_name UserName 
                            , tus_email_id EmailID 
                            , tus_act_flg
                        FROM  t_users 
                        WHERE  
                            tus_pno = '".$uid."'  
                            AND tus_pass = MD5('".$pwd."') " ;
                                            
                              
				$obj=new db_connect;
                                $result= $obj->db_query($sql);
                      
                                if(mysqli_num_rows($result) > 0 ){
				while($row = mysqli_fetch_array($result)) 
				{
                                        
				  	$_SESSION['Pno']=$row[0];
				 	$_SESSION['user_name'] = $row[1];
				  	$_SESSION['Email'] = $row[2];				
					
					if($row[3]=="1"){
                                           
                                            $res="Login";
                                        }
                                        else if($row[3]=="0")
                                            $res= 'InActive';
                                        else
                                            $res = 'Invalid';
                                    }
                                }
                                else
                                {
                                   $res = mysqli_num_rows($result) ;
                                   $res = 'Invalid';
                                }
                                
			                                      
			return $res;
}


	
	
?>
