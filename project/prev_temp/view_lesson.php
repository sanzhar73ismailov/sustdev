<?session_start();
if (($_SESSION['login'])) {
  include("blocks/bd.php");
  if(isset ($_GET['id'])) {$id=$_GET['id'];}
  if(!isset ($id)) {$id=1;}
  $result=mysql_query("select * FROM lessons WHERE id=$id",$db);

  if(!$result) {
      echo "<p>Запрос в базу не прошел, напишите об этом админу (admin@mail.ru).<br><strong>Код ошибки:</strong></p>";
      exit(mysql_error());
  }
  if(mysql_num_rows($result)>0) {
      $myrow=mysql_fetch_array($result);
      $new_view=$myrow["view"]+1;
      $update_view=mysql_query("UPDATE lessons SET view='$new_view' WHERE id=$id", $db);
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

        <table width="615" border="1" align="center" bgcolor="#FFFFFF" class="main_border">
              <?php include("blocks/header.php");?>
            <tr>
                <td valign="top"><table width="100%" border="1">
                        <tr>
                              <?php include("blocks/lefttd.php"); ?>
                            <td valign="top">
                                   <?php include("blocks/nav.php"); ?>
                                  <?php
                                  printf("<p class='post_title2'>%s</p>%s<p class='post_view'>Просмотров: %s</p>",
                                      $myrow["title"], $myrow["text"], $myrow["view"]);
                                  
                                  ?>
                                <? include 'blocks/test_start.php'; ?>
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
<?
}else{
      include 'procedures/if_not_auth.php';
       }

       ?>