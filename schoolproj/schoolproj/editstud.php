<?php include 'session_check.php'; include 'schoolclass.php'; ?>
<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">


  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Student Details        
      </h1>
   
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box-header with-border" style="border-width:5Px;">
                    
                        <table class="col-md-12">
                            <tr >
                                <td class="col-md-4" >
                                    <label>Student's Roll No.</label>
                                </td>
                                <td class="col-md-4" >
                                    <select id="studRollNo" name="studRollNo" >
                                        <?php echo $scl->getstudrollno(); ?>
                                    </select>
                                </td>
                                <td class="col-md-4" >
                                    <button onclick="seachstu()" >Search</button>
                                </td>
                            </tr>
                        </table>
                    </div>
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
                            <input type="text" class="form-control" maxlength="10" id="txtRollNo" placeholder="Enter Roll No" disabled>
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

                                  <input type="date" class="form-control"  maxlength="10" id="dob">
                               
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
                          <td class="col-md-4">
                            <label>Marital Status</label>
                         
                            <input type="radio" name="martial"  id="rdbmatyes" value="Yes">Yes &nbsp;
                            <input type="radio" name="martial"  id="rdbmatno" value="No" checked="checked"> No
                        </td>
                      </tr>
                  </table>
               
              </div>
              <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary" onclick="gendltsupd()">Update</button>
        </div>
            
            
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
            <div class="box-footer">
                <button type="submit" class="btn btn-primary" onclick="prntdltsupd()">Update</button>
            </div>
          </div>
      
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Status Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
           <div class="box-body">
                <table class="col-md-12">
                    <tr>
                        <td class="col-md-4">
                            <label>Application Status</label>
                         
                            <input type="radio" name="Application"  id="rdbappyes" value="Yes"  onclick="appcheck()" >Yes &nbsp;
                            <input type="radio" name="Application"  id="rdbappno" value="No" checked="checked"  onclick="appcheck()" > No
                        </td>
                        <td class="col-md-4">
                            <label>Medical Status</label>
                          
                            <input type="radio" name="Medical"  id="rdbmedyes" onclick="medcheck()" value="Yes">Yes &nbsp;
                            <input type="radio" name="Medical"  id="rdbmedno" onclick="medcheck()" value="No" checked="checked"> No
                          </td>
                        <td class="col-md-4">
                            <label>Academic Status</label>
                          
                            <input type="radio" name="acmd"  id="rdbacmdyes" onclick="acdmcheck()" value="Yes">Yes &nbsp;
                            <input type="radio" name="acmd"  id="rdbacmdno" onclick="acdmcheck()" value="No" checked="checked"> No
                          </td>
                    </tr>
                    <tr>
                        <td class="col-md-4">
                            <label>Relative Status</label>
                            <input type="radio" name="Relative"  id="rdbrelyes" onclick="relcheck()" value="Yes">Yes &nbsp;
                            <input type="radio" name="Relative"  id="rdbrelno" onclick="relcheck()" value="No" checked="checked"> No
                        </td>
                        <td class="col-md-4">
                            <label>Deployment Status</label>
                            <input type="radio" name="Deployment"  id="rdbdeployyes" onclick="deploycheck()"  value="Yes">Yes &nbsp;
                            <input type="radio" name="Deployment"  id="rdbdeployno" onclick="deploycheck()" value="No" checked="checked"> No
                        </td>
                        <td class="col-md-4">
                            <label>Bank Status</label>
                            <input type="radio" name="bank"  id="rdbbankyes" onclick="bankcheck()" value="Yes">Yes &nbsp;
                            <input type="radio" name="bank"  id="rdbbankyno" onclick="bankcheck()" value="No" checked="checked"> No
                        </td>
                    </tr>
                </table>
               
            </div>
            
        </div>


        <div class="box box-primary" id="divAppdtls" style="display:none;">
            <div class="box-header with-border">
              <h3 class="box-title">Application Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                  <table class="col-md-12">
                      <tr>
                          <td class="col-md-4">
                            <label>Application No</label>
                            <input type="text" class="form-control"  maxlength="10" id="txtApplcation" placeholder="">
                          </td>
                          <td class="col-md-4">
                            <label>Med ref no</label>
                            <input type="text" class="form-control"  maxlength="10" id="txtMedref" placeholder="">
                          </td>
                          <td class="col-md-4">
                            <label>Med Ref Date</label>
                            <input type="date" class="form-control" id="txtMedDate"  maxlength="12" placeholder="" >
                          </td>
                      </tr>
                      <tr>
                          <td class="col-md-4">
                            <label>Batch No</label>
                            <input type="text" class="form-control"  maxlength="10" id="txtBatch" placeholder="">
                          </td>
                          <td class="col-md-4">
                            <label>Religion</label>
                            <input type="text" class="form-control"  maxlength="20" id="txtrelig" placeholder="">
                            
                          </td>
                          <td class="col-md-4">
                            <label>Category</label>
                            <select id="ddlCat" class="form-control" width="100%" >
                                <?php echo $scl->getcode("9"); ?>
                            </select>
                          </td>
                      </tr>
                      <tr>
                          <td class="col-md-4"><div class="form-group">
                            <label>Highest Qualification </label>           
                                <input type="text" class="form-control"  maxlength="20" id="txtHQali" placeholder="">
                            
                            
                          </td>
                          <td class="col-md-4">
                            <label>Date of Joining</label>
                            <input type="date" class="form-control"  maxlength="10" id="txtDOJ" placeholder="">
                          </td>
                          <td class="col-md-4">
                            <label>Medical Status</label>
                            <select id="ddlMedSts" class="form-control" width="100%" >
                                <?php echo $scl->getcode("10"); ?>
                            </select>
                          </td>
                      </tr>
                  </table>
               
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" onclick="appdltsupd()">Update</button>
            </div>

             
            
        </div>

      <div class="box box-primary" id="divMeddtls" style="display:none;">
            <div class="box-header with-border">
              <h3 class="box-title">Medical Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                  <table class="col-md-12">
                      <tr>
                          <td class="col-md-4">
                            <label>Sex</label>
                            <input type="radio" name="sex" id="rdbMale" value="Male" checked>Male 
                            <input type="radio" name="sex" id="rdbFemale" value="Female">Female
                          </td>
                          <td class="col-md-4">
                            <label>Height</label>
                            <input type="text" class="form-control"  maxlength="5" id="txtheight" placeholder="">
                          </td>
                          <td class="col-md-4">
                            <label>Weight</label>
                            <input type="text" class="form-control" id="txtweight"  maxlength="3" placeholder="">
                          </td>
                      </tr>
                      <tr>
                          <td class="col-md-4">
                            <label>Blood Group</label>
                            <input type="text" class="form-control"  maxlength="3" id="txtbldGrp" placeholder="">
                          </td>
                          <td class="col-md-4">
                            <label>Present Address</label>
                            <textarea id="txtPrsntAdd" class="form-control" maxlength="500"></textarea>
                          </td>
                          <td class="col-md-4">
                            <label>Pin-Code</label>
                            <input type="text" class="form-control" id="txtpin"  maxlength="7" placeholder="">
                          </td>
                      </tr>
                      <tr>
                          <td class="col-md-4"><div class="form-group">
                <label>Permanent Address same as above             
                    <input type="checkbox" id="chksameAdd" class="checkbox" onchange="addresscheck()">
                </label></div>
                          </td>
                          <td class="col-md-4">
                            <label>Permanent Address</label>
                            <textarea id="txtPrmtAdd" class="form-control" maxlength="500"></textarea>
                          </td>
                          <td class="col-md-4">
                            <label>Nationality</label>
                            <input type="text" class="form-control" id="txtNationality"  maxlength="10" value="Indian">
                          </td>
                      </tr>
                  </table>
               
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" onclick="medcaldltsupd()">Update</button>
            </div>

             
            
        </div>
      
      <div class="box box-primary" id="divAcdmdtls" style="display:none;">
            <div class="box-header with-border">
              <h3 class="box-title">Academic Details</h3>
            </div>
          
          
            <div class="box-body">
              <table id="tblacdm" class="table table-bordered table-hover">
                <thead>
                    <tr>
                      
                      <th>Discipline</th>
                      <th>Board</th>
                      <th>School/College</th>
                      <th>Division</th>
                      <th>Percentage</th>
                      <th>Certificate No</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                    <tr>
                      
                      <td><input type="text" class="form-control" max="20" id="txtDiscipline"></td>
                      <td><input type="text" class="form-control" max="30" id="txtboard"></td>
                      <td><input type="text" class="form-control" max="50" id="txtschool"></td>
                      <td><input type="text" class="form-control" max="3" id="txtDivision"></td>
                      <td><input type="text" class="form-control" max="3" id="txtper"></td>
                      <td><input type="text" class="form-control" max="10" id="txtCertNo"></td>
                      <td><a href="#" onclick="addAcdmrow()">Add</a> </td>
                    </tr>
                </tfoot>
              </table>
            </div>
          <div class="box-footer">
                <button type="submit" class="btn btn-primary" onclick="acadmydltsupd()">Update</button>
            </div>
      </div>
      
      
      <div class="box box-primary" id="divReldtls" style="display:none;">
            <div class="box-header with-border">
              <h3 class="box-title">Relative Details</h3>
            </div>
          
          
            <div class="box-body">
              <table id="tblrel" class="table table-bordered table-hover">
                <thead>
                    <tr>
                      
                      <th>Relative name</th>
                      <th>Designation</th>
                      <th>Department</th>
                      <th>Work-Area</th>
                      <th>Contact No</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                    <tr>
                      
                      <td><input type="text" class="form-control" id="txtRelNM"></td>
                      <td><input type="text" class="form-control" id="txtDesg"></td>
                      <td><input type="text" class="form-control" id="txtDept"></td>
                      <td><input type="text" class="form-control" id="txtworkArea"></td>
                      <td><input type="text" class="form-control" id="txtContNo"></td>
                      <td><a href="#" onclick="addrow()">Add</a> </td>
                    </tr>
                </tfoot>
              </table>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary" onclick="relativedltsupd()">Update</button>
            </div>
      </div>
      
    <div class="box box-primary" id="divDeploydtls" style="display:none;">
        <div class="box-header with-border">
          <h3 class="box-title">Deployment Details</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

          <div class="box-body">

              <table class="col-md-12">
                  <tr>
                      <td class="col-md-4">
                        <label>Area</label>
                        <input type="text" class="form-control" maxlength="10" id="txtDeplArea" placeholder="">
                      </td>
                      <td class="col-md-4">
                        <label>Code</label>
                        <input type="text" class="form-control"  maxlength="10" id="txtDeplCode" placeholder="">
                      </td>
                      <td class="col-md-4">
                        <label>Type</label>
                        <input type="text" class="form-control" id="txtDeplType"  maxlength="10" placeholder="">
                      </td>
                  </tr>
                  <tr>
                      <td class="col-md-4">
                        <label>Line</label>
                        <input type="text" class="form-control" id="txtDeplLine"  maxlength="100" placeholder="">
                      </td>
                      <td class="col-md-4">
                        
                            <label>Deployment Date</label>

                            
                              <input type="date" class="form-control"  maxlength="10" id="deptlDate">
                            
                      </td>
                      <td class="col-md-4">
                        
                            <label>Deployment Upto</label>
                            <input type="date" class="form-control"  maxlength="10" id="deptlUpto">
                           
                      </td>
                  </tr>
                  <tr>
                      <td class="col-md-4">
                        <label>Supervisor's Name</label>
                        <input type="text" class="form-control" id="txtDeplSupNM"  maxlength="100" placeholder="">
                      </td>
                      <td class="col-md-4">
                        <label>Contact No.</label>
                        <input type="text" class="form-control" id="txtDeplcontSup"   maxlength="10" placeholder="">
                      </td>
                      <td class="col-md-4">
                        <label>Email</label>
                        <input type="email" class="form-control" id="txtDeplemailSup"  maxlength="100" placeholder="">
                      </td>

                  </tr>
                  <tr>
                      <td class="col-md-4">
                        <label>Managers's Name</label>
                        <input type="text" class="form-control" id="txtDeplMgmNM"  maxlength="100" placeholder="">
                      </td>
                      <td class="col-md-4">
                        <label>Contact No.</label>
                        <input type="text" class="form-control" id="txtDeplcontMgm"   maxlength="10" placeholder="">
                      </td>
                      <td class="col-md-4">
                        <label>Email</label>
                        <input type="email" class="form-control" id="txtDeplemailMgm"  maxlength="100" placeholder="">
                      </td>

                  </tr>

              </table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary" onclick="deploydltsupd()">Update</button>
        </div>
    </div>
      
    <div class="box box-primary" id="divbankdtls" style="display:none;">
        <div class="box-header with-border">
            <h3 class="box-title">Bank Details</h3>
        </div>
            <!-- /.box-header -->
            <!-- form start -->
            
        <div class="box-body">
            <table class="col-md-12">
                <tr>
                    <td class="col-md-4">
                      <label>Bank Name</label>
                      <input type="text" class="form-control" maxlength="10" id="txtBankNM" placeholder="">
                    </td>
                    <td class="col-md-4">
                      <label>Account No</label>
                      <input type="text" class="form-control"  maxlength="20" id="txtACNo" placeholder="">
                    </td>
                    <td class="col-md-4">
                      <label>Branch</label>
                      <input type="text" class="form-control" id="txtBranch"  maxlength="50" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td class="col-md-4">
                      <label>Student Name (as in Passbook)</label>
                      <input type="text" class="form-control" id="txtbankStuNM"  maxlength="100" placeholder="">
                    </td>
                    <td class="col-md-4">
                      <label>IFSC code</label>
                      <input type="text" class="form-control" id="txtifsc"  maxlength="20" placeholder="">
                    </td>

                </tr>

            </table>
      </div>
      <div class="box-footer">
          <button type="submit" class="btn btn-primary" onclick="bankdltsupd()">Update</button>
      </div>
    </div>

    </section>
</div>

<script>
    
    
function seachstu()
{
    var studRoll = $("#studRollNo").val();
    if(studRoll== 0)
    {
        alert("Kindly select student first.");
        return false;
    }
    
    fillgendtls(studRoll);   
}


function fillgendtls(studRoll)
{
    $.post("editstud_action.php",
    {
        rollno:studRoll,
        act:'fillgendtls'
    },function(data){
        
      
      var result = jQuery.parseJSON(data);
      
      $("#txtRollNo").val(studRoll);
      $("#txtuniqueid").val(result['uniq_id']);
      $("#txtGPNo").val(result['gtpas_no']);
      $("#dob").val(result['dob']);
      $("#txtstuName").val(result['name']);
      $("#txtstuemail").val(result['email']);
      $("#txtcont1").val(result['contact1']);
      $("#txtcont2").val(result['contact2']);
      $("#ddlsts").val(result['currstatus']).prop('selected',true);
      
      $("#ddlsession").val(result['sessionstatus']).prop('selected',true);
      $("#txtFthNm").val(result['fathernm']);
      $("#txtFthOcp").val(result['ocup_fath']);
      $("#txtFthContNo").val(result['cont_fath']);
      $("#txtMthNm").val(result['mom_nm']);
      $("#txtMthOcp").val(result['ocup_mom']);
      $("#txtMthContNo").val(result['cont_mom']);
       
    if(result['maritial_sts']==1){
      $("#rdbmatyes").prop('checked', true);
       
    }
    if(result['deploy_flg']==1){
        $("#rdbdeployyes").prop('checked', true);
        filldeployDtls(studRoll);
    }
    else
    {
        $("#rdbdeployno").prop('checked', true);  
        cleardeployDtls();
    }
    deploycheck();
    
    if(result['relt_flg']==1){
        $("#rdbrelyes").prop('checked', true);

        fillReldtls(studRoll);
    }
    else
    {
        $("#rdbrelno").prop('checked', true);
        
        clearReldtls();
    }
    relcheck();
    
    if(result['acadmy_flg']==1){
        $("#rdbacmdyes").prop('checked', true);
        fillacdmydtls(studRoll);
    }
    else
    {
        $("#rdbacmdno").prop('checked', true);
        clearAcdmdtls();
    }
    acdmcheck();
    
    if(result['med_flg']==1){
        $("#rdbmedyes").prop('checked', true);
        fillMeddtls(studRoll);
    }
    else
    {
        $("#rdbmedno").prop('checked', true);
       
        clearMeddtls();
    }
     medcheck();


    if(result['app_flg']==1){
        $("#rdbappyes").prop('checked', true);
        fillAppdtls(studRoll);
    }
    else
    {
        $("#rdbappno").prop('checked', true);
       
        clearAppdtls();
    }
     appcheck(); 
     
    if(result['bank_flg']==1){
        $("#rdbbankyes").prop('checked', true);
        fillBankDtls(studRoll);
    }
    else
    {
        $("#rdbbankno").prop('checked',true);
        clearBankDtls();
    }
    bankcheck();
    
    });
}   

function fillMeddtls(studRoll)
{
    $.post("editstud_action.php",
    {
        rollno:studRoll,
        act:'fillMeddtls'
    },function(data){
      var result = jQuery.parseJSON(data);
    
      $("#txtheight").val(result['height']);
      $("#txtweight").val(result['weight']);
      $("#txtbldGrp").val(result['blood_grp']);
      $("#txtPrsntAdd").val(result['prsnt_add']);
      $("#txtpin").val(result['pin_code']);
      $("#txtPrmtAdd").val(result['prmnt_add']);
      $("#txtNationality").val(result['nationality']);
      
       
    if(result['gender']=='F'){
      $("#rdbFemale").prop('checked', true);
       
    }
    else
    {
        $("#rdbMale").prop('checked', true);
    }
    });
}   

function fillBankDtls(studRoll)
{
    $.post("editstud_action.php",
    {
        rollno:studRoll,
        act:'fillBankDtls'
    },function(data){
      
      var result = jQuery.parseJSON(data);
    console.log(result);
      $("#txtBankNM").val(result['bankNM']);
      $("#txtACNo").val(result['aCNo']);
      $("#txtBranch").val(result['branch']);
      $("#txtbankStuNM").val(result['bankStuNM']);
      $("#txtifsc").val(result['ifsc']);
      
   });
}       
    


function filldeployDtls(studRoll)
{
    $.post("editstud_action.php",
    {
        rollno:studRoll,
        act:'filldeployDtls'
    },function(data){
      
      var result = jQuery.parseJSON(data);
    
      $("#txtDeplArea").val(result['dep_area']);
      $("#txtDeplCode").val(result['dep_code']);
      $("#txtDeplType").val(result['dep_type']);
      $("#txtDeplLine").val(result['dep_line']);
      $("#deptlDate").val(result['dep_date']);
      $("#deptlUpto").val(result['dep_upto']);
      $("#txtDeplSupNM").val(result['supv_name']);
      $("#txtDeplcontSup").val(result['sup_cont']);
      $("#txtDeplemailSup").val(result['sup_email']);
      $("#txtDeplMgmNM").val(result['mgm_name']);
      $("#txtDeplcontMgm").val(result['mgm_cont']);
      $("#txtDeplemailMgm").val(result['mgm_email']);
   });

   // $( "#deptlDate" ).datepicker();
 //  $( "#deptlUpto" ).datepicker();
}       
    


function fillReldtls(studRoll)
{
    var newRowContent = "";
    $.post("editstud_action.php",
    {
        rollno:studRoll,
        act:'fillReldtls'
    },function(data){
        
      
      var result = jQuery.parseJSON(data);
      
      $.each(result,function(key,value){
          newRowContent += "<tr class=\"memberList\"><td class=\"tdRelNM\">"+value['relt_nm']+"</td><td class=\"tdDesg\">"+value['relt_desg']+"</td><td class=\"tdDept\">"+value['relt_dept']+"</td><td class=\"tdworkArea\">"+value['workarea']+"</td><td class=\"tdContNo\">"+value['contact_no']+"</td><td></td></tr>";
      });
        

    
    
        $("#tblrel tbody").append(newRowContent); 
    });
} 


function fillacdmydtls(studRoll)
{
    var newRowContent = "";
    $.post("editstud_action.php",
    {
        rollno:studRoll,
        act:'fillacdmydtls'
    },function(data){
      var result = jQuery.parseJSON(data);
      
      $.each(result,function(key,value){
          newRowContent += "<tr class=\"acdmList\"><td id=\"tdDiscp\">"+value['discp']+"</td><td id=\"tdboard\">"+value['board']+"</td><td id=\"tdschool\">"+value['school']+"</td><td id=\"tdDivision\">"+value['division']+"</td><td id=\"tdper\">"+value['per']+"</td><td id=\"tdCertNo\">"+value['certNo']+"</td><td></td></tr>";
      });
        $("#tblacdm tbody").append(newRowContent); 
    });
} 


//====================================== Update Functions ===========================================

function gendltsupd()
  {
    var currSts = $("#ddlsts").val();
    var rollno = $("#txtRollNo").val();
    var uniqueid = $("#txtuniqueid").val();
    var gpNo = $("#txtGPNo").val();
    var stuName = $("#txtstuName").val();
    var stuemail = $("#txtstuemail").val();
    var dob = $("#dob").val();
    var cont1 = $("#txtcont1").val();
    var cont2 = $("#txtcont2").val();
    var stusesssion = $("#ddlsession").val();

      var martsts = 0;
      if($("#rdbmatyes").prop('checked')== true)
      {
          martsts = 1;
      }

      $.post("editstud_action.php", 
                    {
                        rollno:rollno,
                        uniqueid:uniqueid,
                        gpNo:gpNo,
                        stuName:stuName,
                        stuemail:stuemail ,
                        dob:dob,
                        cont1:cont1,
                        cont2:cont2,
                        martsts:martsts,
                        currSts:currSts,
                        stusesssion:stusesssion,
                        act:'editGenDtls'
                    }, function(data){
																		   
			  alert(data);
			   
			});
      
  }

function prntdltsupd()
  {
    var rollno = $("#txtRollNo").val();

      
      var fthNm = $("#txtFthNm").val();
      var fthOcp = $("#txtFthOcp").val();
      var fthContNo = $("#txtFthContNo").val();
      var mthNm = $("#txtMthNm").val();
      var mthOcp = $("#txtMthOcp").val();
      var mthContNo = $("#txtMthContNo").val();
      

      $.post("editstud_action.php", 
                    {
                        rollno:rollno,
                        
                        fthNm:fthNm,
                        fthOcp:fthOcp,
                        fthContNo:fthContNo,
                        mthNm:mthNm,
                        mthOcp:mthOcp,
                        mthContNo:mthContNo,
                        
                        act:'prntdltsupd'
                    }, function(data){
																		   
			  alert(data);
			   
			});
      
  }
  

function medcaldltsupd()
{
      var rollno = $("#txtRollNo").val();
      var gender = 'M';
      if($("#rdbFemale").prop('checked')== true)
      {
           gender = 'F';
      }
      var heigth = $("#txtheight").val();
      var Weight = $("#txtweight").val();
      var bldGrp = $("#txtbldGrp").val();
      var prsntAdd = $("#txtPrsntAdd").val();
      var pin = $("#txtpin").val();
      var prmtAdd = $("#txtPrmtAdd").val();
      var nationality = $("#txtNationality").val();
      

      $.post("editstud_action.php", 
            {
                rollno:rollno,
                gender:gender,
                heigth:heigth,
                Weight:Weight,
                bldGrp:bldGrp,
                prsntAdd:prsntAdd,
                pin:pin,
                prmtAdd:prmtAdd,
                nationality:nationality,
                act:'medcaldltsupd'
            }, function(data){

                  alert(data);

                });
    
}


function bankdltsupd()
{
      var rollno = $("#txtRollNo").val();
      
      var bankNM = $("#txtBankNM").val();
      var aCNo = $("#txtACNo").val();
      var branch = $("#txtBranch").val();
      var bankStuNM = $("#txtbankStuNM").val();
      var ifsc = $("#txtifsc").val();
 
      
      $.post("editstud_action.php", 
            {
                rollno:rollno,
                bankNM:bankNM,
                aCNo:aCNo,
                branch:branch,
                bankStuNM:bankStuNM,
                ifsc:ifsc,
                
                act:'bankdltsupd'
            }, function(data){
                    alert(data);
            });
}



function deploydltsupd()
{
      var rollno = $("#txtRollNo").val();
      
      var deplArea = $("#txtDeplArea").val();
      var deplCode = $("#txtDeplCode").val();
      var deplType = $("#txtDeplType").val();
      var deplLine = $("#txtDeplLine").val();
      var deptlDate = $("#deptlDate").val();
      var deptlUpto = $("#deptlUpto").val();
      var deplSupNM = $("#txtDeplSupNM").val();
      var deplcontSup = $("#txtDeplcontSup").val();
      var deplemailSup = $("#txtDeplemailSup").val();
      var deplMgmNM = $("#txtDeplMgmNM").val();
      var deplcontMgm = $("#txtDeplcontMgm").val();
      var deplemailMgm = $("#txtDeplemailMgm").val();
      
      $.post("editstud_action.php", 
            {
                rollno:rollno,
                deplArea:deplArea,
                deplCode:deplCode,
                deplType:deplType,
                deplLine:deplLine,
                deptlDate:deptlDate,
                deptlUpto:deptlUpto,
                deplSupNM:deplSupNM,
                deplemailSup:deplemailSup,
                deplcontSup:deplcontSup,
                deplMgmNM:deplMgmNM,
                deplcontMgm:deplcontMgm,
                deplemailMgm:deplemailMgm,
                act:'deploydltsupd'
            }, function(data){
                    alert(data);
            });

}


function acadmydltsupd()
{
    var acdmarr = [];
    var rollno = $("#txtRollNo").val();

    $(".acdmList").each(function(){
        acdmarr.push({				
                        'discp'         : $(this).find('.tdDiscp').html(),
                        'board' 	: $(this).find('.tdboard').html(),
                        'school' 	: $(this).find('.tdschool').html(),
                        'division' 	: $(this).find('.tdDivision').html(),
                        'per'           : $(this).find('.tdper').html(),
                        'certNo'        : $(this).find('.tdCertNo').html()
                });
    });
  
    $.post("editstud_action.php", 
    {
        rollno:rollno,
        acdmarr:acdmarr,
        act:'acdmdltsupd'
    }, function(data){

          alert(data);

    });
    
}    

function relativedltsupd()
{
    var membersvalues = [];
    var rollno = $("#txtRollNo").val();

    $(".memberList").each(function(){
            membersvalues.push({				
                            'relNM' : $(this).find('.tdRelNM').html(),
                            'desg' 	: $(this).find('.tdDesg').html(),
                            'dept' 	: $(this).find('.tdDept').html(),
                            'workArea': $(this).find('.tdworkArea').html(),
                            'contNo': $(this).find('.tdContNo').html(),
                    });
    });
    
    $.post("editstud_action.php", 
    {
        rollno:rollno,
        membersvalues:membersvalues,

        act:'relativedltsupd'
    }, function(data){

          alert(data);

    });
    
}
    


// ==========================================Add Table row =========================================================
function addAcdmrow()
    {
        
        var newRowContent = "<tr class=\"acdmList\"><td class=\"tdDiscp\">"+$("#txtDiscipline").val()+"</td><td class=\"tdboard\">"+$("#txtboard").val()+"</td><td class=\"tdschool\">"+$("#txtschool").val()+"</td><td class=\"tdDivision\">"+$("#txtDivision").val()+"</td><td class=\"tdper\">"+$("#txtper").val()+"</td><td class=\"tdCertNo\">"+$("#txtCertNo").val()+"</td><td></td></tr>";

        $("#tblacdm tbody").append(newRowContent); 
        $("#txtDiscipline").val('');
        $("#txtboard").val('');
        $("#txtschool").val('');
        $("#txtDivision").val('');
        $("#txtper").val('');
        $("#txtCertNo").val('');
        $(".acdmList").focus();

     
    }
    
    
    
function addrow()
    {
        var newRowContent = "<tr class=\"memberList\"><td class=\"tdRelNM\">"+$("#txtRelNM").val()+"</td><td class=\"tdDesg\">"+$("#txtDesg").val()+"</td><td class=\"tdDept\">"+$("#txtDept").val()+"</td><td class=\"tdworkArea\">"+$("#txtworkArea").val()+"</td><td class=\"tdContNo\">"+$("#txtContNo").val()+"</td><td></td></tr>";

        $("#tblrel tbody").append(newRowContent); 
        $("#txtRelNM").val(''); 
        $("#txtDesg").val('');
        $("#txtDept").val('');
        $("#txtworkArea").val('');
        $("#txtContNo").val('');
        $("#txtRelNM").focus();
    }

    
function addresscheck()
{
    if($("#chksameAdd").prop('checked')== true){
        $("#txtPrmtAdd").val($("#txtPrsntAdd").val());
    }
    else
    {
       $("#txtPrmtAdd").val("");
    }
}



// ==========================================Clear =========================================================
function cleardeployDtls()
{
     
      $("#txtDeplArea").val('');
      $("#txtDeplCode").val('');
      $("#txtDeplType").val('');
      $("#txtDeplLine").val('');
      $("#deptlDate").val('');
      $("#deptlUpto").val('');
      $("#txtDeplSupNM").val('');
      $("#txtDeplcontSup").val('');
      $("#txtDeplemailSup").val('');
      $("#txtDeplMgmNM").val('');
      $("#txtDeplcontMgm").val('');
      $("#txtDeplemailMgm").val('');
}

function clearBankDtls()
{
     
      $("#txtBankNM").val('');
      $("#txtACNo").val('');
      $("#txtBranch").val('');
      $("#txtbankStuNM").val('');
      $("#txtifsc").val('');
      
}

function clearAcdmdtls()
{
    $("#tblacdm tbody").html(''); 
        $("#txtDiscipline").val('');
        $("#txtboard").val('');
        $("#txtschool").val('');
        $("#txtDivision").val('');
        $("#txtper").val('');
        $("#txtCertNo").val('');
        $("#txtDiscipline").focus();
}

function clearReldtls()
{
    $("#tblrel tbody").html(''); 
        $("#txtRelNM").val(''); 
        $("#txtDesg").val('');
        $("#txtDept").val('');
        $("#txtworkArea").val('');
        $("#txtContNo").val('');
        $("#txtRelNM").focus();
}

function clearMeddtls()
{
     
      $("#rdbMale").prop('checked', true);
      
      $("#txtheight").val('');
      $("#txtweight").val('');
      $("#txtbldGrp").val('');
      $("#txtPrsntAdd").val('');
      $("#txtpin").val('');
      $("#txtPrmtAdd").val('');
      $("#txtNationality").val('');
}

function acdmcheck()
{
    if($("#rdbacmdyes").prop('checked')== true)
      {
          $("#divAcdmdtls").show();
      }
      else
      {
          $("#divAcdmdtls").hide();
      }
}

function relcheck()
{
    if($("#rdbrelyes").prop('checked')== true)
      {
          $("#divReldtls").show();
      }
      else
      {
          $("#divReldtls").hide();
      }
}

function medcheck()
   {
      if($("#rdbmedyes").prop('checked')== true)
      {
          $("#divMeddtls").show();
          
      }
      else
      {
          $("#divMeddtls").hide();
      }
   }

function bankcheck()
   {
      if($("#rdbbankyes").prop('checked')== true)
      {
          $("#divbankdtls").show();
      }
      else
      {
          $("#divbankdtls").hide();
      }
   }
function deploycheck()
   {
       if($("#rdbdeployyes").prop('checked')== true)
      {
          $("#divDeploydtls").show();
           
      }
      else
      {
          $("#divDeploydtls").hide();
      }
      
   }
    

    /*====================================== Application Details */

function fillAppdtls(studRoll)
{
    $.post("editstud_action.php",
    {
        rollno:studRoll,
        act:'fillAppdtls'
    },function(data){
      var result = jQuery.parseJSON(data);
    
      $("#ddlCat").val(result['category']).prop("selected",true);
      $("#ddlMedSts").val(result['med_sts']).prop("selected",true);
      $("#txtApplcation").val(result['Application']);
      $("#txtMedref").val(result['med_refno']);
      $("#txtMedDate").val(result['med_date']);
      $("#txtBatch").val(result['batch_no']);
      $("#txtrelig").val(result['religion']);
      $("#txtHQali").val(result['high_quali']);
      $("#txtDOJ").val(result['DOJ']);
      
	
    });
}   


function clearAppdtls()
{
     
      $("#ddlCat").val(0);
      $("#ddlMedSts").val(0);
      $("#txtApplcation").val('');
      $("#txtMedref").val('');
      $("#txtMedDate").val('');
      $("#txtBatch").val('');
      $("#txtrelig").val('');
      $("#txtHQali").val('');
      $("#txtDOJ").val('');
}


function appcheck()
   {
      if($("#rdbappyes").prop('checked')== true)
      {
          $("#divAppdtls").show();
          
      }
      else
      {
          $("#divAppdtls").hide();
      }
   }
 

function appdltsupd()
{
      var rollno = $("#txtRollNo").val();
      var med_sts = $('#ddlMedSts').val();
      var category = $("#ddlCat").val();
      var application = $("#txtApplcation").val();
      var medref = $("#txtMedref").val();
      var medDate = $("#txtMedDate").val();
      var batch = $("#txtBatch").val();
      var relgion = $("#txtrelig").val();
      var Hqualification = $("#txtHQali").val();
      var doj = $("#txtDOJ").val();    

      $.post("editstud_action.php", 
            {
                rollno:rollno,
                category:category,
                application:application,
                medref:medref,
                medDate:medDate,
                batch:batch,
                relgion:relgion,
                Hqualification:Hqualification,
                doj:doj,
                med_sts:med_sts,
                act:'appdltsupd'
            }, function(data){
                
                    alert(data);
            });
}
      
   
   
   
   


</script>
<!-- jQuery 2.2.0 -->
 <link href="bootstrap/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
 <script src="bootstrap/js/jquery-1.12.4.js" type="text/javascript"></script>
<script src="bootstrap/js/jquery-ui.js" type="text/javascript"></script>
<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
   $( function() {
    //$( "#dob" ).datepicker();
   // $( "#deptlDate" ).datepicker();
   // $( "#deptlUpto" ).datepicker();

    
    
  });
  
</script>

</body>


</html>


