<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Gierka</title>
	<meta name="description" content="Top gierka" />
	<meta name="keywords" content="ciekawy projekt" />

	
	<style>
	#container
	{
		width: 960px;
		margin-left: auto;
		margin-right: auto;
	}
	#logo
	{
		background-color: black;
		color: white;
		text-align: center;
		padding: 5px;
	}
	#nav
	{
		float: left;
		background-color: black;
		color:#FFE4B5;
		width: 160px;
		min-height: 380px;
		padding: 10px;
		letter-spacing:2px;
	}
	#game
	{
		float: left;
		text-align: center;
		min-width: 600px;
		min-height:400px;
		background-image:url(http://webkod.pl/files/css/obrazek-01.png);
	}
	#who-online
	{
		float: left;
		width: 160px;
		min-height: 380px;
		padding: 10px;
		background-color:black;
	}
	#footer
	{
		clear: both;
		background-color: black;
		color: white;
		text-align: center;
		padding: 20px;
	}	
	</style>

</head>

<body>

	<div id="container">
	
		<div id="logo">
			<h1>KÓŁKO i KRZYŻYK</h1>
		</div>
	
		<div id="nav">
			
		</div>
		
		<div id="game">
			<form action="zaloguj.php" method="post" style="padding-top:150px;">
	
				Login: <br /> <input type="text" name="username" /> <br />
				Hasło: <br /> <input type="password" name="password" /> <br /><br />
		<input type="submit" value="Zaloguj się" />
	
	</form>
		<?php
		if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
		?>
		</div>
		
		<div id="who-online">
		</div>
		
		<div id="footer">
			BEST GAME EVER
		</div>
	
	</div>

</body>
</html>