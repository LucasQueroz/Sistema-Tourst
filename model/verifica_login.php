<?php 
	//session_start();
	if (empty($_SESSION['name'])) {
		header('Location: /www/rodoviagens/index.php');
		exit();
	}