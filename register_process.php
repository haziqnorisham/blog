<?php
session_start();

if( $_POST["name"] || $_POST["password"] ) {
	include_once("pdo.php");
	
	$sql = "INSERT into users (name, password) values (?,?)";
	$stmt= $pdo->prepare($sql);
	$stmt->execute([$_POST["name"], $_POST["password"]]);

	$_SESSION['flash'] = 'REGISTRATION COMPLETE';

	header("Location: /blog");			
}
?>