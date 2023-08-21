<?php

require_once 'dbcon.php';
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../index.php");
		exit(); 
	}
?>