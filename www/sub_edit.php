<?
include('/inc/connect.php');
if (isset($_GET['delete'])) {
        sub_delete($_GET['sub']);
    }

 echo '<h2>Видалити предмет:</h2><br>';
$query_sub = "SELECT * FROM subject_original  LIMIT 0,50";

$query_s = mysql_query($query_sub) or die ("Error:" . mysql_error());


    

    echo '<table border="1">
     <tr> <td><b>Назва пердмету: </b></td><th>';
    echo 'Всього годин: </th><th> Індивідуальної<br>роботи: </th><th>Лекційних<br>занять:</th><th>Практичних/<br>Лабораторних<br>занять:</th><th>Видалити:</th></tr>';
    while ($su = mysql_fetch_array($query_s)) {
        $l_hours = $l_hours + $su['l_hours'];
        $pr_hours = $pr_hours + $su['pr_hours'];
        $ind_hours = $ind_hours + $su['ind_hours'];
        echo '<tr><td>' . $su['subject_name'] . '</td><td align="right">' . $su['all_hours'] . '</td><td align="right">' . $su['ind_hours'] . '</td><td align="right">' . $su['l_hours'] . '</td><td align="right">' . $su['pr_hours'] . '</td><td align="right"><a href="/sub_edit.php?sub=' . $su['subject_name'] . '&delete"> Видалити </a></td></tr>';

    }

    echo '<tr><td><b>Разом: </b><br></td><td align="right"></td><td align="right">' . $ind_hours . '</td><td align="right">' . $l_hours . '</td><td align="right">' . $pr_hours . '</td></tr></table>';




?>