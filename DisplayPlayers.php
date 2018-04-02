<?php
session_start();
include "user.php";
$user=new user();
$user->DisplayAvailablePlayers();
?>