<?php

	$dbhost = "sql2.47.pl";
	$dbuser = "pawlik_owscy";
	$dbpass = "p@wlik$1";
	$dbname = "users";


	try{
		//$_db=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
		$_db =new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass, array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_PERSISTENT=> true
		));
	} catch (Exception $e){
		die ("ERROR: ".$e->getMassage());
	}
?>