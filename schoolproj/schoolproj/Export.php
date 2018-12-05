
<?php
$output ='';
$file_name="ExportFile";	 
if($_REQUEST["act"]=="Excel")
{
			$output =$_REQUEST["Content"];
			header("Content-Disposition: attachment; filename=$file_name.xls");
	        header("Pragma: no-cache");
	        header("Expires: 0");
	        echo $output;
}
else  if($_REQUEST["act"]=="Doc")
{
		$output =$_REQUEST["Content"];	
		header("Content-type: application/x-ms-download");
		header("Content-Disposition: attachment; filename=$file_name.doc");
		header('Cache-Control: public');
		header("Pragma: no-cache");
		header("Expires: 0");
	 	echo $output;
}
else  if($_REQUEST["act"]=="PDF")
{
			$output =$_REQUEST["Content"];
			//Create PDF And Save 
			$filename= $file_name.'.pdf';
			require('htmlpdf.php');
			$pdf=new PDF_HTML_Table();
			$pdf->AddPage();
			$pdf->SetFont('Arial','',10);
			$pdf->WriteHTML($output);
			$pdf->Output('ofi_form/'.$filename,'F');
			//Create PDF END*/
}
			
?>