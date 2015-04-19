<?php
ob_start();
# Подключаем конфиг 
include 'conf.php'; 
include 'check.php';

if(isset($_POST['submit'])) 
{ 

    $err = array(); 

    # проверям логин 
   if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])) 
    { 
        $err[] = "Логін може містити тільки букви англійського алфавіту і цифри"; 
    } 
     
    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) 
    { 
        $err[] = "Логін повинен бути не менше 3-х символів і не більше 30"; 
    } 
     
    # проверяем, не сущестует ли пользователя с таким именем 
  $query = mysql_query("SELECT COUNT(users_id) FROM users WHERE users_login='".mysql_real_escape_string($_POST['login'])."'")or die ("<br>Invalid query: " . mysql_error()); 
    if(mysql_result($query, 0) > 0) 
    { 
        $err[] = "Користувач з таким логіном вже існує"; 
    } 
  
     
    # Если нет ошибок, то добавляем в БД нового пользователя 
   if(count($err) == 0) 
    { 
         
        $login = $_POST['login']; 
         
        # Убераем лишние пробелы и делаем двойное шифрование 
       $password = md5(md5(trim($_POST['password']))); 
         
        mysql_query("INSERT INTO users SET users_login='".$login."', users_password='".$password."'"); 
        header("Location: login.php"); exit(); 
    }
}  if(USER_LOGGED == false){


	}
	else {
	 echo 
 "<table ><form method='POST' action=''>
 

 <tr height='25px'><td></td><td>Зареєструвати користувача</td></tr>
 <tr><td></td><td><font size='1' color='black' face='Arial' >Логін</font></td></tr>
  <tr><td></td> <td><input type='text' style='width: 190px; height: 25px;' name='login' /></td></tr>
  <tr><td></td><td><font size='1' color='black' face='Arial'>Пароль</font></td></tr>
   <tr><td></td> <td> <input type='password' style='width:190px;height:25px;' name='password' id='reg_inp' /></td></tr>
  <tr height='30px'><td></td><td align='right'><input name='submit' type='submit' value='Зареєструвати'></td></tr>
  </form>
  </table>";
    if (isset($err)) {
      print "<b>Помилка:</b><br>"; 
      foreach($err AS $error) 
      { 
        print $error."<br>"; 
      }   
    } 

	}
	 ob_end_flush();
  ?>
