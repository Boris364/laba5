<?php

//  Выводить таблицу Должники со следующими полями (№ п/п, Фамилия и инициалы, размер долга, адрес, "доля размера долга от стоимости жилья"). //

require('tfpdf.php');

  $connect = mysqli_connect("localhost", "root", "root1", "houses")or die("Невозможно подключиться к серверу");
  mysqli_query($connect, "SET NAMES utf8");

$result = mysqli_query($connect, "SELECT d.FIO_debtor, d.id_resident, d.sum, r.id_home, r.adress_resident, h.home_cost FROM debtors d INNER JOIN residents r ON d.id_resident = r.id_resident JOIN home h ON r.id_home=h.id_home");

  $i = 0;
  while ($row = mysqli_fetch_array($result)){

  	$number[$i] = $i+1;
  	$FIO[$i] = $row['FIO_debtor'];
    $sum[$i] = $row['sum'] . "р.";
    $adress[$i] = $row['adress_resident'];
    $part[$i] = round(($row['sum']/$row['home_cost'])*100, 2);
    $i++;
  }

$pdf = new tFPDF();
$pdf->AddPage();

// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);


$txt = "Должники";

$pdf->SetFont('DejaVu','','24');
$pdf->Cell(40, 10, $txt, 15);
$pdf->Ln();
$pdf->Ln();
 
 $pdf->SetFont('DejaVu','','12');
 $pdf->SetFillColor(244, 164, 96);
 $pdf->SetTextColor(0);
 $pdf->SetDrawColor(0,0,0);
 $pdf->SetLineWidth(.3);
 
 $pdf->Cell(17,7,"Номер",1,0,'C',true);
 $pdf->Cell(60,7,"ФИО",1,0,'C',true);
 $pdf->Cell(30,7,"Сумма",1,0,'C',true);
 $pdf->Cell(55,7,"Адрес",1,0,'C',true);
 $pdf->Cell(30,7,"Доля от цены",1,0,'C',true);
 $pdf->Ln();
 
$pdf->SetFillColor(211, 211, 211);
$pdf->SetTextColor(0);
$pdf->SetFont('');
 
$fill = true;
 
foreach($number as $i)
	{
		$pdf->SetFont('DejaVu','','10');
        $pdf->Cell(17,6, $i, 1, 0,'C',$fill);
        $pdf->Cell(60,6, $FIO[$i-1], 1, 0,'L',$fill);
        $pdf->Cell(30,6, $sum[$i-1], 1, 0,'C',$fill);
        $pdf->Cell(55,6, $adress[$i-1], 1, 0,'L',$fill);
        $pdf->Cell(30,6, $part[$i-1], 1, 0,'R',$fill);
        $pdf->Ln();
        $fill =! $fill;
    }
    $pdf->Cell(180,0,'','T');

$pdf->Output();
?>
