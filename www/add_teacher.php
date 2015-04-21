<html>
<?php
include("/inc/connect.php");
?>
<form name="test" method="post" action="/inc/action.php">
  <p><b>ПІБ:</b><br>
   <input type="text" name="teacher_name" size="40">
  </p>
 <p><b>Заг к-сть годин:</b><br>
   <input type="text" name="hour" size="40">
  </p>
   <input type="hidden" name="action" value="add_teacher">
  <p><input type="submit" value="ОК">
   <input type="reset" value="Clear"></p>
 </form>
</html>