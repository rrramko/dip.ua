<?php
include('/inc/connect.php');

echo '<h2>Вибрати викладача</h2><br>';
$query_teac="SELECT * FROM teacher  LIMIT 0,50";    
$query_t= mysql_query($query_teac) or die ("Error:".mysql_error()); 


echo '<form name="st" method="post" action="/inc/action.php">';
echo '<select class="input" type=text name=teacher>' ;
while($res_t=mysql_fetch_array($query_t)) 
{  
   echo '<option value='.$res_t['id'].'>'.$res_t['teacher_name'].'</option>'; //Формируем новую строчку 
}
echo '</select>';

echo '<h2>Вибрати предмети</h2><br>';

$query_sub="SELECT * FROM subject where active=1 LIMIT 0,50";    
$query_s= mysql_query($query_sub) or die ("Error:".mysql_error()); 


while($res_s=mysql_fetch_array($query_s)) 
{  
   echo '<input name="subject[]" type="checkbox" value="'.$res_s['subject_name'].'">'.$res_s['subject_name'].'<br>'; //Формируем новую строчку 
   echo 'Всього годин: '.$res_s['all_hours'].'; ';
   echo 'Індивідуально годин: '.$res_s['ind_hours'].'; ';
   echo 'Лекційних годин: '.$res_s['l_hours'].'; ';
   echo 'Практичних годин: '.$res_s['pr_hours'].'; ';
   echo 'Семінари годин: '.$res_s['sem_hours'].'; ';
   echo 'Лабалаторні годин: '.$res_s['lab_hours'].'; ';
   echo 'Самостійне вивч годин: '.$res_s['stud_hours'].'; <br>';
}

echo '<input type="hidden" name="action" value="add_subj_to_teach"> ';
echo '<input type="submit" value="ОК"> ';
echo '<input type="reset" value="Clear"></FORM> ';
?>

