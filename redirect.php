<?php

	session_start();
	include "connect.php";
	
	$token=$_GET["id"];
	
	$UserName=$_SESSION['UserName'];
	$_SESSION['GameId']=$token;
	
	$opponent=$_GET["name"];
	$_SESSION['GameOpponent']=$opponent;
	$_SESSION['XorO']=$opponent;
	
	$GameOnReq=$_db->prepare("SELECT * FROM users WHERE UserID=:UserID");
	$GameOnReq->execute(array(
		'UserID'=>$_SESSION['UserID']
		));	
	
	$existCount = $GameOnReq->rowCount();
	if ($existCount == 0) { // evaluate the count
		return "";
	}
	if ($existCount > 0) {
		while($rowGameOn=$GameOnReq->fetch()){
			if ($rowGameOn["GameId"] == 0) {
				// Update User
				$GameIdInsert =$_db->prepare("UPDATE users SET GameId=?,GameOpponent=?, whoisTurn=? WHERE UserName=?");
				$GameIdInsert->execute(array($token,$opponent,1,$UserName));
				// Update Opponent
				$GameIdInsertOpp =$_db->prepare("UPDATE users SET GameId=?,GameOpponent=?, whoisTurn=? WHERE UserName=?");
				$GameIdInsertOpp->execute(array($token,$UserName,0,$opponent));	
			}
		}
	}
	header("Location: Ch/index.php");
?>