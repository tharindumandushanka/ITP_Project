<?php
require('fpdf.php');

class PDF extends FPDF{
	function Header(){
		$this->SetFont('Arial','B',20);
		$this->Cell(100,10,'name',0,0);
		$this->Cell(40,10,'subject',0,0);
		$this->Cell(40,10,'pdf',0,1);
		$y = $this->GetY();
		$this->Line(10,10,199,10);
		$this->Line(10,10,10,200);
		$this->Line(199,10,199,200);
		$this->Line(10,200,199,200);
		
		$this->Line(86,10,86,200);
		$this->Line(145,10,145,200);
		
		
		
	}
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
  $con = mysqli_connect("localhost","root","","academy");
  $sql = "select * from tbl_file where year='{$_POST['year']}'";
  $result = mysqli_query($con, $sql);
  $h=5;
  while($rows= mysqli_fetch_array($result)){
	  $pdf->Cell(100,10,$rows['name'],0,0);
	  $pdf->Cell(40,10,$rows['subject'],0,0);
	  $y1= $pdf->GetY();
	  $pdf->Cell(40,10,$rows['pdf'],0,1);
	  $pdf->Line(10,$y1+1,199,$y1+2);
	  
	  
  }
  



$pdf->Output();
?>