<html>
<form name="test" method="post" action="/inc/action.php">
  <p><b>Предмет:</b><br>
   <input type="text" name="subject_name" size="40">
  </p>
 <p><b>Загальна кылькість годин:</b><br>
   <input type="text" name="all_hours" size="40">
  </p>
  <p><b>Годин індивідуальної роботи:</b><br>
   <input type="text" name="ind_hours" size="40">
  </p>
  <p><b>Лекцій:</b><br>
   <input type="text" name="l_hours" size="40">
  </p>
  <p><b>Практичних:</b><br>
   <input type="text" name="pr_hours" size="40">
  </p>
  <p><b>Семінарський:</b><br>
   <input type="text" name="sem_hours" size="40">
  </p>
   <p><b>Лабораторних:</b><br>
   <input type="text" name="lab_hours" size="40">
  </p>
   <p><b>Самостійної роботи студента:</b><br>
   <input type="text" name="stud_hours" size="40">
  </p>
  <input type="hidden" name="active" value="1">
  <input type="hidden" name="action" value="add_subject">
  <p><input type="submit" value="��">
   <input type="reset" value="Clear"></p>
 </form>
</html>