 <td valign="top">
       <form name="form1" method="post" action="new_test_add.php">
      
         <p>
           <label>Выберите урок к которому отностится тест<br>
           
           <select name="lesson">
           
           <?
		   

    if(isset ($_POST['id'])) {$id=$_POST['id'];}
		   
       $result = mysql_query("SELECT title,id FROM lessons where module = $id",$db);

if (!$result)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@sustdevedu.com. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 

do 
{
printf ("<option value='%s'>%s</option>",$myrow["id"],$myrow["title"]);



}
while ($myrow = mysql_fetch_array($result));



}

else
{
echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
exit();
}

?>
       
       
       
           </select>
           
           </label>
         </p>
         
         
         <p>
           <label>Введите количество ответов<br>
             <input type="text"  size="100%" name="num_answers" id="num_quest">
             </label>
         </p>
         
         
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Поехали">
           </label>
         </p>
       </form>
     