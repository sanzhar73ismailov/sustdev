<?session_start();//header('Content-Type: text/html; charset=utf-8');
  
  // 1. connecting with bd
include("blocks/bd.php");
//podkluchaen proceduri
include("procedures/proc_for_test.php");
  
  
  
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>контрольные вопросы, закрепление материала</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <meta name="description" content="контрольные вопросы" />
        <meta name="keywords" content="контрольные вопросы" />

    </head>

    <body>
 
    <table width="850" border="0" align="center" bgcolor="#FFFFFF" class="main_border">
      <?php include("blocks/header.php"); ?>
      <tr>
      
      <td>







<table width="600"  class="test_td">



  <tr>
    <td>
    
   <?php 




if(isWhereAreYouFrom() == "fromTestSelectionPage") {


    $_SESSION['lessonNumber'] = $_POST['lesson_id'];

    // 4. getting massiv-voprosov of this lesson from database table tests

    $resultMassivQestNumber=mysql_query(
        "SELECT test_id, lesson_id, question, answer_id
            FROM tests WHERE lesson_id= $_SESSION[lessonNumber] ORDER BY test_id",$db);

    // 5. getting how many of question in this lesson from database table tests
    $_SESSION['howManyQestNumber']=mysql_num_rows($resultMassivQestNumber);



    //nachal'noe kolichestvo otvecennih voprosov
    $_SESSION['howMuchPassed']=0;

    //nachal'noe kolichestvo popitok
    $_SESSION['howMuchTried']=0;

    require 'procedures/form_test.php';

//        while (list ($name, $value) = each($HTTP_POST_VARS)) {echo "$name = $value<br>\n";}
//    while (list ($name1, $value1) = each($GLOBALS)) {echo "$name1 = $value1<br>\n";}

}



    elseif(isset($_POST['action'])) {
        echo obrabotkaOtveta();
         require 'procedures/form_test.php';
        //include 'test_obrabotka.php';
    


   

   
//    while (list ($name, $value) = each($HTTP_POST_VARS)) {echo "$name = $value<br>\n";}
//    while (list ($name1, $value1) = each($GLOBALS)) {echo "$name1 = $value1<br>\n";}



}
else { exit("<br><input type='button' value='Вернуться назад' name='back' onclick='javascript:self.back();'/> ");}



?>



 
    
    
    
   </td>
  </tr>
</table>



		</td>
      </tr>
      <tr>
        <?php include("blocks/footer.php"); ?>
      </tr>
    </table>
    </body>
</html>
