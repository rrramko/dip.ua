<html>
<?php
/*$max_nav=900;//максимальне навантаження на 1 викладача за 1 рік по повній ставці
$stavka=1;//розмір ставки (1,0.25,0.5,1.25,...)
$kredit=36;//кількість годин в 1 кредиті
$kr_po_pr=4.5;//кількість кредитів по вказаній дисципліні
$god_po_pr=$kr_po_pr*$kredit;//кількість годин по вказаній дисципліні
$rozpodil_u_vids=50;//розподіл годин аудиторної і самостійної роботи у відсотках (50/(50);60/(40);70/(30))
$kr_na_vikl=$kr_po_pr*100/$rozpodil_u_vids;//кількість кредитів що перепадає на викладача по вказаному предмету
$max_nav_vikl=$max_nav*$stavka;//максимальне навантаження викладача в залежності від ставки на рік
$kilk_lek_po_pr=5;//кількість лекцій по предмету
$kilk_prakt_po_pr=10;//кількість практичних (лабораторних) по предмету
*/


require_once 'login.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Неможливо підключитись до MySQL: " . mysql_error());

$predmet = $_POST['predmet'];
$k_st_godin = $_POST['k_st_godin'];
$k_st_kred = $_POST['k_st_kred'];
$k_st_lek = $_POST['k_st_lek'];
$k_st_prakt = $_POST['k_st_prakt'];
$k_st_indiv = $_POST['k_st_indiv'];

?>
<form name="test" method="post" action="action.php">

    <p><b>Предмет:</b><Br>
        <input type="text" name="predmet" size="40">
    </p>
    <p><b>Кількість годин:</b><br>
        <input type="text" name="k_st_godin" size="40">
    </p>
    <p><b>Кількість кредитів:</b><Br>
        <input type="text" name="k_st_kred" size="40">
    </p>
    <p><b>Кількість лекцій:</b><Br>
        <input type="text" name="k_st_lek" size="40">
    </p>
    <p><b>Кількість практичних/лабораторних:</b><Br>
        <input type="text" name="k_st_prakt" size="40">
    </p>
    <p><b>Кількість годин індивідуальної роботи:</b><Br>
        <input type="text" name="k_st_indiv" size="40">
    </p>
    <p><input type="submit" value="ОК"> <input type="reset" value="Clear"></p>
</form>

</html>