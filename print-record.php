<?php
include_once('fpdf183/fpdf.php');
$id = $_GET['Id'];
class PDF extends FPDF
{
function Header()
{
    $this->SetFont('Courier','B',15);
    $this->Cell(150);
    $this->Cell(80,10,'Bill of Product',1,0,'C');
    $this->Ln(20);
}
 
function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Courier','I',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
$conn = new mysqli('localhost', 'root', '', 'test');

if ($conn->connect_error){
die("Connection failed: " . $conn->connect_error);
} 

mysqli_select_db($conn,'test');

$query = "SELECT date,cname,cphone,pname,qty,detail,cost FROM `users` WHERE `id`='" . $id . "'";

$result = mysqli_query($conn,$query);

$header = mysqli_query($conn, "SHOW columns FROM users");
 
$pdf = new PDF();
//header
$pdf->addPage("L", "A3");
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);


$heading=array('Date','Customer Name','Phone No','Product Name','Quantity','Details','Cost','Total Cost');

$pdf->SetFont('Courier','B',13);
foreach($heading as $val){
  $pdf->setFillColor(230,230,230); 
  $pdf->Cell(50,12,$val,1,0,'C',1);
}

$pdf->SetFont('Courier','B',13);
foreach($result as $row) 
{
  $pdf->Ln();
  foreach($row as $column)
  $pdf->Cell(50,12,$column,1,0,'C');
  $pdf->Cell(50,12,$row['cost']*$row['qty'],1,0,'C');

}
$pdf->Output();

?>