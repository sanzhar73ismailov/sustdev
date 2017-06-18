<?session_start();
include ('blocks/bd.php');
require('procedures/fpdf.php');


$result_users=mysql_query("
		select DISTINCT
		us.id AS id,
		us.login AS login,
		us.surname AS surname,
		us.name AS name
		from users us
		inner join user_test_sert uts on (us.id=uts.user_id) 
		order by us.id
		",$db);



	if(!$result_users) {
		  echo "<p>Запрос в базу не прошел, напишите об этом админу (admin@mail.ru).<br><strong>Код ошибки:</strong></p>";
		  exit(mysql_error());
	  }
  
   if(mysql_num_rows($result_users)>0) {
 
	$myrow_users=mysql_fetch_array($result_users);
		$n =0;
	
			
	   do{ 	
	   
	   ////////////////1 Вставляем логин пользователя
		$user_login = $myrow_users['login'];

		////////////////2 Вставляем имя и фамилию пользователя
			$username=iconv('UTF-8', 'windows-1251',$myrow_users['surname']." ".$myrow_users['name']);
			
			//$username=iconv('UTF-8', 'windows-1251',$_SESSION['user_surname_name']);
			/*
			$filename = date('Y-m-d-H-i-s')
				.'_'
				.$user_login
				.'.pdf'
				;
			*/	
			$filename = 'made_by_hand'
			.'_'
			.$user_login
			.'.pdf'
			;	
			
			$path_filename='sertificates/'.$filename;
	   
			$result_user_modules=mysql_query("
				select DISTINCT
				us.id AS id,
				usm.module AS module
				from users us
				inner join user_test_sert uts on (us.id=uts.user_id) 
				inner join user_sert_modules usm on (uts.id=usm.user_test_sert_id)
				where us.id = ".$myrow_users['id'].
				" order by us.id, usm.module
			",$db);
		
				if(!$result_user_modules) {
				 echo "<p>Запрос в базу не прошел, напишите об этом админу  (admin@mail.ru).<br><strong>Код ошибки:</strong></p>";
				exit(mysql_error());
			  }
			  
				$myrow_user_modules = mysql_fetch_array($result_user_modules);
				$i=0;
////////////////3 Вставляем номера модулей
				do{ 
				
				$mod_man[]= $myrow_user_modules['module'];
					
				///////////////////////////////////// для проверки			
				//echo ++$n."<br>\n";
				//echo "module n = ".$mod_man[$i]." login = ".$user_login." username = 	".$username."<br>\n";
				$i++;
				////////////////////////////////////////////
			}while($myrow_user_modules=mysql_fetch_array($result_user_modules));		
//////////////// Конец - Вставляем номера модулей
				
				
				
				foreach($mod_man as $index=>$val){
	$result=mysql_query("select * FROM  modules WHERE id ='$val'",$db);
	$myrow_for_testings=mysql_fetch_array($result);
	$modulenames[]=iconv('UTF-8', 'windows-1251',$myrow_for_testings['title']);
	}
	


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
				
				
				
		///////////// end	///////////////////////////////////////////////////			

				
		
		unset($mod_man);
		unset($modulenames);
		
		}while($myrow_users=mysql_fetch_array($result_users));
		  
  }







  



	
	

	
	
	
	


/*

 
  

if(!$_POST['button']){

 $result=mysql_query("select * FROM  users",$db);

  if(!$result) {
      echo "<p>Запрос в базу не прошел, напишите об этом админу (admin@mail.ru).<br><strong>Код ошибки:</strong></p>";
      exit(mysql_error());
  }
  
   if(mysql_num_rows($result)>0) {
      
  }
  ?>



<table>
<tr>
<td>

<select size='10'  name='user'>
<option disabled>Выберите пользователя</option>


<?
do{
	echo "<option value='$myrow[id]'>$myrow['id']</option>";
	}
	
	while($myrow=mysql_fetch_array($result));

	echo "</select>";
?>

</td>
</tr>
<tr>


</tr>



<table>

<?

}

else


{


*/



/*

//Делаем 3 вещи:

////////////////1 Вставляем номера модулей
$mod_man = array(1,2,3,4);

////////////////2 Вставляем логин пользователя
$user_login='q1983';

////////////////3 Вставляем имя и фамилию пользователя
$username="Ибрагимова Наиля";


$filename = date('Y-m-d-H-i-s')
	.'_'
	.$user_login
	.'.pdf'
	;
$path_filename='sertificates/'.$filename;


*/

/*


 foreach($mod_man as $index=>$val){
	$result=mysql_query("select * FROM  modules WHERE id ='$val'",$db);
	$myrow_for_testings=mysql_fetch_array($result);
	$modulenames[]=iconv('UTF-8', 'windows-1251',$myrow_for_testings['title']);
	}


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


//}



*/
?>