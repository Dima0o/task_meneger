<?php
#echo'<script charset="UTF-8" src="//cdn.sendpulse.com/js/push/5399fbb71457f7bd963f6c06ed83969d_0.js" async></script>';
//Данные к БД
$db_name = 'ponysijy_test';         
$db_user = 'ponysijy_test';         
$db_pass = '123456'; 
$db_loc = 'localhost';
//Подключение к БД
$db = mysql_connect($db_loc,$db_user,$db_pass);
mysql_query ("set character_set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_bin'");
//if (!$db){echo "Нет соединения - 0";}else{echo "Соединение есть - 1";}

?>
