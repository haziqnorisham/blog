<?php
session_start();

if( $_POST["name"] || $_POST["password"] ) {
	include_once("pdo.php");
	
	$stmt = $pdo->prepare("SELECT name, user_id, password from users where users.name = ?");
	$stmt->execute([$_POST["name"]]); 
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	if($_POST["password"] == $rows[0]["password"]){
		$_SESSION['user_id'] = $rows[0]["user_id"];	
		header("Location: /blog");
	}
	else{
		$_SESSION['flash'] = 'WRONG USER NAME OR PASSWORD';
		#header("Location: http://localhost/blog/login.php");
		header("Location: /blog/login.php");
	}
}


?>