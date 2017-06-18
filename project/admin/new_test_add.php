<? include ("lock.php");  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Страница добавления нового теста</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<? include ("blocks/page_settings.php"); ?>
<table width="<?php echo $table_width; ?>" border="<?php echo $table_border; ?>" align="center" cellpadding="<?php echo $table_cellpadding; ?>" cellspacing="<?php echo $table_cellspacing; ?>" bgcolor="$table_bgcolor" class="main_border">
<!--Подключаем шапку сайта-->
<? include("blocks/header.php");   ?> 
  <tr>
    <td><table width="<?php echo $table_width; ?>" border="<?php echo $table_border; ?>" cellspacing="<?php echo $table_cellspacing; ?>" cellpadding="<?php echo $table_cellpadding; ?>">
      <tr>
<!--Подключаем левый блок сайта-->
<? include ("blocks/lefttd.php");  ?> 
    
        <td valign="top">
       <form name="form1" method="post" action="add_test.php">
      
    
         <?php 
if(isset ($_POST['submit'])) {
    if(isset ($_POST['lesson'])) {$lesson=$_POST['lesson'];}
    if(isset ($_POST['num_answers'])) {$num_answers=$_POST['num_answers'];}
	if (!preg_match("|^[\d]+$|", $num_answers)) {exit ("<p>Неверный формат количества ответов! Проверьте, поле не должно быть пустым и число ли это?");}
   // if (empty($lesson) && empty($num_quest)){exit ("<p>Вы ввели не всю информацию!");
	//echo  "<br>".$lesson;
	//echo  "<br>".$num_quest;
	
	  $result = mysql_query("SELECT title,id FROM lessons where id =$lesson ",$db);
	  $myrow = mysql_fetch_array($result); 
	   $result_answ = mysql_query("SELECT answer_id FROM answers order by answer_id desc limit 1",$db);
	  $myrow_answ = mysql_fetch_array($result_answ); 
		$answer_id_next = $myrow_answ[0];
	 
	 
	  echo(" <h3 align='center'> Урок:<font color='blue'>".$myrow['title']."</font></h3>");
	 
	 
	  printf ("<p><font color='blue'>Вопрос $n</font><br><textarea name='question' cols='50' rows='4'></textarea></p>");
	
	
	
	for($i;$i<$num_answers;$i++){
		$n = $i+1;
		$answer_id_next++;
		printf ("<p>Ответ $n
		<input name='ans_right_id' type='radio' value=$answer_id_next><label>Правильный</label>\n
		
		
		<br><textarea name='answers[$answer_id_next]' cols='100' rows='4'></textarea></p>");
		}

	



}
else
{
echo "Как вы сюда попали?";
}
		 
		 
		 
	?>        <input name="lesson" type="hidden" value="<?php echo $lesson; ?>">
         
      	    <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Поехали">
           </label>
         </p>
	  
         
      
       </form>
       <p>&nbsp;</p>        </td>
      </tr>
    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
