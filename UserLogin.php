<?php
session_start();

Include "user.php";

	$user=new user();
	$user->setUserName($_SESSION['username']);
	$user->setUserPassword($_SESSION['userpassword']);
	/*$user->getUserId($_SESSION['userid']);
	$user->getUserName($_SESSION['username']);
	$user->getUserGameId($_SESSION['gameid']);
	$user->getUserGameOpponent($_SESSION['opponent']);
	
	*/
	if($user->UserLogin()==true){
		$_SESSION['UserId']=$user->getUserId();
		$_SESSION['UserName']=$user->getUserName();
		$_SESSION['GameId']=$user->getGameId();
		$_SESSION['GameOpponent']=$user->getUserGameOpponent();
	}
?>