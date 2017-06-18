<?php 
include ("lock.php");
include ("blocks/bd.php");
if ($_POST['delbutton']) {$variant =2;}else{$variant =1;}

if (isset($_GET['id'])) {$id = $_GET['id']; }
if ($_POST['delbutton']) {$delbox = $_POST['delbox'];}
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
if ($variant == 1){		

//echo "var - "."$variant";

if (isset($_GET['id']))
{
$result = mysql_query ("DELETE FROM users WHERE id='$id'");

if ($result == 'true') {echo "<p>Ваш пользователь успешно удален!</p>";}
else {echo "<p>Ваш пользователь не удален!</p>";}


}		 
else 

{
echo "<p>Вы запустили данный фаил без параметра id и поэтому, удалить пользователя невозможно.</p>";
}




}










if ($variant == 2){	

//echo "var - "."$variant";

 

if ($_POST['delbox'])
{

   foreach($delbox as $index => $val)
   {
     $result = mysql_query ("DELETE FROM users WHERE id='$val'");
	 if ($result == 'true') {echo "<p> пользователь с логином \"$index\" успешно удален!</p>";}
else {echo "<p>пользователь с логином \"$index\"  не удален!</p>";}
	 // echo("$index -> $val <br>");
   }

/*
$result = mysql_query ("DELETE FROM users WHERE id='$id'");

if ($result == 'true') {echo "<p>Ваш пользователь успешно удален!</p>";}
else {echo "<p>Ваш пользователь не удален!</p>";}
*/

}		

 
else 

{
echo "<p>Вы не выбрали ни одного пользователя для волонтера и поэтому, удалить пользователя невозможно (скорее всего Вы не поставили галочку на предыдущем шаге).</p>";
}


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
