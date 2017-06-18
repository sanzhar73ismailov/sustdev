<?php 
include ("lock.php");
include ("blocks/bd.php");
if (!$_POST['submit']){exit("Обратитесь к админу");}
if(isset ($_POST['lesson'])) {$lesson=$_POST['lesson'];}
if(isset ($_POST['question'])) {$question=$_POST['question'];}
 if(isset ($_POST['ans_right_id'])) {$ans_right_id=$_POST['ans_right_id'];}
 if(isset ($_POST['answers'])) {$answers=$_POST['answers'];}
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
$result = mysql_query ("INSERT INTO tests (lesson_id,question,answer_id) VALUES ('$lesson','$question','$ans_right_id')");	
if ($result == 'true') {echo "<p>Ваш вопрос \"$question\" успешно добавлен!</p>";}
else {echo "<p>Ваш вопрос \"$question\" не добавлен!</p>".mysql_error();}
if ($result) {
$test_ins_id = mysql_insert_id();

   foreach($answers as $index => $val){
    $res= mysql_query ("INSERT INTO answers (answer_id, text, test_id) VALUES ('$index','$val','$test_ins_id')");	
	if($res) {
		if ($ans_right_id == $index) {$msg="<font color='blue'>(выбран правильным)</font>";}else{$msg="";}
		echo "Вариант ответа \"$val\" $msg успешно добавлен "."<br>";}
	else{echo "bad for - ".$index."<br>".mysql_error();}
   }




}
		 
	

/*{

//$result = mysql_query ("INSERT INTO modules (title,meta_d,meta_k,text) VALUES ('$title', '$meta_d','$meta_k','$text')");

if ($result == 'true') {echo "<p>Ваш модуль успешно добавлен!</p>";}
else {echo "<p>Ваш модуль не добавлен!</p>";}


}		 
else 

{
echo "<p>Вы ввели не всю информацию, поэтому модуль в базу не может быть добавлен.</p>";
}
	
	*/	 
		 
		 
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
