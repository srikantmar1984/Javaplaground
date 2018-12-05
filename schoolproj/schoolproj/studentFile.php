
<?php include 'session_check.php'; include 'schoolclass.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Student Upload Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>

            .bgColor {
            width: 440px;
            height:100px;
            background-color: #F9D735;
            }
            .bgColor label{
            font-weight: bold;
            color: #A0A0A0;
            }
           
            #targetLayer{
            float:left;
            width:100px;
            height:100px;
            text-align:center;
            line-height:100px;
            font-weight: bold;
            color: #C0C0C0;
            background-color: #F0E8E0;
            overflow:auto;
            }
            #uploadFormLayer{
            float:left;
            padding: 10px;
            }
            .btnSubmit {
            background-color: #3FA849;
            padding:4px;
            border: #3FA849 1px solid;
            color: #FFFFFF;
            }
            .inputFile {
            padding: 3px;
            background-color: #FFFFFF;
            }

        </style>
    </head>
    <body>
        
        <div class="box-header with-border" style="border-width:5Px;">
            <section class="content-header">
                <h1>
                    Student Upload Details
                </h1>

            </section>
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Student's File Upload</h3>
                    </div>
                </div>
                        <table class="col-md-12">
                            <tr class="box">
                                <td class="col-md-3"></td>
                                <td class="col-md-3" style="text-align: right;">
                                    <label>Student's Roll No.</label>
                                </td>
                                <td class="col-md-3" style="text-align: left;">
                                    <imput type="text" id="txtfltRoll" placeholder="Enter Roll No to Search."></imput>
                                    <select id="studRollNo" name="studRollNo" >
                                        <?php echo $scl->getstudrollno(); ?>
                                    </select>
                                </td>
                                <td class="col-md-3"></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td colspan="4">
                                    <form id="uploadForm" action="upload.php" method="post">
                                        <div id="targetLayer" style="height:200Px; width:200Px;">No Image</div>
                                        <div id="uploadFormLayer">
                                        <label>Upload Image File:</label><br/>
                                        
                                        <input name="userImage" type="file" class="inputFile" />
                                        <input type="submit" value="Submit" class="btnSubmit" />
                                        </div>
                                        
                                    </form>
                                </td>
                            </tr>
                            <tr>
                            <td colspan="4">
                            <center>
                                <button id="savepic" class="btn bg-maroon margin" onclick="savepic()">Save Student Photograph</button>
                            </center>
                            </td>

                            </tr>
                        </table>
                </section>
        </div>

<script>

$(document).ready(function (e) {
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
                    url: "upload.php",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
		    {
			$("#targetLayer").html(data);
		    },
                    error: function() 
                    {
                        alert("Some Error Occured.")
                    } 	        
	   });
	}));
});
function savepic()
{
    var studimg = $("#imgstud").prop('title');
    var studimgpath = $("#imgstud").prop('src');
    var rollno = $("#studRollNo option:selected").val();
    //alert(studimgpath+ rollno);
    
 $.post("savephoto.php", 
                    {
                        rollno:rollno,
                        studimgpath:studimgpath,
                        studimg:studimg,
                        act:'photoupld'
                    }, function(data){
																		   
			  alert(data);
			   
			});
}
</script>  
    </body>
</html>

