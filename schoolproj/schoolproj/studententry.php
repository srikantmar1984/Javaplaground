<?php 
include 'session_check.php'; include 'schoolclass.php'; ?>
<!DOCTYPE html>
<html>
    <head>
       
       
    <link href="bootstrap/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="bootstrap/js/jquery-1.12.4.js" type="text/javascript"></script>
    <script src="bootstrap/js/jquery-ui.js" type="text/javascript"></script>
 
    </head>
        
 
<body class="hold-transition skin-blue sidebar-mini">


  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student Entry        
      </h1>
   
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">General Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                  <table class="col-md-12">
                      <tr>
                          <td class="col-md-4">
                            <label>Roll No</label>
                            <input type="text" class="form-control" maxlength="10" id="txtRollNo" placeholder="Enter Roll No">
                          </td>
                          <td class="col-md-4">
                            <label>Unique ID</label>
                            <input type="text" class="form-control"  maxlength="10" id="txtuniqueid" placeholder="Enter Unique ID">
                          </td>
                          <td class="col-md-4">
                            <label>Gatepass No</label>
                            <input type="text" class="form-control" id="txtGPNo"  maxlength="10" placeholder="Enter Gatepass No">
                          </td>
                      </tr>
                      <tr>
                          <td class="col-md-4">
                            <label>Name</label>
                            <input type="text" class="form-control" id="txtstuName"  maxlength="100" placeholder="Enter Name">
                          </td>
                          <td class="col-md-4">
                            <label>Email address</label>
                            <input type="email" class="form-control" id="txtstuemail"  maxlength="100" placeholder="Enter email">
                          </td>
                          <td class="col-md-4">
                            
                                <label>Date of Birth</label>

                                  <input type="date" class="form-control" id="dob">
                          </td>
                      </tr>
                      <tr>
                          <td class="col-md-4">
                            <label>Contact No. 1</label>
                            <input type="number" class="form-control" id="txtcont1"   maxlength="10" placeholder="Enter contact no">
                          </td>
                          <td class="col-md-4">
                            <label>Session</label>
                            <select id="ddlsession" class="form-control" width="100%" >
                                <?php echo $scl->getcode("5"); ?>
                            </select>
                          </td>
                          <td class="col-md-4">
                            <label>Current Status</label><br/>
                            <select id="ddlsts" class="form-control" width="100%" >
                                <?php echo $scl->getcode("8"); ?>
                            </select>
                          </td>
                      </tr>
                      <tr>
                          <td class="col-md-4">
                            <label>Contact No. 2</label>
                            <input type="number" class="form-control" id="txtcont2"  maxlength="10" placeholder="Enter contact no">
                          </td>
                          
                      </tr>

                  </table>
               
              </div>
              <!-- /.box-body -->

             
            
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Parent Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <div class="box-body">
                  <table class="col-md-12">
                      <tr>
                          <td class="col-md-4">
                            <label>Father Name</label>
                            <input type="text" class="form-control"  maxlength="100" id="txtFthNm" >
                          </td>
                          <td class="col-md-4">
                            <label>Father's occupation</label>
                            <input type="text" class="form-control"  maxlength="100" id="txtFthOcp" >
                          </td>
                          <td class="col-md-4">
                            <label>Contact No</label>
                            <input type="text" class="form-control"  maxlength="10" id="txtFthContNo" >
                          </td>
                      </tr>
                      <tr>
                          <td class="col-md-4">
                            <label>Mother's Name</label>
                            <input type="text" class="form-control" maxlength="100"  id="txtMthNm">
                          </td>
                          <td class="col-md-4">
                            <label>Mother's occupation</label>
                            <input type="text" class="form-control" maxlength="100"  id="txtMthOcp" >
                          </td>
                          <td class="col-md-4">
                            <label>Contact No</label>
                            <input type="text" class="form-control"  maxlength="10" id="txtMthContNo" >
                          </td>
                      </tr>
                      </table>
            </div>
              <!-- /.box-body -->
          </div>

      
        <div class="box-footer">
            <button type="submit" class="btn btn-primary" onclick="gendltsCrt()">Create</button>&nbsp;
            <button type="button" class="btn btn-primary" onclick="clearall()">Refresh</button>
        </div>
      
    </section>
</div>

<!-- ./wrapper -->

<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
    
  function gendltsCrt()
  {
    var currSts = $("#ddlsts").val();
    var session = $("#ddlsession").val();
    var rollno = $("#txtRollNo").val();
    var uniqueid = $("#txtuniqueid").val();
    var gpNo = $("#txtGPNo").val();
    var stuName = $("#txtstuName").val();
    var stuemail = $("#txtstuemail").val();
    var dob = $("#dob").val();
    var cont1 = $("#txtcont1").val();
    var cont2 = $("#txtcont2").val();
    var fthNm = $("#txtFthNm").val();
    var fthOcp = $("#txtFthOcp").val();
    var fthContNo = $("#txtFthContNo").val();
    var mthNm = $("#txtMthNm").val();
    var mthOcp = $("#txtMthOcp").val();
    var mthContNo = $("#txtMthContNo").val();

    $.post("student_action.php", 
                    {
                        rollno:rollno,
                        uniqueid:uniqueid,
                        gpNo:gpNo,
                        stuName:stuName,
                        stuemail:stuemail ,
                        dob:dob,
                        cont1:cont1,
                        cont2:cont2,
                        fthNm:fthNm,
                        fthOcp:fthOcp,
                        fthContNo:fthContNo,
                        mthNm:mthNm,
                        mthOcp:mthOcp,
                        mthContNo:mthContNo,
                        currSts:currSts,
                        session:session,
                        act:'createnew'
                    }, function(data){
												if(data=="0"){
                          alert("New Record Added Successfully.");
                          clearall();
                        }
                        else{
                            alert(data);
                        }						   
			  
			   
			});
      
  }
    $(function() {
            //applydate("#dob");
          });
 /*   function applydate(element)
    {
        $(element).datepicker();
    }
*/

function clearall()
{
   $("#ddlsts").val(0);
   $("#ddlsession").val(0);
   $("#txtRollNo").val('');
   $("#txtuniqueid").val('');
   $("#txtGPNo").val('');
   $("#txtstuName").val('');
   $("#txtstuemail").val('');
   $("#dob").val('');
   $("#txtcont1").val('');
   $("#txtcont2").val('');
   $("#txtFthNm").val('');
   $("#txtFthOcp").val('');
   $("#txtFthContNo").val('');
   $("#txtMthNm").val('');
   $("#txtMthOcp").val('');
   $("#txtMthContNo").val('');
}

</script>

</body>


</html>


