<? include ("lock.php");  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Страница добавления нового модуля</title>
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
       <form name="form1" method="post" action="add_module.php">
         <p>
           <label>Введите название модуля<br>
             <input type="text" size="100%" name="title" id="title">
             </label>
         </p>
         <p>
           <label>Введите краткое описание модуля<br>
           <textarea name="meta_d" id="meta_d" cols="100" rows="4"></textarea>
           </label>
         </p>
         <p>
           <label>Введите ключевые слова для модуля<br>
           <input type="text"  size="100%" name="meta_k" id="meta_k">
           </label>
         </p>
         
         <p>
           <label>Введите полный текст модуля с тэгами
           <textarea name="text" id="text" cols="100" rows="20"></textarea>
           </label>
         </p>
     
        
         
         
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Занести модуль в базу">
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
