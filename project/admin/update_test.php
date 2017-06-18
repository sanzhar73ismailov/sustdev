<?php 
include ("lock.php");
include ("blocks/bd.php");
if (!$_POST['submit']){exit("Обратитесь к админу");}
if(isset ($_POST['test_id'])) {$test_id=$_POST['test_id'];}
if(isset ($_POST['question'])) {$question=$_POST['question'];}
 if(isset ($_POST['ans_right_id'])) {$ans_right_id=$_POST['ans_right_id'];}
 if(isset ($_POST['answers'])) {$answers=$_POST['answers'];}
 echo("test_id -> $test_id <br>");
  echo("question -> $question <br>");
   echo("ans_right_id -> $ans_right_id <br>");
    
   
   
   
   foreach($answers as $index => $val)
   {
      echo("$index -> $val <br>");
   }

 echo("ans_right_id -> $ans_right_id <br>");
  
 
 
     if(empty($question)){
	  exit("<p>Вы не заполнили поле вопроса!.
<br><input type='button' value='Вернуться назад' name='back' onclick='javascript:history.go(-1);'/> ");
}
 
  
  
   if(empty($ans_right_id)){
	  exit("<p>Вы не выбрали правильный ответ!.
<br><input type='button' value='Вернуться назад' name='back' onclick='javascript:history.go(-1);'/> ");
}
  
    foreach($answers as $index => $val){
      if(empty($val)){
	  exit("<p>Вы заполнили не все ответы!.
<br><input type='button' value='Вернуться назад' name='back' onclick='javascript:history.go(-1);'/> ");
	  }
   }
   
   
   
   


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 
<title>Обработчик</title>
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
      
         <?php 
$result = mysql_query ("UPDATE tests  SET  question = '$question', answer_id ='$ans_right_id' WHERE test_id = '$test_id'");	
if ($result == 'true') {echo "<p class='lesson_name'>Ваш вопрос \"$question\" успешно обновлен!</p>";}
else {echo "<p>Ваш вопрос \"$question\" не обновлен!</p>".mysql_error();}


if ($result) {
//$test_ins_id = mysql_insert_id();
echo "<ul>";
   foreach($answers as $index => $val){
    $res= mysql_query ("UPDATE answers  SET  text = '$val', test_id ='$test_id' WHERE answer_id = '$index'");	
	echo "<li>";
	if($res) {
		if ($ans_right_id == $index) {$msg="<font color='blue'>(выбран правильным)</font>";}else{$msg="";}
		echo "Вариант ответа \"$val\" $msg успешно обновлен "."<br>";}
	else{echo "bad for - ".$index."<br>".mysql_error();}
   }
   	echo "</li>";
echo "</ul>";



}
		 



	
		 ?>
         
         
             </td>
      </tr>
    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
