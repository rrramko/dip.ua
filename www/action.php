<?php 

include ('login.php');
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Неможливо підключитись до MySQL: " . mysql_error());
 $firstname = $_POST['firstname']; 
 $lastname = $_POST['lastname']; 
 $pbat = $_POST['pbat'];
$kl_god = $_POST['kl_god'];
$predmet = $_POST['predmet'];
$k_st_godin = $_POST['k_st_godin'];
$k_st_kred = $_POST['k_st_kred'];
$k_st_lek = $_POST['k_st_lek'];
$k_st_prakt = $_POST['k_st_prakt'];
$k_st_indiv = $_POST['k_st_indiv'];
 $sql = 'INSERT INTO diplom.vikladachi(firstname, lastname, pbat, kl_god )
 VALUES("'.$firstname.'", "'.$lastname.'", "'.$predmet.'", "'.$pbat.'")';
$sql1 = 'INSERT INTO diplom.predmeti(predmet, k_st_godin, k_st_kred, k_st_lek, k_st_prakt, k_st_indiv)
 VALUES("'.$predmet.'", "'.$k_st_godin.'", "'.$k_st_kred.'", "'.$k_st_lek.'", "'.$k_st_prakt.'", "'.$k_st_indiv.'")';
//mysql_query($sql) or die(mysql_error());
if(!mysql_query($sql))
 {echo '<center><p style="color:red;"><b>Помилка додавання даних!</b></p></center>';}
 else
 {echo '<center><p style="color:green;"><b>Дані успішно додані!</b></p></center>';}
 echo "<center><a href='/'>Назад</a></center>";
if(!mysql_query($sql1))
{echo '<center><p style="color:red;"><b>Помилка додавання даних!</b></p></center>';}
else
{echo '<center><p style="color:green;"><b>Дані успішно додані!</b></p></center>';}
echo "<center><a href='/'>Назад</a></center>";
?>

