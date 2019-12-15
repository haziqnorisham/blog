<?php
session_start();

if( $_POST["name"]) {
	include_once("pdo.php");
	
	$stmt = $pdo->prepare("SELECT name from users where users.name = ?");
	$stmt->execute([$_POST["name"]]); 
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if(count($rows)>0 && ($_POST["name"] == $rows[0]["name"])){
		
		echo '0';

	}
	else{
		
		
		echo "1";
	}
}


?>