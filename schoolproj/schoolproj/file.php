<?php 
if(!isset($_SESSION)){session_start();}
$ref='on';

//include 'schoolclass.php'; 

   
$upload_dir = "docs/";
if (isset($_FILES["myfile"])) { 
// it is recommended to check file type and size here
    echo $_FILES["myfile"]["error"];
    
    if ($_FILES["myfile"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
    } else {
        move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_dir . $_FILES["myfile"]["name"]);
        //echo "Uploaded File :" . $_FILES["myfile"]["name"];
        echo "<pre>";
        print_r($_POST);
        print_r($_FILES);
    }
}
?>