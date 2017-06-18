 <td valign="top">
      
      
            <p><strong>Выберите вопрос  </strong></p>
          <form action="edit_test_add.php" method="post">
<? 
if(isset ($_POST['lesson'])) {$lesson=$_POST['lesson'];}
$result = mysql_query("SELECT test_id, lesson_id, question  FROM tests WHERE lesson_id ='$lesson'");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><input name='id' type='radio' value='%s'><label> %s</label></p>",$myrow['test_id'],$myrow['question']);
}

while ($myrow = mysql_fetch_array($result));
?>

<p> <input name="submit_quest" type="submit" value="Далее"></p>

</form>
         
         
         
         
 
       <p>&nbsp;</p>        </td>
 