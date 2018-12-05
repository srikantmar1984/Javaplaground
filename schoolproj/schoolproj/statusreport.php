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
                   Status Report       
                </h1>
            </section>

            <!-- Main content -->

            <div class="row" style="padding: 5Px;">
                <div class="col-xs-12">
                    <!-- Custom Tabs -->
               
                            <div class="tab-pane active" id="tab_1">

                               

                                <div class="box-body">
                                    <table class="col-xs-12">
                                        <tr>
                                            <td class="col-xs-4">
                                                <label>Date of Joining(From)</label>
                                                <input type="date" class="form-control" id="txtfltAdminFrom"  >
                                            </td>
                                            <td class="col-xs-4">
                                                <label>Date of Joining(To)</label>
                                                <input type="date" class="form-control" id="txtfltAdminTo"   > 
                                                
                                            </td>
                                            <td class="col-xs-4">
                                                 <label>Session</label>
                                                 <select id="ddlfltsession" class="form-control" width="100%" >
                                                     <?php echo $scl->getcode("5"); ?>
                                                 </select>
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
                                        <tr>
                                            <td class="col-xs-4">
                                                <label>Religion</label>
                                                <input type="text" class="form-control" maxlength="10" id="txtfltreligion" placeholder="Enter Blood group">
                                            </td>
                                            <td class="col-md-4">
                                                <label>Marital Status</label><br>
                                                <input type="radio" name="Mariage" id="rdbfltSingle"  value="0" >Single
                                                <input type="radio" name="Mariage" id="rdbfltMarried"  value="1">Married
                                            </td>
                                            <td class="col-md-4">
                                                <label>Category</label><br/>
                                                <select id="ddlfltcat" class="form-control" width="100%" >
                                                    <?php echo $scl->getcode("9"); ?>
                                                </select>
                                            </td>
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
                                                
                                                <th>Roll No</th>
                                                <th>Name</th>
                                                <th>Session</th>
                                                <th>Blood Group</th>
                                                <th>Sex</th>
                                                <th>Status</th>
                                                <th>Marital Status</th>
                                                <th>Category</th>
                                                <th>Date of Joining</th>
                                                <th>Religion</th>
                                                
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
                                                <th>Session</th>
                                                <th>Blood Group</th>
                                                <th>Sex</th>
                                                <th>Status</th>
                                                <th>Marital Status</th>
                                                <th>Category</th>
                                                <th>Date of Joining</th>
                                                <th>Religion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        </tbody>

                                    </table>
                                </div>


<!-- /.-content -->
                        </div>    
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
                var fltAdminFrom = $("#txtfltAdminFrom").val();
                var fltAdminTo = $("#txtfltAdminTo").val();
                var fltsession = $("#ddlfltsession").val();
                var fltreligion = $("#txtfltreligion").val().toUpperCase();
                var fltbldgrp = $("#txtfltbldgrp").val();
                var fltcat = $("#ddlfltcat").val();
                var fltstudgender ='';
                var fltstudmariage ='';
            
                if($("#rdbfltMale").prop('checked')== true){
                    fltstudgender ='M';
                }
                if($("#rdbfltFemale").prop('checked')== true){
                    fltstudgender ='F';
                }
                
                if($("input[type='radio'][name='Mariage']:checked").val()){
                
                
                    fltstudmariage =  $("input[type='radio'][name='Mariage']:checked").val();
                }
                
                //if($("#rdbfltFemale").prop('checked')== true){
                  //  fltstudmariage ='Yes';
                //}

                var fltstatus = $("#ddlfltsts").val();
                //console.log(fltAdminFrom+fltAdminTo+fltsession+fltreligion+fltbldgrp+fltcat+fltstudgender+fltstudmariage+fltstatus); 
                //return false;

                $.post("editstud_action.php",
                        {
                            fltstudmariage: fltstudmariage,
                            fltsession: fltsession,
                            fltcat: fltcat,
                            fltbldgrp: fltbldgrp,
                            fltstudgender: fltstudgender,
                            fltreligion:fltreligion,
                            fltstatus: fltstatus,
                            fltAdminFrom:fltAdminFrom,
                            fltAdminTo:fltAdminTo,
                            act: 'statusReport'
                        }, function (data) {
                            //console.log(data);return false;
                            var result = jQuery.parseJSON(data);
                   
                            $.each(result, function (key, value) {

                                newRowContent += "<tr>\n\
                                            <td>" +  value['rollno'] + "</td><td><input type=\"text\" class=\"form-control\" value=" + value['name'] + "></td>\n\
                                            <td>" + value['session'] + "</td>\n\
                                            <td>" + value['blood_grp'] + "</td>\n\
                                            <td>" + value['gender'] + "</td><td>" + value['currstatus'] + "</td><td>" + value['Marital'] + "</td>\n\
                                            <td>" + value['Category'] + "</td><td>" + value['JoiningDate'] + "</td><td>" + value['Religion'] + "</td>\n\
                                            </tr>";
                                rowexport += "<tr>\n\
                                            <td>" +  value['rollno'] + "</td><td>" + value['name'] + "</td>\n\
                                            <td>" + value['session'] + "</td>\n\
                                            <td>" + value['blood_grp'] + "</td>\n\
                                            <td>" + value['gender'] + "</td><td>" + value['currstatus'] + "</td><td>" + value['Marital'] + "</td>\n\
                                            <td>" + value['Category'] + "</td><td>" + value['JoiningDate'] + "</td><td>" + value['Religion'] + "</td>\n\
                                            </tr>";
                                        
                            });

                            $("#tblmain tbody").append(newRowContent);
                            $("#tblexport tbody").append(rowexport);
                        });
/*============================start graph======================================
                        var bar_data = {
                        data: [["January", 10], ["February", 8], ["March", 4], ["April", 13], ["May", 17], ["June", 9]],
                        color: "#3c8dbc"
                        };
                        $.plot("#bar-chart", [bar_data], {
                        grid: {
                            borderWidth: 1,
                            borderColor: "#f3f3f3",
                            tickColor: "#f3f3f3"
                        },
                        series: {
                            bars: {
                            show: true,
                            barWidth: 0.5,
                            align: "center"
                            }
                        },
                        xaxis: {
                            mode: "categories",
                            tickLength: 0
                        }
                        });
    //============================end graph======================================*/
               
            }

           
            function changeDateformat(str)
            {
                var dateAr = str.split('-');
                var dobDate = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0].slice(-2);

                return dobDate;
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