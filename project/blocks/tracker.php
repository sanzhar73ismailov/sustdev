<?

$sessid = session_id();

// получаем адрес пользователя
$ip = isset($_SERVER['REMOTE_ADDR'])?
$_SERVER['REMOTE_ADDR']:'';

// получаем описание браузера
$agent = isset($_SERVER['HTTP_USER_AGENT'])?
substr($_SERVER['HTTP_USER_AGENT'], 0, 99):'';

// формируем запрос на вставку данных
$sql = "INSERT user_tracker
(session_id, enter_dt, user_ip, user_agent, page)
VALUES ('$sessid', NOW(), '$ip', '$agent','$_SERVER[SCRIPT_NAME]')";

// выполнякм запрос и проверяем результат 
$qry = mysql_query($sql, $db);
if(!$qry)
{
die('Ошибка выполнения запроса' .
mysql_error($db));
}
// ничего не выводим, чтобы 
// не мешать выводу основной страницы

?>