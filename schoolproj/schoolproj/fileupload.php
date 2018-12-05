<?php include 'session_check.php'; include 'schoolclass.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
   <head>
    <title>Upload File in PHP using Jquery AJAX  : DevZone.co.in</title>
    <style>
        body { padding: 30px }
        form { display: block; margin: 20px auto; background: #eee; border-radius: 10px; padding: 15px ;width: 400px;}
        .progress { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; height: 2px;}
        .bar { background-color: #B4F5B4; width:0%; height:2px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; }
        #status{margin-top: 30px;}
    </style>
</head>
<body>
   <form action="file.php" method="post" enctype="multipart/form-data">
        <h3>Upload File using Jquery AJAX in PHP</h3>
        <table>
            <tr><td>Name:</td><td><input type="text" name="txtname"></td></tr>
            <tr><td>File:</td><td><input type="file" name="myfile"></td></tr>
            <tr><td>&nbsp;</td><td><input type="submit" value="Upload"></td></tr>
        </table>
         <div class="progress">
        <div class="bar"></div >
        <div class="percent">0%</div >        
         <div id="status"></div>         
    </div>
    </form>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script>
        (function() {
 
            var bar = $('.bar');
            var percent = $('.percent');
            var status = $('#status');
 
            $('form').ajaxForm({
                beforeSend: function() {
                    status.empty();
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                success: function() {
                    var percentVal = '100%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    status.html(xhr.responseText);
                }
            });
        })();
    </script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-43091346-1', 'devzone.co.in');
  ga('send', 'pageview');
 
</script>
</body>
</html>
<script type="text/javascript">


//$(document).ready(function(){
//
//$('#FileUploader').on('submit', function(e)
//    {
//        
//         
//        $('#uploadButton').attr('disabled', ''); // disable upload button
//        $.ajax({
//        url: 'file.php',
//        type: 'POST',
//        data: new FormData( this ),
//        processData: false,
//        contentType: false,
//        success: function(data){
//            console.log(data);
//            }
//        });
//    });
//});
//  
//function removeParam(uri) {
//   
//   return uri.replace(/([&\?]key=val*$|key=val&|[?&]key=val(?=#))/, '');
//   return uri.replace('1', '');
//   return uri.replace('BlankName', '');
//}
//function getUrlVars()
//{
//    
//    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1);
//  
//    return hashes;
//}
</script>
