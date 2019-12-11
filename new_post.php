<?php
	session_start();
	if( $_POST["title"] && $_POST["body"] ) {
		include_once("pdo.php");

		$sql = "INSERT INTO posts (title, user_id, body) VALUES (?,?,?)";
		$stmt= $pdo->prepare($sql);
		$stmt->execute([$_POST["title"], $_SESSION["user_id"], $_POST["body"]]);

		echo $_POST["title"];
		echo $_POST["body"];
	}
	header("Location: /blog");
?>