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
 echo '<br>Ви вибрали викладача: '.$tea['teacher_name'].'<br>';  
 $query="SELECT * FROM teach_subj  where teacher_id=".(int)$_GET[id];     
$query_st= mysql_query($query) or die ("Error:".mysql_error()); 

 echo '<br><table border="1" cellpadding="5" 
style="border-collapse: collapse; border: 1px solid black;">
     <tr> <td><b>Назва пердмету: </b></td>';
	 echo '<th> Індивідуальної<br>роботи: </th><th>Лекційних<br>занять:</th><th>Практичних/<br>Лабораторних<br>занять:</th></tr>';
   
while($res_ts=mysql_fetch_array($query_st)) 
{  
   $l_hours_i=$l_hours_i+$res_ts['l_hours'];
   $pr_hours_i=$pr_hours_i+$res_ts['pr_hours'];
   $ind_hours_i=$ind_hours_i+$res_ts['ind_hours'];  
   $all=$l_hours_i+$pr_hours_i+$ind_hours_i;   
   echo '<tr><td>'.$res_ts['subject'].'</td><td align="right">'.$res_ts['ind_hours'].'</td><td align="right">'.$res_ts['l_hours'].'</td><td align="right">'.$res_ts['pr_hours'].'</td></tr>';
 
}
  echo '<tr><td><b>Разом: </b><br></td><td align="right">'.$ind_hours_i.'</td><td align="right">'.$l_hours_i.'</td><td align="right">'.$pr_hours_i.'</td><td align="right">'.$all.'</td></tr></table><br><br>';



 
 //оригінал даних з годинами нормально можна вивести
 $query="SELECT * FROM teacher  where id=".(int)$_GET[id];    
$query_id= mysql_query($query) or die ("Error:".mysql_error()); 
$tea=mysql_fetch_assoc($query_id);
// echo 'Ви вибрали викладача: '.$tea['teacher_name'].'<br><br>';
 echo 'В нього стільки годин вільних: '.$tea['hour'].'<br><br>';
 echo '<br>Оригінальна кількість годин в предмета:<br>';
  $query="SELECT * FROM teach_subj  where teacher_id=".(int)$_GET[id];    
$sub= mysql_query($query) or die ("Error:".mysql_error());
       echo '<table border="1">
     <tr> <td><b>Назва пердмету: </b></td><th>';
	 echo 'Всього годин: </th><th> Індивідуальної<br>роботи: </th><th>Лекційних<br>занять:</th><th>Практичних/<br>Лабораторних<br>занять:</th></tr>';
     while($subjects=mysql_fetch_array($sub))
{ 
$query="SELECT * FROM subject_original  where subject_name='".$subjects['subject']."'";    
$sub_name=mysql_query($query) or die ("Error:".mysql_error()); 
$su=mysql_fetch_assoc($sub_name);

$l_hours=$l_hours+$su['l_hours'];
$pr_hours=$pr_hours+$su['pr_hours'];
$ind_hours=$ind_hours+$su['ind_hours'];
echo '<tr><td>'.$su['subject_name'].'</td><td align="right">'.$su['all_hours'].'</td><td align="right">'.$su['ind_hours'].'</td><td align="right">'.$su['l_hours'].'</td><td align="right">'.$su['pr_hours'].'</td></tr>';

}

     echo '<tr><td><b>Разом: </b><br></td><td align="right"></td><td align="right">'.$ind_hours.'</td><td align="right">'.$l_hours.'</td><td align="right">'.$pr_hours.'</td></tr></table>';


   

 
   //це файл можна розділити код що дальше йде відповідає за добавлення предмету

echo '<h2>Добавити йому предмети</h2><br>';

$query_sub="SELECT * FROM subject where active='1' LIMIT 0,50";    
$query_s= mysql_query($query_sub) or die ("Error:".mysql_error()); 

echo '<form name="st" method="post" action="/inc/action.php">
    <table border="1">
   <tr> <td></td><th> Всього годин: </th><th>Індивідуальної<br>роботи: </th><th>Лекційних<br>занять: </th><th> Практичних/<br>Лабораторних<br>занять: </th></tr>';
while($res_s=mysql_fetch_array($query_s)) 
{
	echo '<tr><td><input name="subject[]" type="checkbox" value="'.$res_s['subject_name'].'">'.$res_s['subject_name'].'</td>
   <td align="right">'.$res_s['all_hours'].'</td><td align="right">'.$res_s['ind_hours'].'</td><td align="right">'.$res_s['l_hours'].'</td><td align="right">'.$res_s['pr_hours'].'</td></tr>';
 }echo '</table>
    <!--  <td> Індивідуально годин: </td><tr><td></td><td>'.$res_s['ind_hours'].'</td></tr>
        <td> Лекційних годин:</td><td>'.$res_s['l_hours'].'</td>
       <td> Практичних годин: </td><td>'.$res_s['pr_hours'].'</td>
        <td> Семінари годин: </td><td>'.$res_s['sem_hours'].'</td>
        <td> Лабалаторні годин:</td><td>'.$res_s['lab_hours'].'</td>
       <td> Самостійне вивч годин:</td><td>'.$res_s['stud_hours'].' <br></td></tr>--> <br>';
echo '<input type="hidden" name="teacher_id" value="'.(int)$_GET[id].'"> ';
echo '<input type="hidden" name="action" value="add_subj_to_teach"> ';
echo '<input type="submit" value="ОК"> ';
echo '<input type="reset" value="Clear"></FORM> ';

 }
?>

