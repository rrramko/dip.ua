<?php
include('/inc/connect.php');
$ind_hours=0;
$l_hours=0;
$pr_hours=0;
$sem_hours=0;
$lab_hours=0;


echo '<h2>Вибрати викладача</h2><br>';
$query_teac="SELECT * FROM teacher  LIMIT 0,50";    
$query_t= mysql_query($query_teac) or die ("Error:".mysql_error()); 

while($res_t=mysql_fetch_array($query_t)) 
{  
   echo '<a href="/add_st.php?id='.$res_t['id'].'">'.$res_t['teacher_name'].'</a><br>';  
}

 if (isset($_GET[id])) { 
 $query="SELECT * FROM teacher  where id=".(int)$_GET[id];    
$query_id= mysql_query($query) or die ("Error:".mysql_error()); 
$tea=mysql_fetch_assoc($query_id);
 echo 'Ви вибрали викладача: '.$tea['teacher_name'].'<br><br>';
 
 echo '<br>Він викладає такі предмети:<br>';
  $query="SELECT * FROM teach_subj  where teacher_id=".(int)$_GET[id];    
$sub= mysql_query($query) or die ("Error:".mysql_error());
     ?>  <table border="1">
     <tr> <td><?echo '<b>Назва пердмету: </b>'?></td><th> <?echo 'Всього годин: ';?></th><th><? echo 'Індивідуальної'?><br><? echo ' роботи: ';?></th><th> <?  echo 'Лекційних'?><br><? echo ' занять: ';?></th><th> <?  echo 'Практичних/'?><br><? echo 'Лабораторних'?><br><? echo ' занять: ';?></th></tr><?
     while($subjects=mysql_fetch_array($sub))
{ 
$query="SELECT * FROM subject  where subject_name='".$subjects['subject']."'";    
$sub_name=mysql_query($query) or die ("Error:".mysql_error()); 
$su=mysql_fetch_assoc($sub_name);

$l_hours=$l_hours+$su['l_hours'];
$pr_hours=$pr_hours+$su['pr_hours'];
$sem_hours=$sem_hours+$su['sem_hours'];
$lab_hours=$lab_hours+$su['lab_hours'];
$ind_hours=$ind_hours+$su['ind_hours'];

   ?>
    <tr><td><?echo ''.$su['subject_name'].'' ?></td><td align="right"><? echo ''.$su['all_hours'].''?></td><td align="right"><? echo ''.$su['ind_hours'].''?></td><td align="right"><? echo ''.$su['l_hours'].''?></td><td align="right"><? echo ''.$su['pr_hours'].''?></td></tr>

<?/*
echo '<b>Назва пердмету: </b>'.$su['subject_name'].'; ';
  echo '<b>Всього годин: </b>'.$su['all_hours'].'; ';
   echo '<b>Індивідуально годин: </b>'.$su['ind_hours'].'; ';
   echo '<b>Лекційних годин: </b>'.$su['l_hours'].'; ';
   echo '<b>Практичних годин: </b>'.$su['pr_hours'].'; ';
   echo '<b>Семінари годин: </b>'.$su['sem_hours'].'; ';
   echo '<b>Лабалаторні годин: </b>'.$su['lab_hours'].'; ';
   echo '<b>Самостійне вивч годин: </b>'.$su['stud_hours'].'; <br>';*/
}?>

     <tr><td><?echo '<b>Разом: </b><br>'?></td><td align="right"></td><td align="right"><? echo ''.$ind_hours.''?></td><td align="right"><? echo ''.$l_hours.''?></td><td align="right"><? echo ''.$pr_hours.''?></td></tr>



 </table>
<?/*
   echo '<b>Разом: </b><br>';
     echo '<b>Всіх годин: </b>'.$all_hours.'; ';
   echo '<b>Лекційних годин: </b>'.$l_hours.'; ';
   echo '<b>Практичних годин: </b>'.$pr_hours.'; ';
   echo '<b>Семінари годин: </b>'.$sem_hours.'; ';
   echo '<b>Лабалаторні годин: </b>'.$lab_hours.'; <br>';
     echo '<b>Індивідуальної роботи: </b>'.$ind_hours.'; <br>';*/
   $sum_hours=900-($l_hours+$pr_hours+$sem_hours+$lab_hours);
 echo '<b>У викладача залишилося </b>' .$sum_hours. '<b> год. </b>';
   //це файл можна розділити код що дальше йде відповідає за добавлення предмету

echo '<h2>Добавити йому предмети</h2><br>';

$query_sub="SELECT * FROM subject where active='1' LIMIT 0,50";    
$query_s= mysql_query($query_sub) or die ("Error:".mysql_error()); 

echo '<form name="st" method="post" action="/inc/action.php">';
    ?><table border="1">
   <tr> <td></td><th> <?echo 'Всього годин: ';?></th><th><? echo 'Індивідуальної'?><br><? echo ' роботи: ';?></th><th> <?  echo 'Лекційних'?><br><? echo ' занять: ';?></th><th> <?  echo 'Практичних/'?><br><? echo 'Лабораторних'?><br><? echo ' занять: ';?></th></tr><?
while($res_s=mysql_fetch_array($query_s)) 
{?><tr><td><?   echo '<input name="subject[]" type="checkbox" value="'.$res_s['subject_name'].'">'.$res_s['subject_name'].'';?></td>
   <td align="right"><? echo ''.$res_s['all_hours'].''?></td><td align="right"><? echo ''.$res_s['ind_hours'].''?></td><td align="right"><? echo ''.$res_s['l_hours'].''?></td><td align="right"><? echo ''.$res_s['pr_hours'].''?></td></tr>
 <?}?></table>
    <!--  <td> <? echo 'Індивідуально годин: ';?></td><tr><td></td><td><? echo ''.$res_s['ind_hours'].'; ';?></td></tr>
        <td> <?  echo 'Лекційних годин: ';?></td><td><? echo ''.$res_s['l_hours'].'; ';?></td>
       <td> <?  echo 'Практичних годин: ';?></td><td><? echo ''.$res_s['pr_hours'].'; ';?></td>
        <td> <?  echo 'Семінари годин: ';?></td><td><? echo ''.$res_s['sem_hours'].'; ';?></td>
        <td> <?  echo 'Лабалаторні годин: ';?></td><td><? echo ''.$res_s['lab_hours'].'; ';?></td>
       <td> <?  echo 'Самостійне вивч годин: ';?></td><td><? echo ''.$res_s['stud_hours'].'; <br>';?></td></tr>-->
<?
echo '<input type="hidden" name="teacher_id" value="'.(int)$_GET[id].'"> ';
echo '<input type="hidden" name="action" value="add_subj_to_teach"> ';
echo '<input type="submit" value="ОК"> ';
echo '<input type="reset" value="Clear"></FORM> ';

 }
?>

