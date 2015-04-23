<?
/**
 * @param $teacher_name
 * @param $hour
 */
function add_teacher($teacher_name,$hour)
{
	 $teacher_name=mysql_real_escape_string(htmlspecialchars($teacher_name));
	 $hour=(int)$hour;
  $sql = 'INSERT INTO teacher(teacher_name,hour)
 VALUES("'.$teacher_name.'", "'.$hour.'")';
 if(!mysql_query($sql))
 {echo mysql_error().'<center><p style="color:red;"><b>Помилка!</b></p></center>';}
 else
 {echo '<center><p style="color:green;"><b>Додано!</b></p></center>';}
}

function teacher_edit($teacher_name,$hour,$id)
{
	 $teacher_name=mysql_real_escape_string(htmlspecialchars($teacher_name));
	 $hour=(int)$hour;
  $sql = 'UPDATE SET teacher_name='.$teacher_name.',hour='.$hour.' where id='.(int)$id;
 if(!mysql_query($sql))
 {echo mysql_error().'<center><p style="color:red;"><b>помилка!</b></p></center>';}
 else
 {echo '<center><p style="color:green;"><b>Відредаговано, його список предметів очищено!</b></p></center>';}
teacher_delete($id,0);

}

function teacher_delete($id,$act)
{

$query="SELECT * FROM teach_subj  where teacher_id=".(int)$id;     
$query_st= mysql_query($query) or die ("Error:".mysql_error()); 

while($res_ts=mysql_fetch_array($query_st)) 
{    
   $query="SELECT * FROM subject  where subject_name='".$res_ts['subject']."'";    
   $sub_name=mysql_query($query) or die ("Error:".mysql_error()); 
   $su=mysql_fetch_assoc($sub_name);
   $l_hours_i=$su['l_hours']+$res_ts['l_hours'];
   $pr_hours_i=$su['pr_hours']+$res_ts['pr_hours'];
   $ind_hours_i=$su['ind_hours']+$res_ts['ind_hours'];  
   $query="UPDATE subject SET  ind_hours='".$ind_hours_i."',l_hours='".$l_hours_i."',  pr_hours='".$pr_hours_i."', active='1' where subject_name='".$res_ts['subject']."'";     
   $query_s= mysql_query($query) or die ("Error:".mysql_error()); 
  
}

$query="DELETE  FROM teach_subj  where teacher_id=".(int)$id;
  
if(!mysql_query($query))
 {echo mysql_error().'<center><p style="color:red;"><b>помилка</b></p></center>';}
 else

 {echo '<center><p style="color:green;"><b>Виконано!</b></p></center>';}
 	if ($act==1) {
      $query2="DELETE  FROM teacher  where id=".(int)$id;     
	  mysql_query($query2) or die ("Error:".mysql_error()); 
	}

}


/**
 * @param $subject_name
 * @param $all_hours
 * @param $ind_hours
 * @param $l_hours
 * @param $pr_hours
 * @param $sem_hours
 * @param $lab_hours
 * @param $stud_hours
 * @param $active
 */
function add_subject($subject_name,$all_hours,$ind_hours,$l_hours,$pr_hours,$active)
{
	$subject_name=mysql_real_escape_string(htmlspecialchars($subject_name));
	$all_hours=(int)$all_hours;
	$ind_hours=(int)$ind_hours;
	$l_hours=(int)$l_hours;
	$pr_hours=(int)$pr_hours;
	$active=(int)$active;
     $sql = 'INSERT INTO subject(subject_name,all_hours,ind_hours,l_hours,pr_hours,active)
 VALUES("'.$subject_name.'", "'.$all_hours.'", "'.$ind_hours.'", "'.$l_hours.'", "'.$pr_hours.'","'.$active.'")';
 $sql2 = 'INSERT INTO subject_original(subject_name,all_hours,ind_hours,l_hours,pr_hours)
 VALUES("'.$subject_name.'", "'.$all_hours.'", "'.$ind_hours.'", "'.$l_hours.'", "'.$pr_hours.'")';
 mysql_query($sql2) or die ("Error:".mysql_error());
 if(!mysql_query($sql))
 {echo mysql_error().'<center><p style="color:red;"><b>Помилка!</b></p></center>';}
 else
 {echo '<center><p style="color:green;"><b>Додано!</b></p></center>';}
}

/**
 * @param $teacher_id
 * @param $subject
 */
function add_subj_to_teach($teacher_id,$subject)
{
	$teacher_id=(int)$teacher_id;
	
//взначаємо кількість годин у викладача
$query="SELECT * FROM teacher  where id=".$teacher_id;    
$q_hour= mysql_query($query) or die ("Error:".mysql_error()); 
$hour_array=mysql_fetch_assoc($q_hour);
$hour=$hour_array['hour'];
 
if(empty($subject))
  {
    echo("Ви не вибрали предмет");
  }
  else
  {
    $N = count($subject);
    for($i=0; $i < $N; $i++)
    {
		$subject[$i]=mysql_real_escape_string(htmlspecialchars($subject[$i]));
	 //рахуємо вибрані години
	 $query="SELECT * FROM subject  where subject_name='".$subject[$i]."'";    
     $sub_name=mysql_query($query) or die ("Error:".mysql_error()); 
     $su=mysql_fetch_assoc($sub_name);
	 if ($hour>0) {
	 if ($su['l_hours']<$hour) {
		 $l_hours=$su['l_hours'];
		 $hour=$hour-$su['l_hours'];
		 $active=0;
		 mysql_query('UPDATE  teacher SET  hour="'.$hour.'" WHERE  teacher.id ="'.$teacher_id.'"') or die ("Error: ".mysql_error());
	     mysql_query('UPDATE  subject SET  l_hours="0" WHERE  subject.subject_name ="'.$subject[$i].'"') or die ("Error: ".mysql_error());
     }
	 else 
	 {
		$reshta=$su['l_hours']-$hour;
		$l_hours=$hour;
		$hour=0;
		$active=1;
		mysql_query('UPDATE  teacher SET  hour="0" WHERE  teacher.id ="'.$teacher_id.'"') or die ("Error: ".mysql_error());
		mysql_query('UPDATE  subject SET  l_hours="'.$reshta.'" WHERE  subject.subject_name ="'.$subject[$i].'"') or die ("Error: ".mysql_error());
	 }
	 if ($su['pr_hours']<$hour) {
		 $pr_hours=$su['pr_hours'];
		 $hour=$hour-$su['pr_hours'];
		 $active=0;
		 mysql_query('UPDATE  teacher SET  hour="'.$hour.'" WHERE  teacher.id ="'.$teacher_id.'"') or die ("Error: ".mysql_error());
	     mysql_query('UPDATE  subject SET  pr_hours="0" WHERE  subject.subject_name ="'.$subject[$i].'"') or die ("Error: ".mysql_error());

	 }
	 else 
	 {
		$reshta=$su['pr_hours']-$hour;
		$pr_hours=$hour;
		$hour=0;
		$active=1;
		mysql_query('UPDATE  teacher SET  hour="0" WHERE  teacher.id ="'.$teacher_id.'"') or die ("Error: ".mysql_error());
		mysql_query('UPDATE  subject SET  pr_hours="'.$reshta.'" WHERE  subject.subject_name ="'.$subject[$i].'"') or die ("Error: ".mysql_error());
	 }
	 if ($su['ind_hours']<$hour) {
		 $ind_hours=$su['ind_hours'];
		 $hour=$hour-$su['ind_hours'];
		 $active=0;
		 mysql_query('UPDATE  teacher SET  hour="'.$hour.'" WHERE  teacher.id ="'.$teacher_id.'"') or die ("Error: ".mysql_error());
	     mysql_query('UPDATE  subject SET  ind_hours="0" WHERE  subject.subject_name ="'.$subject[$i].'"') or die ("Error: ".mysql_error());

	 }
	 else 
	 {
		$reshta=$su['ind_hours']-$hour;
		$ind_hours=$hour;
		$hour=0;
		$active=1;
		mysql_query('UPDATE  teacher SET  hour="0" WHERE  teacher.id ="'.$teacher_id.'"') or die ("Error: ".mysql_error());
		mysql_query('UPDATE  subject SET  ind_hours="'.$reshta.'" WHERE  subject.subject_name ="'.$subject[$i].'"') or die ("Error: ".mysql_error());
	 }
	 if ($active=1) {
      $sql = 'INSERT INTO teach_subj(teacher_id,subject,ind_hours,l_hours,pr_hours)
      VALUES("'.$teacher_id.'", "'.$subject[$i].'", "'.$ind_hours.'", "'.$l_hours.'", "'.$pr_hours.'")';
     if(!mysql_query($sql))
     {echo mysql_error().'<center><p style="color:red;"><b>Помилка!</b></p></center>';}
      else
     {echo '<center><p style="color:green;"><b>Додано!</b></p></center>';}
	 
     $sql2 = 'UPDATE  subject SET  active="'.$active.'" WHERE  subject.subject_name ="'.$subject[$i].'"';
     mysql_query($sql2) or die ("Error: ".mysql_error());
	 
	 }
    else {$sql2 = 'UPDATE  subject SET  active="0" WHERE  subject.subject_name ="'.$subject[$i].'"';
     mysql_query($sql2) or die ("Error: ".mysql_error());}
	 }  
    }
  }  
}

?>