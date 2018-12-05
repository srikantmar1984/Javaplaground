<?php
//If directory doesnot exists create it.
$output_dir = "docs/";
if(is_array($_FILES)) {
    if ($_FILES["userImage"]["error"] > 0) {
        echo "Error: " . $_FILES["userImage"]["error"] . "<br>";
    } 
    else 
        {
            if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
            $sourcePath = $_FILES['userImage']['tmp_name'];
            $targetPath = "docs/".$_FILES['userImage']['name'];
            if(move_uploaded_file($sourcePath,$targetPath)) {
            ?>
<img title="<?php echo $_FILES['userImage']['name']?>" src="<?php echo $targetPath; ?>" width="200px" height="200px" id="imgstud" />
            <?php
            }
            }
        }
    }
?>