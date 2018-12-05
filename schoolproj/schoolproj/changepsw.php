<?php include 'session_check.php'; include 'schoolclass.php'; ?>
<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">


  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password      
      </h1>
   
    </section>
    
    <section class="content">
           <!-- Small boxes (Stat box) -->
      <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                
                  <table class="col-md-12">
                      <tr>
                          <td class="col-md-4">
                            <label>User ID</label>
                            <input type="text" class="form-control" maxlength="10" id="txtusrid" placeholder="Enter User ID" required >
                          </td>
                          </tr>
                      <tr>
                          <td class="col-md-4">
                            <label>Old Password</label>
                            <input type="password" class="form-control"  maxlength="10" id="txtoldpassword" placeholder="Enter Old Password" required >
                          </td>
                            </tr>
                      <tr>
                          <td class="col-md-4">
                            <label>New Password</label>
                            <input type="password" class="form-control" id="txtnewpass"  maxlength="10" placeholder="Enter New Password" required >
                          </td>
                      </tr>
                      <tr>
                          <td class="col-md-4">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="txtcnfpass"  maxlength="100" placeholder="Enter Confirm Password" required >
                          </td>
                          </tr>
                  </table>
               
              </div>
              <!-- /.box-body -->

             
            
        </div>
       
        <div class="box-footer">
            <button type="submit" class="btn btn-primary" onclick="updPassword()">Change</button>&nbsp;
            <button type="button" class="btn btn-primary" onclick="clearall()">Refresh</button>
            <div id="divcallout" position="absolute" style="display:none;" width ="300Px"></div>
        </div>
       
    </section>
    
    </div>

<script>
function updPassword()
{
    
    var ret = validate();
    if(ret==1)
    {
        var usrid = $("#txtusrid").val();
        var oldpassword = $("#txtoldpassword").val();
        var newpass = $("#txtnewpass").val();
        
        $.post("changepsw_action.php", 
                    {
                        usrid:usrid,
                        oldpassword:oldpassword,
                        newpass:newpass,
                        act:'cngPassword'
                    }, function(data){
						if(data!= "Error"){										   
			            $("#divcallout").addClass('callout callout-success');
                        $("#divcallout").html("<h4>Information!</h4><p>Password Updated Successfully.</p>");
                        $("#divcallout").fadeIn();
                        $("#divcallout").fadeOut(10000);
                        clearall();
                        }
                        else{
                            $("#divcallout").addClass('callout callout-danger');
                            $("#divcallout").html("<h4>Error!</h4><p>Error Occured. Kindly contact to administrator.</p>");
                            $("#divcallout").fadeIn();
                            $("#divcallout").fadeOut(10000);
                        }
                    });
    }

         
}


function clearall()
{
    $("#txtusrid").val(''); 
        $("#txtcnfpass").val('');
        $("#txtnewpass").val('');
        $("#txtoldpassword").val('');
      
}
 function validate()
 {

     if($("#txtusrid").val().length ==0 || $("#txtcnfpass").val().length ==0 || $("#txtnewpass").val().length ==0 || $("#txtoldpassword").val().length ==0){
        $("#divcallout").addClass('callout callout-danger');
        $("#divcallout").html("<h4>Warning!</h4><p>All Textbox are mandatory, kindly enter all details.</p>");
        $("#divcallout").fadeIn();
        $("#divcallout").fadeOut(5000);         
        return false;
     }
     
    if($("#txtnewpass").val() != $("#txtcnfpass").val())
     {
        $("#divcallout").addClass('callout callout-danger');
        $("#divcallout").html("<h4>Warning!</h4><p>New Password and Confirm password do not match</p>");
        $("#divcallout").fadeIn();
        $("#divcallout").fadeOut(10000);
        return false;
     }

     return "1";
 }
 


    </script>
</body>
</html>