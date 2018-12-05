<?php include 'session_check.php';
include 'schoolclass.php';
?>
<!DOCTYPE html>
<html>

    <body class="hold-transition skin-blue sidebar-mini">


        <div>
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Student Details        
                </h1>

            </section>

            <!-- Main content -->

            <div class="row" style="padding: 5Px;">
                <div class="col-xs-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" >
                            <li id="lnk1" class="active"><a  href="#tab_1" data-toggle="tab">Search</a></li>
                            <li id="lnk2" ><a  href="#tab_2" data-toggle="tab">Details</a></li>

                        </ul>
                        <div class="tab-content" id="tabs" title="Search">
                            <div class="tab-pane active" id="tab_1">

                                <div class="box-header with-border">
                                    <h3 class="box-title" style="color: #006600;">Filter Criteria</h3>
                                </div>


                                <div class="box-body">
                                    <table class="col-xs-12">
                                        <tr>
                                            <td class="col-xs-4">
                                                <label>Roll No</label>
                                                <input type="text" class="form-control" maxlength="10" id="txtfltRoll" placeholder="Enter Roll No">
                                            </td>
                                            <td class="col-xs-4">
                                                 <label>Session</label>
                                                 <select id="ddlfltsession" class="form-control" width="100%" >
                                                     <?php echo $scl->getcode("5"); ?>
                                                 </select>
                                            </td>
                                            <td class="col-xs-4">
                                                <label>Name</label>
                                                <input type="text" class="form-control" id="txtfltstuName"  maxlength="100" placeholder="Enter Name">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-xs-4">
                                                <label>Blood Group</label>
                                                <input type="text" class="form-control" maxlength="10" id="txtfltbldgrp" placeholder="Enter Blood group">
                                            </td>
                                            <td class="col-md-4">
                                                <label>Sex</label><br>
                                                <input type="radio" name="sex" id="rdbfltMale"  value="Male">Male 
                                                <input type="radio" name="sex" id="rdbfltFemale"  value="Female">Female
                                            </td>
                                            <td class="col-md-4">
                                                <label>Current Status</label><br/>
                                                <select id="ddlfltsts" class="form-control" width="100%" >
                                                    <?php echo $scl->getcode("8"); ?>
                                                </select>
                                            </td>
                                        </tr>
                                        
                                    </table>

                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" onclick="searchdtls()">Search</button>
                                    <button type="submit" class="btn btn-primary" onclick="xlsExport()">Excel Export</button>
                                    

                                </div>
                                <br>
                                <div class="box-body" id="dvData">
                                    <table id="tblmain" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Details</th>
                                                <th>Roll No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Session</th>
                                                <th>Contact No</th>
                                                <th>Blood Group</th>
                                                <th>Sex</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        </tbody>

                                    </table>
                                    <table id="tblexport" class="table table-bordered table-hover" style="display:none">
                                        <thead>
                                            <tr>
                                                
                                                <th>Roll No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Session</th>
                                                <th>Contact No</th>
                                                <th>Blood Group</th>
                                                <th>Sex</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane"  id="tab_2" title="Details">
                                <div id="divdetails">
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

                                                      <input type="text" class="form-control"  maxlength="10" id="dob">

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
                                                <select id="ddlsts" class="dropdown" width="100%" >
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
                                              <td class="col-md-4">
                                                
                                              </td>
                                          </tr>
                                      </table>

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

                                </div>

                                <div class="box box-primary">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Photograph</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->

                                <div class="box-body"> 
                                    <label>Student Photo</label>
                                                <img border="1" id="studImg" title="" src="" width="100px" height="100px" id="imgstud" />
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
                                                    <input type="text" class="form-control" id="txtMedDate"  maxlength="12" placeholder="" >
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
                                                    <input type="text" class="form-control"  maxlength="10" id="txtDOJ" placeholder="">
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
                                                      <input type="text" class="form-control" id="txtNationality"  maxlength="3" value="Indian">
                                                    </td>
                                                </tr>
                                            </table>

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
                                                <th>Division</th>
                                                <th>Percentage</th>
                                                <th>Certificate No</th>
                                                <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>

                                          </tbody>

                                        </table>
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

                                        </table>
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


                                                          <input type="text" class="form-control"  maxlength="10" id="deptlDate">

                                                  </td>
                                                  <td class="col-md-4">

                                                        <label>Deployment Upto</label>
                                                        <input type="text" class="form-control"  maxlength="10" id="deptlUpto">

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

                                    <br/>
                                    <div class="box-body" >
                                          <table id="tbldeploy" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th colspan="6" class="col-md-12">Deployment History</th>
                                                </tr>
                                                <tr style=" background-color: #d0e9c6">

                                                  <th class="col-md-2">Area</th>
                                                  <th class="col-md-2">Code</th>
                                                  <th class="col-md-2">Deployment Date</th>
                                                  <th class="col-md-2">Deployment Upto</th>
                                                  <th class="col-md-2">Supervisor's Name</th>
                                                  <th class="col-md-2">Managers's Name</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbdeployHist">

                                            </tbody>

                                          </table>
                                        </div>

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

                                </div>
                                </div>
                            </div>

                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->
                </div>

            </div>
            <form id="excel" target="iframe" action="Export.php" method="post">
                <input id="htmlData" name="Content" type="hidden" value="">
                <input id="act" name="act" type="hidden" value="">
            <iframe id="iframe" style="display:none" >
            </iframe>
            </form>
        </div>

        <script>

            function xlsExport(){
                //window.open('data:application/vnd.ms-excel,' + $('#tblexport').html());
               // e.preventDefault();
                     
                    var obj=$("div").find("#dvData");
					//id=obj.find("#tblexport");
                    
                    
					var output =$("#tblexport").html().replace(/<\s*img[^>]*>|<input(\s+[^>]*)?>|<textarea(\s+[^>]*)?>|<select(\s+[^>]*)?>(.|\n)*?<\/select(\s+[^>]*)?>/gi,'');
					//console.log(output);return false;
                     $("#htmlData").val('<table border="1">'+output+'</table>');
					 $("#act").val("Excel");
                     
                     
					 document.forms["excel"].submit();
                     
            }
            function searchdtls()
            {
                var newRowContent="";
                var rowexport ="";
                $("#tblmain tbody").html('');
                var studRoll = $("#txtfltRoll").val();
                var fltsession = $("#ddlfltsession").val();
                var fltName = $("#txtfltstuName").val().toUpperCase();
                var fltbldgrp = $("#txtfltbldgrp").val();
                var fltstudgender ='';
                
                if($("#rdbfltMale").prop('checked')== true){
                    fltstudgender ='M';
                }
                if($("#rdbfltFemale").prop('checked')== true){
                    fltstudgender ='F';
                }
                var fltstatus = $("#ddlfltsts").val();
                
                $.post("editstud_action.php",
                        {
                            rollno: studRoll,
                            fltsession: fltsession,
                            fltName: fltName,
                            fltbldgrp: fltbldgrp,
                            fltstudgender: fltstudgender,
                            fltstatus: fltstatus,
                            act: 'searchdtls'
                        }, function (data) {
                            
                            var result = jQuery.parseJSON(data);
                   
                    $.each(result, function (key, value) {

                        newRowContent += "<tr>\n\
                                    <td><button onclick=fillgendtls("+value['rollno']+")>...</button></td>\n\
                                    <td>" +  value['rollno'] + "</td><td><input type=\"text\" class=\"form-control\" value=" + value['name'] + "></td>\n\
                                    <td><input type=\"text\" class=\"form-control\" value=" + value['email'] + "></td><td>" + value['session'] + "</td>\n\
                                    <td><input type=\"text\" class=\"form-control\" value=" + value['contact1'] + "></td><td>" + value['blood_grp'] + "</td>\n\
                                    <td>" + value['gender'] + "</td><td>" + value['currstatus'] + "</td>\n\
                                    </tr>";
                        rowexport += "<tr>\n\
                                    <td>" +  value['rollno'] + "</td><td>" + value['name'] + "</td>\n\
                                    <td>" + value['email'] + "</td><td>" + value['session'] + "</td>\n\
                                    <td>" + value['contact1'] + "</td><td>" + value['blood_grp'] + "</td>\n\
                                    <td>" + value['gender'] + "</td><td>" + value['currstatus'] + "</td>\n\
                                    </tr>";
                                  
                    });

                    $("#tblmain tbody").append(newRowContent);
                    $("#tblexport tbody").append(rowexport);
                        });
               
            }

            function tabchange()
            {
                
                $("#tab_1").removeClass("active");
                $("#lnk1").removeClass("active");
                $('#tab_2').addClass("active");
                $("#lnk2").addClass("active");
                
            }
function changeDateformat(str)
{
    var dateAr = str.split('-');
    var dobDate = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0].slice(-2);

    return dobDate;
}
            function fillgendtls(studRoll)
            {
                
                $.post("editstud_action.php",
                        {
                            rollno: studRoll,
                            act: 'fillgendtls'
                        }, function (data) {


                    var result = jQuery.parseJSON(data);

                    

                    $("#txtRollNo").val(studRoll);
                    $("#txtuniqueid").val(result['uniq_id']);
                    $("#txtGPNo").val(result['gtpas_no']);
                    $("#dob").val(changeDateformat(result['dob']));
                    //$("#dob").val(dobDate);
                    $("#txtstuName").val(result['name']);
                    $("#txtstuemail").val(result['email']);
                    $("#txtcont1").val(result['contact1']);
                    $("#txtcont2").val(result['contact2']);
                    $("#ddlsts").val(result['currstatus']).prop('selected', true);
                    $("#ddlsession").val(result['sessionstatus']).prop('selected',true);
                    $("#txtFthNm").val(result['fathernm']);
                    $("#txtFthOcp").val(result['ocup_fath']);
                    $("#txtFthContNo").val(result['cont_fath']);
                    $("#txtMthNm").val(result['mom_nm']);
                    $("#txtMthOcp").val(result['ocup_mom']);
                    $("#txtMthContNo").val(result['cont_mom']);

                    if (result['maritial_sts'] == 1) {
                        $("#rdbmatyes").prop('checked', true);

                    }
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
                    
                    
                    if (result['deploy_flg'] == 1) {
                        $("#rdbdeployyes").prop('checked', true);
                        filldeployDtls(studRoll);
                        fillDeployhist(studRoll);
                    } else
                    {
                        $("#rdbdeployno").prop('checked', true);
                        cleardeployDtls();
                    }
                    deploycheck();
                    
                    if (result['relt_flg'] == 1) {
                        $("#rdbrelyes").prop('checked', true);

                        fillReldtls(studRoll);
                    } else
                    {
                        $("#rdbrelno").prop('checked', true);

                        clearReldtls();
                    }
                    relcheck();

                    if (result['acadmy_flg'] == 1) {
                        $("#rdbacmdyes").prop('checked', true);
                        fillacdmydtls(studRoll);
                    } else
                    {
                        $("#rdbacmdno").prop('checked', true);
                        clearAcdmdtls();
                    }
                    acdmcheck();

                    if (result['med_flg'] == 1) {
                        $("#rdbmedyes").prop('checked', true);
                        fillMeddtls(studRoll);
                    } else
                    {
                        $("#rdbmedno").prop('checked', true);

                        clearMeddtls();
                    }
                    medcheck();


                    if (result['bank_flg'] == 1) {
                        $("#rdbbankyes").prop('checked', true);
                        fillBankDtls(studRoll);
                    } else
                    {
                        $("#rdbbankno").prop('checked', true);
                        clearBankDtls();
                    }
                    bankcheck();

                });
               setPhoto(studRoll);
                tabchange();
            }
            function setPhoto(studRoll)
            {

                 $.post("editstud_action.php",
                        {
                            rollno: studRoll,
                            act: 'setPhoto'
                        }, function (data) {
                    //var result = jQuery.parseJSON(data);
                        console.log(data);
                        $("#studImg").attr('src',data);
                        });

            }
            function fillMeddtls(studRoll)
            {
                $.post("editstud_action.php",
                        {
                            rollno: studRoll,
                            act: 'fillMeddtls'
                        }, function (data) {
                    var result = jQuery.parseJSON(data);

                    $("#txtheight").val(result['height']);
                    $("#txtweight").val(result['weight']);
                    $("#txtbldGrp").val(result['blood_grp']);
                    $("#txtPrsntAdd").val(result['prsnt_add']);
                    $("#txtpin").val(result['pin_code']);
                    $("#txtPrmtAdd").val(result['prmnt_add']);
                    $("#txtNationality").val(result['nationality']);


                    if (result['gender'] == 'F') {
                        $("#rdbFemale").prop('checked', true);

                    } else
                    {
                        $("#rdbMale").prop('checked', true);
                    }
                });
            }

            function fillBankDtls(studRoll)
            {
                $.post("editstud_action.php",
                        {
                            rollno: studRoll,
                            act: 'fillBankDtls'
                        }, function (data) {

                    var result = jQuery.parseJSON(data);
                    //console.log(result);
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
                            rollno: studRoll,
                            act: 'filldeployDtls'
                        }, function (data) {

                    var result = jQuery.parseJSON(data);

                    $("#txtDeplArea").val(result['dep_area']);
                    $("#txtDeplCode").val(result['dep_code']);
                    $("#txtDeplType").val(result['dep_type']);
                    $("#txtDeplLine").val(result['dep_line']);
                    $("#deptlDate").val(changeDateformat(result['dep_date']));
                    $("#deptlUpto").val(changeDateformat(result['dep_upto']));
                    $("#txtDeplSupNM").val(result['supv_name']);
                    $("#txtDeplcontSup").val(result['sup_cont']);
                    $("#txtDeplemailSup").val(result['sup_email']);
                    $("#txtDeplMgmNM").val(result['mgm_name']);
                    $("#txtDeplcontMgm").val(result['mgm_cont']);
                    $("#txtDeplemailMgm").val(result['mgm_email']);
                });
                
            }

            function fillDeployhist(studRoll)
            {
                $.post("editstud_action.php",
                        {
                            rollno: studRoll,
                            act: 'filldeployhist'
                        }, function (data) {
                    var result = jQuery.parseJSON(data);
                    var newRowcont="";
                    $.each(result, function (key, value) {
                        newRowcont += "<tr class=\"deployhist\">\n\
                                            <td>" + value['Area'] + "</td>\n\
                                            <td>" + value['Code'] + "</td>\n\
                                            <td>" + value['Deployment_Date'] + "</td>\n\
                                            <td>" + value['Deployment_Upto'] + "</td>\n\
                                            <td>" + value['Supervisor_Name'] + "</td>\n\
                                            <td>" + value['Managers_Name'] + "</td></tr>";
                    });
                    $("#tbdeployHist").html('');
                    $("#tbdeployHist").append(newRowcont);
                });
            }

            function fillReldtls(studRoll)
            {
                var newRowContent = "";
                $.post("editstud_action.php",
                        {
                            rollno: studRoll,
                            act: 'fillReldtls'
                        }, function (data) {


                    var result = jQuery.parseJSON(data);
                   
                    $.each(result, function (key, value) {
                        newRowContent += "<tr class=\"memberList\"><td class=\"tdRelNM\">" + value['relt_nm'] + "</td><td class=\"tdDesg\">" + value['relt_desg'] + "</td><td class=\"tdDept\">" + value['relt_dept'] + "</td><td class=\"tdworkArea\">" + value['workarea'] + "</td><td class=\"tdContNo\">" + value['contact_no'] + "</td><td></td></tr>";
                    });


                         $("#tblrel tbody").html('');

                    $("#tblrel tbody").append(newRowContent);
                });
            }


            function fillacdmydtls(studRoll)
            {
                var newRowContent = "";
                $.post("editstud_action.php",
                        {
                            rollno: studRoll,
                            act: 'fillacdmydtls'
                        }, function (data) {
                    var result = jQuery.parseJSON(data);

                    $.each(result, function (key, value) {
                        newRowContent += "<tr class=\"acdmList\"><td id=\"tdDiscp\">" + value['discp'] + "</td><td id=\"tdboard\">" + value['board'] + "</td><td id=\"tdDivision\">" + value['division'] + "</td><td id=\"tdper\">" + value['per'] + "</td><td id=\"tdCertNo\">" + value['certNo'] + "</td><td></td></tr>";
                    });
                    $("#tblacdm tbody").append(newRowContent);
                });
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
                    $("#txtMedDate").val(changeDateformat(result['med_date']));
                    $("#txtBatch").val(result['batch_no']);
                    $("#txtrelig").val(result['religion']);
                    $("#txtHQali").val(result['high_quali']);
                    $("#txtDOJ").val(changeDateformat(result['DOJ']));
                    
                    
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
         
        </script>

    </body>


</html>