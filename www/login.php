<?php

ob_start();



  include 'conf.php';

function generateCode($length=6) { 

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789"; 

    $code = ""; 

    $clen = strlen($chars) - 1;   

    while (strlen($code) < $length) { 

        $code .= $chars[mt_rand(0,$clen)];   

    } 

    return $code; 

  } 

  

 

  if (isset($_COOKIE['errors'])){

      $errors = $_COOKIE['errors'];

      setcookie('errors', '', time() - 60*24*30*12, '/');

  }



  if(isset($_POST['submit'])) 

  { 



    $data = mysql_fetch_assoc(mysql_query("SELECT uid, password FROM `users` WHERE `username`='".mysql_real_escape_string($_POST['login'])."' LIMIT 1")); 



    if($data['password'] === md5(md5($_POST['password']))) 

    { 



      $hash = md5(generateCode(10)); 

           



      mysql_query("UPDATE users SET sid='".$hash."' WHERE uid='".$data['uid']."'") or die("MySQL Error: " . mysql_error()); 

 

      setcookie("id", $data['uid'], time()+60*60*24*30); 

      setcookie("hash", $hash, time()+60*60*24*30); 

       

       include('check.php');

      header("Location: admin.php"); exit(); 

    } 

    else 

    { 

      print "<center><div class='login_error'><font color='red' face='Arial' size='6'>Невірний логін/пароль</font></div></center>"; 

    }

 

  } 

?>
<html lang="ua">
<head>
<title>Science lab</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
</head>
<body id="page1">
<div class="body1">
	<div class="body2">
		<div class="main">
<!-- header -->
			<header>
				<div class="wrapper">
					<h1><a href="index.html" id="logo">Sciencelab</a></h1>
					<form id="search" method="post">
						<div>
							<input type="submit" class="submit" value="">
							<input type="text" class="input">
						</div>
					</form>
				</div>
				<div class="wrapper">
					<nav>
						<ul id="menu">
							<li><a href="index.html">Головна</a></li>
							<li><a href="Press.html">Статті</a></li>
						    <li><a href="Contacts.html">Контакти</a></li>
							<li><a href="Admin.php">Увійти</a></li>
							</ul>
					</nav>
				</div>
				<div class="wrapper">
					<div class="col">
						<h2>Наукова лабораторія Інженерно - педагогічного факультету <span>Наукова бібліотека</span></h2>
						<p class="pad_bot1"><strong>Інженерно-педагогічний факультет</strong> створено у 1974 році для забезпечення всебічної підготовки спеціалістів для закладів освіти, науки та потреб народного господарства.</p>
							<!--<ul class="list1 pad_bot2">
							<li><a href="#">Veritatis et quasi architecto beatae vitae dicta</a></li>
							<li><a href="#">Nemo enim ipsam voluptatem quia voluptas sit aspernatur</a></li>
							<li><a href="#">Sed quia consequuntur magni dolores eos ratione</a></li>
						</ul>-->
						<br>
						<a href="http://ipf.te.ua/?page_id=2" target="_blank" class="button"><span>Детальніше</span></a>
					</div>
				</div>
			</header>
<!-- / header -->
<!-- content -->
			<section id="content">
				<article class="col1">
					<h3>Останні статті</h3>
					<div class="wrapper">
						<figure class="left marg_right1"><a href="#"><img src="images/page1_img1.jpg" alt=""></a></figure>
						<p>
							<strong>Atvero eos acusmus</strong><br>et iusto odio dignissimos ducimus qui blanditiis praentium. &nbsp; <a href="#">More</a>
						</p>
					</div>
					<div class="wrapper">
						<figure class="left marg_right1"><a href="#"><img src="images/page1_img2.jpg" alt=""></a></figure>
						<p>
							<strong>Voluptatum deleniti</strong> Atque corrupti dolores et quas molestias exceptur sint occaecati. &nbsp; <a href="#">More</a>
						</p>
					</div>
					<div class="wrapper">
						<figure class="left marg_right1"><a href="#"><img src="images/page1_img3.jpg" alt=""></a></figure>
						<p>
							<strong>Cupiditate provident</strong> Similique sunt in culpa qui officia deserunt mollitia animi. &nbsp; <a href="#">More</a>
						</p>
					</div>
				</article>
		<article class="col2">
		



  <link rel="stylesheet" type="text/css" href="style_login.css">


<div class="login">
<div class="login_error">
</div>
<br>

<br>



		<center><font color="" face="Arial" size="8">Авторизація</font></center>

 <table><form method="POST" action="">

 <tr><td></td><td><font size="3" color="" face="Arial" >Логін</font></td><tr>

  <tr><td></td> <td><input type="text" style="width: 300px; height: 30px; font-size: 20px" name="login"><br /></td></tr>

  <tr><td></td><td><font size="3" color="" face="Arial" >Пароль</font></td><tr>

   <tr><td width="15px"></td> <td> <input type="password" style="width: 300px; height: 30px; font-size: 20px" name="password" ><br /></td></tr><tr><td><td><td></td></tr><tr><td height="20px"><td><td></td></tr>

  <tr><td></td><td align="right"><input name="submit" type="submit" style="width: 100px; height: 25px; font-size: 15px" value="Увійти"></td></tr>
<tr height="8px"></tr>
   <tr height="30px"><td></td><td align="right"><a href="index.html" style="color:; font-size:20px;">На головну</a></td></tr>

  </form>

  </table></div>

  <?php



  if (isset($errors)) {print '<h4>'.$error[$errors].'</h4>';}



  ?><?php

    ob_end_flush(); 

?></article>
			</section>
		</div>
	</div>
</div>
<div class="body3">
	<div class="main">
		<section id="content2">
			<article class="col3">
				<h4><span><span class="right"></span>Склад лабораторії</span></h4>
				<div class="wrapper">
					<div class="pad">
					<ul class="list1 pad_bot2">
							<li><a href="">Пальчик А. О.</a></li>
							<li><a href="">Бурега Н. .</a></li>
							<li><a href="">Вовк Н. М.</a></li>
							<li><a href="">Лучка Р. О.</a></li>
							<li><a href="">Бабій А. П.</a></li>
						   <li><a href="">Макух Є. .</a></li>
						</ul>
					
					</div>
				</div>
			</article>
			<article class="col4">
				<h4><span><span class="right"></span>Цілі лабораторії</span></h4>
				<div class="wrapper">
					<div class="pad">
						<ul class="list2">
							<li><a href="#">Ціль 1</a></li>
							<li><a href="#">Ціль 2</a></li>
							<li><a href="#">Ціль 3</a></li>
							<li><a href="#">Ціль 4</a></li>
							<li><a href="#">Ціль 5</a></li>
						</ul>
					</div>
				</div>
			</article>
			<article class="col4">
				<h4><span><span class="right"></span>Контактна інформація</span></h4>
				<div class="wrapper">
					<div class="pad">
						<p class="pad_bot3">
<p class="pad_bot3"><strong>Диспетчер:</strong> Оліяр Наталя Євгенівна</p>
<p class="pad_bot3"><strong>Поштова скринька:</strong> dek_ipf@tspu.edu.ua</p>
<p class="pad_bot3"><strong>Телефон:</strong> (0352) 53 36 29
						</p>
					</div>
				</div>
			</article>
		</section>
<!-- / content -->
<!-- footer -->
		<footer>
			<nav>
				<ul id="footer_menu">
				
							<li><a href="index.html">Головна</a></li>
							<li><a href="Press.html">Статті</a></li>
						    <li><a href="Contacts.html">Контакти</a></li>
							<li><a href="Press.html">Увійти</a></li>
							</ul>
			</nav>
			<div class="pad">
				 by Roman Luchka 2014.<br>
			</div>
		</footer>
<!-- / footer -->
	</div>
</div>
</body>
</html>