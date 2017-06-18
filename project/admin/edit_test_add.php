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
       <form name="form1" method="post" action="update_test.php">
      
    
         <?php 
if(isset ($_POST['submit_quest'])) {
    if(isset ($_POST['id'])) {$id=$_POST['id'];}
    
	  $result = mysql_query("SELECT test_id, lesson_id, question, answer_id  FROM tests WHERE test_id ='$id'",$db);
	  $myrow = mysql_fetch_array($result); 
	   $result_answ = mysql_query("SELECT * FROM answers where test_id = $myrow[test_id]",$db);
	  $myrow_answ = mysql_fetch_array($result_answ); 
	//	$answer_id_next = $myrow_answ[0];
	 
	 
	  //echo(" <h3 align='center'> Урок:<font color='blue'>".$myrow['title']."</font></h3>");
	 
	 
	  printf ("<p><font color='blue'>Вопрос $n</font><br><textarea name='question' cols='50' rows='4'>$myrow[question]</textarea></p>");
	
	
	
	do{
		$n = $i+1;
		$answer_id_next++;
		if($myrow_answ['answer_id'] == $myrow['answer_id']){$checked ="checked"; }else{$checked =""; }
		printf ("<p>Ответ $n
		<input name='ans_right_id' type='radio' value='$myrow_answ[answer_id]' $checked><label>Правильный</label>\n
		
		
		<br><textarea name='answers[$myrow_answ[answer_id]]' cols='100' rows='4'>$myrow_answ[text]</textarea></p>");
		}
		while($myrow_answ = mysql_fetch_array($result_answ));

	



}
else
{
echo "Как вы сюда попали?";
}
		 
		 
		 
	?>        <input name="test_id" type="hidden" value="<?php echo $id; ?>">
         
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
