<?
/**
 * @param $teacher_name
 * @param $hour
 */
function add_teacher($teacher_name,$hour)
{
  $sql = 'INSERT INTO teacher(teacher_name,hour)
 VALUES("'.$teacher_name.'", "'.$hour.'")';
 if(!mysql_query($sql))
 {echo mysql_error().'<center><p style="color:red;"><b>Ошибка при добавлении данных!</b></p></center>';}
 else
 {echo '<center><p style="color:green;"><b>Данные добавлены!</b></p></center>';}
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
function add_subject($subject_name,$all_hours,$ind_hours,$l_hours,$pr_hours,$sem_hours,$lab_hours,$stud_hours,$active)
{
  $sql = 'INSERT INTO subject(subject_name,all_hours,ind_hours,l_hours,pr_hours,sem_hours,lab_hours,stud_hours,active)
 VALUES("'.$subject_name.'", "'.$all_hours.'", "'.$ind_hours.'", "'.$l_hours.'", "'.$pr_hours.'", "'.$sem_hours.'", "'.$lab_hours.'", "'.$stud_hours.'", "'.$active.'")';
 if(!mysql_query($sql))
 {echo mysql_error().'<center><p style="color:red;"><b>Ошибка при добавлении данных!</b></p></center>';}
 else
 {echo '<center><p style="color:green;"><b>Данные добавлены!</b></p></center>';}
}

/**
 * @param $teacher_id
 * @param $subject
 */
function add_subj_to_teach($teacher_id,$subject)
{
	if(empty($subject))
  {
    echo("Ви не вибрали предмет");
  }
  else
  {
    $N = count($subject);
    for($i=0; $i < $N; $i++)
    {
     $sql = 'INSERT INTO teach_subj(teacher_id,subject)
     VALUES("'.$teacher_id.'", "'.$subject[$i].'")';
     $sql2 = 'UPDATE  subject SET  active="0" WHERE  subject.subject_name ="'.$subject[$i].'"';
      $result = mysql_query($sql2) or die ("Error: ".mysql_error());
     if(!mysql_query($sql))
     {echo mysql_error().'<center><p style="color:red;"><b>Ошибка при добавлении данных!</b></p></center>';}
      else
     {echo '<center><p style="color:green;"><b>Данные добавлены!</b></p></center>';}
      
    }
  }  
}

?>