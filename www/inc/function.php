<?
function add_teacher($teacher_name,$hour)
{
  $sql = 'INSERT INTO teacher(teacher_name,hour)
 VALUES("'.$teacher_name.'", "'.$hour.'")';
 if(!mysql_query($sql))
 {echo mysql_error().'<center><p style="color:red;"><b>Ошибка при добавлении данных!</b></p></center>';}
 else
 {echo '<center><p style="color:green;"><b>Данные добавлены!</b></p></center>';}
}


function add_subject($subject_name,$all_hours,$ind_hours,$l_hours,$pr_hours,$sem_hours,$lab_hours,$stud_hours,$active)
{
  $sql = 'INSERT INTO subject(subject_name,all_hours,ind_hours,l_hours,pr_hours,sem_hours,lab_hours,stud_hours,active)
 VALUES("'.$subject_name.'", "'.$all_hours.'", "'.$ind_hours.'", "'.$l_hours.'", "'.$pr_hours.'", "'.$sem_hours.'", "'.$lab_hours.'", "'.$stud_hours.'", "'.$active.'")';
 if(!mysql_query($sql))
 {echo mysql_error().'<center><p style="color:red;"><b>Ошибка при добавлении данных!</b></p></center>';}
 else
 {echo '<center><p style="color:green;"><b>Данные добавлены!</b></p></center>';}
}

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
     if(!mysql_query($sql))
     {echo mysql_error().'<center><p style="color:red;"><b>Ошибка при добавлении данных!</b></p></center>';}
      else
     {echo '<center><p style="color:green;"><b>Данные добавлены!</b></p></center>';}
      
    }
  }  
}

?>