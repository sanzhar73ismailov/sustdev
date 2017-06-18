//  <?php include("blocks/bd.php");
//  $result=mysql_query("select title, meta_d,meta_k,text FROM  settings WHERE page='indexMain'",$db);
//
//  if(!$result) {
//      echo "<p>Запрос в базу не прошел, напишите об этом админу (admin@mail.ru).<br><strong>Код ошибки:</strong></p>";
//      exit(mysql_error());
//  }
//  if(mysql_num_rows($result)>0) {
//      $myrow=mysql_fetch_array($result);
//  }
//  else {
//      echo "<p> Информация не может быть извлечена, в таблице нет записей</p>";
//      exit();
//  }
//  ?>
//<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
//<html xmlns="http://www.w3.org/1999/xhtml">
//    <head>
//        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
//        <title><?php echo $myrow["title"]; ?></title>
//        <link href="style.css" rel="stylesheet" type="text/css" />
//        <meta name="description" content="<?php echo $myrow["meta_d"]; ?>" />
//        <meta name="keywords" content="<?php echo $myrow["meta_k"]; ?>" />
//
//    </head>
//
//    <body>
//        <table width="690" border="1" align="center" bgcolor="#FFFFFF" class="main_border">
//              <?php include("blocks/header.php"); ?>
//            <tr>
//                <td valign="top"><table width="100%" border="1">
//                        <tr>
//                              <?php include("blocks/lefttd.php"); ?>
//                            <td><?php echo $myrow["text"]; ?></td>
//                        </tr>
//                    </table></td>
//            </tr>
//            <tr>
//                  <?php include("blocks/footer.php"); ?>
//            </tr>
//        </table>
//    </body>
//</html>
