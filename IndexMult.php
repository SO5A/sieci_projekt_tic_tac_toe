<?php

session_start();

include"user.php";
//ktoos jest w trakcie gry ^^ 
$user=new user();
if ($_SESSION['GameId']!=0){
	$user->DeleteGame($_SESSION['GameId']);
	$_SESSION['GameId']="";
}
?>