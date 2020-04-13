<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	define('FROM_INDEX', 1);
	$page = empty($_GET['page'])?'intro.html':$_GET['page'];
	function page_top($page){
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Polar Bears</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.36" />
</head>

<body>
	<h1>The Polar Bear</h1>
	<nav>
		<ul>
			<li><a href="?page=intro.html">Introduction</a></li>
			<li><a href="?page=habitat.html">Habitat</a></li>
			<li><a href="?page=diet.html">Diet and Hunting</a></li>
		</ul>
	</nav>

<?php
	}
	function page_bottom(){
?>
<br><p>If you find any problems or misinformation on our web page, please contact us at steve@larrynet.app!</p><br>
</body>
</html>
<?php
}
register_shutdown_function('page_bottom');
page_top($page);
if(!(include $page))
	echo ('error: no such page');
?>
