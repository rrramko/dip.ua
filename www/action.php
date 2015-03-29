<?php 

include ('login.php');
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Неможливо підключитись до MySQL: " . mysql_error());
 $firstname = $_POST['firstname']; 
 $lastname = $_POST['lastname']; 
 $predmet = $_POST['comment'];
 $pbat = $_POST['pbat'];
 $sql = 'INSERT INTO diplom.users(firstname, lastname, predmet, pbat)
 VALUES("'.$firstname.'", "'.$lastname.'", "'.$predmet.'", "'.$pbat.'")';
//mysql_query($sql) or die(mysql_error());
if(!mysql_query($sql))
 {echo '<center><p style="color:red;"><b>Помилка додавання даних!</b></p></center>';}
 else
 {echo '<center><p style="color:green;"><b>Дані успішно додані!</b></p></center>';}
 echo "<center><a href='/'>Назад</a></center>";
?>

