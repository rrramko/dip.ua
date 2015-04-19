<?php
ob_start();


include 'conf.php';  


if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) 
{    
    $userdata = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE uid = '".intval($_COOKIE['id'])."' LIMIT 1"));
	
    if(($userdata['sid'] !== $_COOKIE['hash']) or ($userdata['uid'] !== $_COOKIE['id'])) 
    { 
        setcookie('id', '', time() - 60*24*30*12, '/'); 
        setcookie('hash', '', time() - 60*24*30*12, '/');
    setcookie('error', '1', time() + 60*24*30*12, '/');

 define('USER_LOGGED',true);
  
    } 
} 
else 
{ 
setcookie('error', '2', time() - 60*24*30*12, '/');


define('USER_LOGGED',false);

}

ob_end_flush();
?>
