<html>
<?php
include("/inc/connect.php");
?>
<form name="test" method="post" action="add_subject.php">
  <p><b>Предмет:</b><br>
   <input type="text" name="subject_name" size="40">
  </p>
 <p><b>Загальна кількість годин:</b><br>
   <input type="text" name="all_hours" size="40">
  </p>
  <p><b>Годин індивідуальної роботи:</b><br>
   <input type="text" name="ind_hours" size="40">
  </p>
  <p><b>Лекційних годин:</b><br>
   <input type="text" name="l_hours" size="40">
  </p>
  <p><b>Практичних/лабораторних годин:</b><br>
   <input type="text" name="pr_hours" size="40">
  </p>
  <input type="hidden" name="active" value="1">
  <input type="hidden" name="action" value="add_subject">
  <p><input type="submit" value="ok">
   <input type="reset" value="Clear"></p>
 </form>
</html>