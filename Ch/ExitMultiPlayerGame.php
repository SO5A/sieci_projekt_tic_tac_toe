<?php
	session_start();
	include "../user.php";
	$user=new user();
	$user->DeleteGame($_SESSION['GameId']);
	$_SESSION['GameId']="";
	header("Location: ../gramy.php");
?>