<?php 

if(
isset($_POST['action']) && !empty($_POST['action'])
){
$action=$_POST['action'];	
switch ($action){
case 'add_teacher':
add_teacher($_POST['teacher_name'],$_POST['hour']); break;
case 'add_subject':
add_subject($_POST['subject_name'],$_POST['all_hours'],$_POST['ind_hours'],$_POST['l_hours'],$_POST['pr_hours'],$_POST['active']); break;
case 'add_subj_to_teach':
add_subj_to_teach($_POST['teacher_id'],$_POST['subject']);break;
case 'teacher_edit':
teacher_edit($_POST['teacher_name'],$_POST['hour'],$_POST['id']);break;
            }
}



?>