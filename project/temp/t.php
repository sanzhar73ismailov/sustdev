
<?


function return_arr_all_modules ($user_id, $arr_current_modules){ // функция возвращает
//$_SESSION['user_id']
	$result_user_modules=mysql_query("
				select DISTINCT
				us.id AS id,
				usm.module AS module
				from users us
				inner join user_test_sert uts on (us.id=uts.user_id) 
				inner join user_sert_modules usm on (uts.id=usm.user_test_sert_id)
				where us.id = ".user_id.
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
			
			
			

			return $modulenames;




}
$array1 = array(9,8,1);
$array2 = array(1,5,4,8);


$mas = $array2;

// $result =  array_merge ($array1, $array2);

// $result = array_unique ($result);

// sort ($result);

// reset ($result);

 print "<pre/>";
print_r ($mas);







?>
















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        

    </head>

    <body>
    </body>
</html>
