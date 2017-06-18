 <td valign="top">
      
      
            <p><strong>Выберите модуль          </strong></p>
          <form action="<?echo $PHP_SELF; ?>" method="post">
<? 

$result = mysql_query("SELECT title,id FROM modules");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><input name='id' type='radio' value='%s'><label> %s</label></p>",$myrow["id"],$myrow["title"]);
}

while ($myrow = mysql_fetch_array($result));
?>

<p> <input name="submit_module" type="submit" value="Далее"></p>

</form>
         
         
         
         
 
       <p>&nbsp;</p>        </td>
 