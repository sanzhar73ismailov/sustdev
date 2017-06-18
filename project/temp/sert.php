<?session_start();
include ('blocks/bd.php');
require('procedures/fpdf.php');
//$username=iconv("windows-1251","UTF-8",$_SESSION['user_surname_name']);
$username=iconv('UTF-8', 'windows-1251',$_SESSION['user_surname_name']);
//echo iconv("UTF-8", "windows-1251", $text);

 foreach($_SESSION['modules_user_passed'] as $index=>$val){
	$result=mysql_query("select * FROM  modules WHERE id ='$val'",$db);
	$myrow_for_testings=mysql_fetch_array($result);
	$modulenames[]=iconv('UTF-8', 'windows-1251',$myrow_for_testings['title']);
	}


//$modulenames=$_SESSION['modules_user_passed'];
//$modulenames=array('модуль 1', 'модуль 2', 'модуль 3');


// $filename = date('Y-m-d-H-i-s')
	// .'_'
	// .$username
	// .'.pdf'
	// ;
$path_filename=iconv('UTF-8', 'windows-1251',$path_filename);

$head="СЕРТИФИКАТ";
$body1="Настоящим удостоверяется, что ";

$body2=" прошел(ла) обучающий Интернет курс по теме \"Устойчивое развитие...\" по следующим модулям:";
$podpis="Генеральный директор 
Центра охраны здоровья и экопроектирования
Андрей Корчевский";


$pdf=new FPDF();
$title='CERTIFICATE OF PARTICIPATON';
$pdf->SetTitle($title);
$pdf->SetAuthor('ЦОЗиЭП');


	$pdf->AddPage();
	
	//$pdf->AddFont('Tahoma','','tahomabd.php');
	$pdf->AddFont('San_Arial','','san_arial.php');
	$pdf->AddFont('San_ArialBD','','san_arialbd.php');
	$pdf->AddFont('San_ArialI','','san_ariali.php');
	$pdf->AddFont('San_ArialBK','','san_ariblk.php');
	$pdf->AddFont('Tahoma','','tahoma.php');
	$pdf->SetMargins(20.0, 20.0, 20.0);
	
	$pdf->SetFillColor(188,218,174);
	$pdf->Rect(0, 0, 210, 297,"FD");
	//$pdf->Image('log.jpg',0,0,10);
	//$pdf->Image('log.jpg',10,8,50);


// head
//$pdf->SetFillColor(200,100,255);
$pdf->Image('img/logo_cph.jpg',15,8,50);
	$pdf->SetFont('San_ArialBK','',30);
		   $pdf->SetY(55);
    $pdf->Cell(0,30,$head,0,1,'C',false);


//body1
	   $pdf->SetY(85);
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
	$pdf->SetY(150);
	$pdf->SetFont('San_ArialI','',20);
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