<?php

session_start();

Include "user.php";
include_once("connect.php");

if (isset($_POST['username'])) {	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = $_db->query("SELECT * FROM users WHERE UserName='$username' AND UserPassword='$password' LIMIT 1"); // query the person

// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
	$existCount = $sql->rowCount(); // count the row nums
	if ($existCount == 0) { // evaluate the count
		 $_SESSION['username'] = false;
		 header('Location: index.php');
	exit();
	}

	if ($existCount > 0) {
	    while($row = $sql->fetch(PDO::FETCH_ASSOC)){ 
            $_SESSION['UserID']=$row["UserID"];
			$_SESSION['UserName']= $row["UserName"];
			$_SESSION['UserPassword']=$row["UserPassword"];
			$_SESSION['GameId']=$row["GameId"];
			$_SESSION['GameOpponent']=$row["GameOpponent"];
			if ($row["GameId"] != 0) {
					header("Location: Ch/index.php");
					exit();
				}  
		
    }header( 'Location: gramy.php'); 
}
}
?>