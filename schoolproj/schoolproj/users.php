<?php include 'session_check.php'; include 'schoolclass.php'; ?>
<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">


  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Details        
      </h1>
   
    </section>

    <section class="content">
        
      <div class="box" id="divUserdtls" >
          
          <div class="box-body">
              <table class="col-md-12">
                  <tr>
                      <td class="col-md-4">
                          <lable>User ID</lable>
                          <input type="text" class="form-control" max="10" id="txtuserID">
                      </td>
                      <td class="col-md-4">
                          <lable>User Name</lable>
                          <input type="text" class="form-control" max="100" id="txtuserNM">
                      </td>
                      <td class="col-md-4">
                          <lable>Email</lable>
                          <input type="text" class="form-control" max="100" id="txtuserEmail">
                      </td>
                  </tr>
                  <tr>
                      <td class="col-md-4">
                          <lable>Department</lable>
                          <select ID="ddlDept" class="form-control" ><?php echo $scl->getDept(); ?></select>
                      </td>
                      <td class="col-md-4">
                          <lable>Mobile</lable>
                          <input type="text" class="form-control" max="10" id="txtMobile"></td>
                      <td class="col-md-4">
                            <lable>Status</lable>
                            <select ID="ddlStatus" class="form-control" >
                                      <option value="1" selected>Active</option>
                                      <option value="0">InActive</option>
                            </select>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="3" class="col-md-12" >
                          <button type="submit" class="btn btn-primary" onclick="searchUser()">Search</button>
                          <button type="submit" class="btn btn-primary" onclick="createUsr()">Create</button>
                      </td>
                  </tr>
              </table>
          </div>
          <div class="box-header with-border">
              <h5 class="box-title">Details</h5>
            </div>
          <div class="box">
              <table id="tblUser" class="table table-bordered table-hover">
                <thead>
                    <tr>
                      <th>Action</th>
                      <th>User ID</th>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Department</th>
                      <th>Mobile</th>
                      <th>Status</th>
                      
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
               
              </table>
          </div>
      </div>
      
     
    </section>
    
    </div>

<script>
function searchUser(){
   
    
    filluserdtls();
}

    
function clearuserdtls()
{
    $("#tblUser tbody").html(''); 
        $("#txtuserID").val('');
        $("#txtuserNM").val('');
        $("#txtuserEmail").val('');
        $("#txtMobile").val('');
        $("#ddlDept").val(0);
        $("#ddlStatus").val(0);
      
}

    
function filluserdtls()
{
    var newRowContent = "";
    $("#tblUser tbody").html('');
    var userID = $("#txtuserID").val();
    var userNM =    $("#txtuserNM").val();
    var email =    $("#txtuserEmail").val();
    var mobile =    $("#txtMobile").val();
    var dept =    $("#ddlDept option:selected").val();
    var sts =    $("#ddlStatus option:selected").val();
    alert(sts);
    $.post("users_action.php",
    {
       userID:userID,
       userNM:userNM,
       email:email,
       mobile:mobile,
       dept:dept,
       sts:sts,
        act:'filluserdtls'
    },function(data){
        if(data == "0")
        {
            alert("No data Found!")
            return false;
        }
      var result = jQuery.parseJSON(data);
      
      
      $.each(result,function(key,value){
          
          newRowContent += "<tr class=\"userList\">\n\
                            <td><button type=\"submit\" class=\"btn btn-primary\" onclick=\"fillUsr("+value['userID']+")\"><i class=\"ion ion-information\"></i></button></td>\n\
                            <td class=\"tdSlNo\">"+value['userID']+"</td>\n\
                            <td class=\"tdItem\">"+value['UserNM']+"</td>\n\
                            <td class=\"tdItem\">"+value['Email']+"</td>\n\
                            <td class=\"tdItem\" data-deptid="+value['deptID']+">"+value['Dept']+"</td>\n\\n\
                            <td class=\"tdItem\">"+value['mobile']+"</td>\n\
                            <td class=\"tdstatus\" data-val="+value['statusID']+">"+value['status']+"</td>\n\
                            </tr>";
      });
      
        $("#tblUser tbody").append(newRowContent); 
        
    });
} 

function createUsr()
{
    var itemarr = [];
    var masitemID = $("#masterItemID").val();
    
    $(".itemList").each(function(){
        //alert($(this).data('id'));
        //alert($(this).find('.tdstatus').data('val'));
        itemarr.push({				
                        'id'        : $(this).data('id'),
                        'slno'      : $(this).find('.tdSlNo').html(),
                        'item'      : $(this).find('.tdItem').html(),
                        'sts'       : $(this).find('.tdstatus').data('val')
                });
    });
    //console.log(itemarr);
  //return false;
    $.post("master_action.php", 
    {
        masitemID:masitemID,
        itemarr:itemarr,
        act:'itemdltsupd'
    }, function(data){

          alert(data);

    });
    
}    

function fillUsr(strUserID)
{
    clearuserdtls();
    
     $.post("users_action.php",
    {
       strUserID:strUserID,
        act:'filluserdtls'
    },function(data){
      var result = jQuery.parseJSON(data);
      
      
      $.each(result,function(key,value){
            $("#txtuserID").val(value['userID']);
            $("#txtuserNM").val(value['UserNM']);
            $("#txtuserEmail").val(value['Email']);
            $("#txtMobile").val(value['mobile']);
            $("#ddlDept").val(value['deptID']);
            $("#ddlStatus").val(value['statusID']);

      });
     
        
    });
}


    </script>
</body>
</html>