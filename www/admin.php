<?php
ob_start();
session_start();
include('conf.php');
mysql_query('SET NAMES cp1251');
 include('check.php');
if(USER_LOGGED == true) {?> 
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<body id="page4">
<div class="body1">
	<div class="body2">
		<div class="main">
<!-- header -->
			<header>
				<div class="wrapper">
					<h1><a href="index.html" id="logo">Sciencelab</a></h1>
					<form id="search" method="post">
						<div style="height:30px;"></div>
						
					</form>
				</div>
				<div class="wrapper">
					<nav>
						<ul id="menu">
							<li><a href="index.html">Головна</a></li>
							<li><a href="Press.html">Статті</a></li>
						    <li><a href="Contacts.html">Контакти</a></li>
							<li><form method="post"><input type="submit" name="exit" value="Вийти" id="adm"></form></li>
							</ul>
					</nav>
				</div>
				<div class="wrapper">
					<div class="col">
						<h2>Наукова лабораторія Інженерно - педагогічного факультету <span>Наукова бібліотека</span></h2>
						<p class="pad_bot1"><strong>Інженерно-педагогічний факультет</strong> створено у 1974 році для забезпечення всебічної підготовки спеціалістів для закладів освіти, науки та потреб народного господарства.</p>
							
						<br>
						<a href="http://ipf.te.ua/?page_id=2" target="_blank" class="button"><span>Детальніше</span></a>
					</div>
				</div>
			</header>
<!-- / header -->
<!-- content -->
			<section id="content">
				<article class="col1">
					<h3>Our Services</h3>
					<ul class="list2">
						<li><a href="#">Blanditiis praesentium rerum facilis</a></li>
						<li><a href="#">Voluptatum deleniti atqoue</a></li>
						<li><a href="#">Corrupti qufgos dolores et quas</a></li>
						<li><a href="#">Molestias excepturi sint</a></li>
						<li><a href="#">Occaecati cupiditate tempore nihil</a></li>
						<li><a href="#">Non provident, similique suont</a></li>
						<li><a href="#">Culpa qui officia deserunt</a></li>
						<li><a href="#">Mollitia animid laborum estet expedita</a></li>
						<li><a href="#">Blanditiis praesentium rerum facilis</a></li>
						<li><a href="#">Voluptatum deleniti atqoue</a></li>
						<li><a href="#">Corrupti qufgos dolores et quas</a></li>
					</ul>
				</article>
				<article class="col2">
					<div class="reg">
	
	                    <center><?
                      include_once('reg.php')?></center>
					  
					 </div>
  
  
					
						
				</article>
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
<?php
if($_REQUEST['exit']) 
  {
        setcookie('id', '', time() - 60*60*24*30, '/'); 
        setcookie('hash', '', time() - 60*60*24*30, '/');
        header('Location: login.php'); exit();
  }
  ?>
   
  <?
  }
  else {
  header('Location: login.php'); exit();
  
  }

ob_end_flush();


?>