<?session_start();
include ('blocks/bd.php');
require('procedures/fpdf.php');

$username=iconv('UTF-8', 'windows-1251',$_SESSION['user_surname_name']);


$modulenames = return_arr_all_modules($_SESSION['user_id'], $_SESSION['modules_user_passed']);

 /*
 foreach($_SESSION['modules_user_passed'] as $index=>$val){
	$result=mysql_query("select * FROM  modules WHERE id ='$val'",$db);
	$myrow_for_testings=mysql_fetch_array($result);
	$modulenames[]=iconv('UTF-8', 'windows-1251',$myrow_for_testings['title']);
	}
*/

$path_filename=iconv('UTF-8', 'windows-1251',$path_filename);

$head="СЕРТИФИКАТ";
$body1="Настоящим удостоверяется, что ";
$nadpisChip="Центр охраны здоровья и экопроектирования";
$nadpisMinistry="Министерство охраны окружающей среды РК";

$body2=" прошел(ла) Интернет курс по теме \"Устойчивое развитие\" по следующим модулям:";
$podpis="Заместитель генерального директора 
Центра охраны здоровья и экопроектирования
Наталья Яковлева";


$pdf=new FPDF();
$title='CERTIFICATE OF PARTICIPATON';
$pdf->SetTitle($title);
$pdf->SetAuthor('ЦОЗиЭП');


	$pdf->AddPage();
	

	$pdf->AddFont('San_Arial','','san_arial.php');
	$pdf->AddFont('San_ArialBD','','san_arialbd.php');
	$pdf->AddFont('San_ArialI','','san_ariali.php');
	$pdf->AddFont('San_ArialBK','','san_ariblk.php');
	$pdf->AddFont('Tahoma','','tahoma.php');
	$pdf->SetMargins(20.0, 20.0, 20.0);
	
	$pdf->SetFillColor(188,218,174);
	$pdf->Rect(0, 0, 210, 297,"FD");


	
// head
//$pdf->SetFillColor(200,100,255);
//$pdf->Image('img/ramka_psd.jpg',0,0,210);

$pdf->Image('img/ramka_psd_mramor_copy.jpg',0,0,210);
$pdf->Image('img/logo_moos1.jpg',30,20,30);
$pdf->Image('img/log_chp_white_bg.jpg',145,25,30);

	//podpisi k znachkam
	//	$pdf->SetFont('San_Arial','',9);
	//	   $pdf->SetY(40);
    //$pdf->Cell(0,30,$nadpisMinistry,0,'C');
	//$pdf->Ln();
	
	
	$pdf->SetFont('San_ArialBK','',30);
		   $pdf->SetY(65);
    $pdf->Cell(0,30,$head,0,1,'C',false);


//body1
	   $pdf->SetY(95);
	$pdf->SetFont('San_Arial','',20);
	  $pdf->MultiCell(0,10,$body1,0,"C");
	   $pdf->Ln();
//username
	$pdf->SetFont('San_ArialBD','',20);
	  $pdf->MultiCell(0,10,$username,0,"C");
	   $pdf->Ln();

//body2
	$pdf->SetFont('San_Arial','',20);
	  $pdf->MultiCell(0,10,$body2,0,"C");
	   $pdf->Ln();
	   
//modules
	$pdf->SetY(160);
	$pdf->SetFont('San_ArialI','',15);
   foreach($modulenames as $index => $val)
   {
   $pdf->SetX(30);
  
     // echo("$index -> $val <br>");
	   $pdf->MultiCell(0,10,'- '.$val,0,"L");
   }


	$pdf->SetY(240);
 $pdf->SetX(30);	
 $pdf->SetFont('San_Arial','',14);
		  $pdf->MultiCell(170,7,$podpis);

//$pdf->Output();

$pdf->Output($path_filename,'F');

$anchor_sert = iconv('windows-1251','UTF-8','
<body bgcolor="#BCDAAE">
<br><a href="'.$path_filename.'" target="_blank">Скачать сертификат:    '.$filename.'</a></br>
');


?>