<?session_start();
if (($_SESSION['login'])) {
include("blocks/bd.php");
  if(isset ($_GET['module'])) {$module=$_GET['module'];}
  if(!isset ($module)) {$module=1;}
  $result=mysql_query("select * FROM modules WHERE id=$module",$db);

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
        <title><?php echo "Уроки модуля - $myrow[title]"; ?></title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <meta name="description" content="<?php echo $myrow["meta_d"]; ?>" />
        <meta name="keywords" content="<?php echo $myrow["meta_k"]; ?>" />

    </head>

    <table width="850" border="0" align="center" bgcolor="#FFFFFF" class="main_border">
      <?php include("blocks/header.php"); ?>
      <tr>
        <td valign="top"><table width="100%" border="0" align="center">
                        <tr>
                              <?php include("blocks/lefttd.php"); ?>
                            <td valign="top">
                                 <?php include("blocks/nav.php"); ?>
                              <?php echo $myrow["text"];

      $result=mysql_query("select id, title, description, date, author, mini_img, view FROM lessons
                WHERE module=$module",$db);

  if(!$result) {
      echo "<p>Запрос в базу не прошел, напишите об этом админу (sanzhar73@mail.ru).<br><strong>Код ошибки:</strong></p>";
      exit(mysql_error());
  }
  if(mysql_num_rows($result)>0) {
      $myrow=mysql_fetch_array($result);


      do{
// echo $myrow1["title"];
	printf ("<table class='post' align='center' width='500'>
			<tr><td class='post_title'>
			<p class= 'post_name'> <img class='mini' align ='left' src='%s'/> <a href='view_lesson.php?id=%s'>%s</a> </p>
			</td></tr>

			<tr>
                        <td>%s<p class='post_view'> Просмотров: %s</p></td>
                        </tr>

			</table><br><br>", $myrow["mini_img"], $myrow["id"], $myrow["title"],
                                        $myrow["description"], $myrow["view"]);

}
while($myrow=mysql_fetch_array($result));

  }
  else {
      echo "<p> Информация не может быть извлечена, в таблице нет записей</p>";
      exit();
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
<?
}else{
      include 'procedures/if_not_auth.php';
       }

       ?>