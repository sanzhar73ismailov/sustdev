<? include ("lock.php");  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Страница редактирования тестов</title>
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
		   
           
    <?php 
if($_POST['submit_module']) {
           include("blocks/for_edit_test_less.php");  	
           }
		   elseif(($_POST['submit_less']) ){
		include("blocks/for_edit_test_quest.php");
          }
          else{
		include("blocks/for_edit_test_mod.php");
          }
	
    
    
    
	?>       
  
       
       
       
       
       
       
       
       
        </tr>
    </table></td>    
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
