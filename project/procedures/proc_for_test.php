<?php



function return_arr_all_modules ($user_id, $arr_current_modules){ // функция возвращает
//$_SESSION['user_id']
global $db;	
	
	$result_user_modules=mysql_query("
				select DISTINCT
				us.id AS id,
				usm.module AS module
				from users us
				inner join user_test_sert uts on (us.id=uts.user_id) 
				inner join user_sert_modules usm on (uts.id=usm.user_test_sert_id)
				where us.id = ".$user_id.
				" order by us.id, usm.module
			",$db);
		
				if(!$result_user_modules) {
				 echo "<p>Запрос в базу не прошел, напишите об этом админу  (admin@mail.ru).<br><strong>Код ошибки:</strong></p>";
				exit(mysql_error());
			  }
			  
				$myrow_user_modulesin_past = mysql_fetch_array($result_user_modules);
				////////////////3 Вставляем номера модулей которые пользователь уже прошел
				do{ 
				
				$arr_pust_modules[]= $myrow_user_modulesin_past['module'];
				
				//echo "modul = ".$myrow_user_modulesin_past['module']."<br>\n";
					
				
				
				}while($myrow_user_modulesin_past=mysql_fetch_array($result_user_modules));		
				//////////////// Конец - Вставляем номера модулей
	
			$result =  array_merge ($arr_current_modules, $arr_pust_modules);

			$result = array_unique ($result);

			sort ($result);

			reset ($result);
			
			 foreach($result as $index=>$val){
			$result2=mysql_query("select * FROM  modules WHERE id ='$val'",$db);
			$myrow_for_testings=mysql_fetch_array($result2);
			$modulenames[]=iconv('UTF-8', 'windows-1251',$myrow_for_testings['title']);
			}
			
			unset($arr_current_modules);
			unset($arr_pust_modules);
			
			

			return $modulenames;




}



function ucfirst_utf8($str) { //возвращает строку с большой первой буквой, остальные маленькие

	if (mb_check_encoding($str,'UTF-8')) {
        $first = mb_substr(
            mb_strtoupper($str, "utf-8"),0,1,'utf-8'
        );
		if(mb_strlen($str)>30){
			$str = mb_substr($str, 0,30,'utf-8');
		}
        return $first.mb_substr(
            mb_strtolower($str,"utf-8"),1,mb_strlen($str),'utf-8'
        );
    } else {
        return $str;
    }
}

function getNameColumnId($table1){
global $db;

$result=mysql_query("SELECT * from $table1");
$myrow = mysql_fetch_array($result);

$kol_columns = mysql_num_fields($result); //кол колонок

 for ($i = 0; $i < $kol_columns; $i++) {
    
	$meta = mysql_fetch_field($result,$i);
     if($meta->primary_key == 1){$column_id=$i;break;}
  }
	/*
	$pieces = explode(" ", mysql_field_flags($result,$i));
      foreach($pieces as $index => $val)    {if($val =='primary_key'){$column_id=$i;}   }
*/
mysql_field_name($result, $column_id);

return mysql_field_name($result, $column_id);
}



function print_select_menu(
				$table_dic, //название таблицы-справочника
				$second_column_nomer, //номер выводимой колонки справочника таблицы
				$name_for_select, //имя для атрибута select
				$label, // выводимое сообщение для selecta
				$id_from_general_table)//значение поля внешнего ключа
				{
       print "<label>$label<br>\n<select name='$name_for_select'>\n";
      $result = mysql_query("SELECT * FROM $table_dic");

	if (!$result){
			echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@sustdevedu.com. <br> <strong>Код 	ошибки:</strong></p>";
			exit(mysql_error());
		}

	if (mysql_num_rows($result) > 0){


			$myrow = mysql_fetch_array($result); 
			$column_id_name =  getNameColumnId($table_dic);
			
			
			
			
//			$select_from_country_special=mysql_query("select $column_id_name from $table_dic where $column_id_name = //$id_from_general_table");
			$myrow_country_of_sel=mysql_fetch_array($select_from_country_special);

			do{
				if($myrow[$column_id_name]==$id_from_general_table){$selected="SELECTED";}else{$selected="";}
				printf ("<option value='%s' %s>%s</option>",$myrow[$column_id_name],$selected,$myrow[$second_column_nomer]);
				}
			while ($myrow = mysql_fetch_array($result));

			}

			else
			{
				echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
				exit();
			}
			print"</select></label>";
			
			
		   
	}
		   
		   


function send_mime_mail($name_from, // имя отправителя
                        $email_from, // email отправителя
                        $name_to, // имя получателя
                        $email_to, // email получателя
                        $data_charset, // кодировка переданных данных
                        $send_charset, // кодировка письма
                        $subject, // тема письма
                        $body // текст письма
                        ) {
  $to = mime_header_encode($name_to, $data_charset, $send_charset)
                 . ' <' . $email_to . '>';
  $subject = mime_header_encode($subject, $data_charset, $send_charset);
  $from =  mime_header_encode($name_from, $data_charset, $send_charset)
                     .' <' . $email_from . '>';
  if($data_charset != $send_charset) {
  $body = iconv($data_charset, $send_charset, $body);
  }
  $headers = "From: $from\r\n";
  $headers .= "Content-type: text/plain; charset=$send_charset\r\n";

  return mail($to, $subject, $body, $headers);
}






function mime_header_encode($str, $data_charset, $send_charset) {
  if($data_charset != $send_charset) {
    $str = iconv($data_charset, $send_charset, $str);
  }
  return '=?' . $send_charset . '?B?' . base64_encode($str) . '?=';
}

/*
send_mime_mail('Автор письма',
               'sender@site.ru',
               'Получатель письма',
               'sanzhar73@mail.ru',
               'UTF-8',  // кодировка, в которой находятся передаваемые строки
               'KOI8-R', // кодировка, в которой будет отправлено письмо
               'Письмо-уведомление',
               "Здравствуйте, я Ваша программа!"); 
	*/






function user_modules_passed($massiv_id_module, $us_id){

	foreach($massiv_id_module as $key => $value){
		//printf("Номер модуля - %s<br>", $value);
		$lessonSeq=0;
		$result77 = mysql_query("SELECT * FROM lessons WHERE module = $value ORDER BY id");
		if($result77){
			$myrow = mysql_fetch_array($result77);
			do{
			$lessonSeq++;
			$result_user = mysql_query("SELECT * FROM user_test_passed WHERE lesson = $myrow[id] AND user_id = $us_id ORDER BY id");
		    if(mysql_num_rows($result77)>0){
				if(mysql_num_rows($result_user)<1) {
				$user_modules_passed[$value][$lessonSeq]="$myrow[id]";
						}
				}
					else{exit ("ответов на запрос не найдено обратитесь к админу");}
			}
			while($myrow = mysql_fetch_array($result77));
		echo"<br>";
		}else{
		"ошибка".mysql_error();
		}
	}
  return $user_modules_passed;
}

//возвращает массив отосортированный случайным образом
function return_unsorted_massiv($massiv_id_module, $id_name, $tablename, $column_select){
	$arr; 
	foreach($massiv_id_module as $key => $value){
		

		$result= mysql_query("SELECT $id_name FROM $tablename WHERE $column_select = $value ORDER BY $id_name");
		if(mysql_num_rows($result)>0){   
			$myrow = mysql_fetch_array($result);
			do{
					$arr[]=$myrow[$id_name];
				}
			while($myrow = mysql_fetch_array($result));
		echo"<br>";
		}else{
		"ошибка".mysql_error();
		}
	}
	/*foreach($arr as $index=>$val){
	echo"$index->$val"."<br>";}
*/
	
	shuffle($arr);
	return $arr;
}






function isWhereAreYouFrom() {
    if(isset($_POST['lesson_id'])) return "fromTestSelectionPage"; // возвращается значение переменной $ret
	    else if(isset($_POST['testing_id'])) return "fromFinalTestSelectionPage";
    else if(isset($_POST['continueAfterGoodAnswer'])) return "continueAfterGoodAnswer";
        else if(isset($_POST['continueAfterBadAnswer']))   return "continueAfterBadAnswer";
            else return "fromNothing";
}



function exitANdBackButton() {
    exit("<br><input type='button' value='Back' name='back' onclick='javascript:self.back();'/> ");
}



function zaporosOtvetov($testId) {
    $result=mysql_query("SELECT test_id,  question,  answer_id FROM tests
WHERE test_id='$testId'", $db);
    //increasing of questin number +1
    if(!$result) {
        echo "<p>Запрос в базу не прошел, напишите об этом админу (sanzhar73@mail.ru).
<br><strong>Код ошибки:</strong></p>";
        exit(mysql_error());
    }
    if(mysql_num_rows($result)>0) {
        $myrow=mysql_fetch_array($result);
    }
    else {
        echo "<p> Информация не может быть извлечена, в таблице нет вопросов</p>";
        exit();
    }
}



// vozvrashaet znachenie kolonki dannoi stroki
function returnStringFromBDTable($columnName,$currentQuestion) {
    $query = "SELECT $columnName FROM tests WHERE test_id = $currentQuestion";
    global $db;
    $result=mysql_query($query, $db);
    if(!$result) {exit("Такого вопроса нет в БД, обратитесь к админу!");}
    $myrow=mysql_fetch_array($result);
    return $myrow[0];
}

//poluchaet nomer tekushego voprosa
function returnIdOfCurrentQuestion($howMuchPassed, $lessonNumber) {
    $result=mysql_query("SELECT test_id FROM tests WHERE lesson_id='$lessonNumber' ORDER BY test_id DESC");
    global $db;
    $numRows = mysql_num_rows($result);
   // print("\$numRows = ". $numRows."<br>");
   // print("\$howMuchPassed = ". $howMuchPassed."<br>");

    for($i=0;$i < ($numRows-$howMuchPassed);$i++) {
        $myrow=mysql_fetch_array($result);
    }
    return $myrow[0];
}








function obrabotkaOtveta() {
    if(!isset($_POST['RadioGroup1'])) {
        
    //  $_SESSION['variant'] = "radioNotSelected";
        return "<p><font color='brown'> Вы не выбрали ни один вариант!</font></p>";
    }

    else {
        $_SESSION['howMuchTried']++;
        //echo $_SESSION['howMuchTried'];
        $answer_user=$_POST['RadioGroup1'];// perenos otveta usera v mest peremennnuy
        $writeId=$_POST['writeId'];

        if($answer_user !== $writeId) {
        //$_SESSION['variant'] = "wrongAnswer";
            return "<p><font color='red'> Неправильно. Попытайтесь снова! </font></p>";
        }
        else {
            if($_SESSION['howMuchPassed'] !== ($_SESSION['howManyQestNumber']-1)) {
                $_SESSION['howMuchPassed']++;
                //  $_SESSION['variant'] = "writeAnswer";
                return "<font color='green'><p><strong>Поздравляем!</strong></p><p>Вы выбрали правильный ответ.</p></font>";
            }
            else {
            //$_SESSION['variant'] = "writeLastAnswer";
            $passedForNote =$_SESSION[howMuchPassed]+1;
           // include '../blocks/bd.php';

           echo  "$_SESSION[user_surname_name]" ;
		   
            $res = mysql_query(
 "INSERT INTO `user_test_passed` (
`id`,
`user_id`,
`lesson`,
`quantity_quest`,
`quantity_tried`,
`date_time`
)
VALUES (
NULL,
'$_SESSION[user_id]',
'$_SESSION[lessonNumber]',
'$passedForNote',
'$_SESSION[howMuchTried]',
current_timestamp()
)");


if($res){
exit ("<font color='blue' size='5'><p><strong>Ура!</strong></p><p>Вы прошли этот тест.</p></font>
Статистика <br>Вопросов: $passedForNote, попыток: $_SESSION[howMuchTried].
                      <form action='view_modules.php' name='form_obr'  method='POST'>
                      <input type='submit' value='На главную' name=''>
                      </form>");}
else{ exit("Данные не сохранены в базе данных, обратитесь к админу.");}
            }
        }

    }
}

function checkingDate($dateOfBirth) {
    $y=substr($dateOfBirth,6,4);
    $m=substr($dateOfBirth,3,2);
    $d=substr($dateOfBirth,0,2);
    return checkdate($m, $d, $y);
}

function convertDate($dateOfBirth) {
    return substr($dateOfBirth,6,4)."-".substr($dateOfBirth,3,2)."-".substr($dateOfBirth,0,2);
}

function insertCodeImage() {
    $img = imagecreatetruecolor(70, 50);

    $number_string  = mt_rand(500, 100000);


    $number_bg  = mt_rand(1, 5);
    $number_font  = mt_rand(1, 3);
    if($img) {

        $blueLight=imagecolorallocate($img, 108, 186,225);
        $blue=imagecolorallocate($img, 108, 186,225);
        $yellow=imagecolorallocate($img, 255, 250,0);
        $white = imagecolorallocate($img, 255, 255, 255);


        $blue_font=imagecolorallocate($img, 20, 28,172);
        $green_font=imagecolorallocate($img, 0, 255,0);
        $gray_font=imagecolorallocate($img, 128, 128,128);

        switch($number_bg) // переключающее выражение
        {
            case 1: // константное выражение 1
                $colour_bg=$blueLight; // блок операторов
                break;
            case 2: // константное выражение 2
                $colour_bg=$blue;
                break;
            case 3: // константное выражение 2
                $colour_bg=$yellow;
                break;
            case 4: // константное выражение 2
                $colour_bg=$white;
                break;
            default:
                $colour_bg=$blueLight;
        }
        switch($number_font) // переключающее выражение
        {
            case 1: // константное выражение 1
                $colour_font=$blue_font; // блок операторов
                break;
            case 2: // константное выражение 2
                $colour_font=$green_font; // блок операторов
                break;
            case 3: // константное выражение 2
                $colour_font=$gray_font; // блок операторов
                break;
            default:
                $colour_bg=$blue_font;
        }


        imagefill($img, 0, 0, $colour_bg);
        imagestring($img, 5, 10, 20, $number_string, $colour_font);

        //header("Content-type: " .image_type_to_mime_type(IMAGETYPE_PNG));
        $umageurl="code.png";



      //  if (is_file($umageurl)) {print "The file $umageurl is valid and exists!";}

       // else {print "The file $umageurl does not exist or it is not a valid file!";}

       // $file = $umageurl; // Некоторый файл

        //exec("chmod a+rwx code.png");
     //   $output=`chmod a+rwx code.png`;

        //print("<br>\$output = ". $output);
        //chmod("data_file.txt", 0766);
        //chmod("code.png", 0766);
     //   echo "<br>fileperms = ".fileperms("code.png");
      //  echo "<br>fileowner = ".fileowner("code.png");


        //$fh = fopen($file, "w+") or die("File ($file) does not exist!");

        //Следующий фрагмент открывает подключение к сайту PHP (http://www.php.net):




        //$site = "http://www.localhost.phpblog/";
        ////$site = "http://www.sustdevedu.com/code.png";// Сервер, доступный через HTTP

        //$sh = fopen($site, "r");     //Связать манипулятор с индексной страницей Php.net

        //После завершения работы файл всегда следует закрывать функцией fclose( ).

     //   echo "<P>is_writeable(\$file)".is_writeable($file);


$f=fopen("code.png", "w");
 //for ($x=0; $x<2; $x++) {
//  fwrite($f, $save[$x]);
// }

     //   unlink($umageurl);
        // print "$umageurl";
     //   header('Content-type: image/png');
        imagepng($img,$umageurl);
         fclose($f);
      //  imagedestroy($img);

    }
    return $number_string;
}




$daysList="<select name='day_birth'>
<option value=''></option>
<option value='01'>01</option>
<option value='02'>02</option>
<option value='03'>03</option>
<option value='04'>04</option>
<option value='05'>05</option>
<option value='06'>06</option>
<option value='07'>07</option>
<option value='08'>08</option>
<option value='09'>09</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select>
";
$monthsList="<select  name='month_birth'>
<option value=''></option>
<option value='01'>Январь</option>
<option value='02'>Февраль</option>
<option value='03'>Март</option>
<option value='04'>Апрель</option>
<option value='05'>Май</option>
<option value='06'>Июнь</option>
<option value='07'>Июль</option>
<option value='08'>Август</option>
<option value='09'>Сентябрь</option>
<option value='10'>Октябрь</option>
<option value='11'>Ноябрь</option>
<option value='12'>Декабрь</option>
</select>";



$yearsList="
<select  name='year_birth'>
<option></option>
<optgroup label='1930'>
<option>1930</option>
<option>1931</option>
<option>1932</option>
<option>1933</option>
<option>1934</option>
<option>1935</option>
<option>1936</option>
<option>1937</option>
<option>1938</option>
<option>1939</option>
</optgroup'>
<optgroup label='1940'>
<option>1940</option>
<option>1941</option>
<option>1942</option>
<option>1943</option>
<option>1944</option>
<option>1945</option>
<option>1946</option>
<option>1947</option>
<option>1948</option>
<option>1949</option>
</optgroup'>
<optgroup label='1950'>
<option>1950</option>
<option>1951</option>
<option>1952</option>
<option>1953</option>
<option>1954</option>
<option>1955</option>
<option>1956</option>
<option>1957</option>
<option>1958</option>
<option>1959</option>
</optgroup'>
<optgroup label='1960'>
<option>1960</option>
<option>1961</option>
<option>1962</option>
<option>1963</option>
<option>1964</option>
<option>1965</option>
<option>1966</option>
<option>1967</option>
<option>1968</option>
<option>1969</option>
</optgroup'>
<optgroup label='1970'>
<option>1970</option>
<option>1971</option>
<option>1972</option>
<option>1973</option>
<option>1974</option>
<option>1975</option>
<option>1976</option>
<option>1977</option>
<option>1978</option>
<option>1979</option>
</optgroup'>
<optgroup label='1980'>
<option>1980</option>
<option>1981</option>
<option>1982</option>
<option>1983</option>
<option>1984</option>
<option>1985</option>
<option>1986</option>
<option>1987</option>
<option>1988</option>
<option>1989</option>
</optgroup'>
<optgroup label='1990'>
<option>1990</option>
<option>1991</option>
<option>1992</option>
<option>1993</option>
<option>1994</option>
</select>
";





function obrabotkaOtvetaFinal() {

	



    if(!isset($_POST['RadioGroup1'])) 										{$variant =1;}

    else {
		$_SESSION['howMuchPassed']++;
		 $answer_user=$_POST['RadioGroup1'];// perenos otveta usera v mest peremennnuy
        $writeId=$_POST['writeId'];
        if($answer_user !== $writeId){ 
				if($_SESSION['howMuchPassed'] !== ($_SESSION['howManyQestNumber'])) {$variant =2;}
					 else{$variant =4;}}
        else {
		$_SESSION['howMuchGood']++;
			if($_SESSION['howMuchPassed'] !== ($_SESSION['howManyQestNumber'])) {$variant =3;}
			 else																{$variant =4;}
			 }
		}

	
		
		
	switch($variant){
		case 1:
			return "<p><font color='brown'> Вы не выбрали ни один вариант!</font></p>"; 
			break;
		case 2: 
		    include('blocks/for_debug.php');
			return "<p><font color='red'> Неправильно. </font></p>";
			break;
		case 3: 
			include('blocks/for_debug.php');
			return "<font color='green'><p><strong>Правильно!</strong></p></font>";
			break;
		case 4:   include('blocks/for_debug.php');
		
		$pos=$_SESSION[howMuchGood];
		$total = $_SESSION['howMuchPassed'];
		$proc = ceil($pos * 100 /$total);
		if($proc>69){$passed = 1;}else{$passed = 0;}
		$kolvo_modules=count($_SESSION['modules_user_passed']);		

		
	


$filename = date('Y-m-d-H-i-s')
	.'_'
	.$_SESSION['login']
	.'.pdf'
	;
$path_filename='sertificates/'.$filename;
		
		$result1 = mysql_query(
		"INSERT INTO 
  `user_test_sert`
(
  `id`,
  `user_id`,
  `quantity_module`,
  `quantity_quest`,
  `quantity_answ`,
  `procents`,
  `passed`,
  `date_time`,
  `sertificate`
) 
VALUE (
  NULL,
  '$_SESSION[user_id]',
  '$kolvo_modules',
  '$total',
  '$pos',
  '$proc',
  '$passed',
  current_timestamp(),
  '$path_filename'
)");
if ($result1){
$id_sert = mysql_insert_id();
foreach($_SESSION['modules_user_passed'] as $index=>$val){
$result2 = mysql_query("INSERT INTO `user_sert_modules`(`id`,`user_test_sert_id`,`module`) VALUE (NULL,$id_sert,$val)");
if ($result2){echo "";}else{echo "обратитесь к админу, ошибка: ".mysql_error();}
}
}else{echo "Данные в таблице по модулям тестов на серификат  не сохранились, обратитесь к админу".mysql_error();}

include ('sert.php');

$notif_for_admin='Здравствуйте, admin.
Уведомляем, что '.$_SESSION["user_surname_name"].'
 прошел(а) финальное тестирование.

файл сертификата http://www.sustdevedu.kz/'.$path_filename;
$subject_for_admin = 'Новый  пользователь ('.$_SESSION["user_surname_name"].') прошел(а) финальное тестирование на вашем сайте';
$to_admin = 'sanzhar73@mail.ru';




 send_mime_mail('Сайт курса по уст развитию',
               'admin@sustdevedu.com',
               'Админ www.SustDevEdu.kz',
               $to_admin,
               'UTF-8',  // кодировка, в которой находятся передаваемые строки
               'KOI8-R', // кодировка, в которой будет отправлено письмо
               $subject_for_admin,
               $notif_for_admin); 
		   
			   
 send_mime_mail('Сайт курса по уст развитию',
               'admin@sustdevedu.com',
               'Админ www.SustDevEdu.kz',
              'goncharova.2004@mail.ru',
               'UTF-8',  // кодировка, в которой находятся передаваемые строки
               'KOI8-R', // кодировка, в которой будет отправлено письмо
               $subject_for_admin,
               $notif_for_admin); 
			  /*
			   
  send_mime_mail('Сайт курса по уст развитию',
               'admin@sustdevedu.com',
               'Админ www.SustDevEdu.kz',
              'sanzhar73$google.com',
               'UTF-8',  // кодировка, в которой находятся передаваемые строки
               'KOI8-R', // кодировка, в которой будет отправлено письмо
               $subject_for_admin,
               $notif_for_admin); 
			   */

if($passed>0){$message="Поздравляем, вы прошли этот тест и можете скачать сертификат!".$anchor_sert;


/* echo '
<form action="sert.php" method="post" target="_self">

<input name="print_pdf" type="submit" value="Получение сертификата" />
</form>
';

 */

}
else{$message="К сожалению Вы не прошли этот тест, поскольку набрали недостаточно балов. Но вы можете подготовиться, и пройти его заново, когда будет удобно";}

		
	
			exit ("<font color='black' size='5'><p align='center'>$message.</font>
<p>Статистика <br>Вопросов:$total, 
правильных ответов:$pos.
Таким образом вы ответили на $proc  процентов
                      <form action='view_modules.php' name='form_obr'  method='POST'>
                      <input type='submit' value='На главную' name=''>
                      </form>");
					  
			
			break;
		default:       
			return "<font color='green'><p><strong>Странно</strong></p></font>";
			break;
		
	} 


}
















?>
