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
	<script src ="../jquery.js"></script>
	<script src ="refreshTable.js"></script>
<?php 
if($_SESSION['GameId']==0)
{
	header("Location: ../gramy.php");
	exit();
}
?>
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
		text-decoration: none;
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
a
	{
		text-decoration: none;
		color:yellow;
	}
	</style>
	<script>
	var X=0;
	function setbutton(cellnum){
		if(X==0){
document.images['rc'+cellnum].src="ex.gif";
		X=1;
		} else{
			document.images['rc'+cellnum].src="oh.gif";
		X=0;
		}
	
	}
	</script>
		<?php
	include "moveFunction.php";
	 if (isset($_GET['move']))
    {
        move($_GET['move']);
    }
	?>

</head>

<body>

	<div id="container">
	
		<div id="logo">
			<h1>KÓŁKO i KRZYŻYK</h1>
		</div>
	
		<div id="nav">
			<h2><a href="ExitMultiPlayerGame.php">Wyjdz z gry</a></h2>
		</div>
		
		<div id="game">
				
		</div>
		
		<div id="who-online">
		</div>
		
		<div id="footer">
			BEST GAME EVER
		</div>
	
	</div>

</body>
</html>