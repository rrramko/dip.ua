<html>
<?php
require_once 'login.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Неможливо підключитись до MySQL: " . mysql_error());
?>
<form name="test" method="post" action="action.php">
    
  <p><b>Прізвище:</b><Br>
   <input type="text" name="lastname" size="40">
  </p>
  <p><b>Ім’я:</b><br>
   <input type="text" name="firstname" size="40">
  </p>
     <p><b>По батькові:</b><Br>
   <input type="text" name="pbat" size="40">
  </p>
  <p>Предмети які викладає:<Br>
   <textarea name="comment" cols="40" rows="3"></textarea></p>
   <p><input type="checkbox" name="a" value="pr1"> Предмет 1</p>
   <p><input type="checkbox" name="a" value="pr2"> Предмет 2</p>
   <p><input type="checkbox" name="a" value="pr3"> Предмет 3</p>
   <p><input type="checkbox" name="a" value="pr4"> Предмет 4</p>
   <p><input type="checkbox" name="a" value="pr5"> Предмет 5</p>
   <p><select size="1" name="stupin" required>
    <option disabled selected value>Вчений ступінь</option>
    <option value="k_n">Кандидат наук</option>
    <option value="d_n">Доктор наук</option>
   </select> 
   <select size="1" name="posada" required>
    <option disabled selected value>Посада</option>
    <option value="ac">Асистент</option>11
    <option value="vk">Викладач</option>
	<option value="dc">Доцент</option>
	<option value="pr">Професор</option>
   </select></p>
     <p><input type="submit" value="ОК"> <input type="reset" value="Clear"></p>
     </form>
</html>