<?php include 'session_check.php'; include 'schoolclass.php'; ?>
<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">


  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Details        
      </h1>
   
    </section>

    <section class="content">
        <div class="box-header with-border" style="border-width:5Px;">
                    
                        <table class="col-md-12">
                            <tr >
                                <td class="col-md-4" >
                                    <label>Master Item</label>
                                </td>
                                <td class="col-md-4" >
                                    <select id="masterItemID" name="masterItemID" >
                                        <?php echo $scl->getmasItem(); ?>
                                    </select>
                                </td>
                                <td class="col-md-4" >
                                    <button onclick="seachItems()" >Search</button>
                                </td>
                            </tr>
                        </table>
                    </div>
           <div class="box box-primary" id="divItemdtls" >
            
              <table id="tblItem" class="table table-bordered table-hover">
                <thead>
                    <tr>
                      
                      <th>Sl. No.</th>
                      <th>Item Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                    <tr>
                      
                        <td class="col-xs-1"><input type="text" class="form-control" max="2" id="txtSlno"></td>
                      <td><input type="text" class="form-control" max="30" id="txtItemNM"></td>
                              <td><select ID="ddlStatus" class="form-control" >
                                      <option value="1" selected>Active</option>
                                      <option value="0">InActive</option>
                          </select></td>
               
                      <td><a href="#" onclick="additemrow()">Add New</a> </td>
                    </tr>
                </tfoot>
              </table>
            
          <div class="box-footer">
                <button type="submit" class="btn btn-primary" onclick="itemdltsupd()">Update</button>
            </div>
      </div>
      
     
    </section>
    
    </div>

<script>
function seachItems()
{
    
    var masitemID = $("#masterItemID").val();
    //alert(masitemID);
    if(masitemID== 0)
    {
        alert("Kindly select Master Item first.");
        return false;
    }
    clearitemdtls();
    fillitemdtls(masitemID);
}
function additemrow()
    {
        var newRowContent = "<tr class=\"itemList\" data-id=\"0\"><td class=\"tdSlNo\">"+$("#txtSlno").val()+"</td><td class=\"tdItem\">"+$("#txtItemNM").val()+"</td><td class=\"tdstatus\" data-val="+$("#ddlStatus").val()+">"+$("#ddlStatus option:selected").text()+"</td><td></td></tr>";
        var slno = $("#txtSlno").val();
        $("#tblItem tbody").append(newRowContent); 
        $("#txtSlno").val(++slno);
        $("#txtItemNM").val('');
        $("#ddlStatus").select(0);
        
    }
    
function clearitemdtls()
{
    $("#tblItem tbody").html(''); 
        $("#txtSlno").val('');
        $("#txtItemNM").val('');
        $("#ddlStatus").select(0);
      
}

    
function fillitemdtls(masitemID)
{
    var newRowContent = "";
    $.post("master_action.php",
    {
        masitemID:masitemID,
        act:'fillitemdtls'
    },function(data){
      var result = jQuery.parseJSON(data);
      //console.log(result);
      var slno = 0;
      $.each(result,function(key,value){
          slno = value['Slno'];
          newRowContent += "<tr class=\"itemList\" data-id="+value['id']+"><td class=\"tdSlNo\">"+value['Slno']+"</td><td class=\"tdItem\">"+value['ItemNM']+"</td><td class=\"tdstatus\" data-val="+value['statusID']+">"+value['status']+"</td><td></td></tr>";
      });
      
        $("#tblItem tbody").append(newRowContent); 
        $("#txtSlno").val(++slno);
    });
} 

function itemdltsupd()
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



    </script>
</body>
</html>