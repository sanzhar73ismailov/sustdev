<?session_start();
  include("blocks/bd.php");
  include("procedures/proc_for_test.php"); 
  

  $result=mysql_query("select title, meta_d,meta_k,text FROM  settings WHERE page='testing'",$db);

  if(!$result) {
      echo "<p>Запрос в базу не прошел, напишите об этом админу (admin@mail.ru).<br><strong>Код ошибки:</strong></p>";
      exit(mysql_error());
  }
  if(mysql_num_rows($result)>0) {
      $myrow=mysql_fetch_array($result);
  }
  else {
      echo "<p> Информация не может быть извлечена, в таблице нет записей</p>";
      exit();
  }
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $myrow["title"]; ?></title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <meta name="description" content="<?php echo $myrow["meta_d"]; ?>" />
        <meta name="keywords" content="<?php echo $myrow["meta_k"]; ?>" />

    </head>

    <body>
        <table width="850" border="0" align="center" bgcolor="#FFFFFF" class="main_border">
              <?php include("blocks/header.php"); ?>
            <tr>
               <td valign="top"><table width="100%" border="0" align="center">
                        <tr>
                              <?php include("blocks/lefttd.php"); ?>
                            <td  valign="top">
                                 <?php $n=2; include("blocks/nav.php"); ?>
                              <?php echo $myrow["text"]; 


    if (($_SESSION['login'])) {
//	echo "hello";
        if($_POST['subm_mod']){
		
		  if(isset($_POST['mod_id'])) {$mod_id=$_POST['mod_id'];}else{
		  exit("<p>Вы не выбрали ни один модуль.
			<br><input type='button' value='Вернуться назад' name='back' onclick='javascript:history.go(-1);'/> ");
    		}
		
			if($mass = user_modules_passed($mod_id,$_SESSION['user_id'])){
			      
				 
				     echo("Для тестирования по выбранным модулям Вам необходимо пройти непройденные (см. ниже) уроки и ответить на контрольные вопросы к ним:");  
				   foreach($mass as $index => $val){
				     echo("<br>Модуль  $index  <br>");
					  foreach($val as $index2 => $val2){
						 echo("&nbsp;&nbsp;&nbsp;&nbsp; Урок  $index2 -> <a href='view_lesson.php?id=$val2'>Перейти</a> <br>");}
			   }} else{
			   $massive_modules = return_unsorted_massiv($mod_id, "id","lessons","module");
			  $massive_voprosov = return_unsorted_massiv($massive_modules, "test_id","tests","lesson_id");
			  
			 $_SESSION['modules_user_passed'] = $mod_id;
		 
		   echo '<p align="center">Вы прошли все уроки по выбранным модулям и можете начать тестирование.<br> Для этого нажмите кнопку "Тест"</br></p>
			   	   <form action="test_final_rout.php" method="post" name="test_final_rout.php">
				   
			   <input type="hidden" name="testing_id" value="1" />
  				<p align="center"><input name="button_start_test" type="submit" value="Тест"></p>';
				foreach($massive_voprosov as $index=>$val){
						echo'<input type="hidden" name="massive_voprosov[]" value="'.$val.'">';
						//echo"$index->$val"."<br>";
				}
				echo '</form>';
			   //knopka k testu
			   }
			  
		
		}
  		else{
	   
	    echo "<div class='nav_title'>Тестирование. Выберите модули для тестирования. </div>";

        $result3=mysql_query("select * FROM  modules order by id",$db);

        if(!$result2) {
            echo "<p>Запрос в базу не прошел, напишите об этом админу (sanzhar73@mail.ru).<br><strong>Код ошибки:</strong></p>";
            exit(mysql_error());
        }
        if(mysql_num_rows($result2)>0) {

            $myrow_for_testings=mysql_fetch_array($result3);

			
	   echo '<form action="testing.php" method="post" name="form_modulles">';





            do {
            printf("\n<br><input name='mod_id[]' type='checkbox' value='%s'>%s</br>\n",$myrow_for_testings["id"],$myrow_for_testings["title"]);
            }
            while ($myrow_for_testings=mysql_fetch_array($result3));
			echo '<p><input name="reset" type="reset" value="Сброс">
			<input name="subm_mod" type="submit"  value="Далее"></p>
</form>';
        }else {
            echo "<p> Информация не может быть извлечена, в таблице нет записей</p>";
            exit();
        }



   
   
   
   
    }}else {
	echo exit(" <blockquote>
                   <p><div class='style_h'>Для просмотра этой страницы Вам необходимо пройти авторизацию или регистрацию если вы еще этого не делали.</div></p>
          </blockquote>");

        }
    

    ?>
    
                              
                              
                              
                              
                              </td>
                              
                              
                              
                              
                              
                        </tr>
                     </table></td>
            </tr>
            <tr>
                  <?php include("blocks/footer.php"); ?>
            </tr>
        </table>
    </body>
</html>
