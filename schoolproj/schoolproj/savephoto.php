<?php include 'schoolclass.php';

  if(isset($_POST['rollno'])) {
  
    
$id = $scl->getnextID('t_doc','td_id');

$sql = "UPDATE t_doc SET `td_act_flg`= '0', `td_upd_by`='".$_SESSION['Pno']."', `td_upd_ts`=SYSDATE() WHERE  td_roll = '".$_POST['rollno']."' ";
        $obj=new db_connect;
        $res1= $obj->db_insert($sql);

$sql = "INSERT INTO t_doc(`td_id`, `td_doc_nm`, `td_file_path`, `td_roll`, `td_act_flg`, `td_crt_by`, `td_crt_ts`, `td_upd_by`, `td_upd_ts`, `td_doc_type`) 
        VALUES ('".$id."','".$_POST['studimg']."'
        ,'".$_POST['studimgpath']."','".$_POST['rollno']."','1'
        ,'".$_SESSION['Pno']."',SYSDATE(),'".$_SESSION['Pno']."',SYSDATE(),'Photo')";
        $obj1=new db_connect;
        $res= $obj1->db_insert($sql);
  echo "Data saved Successfully.";
  } else {
    echo "Error Occured during data saving.";
  }
?>